<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Mail\PaymentRefund;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;



class CustomerController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        $products = Product::all();
        $wishlists = WishList::where('customer_id',Auth()->id())->count();
        $cart_count = Cart::where('customer_id',Auth()->id())->count();
        $carts = Cart::with('product')->where('customer_id',Auth()->id())->get();
        $subtotal = Cart::where('customer_id', Auth()->id())->sum('total_price');
        $mobilesCategories = Category::where('parent_id', 1)->pluck('id');
        $mobileProducts = Product::whereIn('category_id', $mobilesCategories)->get();
        $leptopsCategories = Category::where('parent_id', 3)->pluck('id');
        $leptopsProducts = Product::whereIn('category_id', $leptopsCategories)->get();
        return view('customer.index', compact('categories', 'products', 'wishlists', 'cart_count', 'carts', 'subtotal', 'mobileProducts','leptopsProducts'));
    }

    public function subcategory($id)
    {
        $category = Category::findOrFail($id);

        $subcategories = Category::where('parent_id', $id)->get();

        $subCategoryIds = $subcategories->pluck('id')->toArray();

        $products = Product::whereIn('category_id', $subCategoryIds)->latest()->paginate(6);

        //$subcategories = Category::where('parent_id', $id)->get();
        //$products      = Product::paginate(6);

        return view('customer.shop-left-sidebar', compact('category', 'subcategories', 'products'));
    }

    
    public function getProducts(Request $request)
    {
        $query = Product::query();

        // If subcategory clicked
        if (!empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        // If page loaded (all subcategories)
        if (!empty($request->subCategoryIds)) {
            $query->whereIn('category_id', $request->subCategoryIds);
        }

        // If search query is provided
        if (!empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Name sorting
        if ($request->sort == 'asc') {
            $query->orderBy('name', 'asc');
        } elseif ($request->sort == 'desc') {
            $query->orderBy('name', 'desc');
        }

        // Price sorting
        if ($request->price == 'asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->price == 'desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->with([
            'discount' => function ($query) {
                $query->where('status', 'active');
            }
        ])->get();

        // Calculate final_price for each product
        foreach ($products as $product) {
            if ($product->discount && $product->discount->status === 'active') {
                $product->final_price = $product->price - ($product->price * $product->discount->discount_value / 100);
            } else {
                $product->final_price = $product->price;
            }
        }

        if (Auth::check()) {
            $customerId = Auth::id();
            $wishlistedProductIds = \App\Models\WishList::where('customer_id', $customerId)
                ->pluck('product_id')->toArray();
            foreach ($products as $product) {
                $product->isWishlisted = in_array($product->id, $wishlistedProductIds);
            }
        } else {
            foreach ($products as $product) {
                $product->isWishlisted = false;
            }
        }

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();

        return view('customer.shop-single', compact('product', 'relatedProducts'));
    }

    public function wishlist($id)
    {
        $product = Product::findOrFail($id);

        $exists = WishList::where('customer_id', Auth()->id())->where('product_id', $product->id)->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Product already in wishlist');
        }

        $wishlist = new WishList();
        $wishlist->customer_id = Auth()->id();
        $wishlist->product_id = $product->id;

        if ($wishlist->save()) {
            return redirect()->route('customer.showWishlist')->with('success', 'Wishlist Added SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Wishlist Added Failed');
        }
    }

    public function store($id)
    {
        $exists = WishList::where('customer_id', auth()->id())->where('product_id', $id)->first();

        if ($exists) {
            return response()->json([
                'status' => 'exists',
                'message' => 'Already in wishlist',
            ]);
        }

        WishList::create([
            'customer_id' => auth()->id(),
            'product_id' => $id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Added to wishlist',
        ]);
    }

    public function showWishlist()
    {
        $wishlists = WishList::with('product', 'user')->where('customer_id', Auth()->id())->orderBy('created_at', 'desc')->get();
        return view('customer.wishlist', compact('wishlists'));
    }

    public function deleteWishlist($id)
    {
        $wishlist = WishList::where('id', $id)->where('customer_id', Auth()->id())->first();

        if ($wishlist->delete()) {
            return redirect()->route('customer.showWishlist')->with('success', 'Wishlist Product Deleted SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Wishlist Product Deleted Failed');
        }
    }

    public function cart($id)
    {

        $product = Product::findOrFail($id);

        $cart = Cart::where('product_id', $id)->where('customer_id', Auth()->id())->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->total_price = $cart->quantity * $product->final_price;
            $cart->save();
        } else {
            $cart = new Cart();
            $cart->customer_id = Auth()->id();
            $cart->product_id = $product->id;
            $cart->quantity = 1;
            $cart->total_price = $product->final_price;

            if ($cart->save()) {
                return redirect()->route('customer.showCart')->with('success', 'Product Add To Cart SuccessFully');
            } else {
                return redirect()->back()->with('error', 'Product Add To Cart Failed');
            }
        }
    }

    public function showCart()
    {
        $carts = Cart::with('product')->where('customer_id', Auth()->id())->get();
        $cart_item = Cart::where('customer_id', Auth()->id())->with('product')->get();
        $subtotal = $cart_item->sum(function ($cart) {
            return $cart->quantity * $cart->product->final_price;
        });
        $gst = ($subtotal * 18) / 100;
        $deliveryCharge = $carts->count() > 0 ? 50 : 0;
        $total = $subtotal + $gst + $deliveryCharge;

        return view('customer.cart', compact('carts', 'subtotal', 'gst', 'deliveryCharge', 'total'));
    }

    public function updateQuantity(Request $request)
    {
        $cart = Cart::where('id', $request->cart_id)->where('customer_id', Auth()->id())->first();

        if ($cart) {

            $cart->quantity = $request->quantity;
            $cart->total_price = $cart->quantity * $cart->product->final_price;
            $cart->save();

            $cart_item = Cart::where('customer_id', Auth()->id())->with('product')->get();
            $subtotal = $cart_item->sum(function ($cart) {
                return $cart->quantity * $cart->product->final_price;
            });

            $gst = ($subtotal * 18) / 100;
            $deliveryCharge = $cart_item->count() > 0 ? 50 : 0;
            $total = $subtotal + $gst + $deliveryCharge;

            return response()->json([
                'itemTotal' => $cart->total_price,
                'subtotal' => $subtotal,
                'gst' => $gst,
                'deliveryCharge' => $deliveryCharge,
                'total' => $total,
            ]);
        }
    }

    public function deleteCart($id)
    {
        $cart = Cart::where('id', $id)->where('customer_id', Auth()->id())->first();

        if ($cart->delete()) {
            return redirect()->route('customer.showCart')->with('success', 'Cart Product Deleted SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Cart Product Deleted Failed');
        }
    }

    public function checkout(Request $request)
    {
        $carts = Cart::with('product')->where('customer_id', Auth()->id())->get();
        $cart_item = Cart::where('customer_id', Auth()->id())->with('product')->get();
        $subtotal = $cart_item->sum(function ($cart) {
            return $cart->quantity * $cart->product->final_price;
        });
        $gst = ($subtotal * 18) / 100;
        $deliveryCharge = $carts->count() > 0 ? 50 : 0;
        $total = $subtotal + $gst + $deliveryCharge;

        return view('customer.checkout', compact('carts', 'subtotal', 'gst', 'deliveryCharge', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^[6-9]\d{9}$/',
            'pincode' => 'required|digits:6',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
        ]);

        $address = new Address();
        $address->customer_id = Auth()->id();
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pincode = $request->pincode;

        $address->save();

        $cartItems = Cart::with('product')->where('customer_id', Auth()->id())->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Cart is empty');
        }

        $subtotal = 0;
        $totalGst = 0;
        $totalDelivery = 0;

        foreach ($cartItems as $item) {

            $itemSubtotal = $item->product->final_price * $item->quantity;
            $gstAmount = ($itemSubtotal * $item->gst) / 100;

            $subtotal += $itemSubtotal;
            $totalGst += $gstAmount;
            $totalDelivery += $item->delivery_charge;
        }

        $grandTotal = $subtotal + $totalGst + $totalDelivery;

        $order = new Order();
        $order->customer_id = Auth()->id();
        $order->address_id = $address->id;
        $order->order_number = 'ORD-' . rand(100000, 999999);
        $order->total_amount = $grandTotal;

        $order->save();

        foreach ($cartItems as $item) {

            $itemSubtotal = $item->product->final_price * $item->quantity;
            $gstAmount = ($itemSubtotal * $item->gst) / 100;
            $itemTotal = $itemSubtotal + $gstAmount + $item->delivery_charge;

            $orderItems = new OrderItem();
            $orderItems->order_id = $order->id;
            $orderItems->customer_id = Auth()->id();
            $orderItems->vendor_id = $item->product->vendor_id;
            $orderItems->product_id = $item->product_id;
            $orderItems->quantity = $item->quantity;
            $orderItems->price = $item->product->final_price;
            $orderItems->total_amount = $itemTotal;
            $orderItems->payment_mode = $request->payment_method;
            $orderItems->payment_status = 'pending';
            $orderItems->order_status = 'pending';
            $orderItems->save();
        }

        if ($request->payment_method == 'cod') {
            return redirect()->route('customer.myorder')->with('success', 'Order Placed Successfully (COD)');
        }

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $razorpayOrder = $api->order->create([
            'receipt' => $order->order_number,
            'amount' => $grandTotal * 100,
            'currency' => 'INR'
        ]);

        $order->update([
            'razorpay_order_id' => $razorpayOrder['id']
        ]);

        return view('customer.razorpayview', [
            'order' => $order,
            'razorpayOrderId' => $razorpayOrder['id'],
            'amount' => $grandTotal
        ]);

    }

    public function verifyPayment(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {

            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            $order = Order::findOrFail($request->order_id);

            $order->update([
                'payment_status' => 'paid'
            ]);
                
            OrderItem::where('order_id', $order->id)->update(['payment_status' => 'paid']);

            $orderItems = OrderItem::where('order_id', $order->id)->get();

            foreach ($orderItems as $item) {
                $product = Product::find($item->product_id);

                if ($product) {
                    $product->stock = $product->stock - $item->quantity;
                    $product->save();
                }
            }

            Cart::where('customer_id', Auth()->id())->delete();

            return redirect()->route('customer.myorder')->with('success', 'Order Placed Successfully');
            
        } catch (\Exception $e) {
            return redirect()->route('customer.myorder')->with('error', 'Payment Failed');
        }
    }

    public function myOrder()
    {
        $myorder = OrderItem::with('users', 'order', 'product', 'vendor')->where('customer_id', Auth()->id())->latest('created_at')->paginate(5);
        return view('customer.myorder', compact('myorder'));
    }

    public function orderDetails($id)
    {
        $order = OrderItem::with('users', 'order', 'product', 'vendor')->findOrFail($id);

        return view('customer.order-detail', compact('order'));
    }
    
    public function download($id)
    {
        $invoice = OrderItem::with('users', 'order', 'product', 'vendor')->where('customer_id', Auth()->id())->findOrFail($id);

        if ($invoice->order->order_status == 'delivered' && $invoice->order->payment_status == 'paid') {

            $pdf = Pdf::loadView('customer.Invoice', compact('invoice'));

            Mail::to($invoice->users->email)->send(new InvoiceMail($invoice, $pdf));
            
            return $pdf->download('Invoice_' . $invoice->order->order_number . '.pdf');
            
        }

        return back()->with('error', 'Invoice available only after delivery and payment confirmation.');

    }

    public function cancelOrder($id)
    {
        $order = OrderItem::where('customer_id', Auth::id())->findOrFail($id);

        if (in_array($order->order_status, ['pending', 'processing'])) {
            $order->order_status = 'cancelled';
            $order->save();

            $product = $order->product;
            if ($product) {
                $product->stock += $order->quantity;
                $product->save();
            }

            Mail::to($order->users->email)->send(new PaymentRefund($order, $order->total_amount));
            
            return redirect()->route('customer.myorder')->with('success', 'Order Cancelled Successfully');
        }

        return back()->with('error', 'Order cannot be cancelled');
    }

    public function searchCategory(Request $request){
        $search = $request->search;

        $category = Category::where('name', 'LIKE', "%$search%")->first();

        if ($category) {
            return redirect()->route('customer.category', $category->id);
        } else {
            return back()->with('error', 'Category not found!');
        }
    }

    public function aboutUs(){
        return view('customer.about');
    }

    public function contact(){
        return view('customer.contact');
    }


}
