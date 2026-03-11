<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderAssigned;

class VendorController extends Controller
{
    public function index()
    {
        $product = Product::where('vendor_id', Auth()->id())->count();
        $total_revenue = OrderItem::where('vendor_id', Auth()->id())->where('order_status', '!=', 'cancelled')->sum('total_amount');
        $stocks = Product::where('vendor_id', Auth()->id())->where('stock', '<=', 5)->latest('created_at')->paginate(3);
        $recent_orders = OrderItem::with('product', 'users', 'order')->where('vendor_id', Auth()->id())->latest()->take(3)->get();

        return view('vendor.index', compact('product', 'total_revenue', 'stocks', 'recent_orders'));
    }

    public function orders()
    {
        $total_orders = OrderItem::with('users', 'order', 'product', 'vendor')->where('vendor_id', Auth()->id())->count();
        $total_delivered = OrderItem::where('vendor_id', Auth()->id())->where('order_status', 'delivered')->count();
        $total_cancelled = OrderItem::where('vendor_id', Auth()->id())->where('order_status', 'cancelled')->count();
        $orders = OrderItem::with('users', 'order', 'product', 'vendor', 'orderAssigned')->where('vendor_id', Auth()->id())->latest('created_at')->paginate(4);
        $deliveryBoys = User::where('role','delivery_boy')->get();
        return view('vendor.orders-list', compact('orders', 'total_orders', 'total_delivered', 'total_cancelled','deliveryBoys'));
    }

    public function orderDetails($id)
    {
        $order = OrderItem::with('users', 'order', 'product', 'vendor',)->where('vendor_id', Auth()->id())->findOrFail($id);
       
        return view('vendor.order-detail', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            //'order_status' => 'required|in:pending,processing,out_of_delivery,shipped,delivered'
            'order_status' => 'required|in:pending,assigned'
        ]);

        $order = OrderItem::where('vendor_id', Auth::id())->findOrFail($id);
        $order->order_status = $request->order_status;
        $order->save();

        if($request->order_status == 'assigned' && $request->delivery_boy_id){
            $orderAssigned = new OrderAssigned();
            $orderAssigned->order_item_id = $order->id;
            $orderAssigned->delivery_boy_id = $request->delivery_boy_id;
            $orderAssigned->save();
        }

        return redirect()->route('vendor.order-list')->with('success', 'Order status updated successfully!');
    }
    
    public function orderCancel()
    {
        $orders = OrderItem::with('users', 'order', 'product', 'vendor')->where('order_status', 'cancelled')->where('vendor_id',Auth()->id())->get();

        return view('vendor.orders-cancel-list', compact('orders'));
    }

    public function orderDelivered()
    {
        $orders = OrderItem::with('users', 'order', 'product', 'vendor')->where('order_status', 'delivered')->where('vendor_id',Auth()->id())->get();

        return view('vendor.orders-delivered-list', compact('orders'));
    }



}
