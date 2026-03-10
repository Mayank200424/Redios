<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\DiscountRequest;

class ProductController extends Controller
{
    public function index()
    {
        return view('vendor.product-list');
    }

    public function products()
    {
        $categories = Category::whereNotNull('parent_id')->get();
        return view('vendor.product-add', compact('categories'));
    }

    public function create(ProductRequest $request)
    {
        $data = $request->validated(); 

        $product = new Product();
        $product->vendor_id = Auth()->id();
        $product->category_id = $data['category_id'];
        $product->name = $data['name'];
        $product->stock = $data['stock'];
        $product->price = $data['price'];
        $product->description = $data['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('products', $fileName, 'public');
            $product->image = $path;
        }

        if ($product->save()) {
            return redirect()->route('product-read')->with('success', 'Product Created SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Product Created Failed');
        }
    }

    public function read()
    {
        $products = Product::with('category')->where('vendor_id', Auth()->id())->latest('created_at')->paginate(5);
        return view('vendor.product-list', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::whereNotNull('parent_id')->get();

        return view('vendor.product-edit', compact('product', 'categories'));
    }

    public function view($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::whereNotNull('parent_id')->get();

        return view('vendor.product-detail', compact('product', 'categories'));

    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->vendor_id !== Auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action');
        }

        $data = $request->validated(); 

        $product->name = $data['name'];
        $product->category_id = $data['category_id'];
        $product->stock = $data['stock'];
        $product->price = $data['price'];
        $product->description = $data['description'];

        if ($request->hasFile('image')) {

            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('products', $fileName, 'public');
            $product->image = $path;
        }

        if ($product->save()) {
            return redirect()->route('product-read')->with('success', 'Product Updated SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Product Updated Failed')->withInput();
        }

    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if ($product->vendor_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action');
        }

        if ($product->delete()) {
            return redirect()->route('product-read')->with('success', 'Product Deleted SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Product Deleted Failed')->withInput();
        }
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $query = Product::with('category')->where('vendor_id', Auth()->id())->where('name', 'like', "%{$search}%")->paginate(3);
        ;

        return response()->json([
            'data' => $query->items(),
            'pagination' => $query->links()->toHtml()
        ]);
    }

    public function product()
    {
        $products = Product::where('vendor_id', Auth()->id())->get();
        return view('vendor.discount-add', compact('products'));
    }

    public function createDiscount(DiscountRequest $request)
    {
        $data = $request->validated(); 
        
        $discounts = new Discount();
        $discounts->product_id = $data['product_id'];
        $discounts->vendor_id = Auth()->id();
        $discounts->discount_value = $data['discount_value'];
        $discounts->start_date = $data['start_date'];
        $discounts->end_date = $data['end_date'];

        if ($discounts->save()) {
            return redirect()->route('discount-read')->with('success', 'Discount Created SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Discount Created Failed');
        }
    }

    public function showDiscount()
    {
        $discounts = Discount::with('product')->where('vendor_id',Auth()->id())->get();
        return view('vendor.discount-list', compact('discounts'));
    }

    public function editDiscount($id)
    {
        $discounts = Discount::with('product')->findOrFail($id);
        $products = Product::where('vendor_id', Auth()->id())->get();
        return view('vendor.discount-edit', compact('discounts', 'products'));
    }

    public function updateDiscount(Request $request, $id)
    {
        $request->validate(
        [
            'product_id' => 'required|exists:products,id',
            'discount_value' => 'required|numeric|min:1|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:upcoming,active,expired',
        ],
        [
            'product_id.required' => 'Please select a product.',
            'product_id.exists' => 'Selected product is invalid or does not exist.',
            'discount_value.required' => 'Discount value is required.',
            'discount_value.numeric' => 'Discount must be a number.',
            'discount_value.min' => 'Discount must be at least 1%.',
            'discount_value.max' => 'Discount cannot exceed 100%.',
            'start_date.required' => 'Start date is required.',
            'start_date.date' => 'Start date must be a valid date.',
            'end_date.required' => 'End date is required.',
            'end_date.date' => 'End date must be a valid date.',
            'end_date.after_or_equal' => 'End date must be after or equal to the start date.',
            'status.required' => 'Please select a status.',
            'status.in' => 'Selected status is invalid.',
        ]);

        $discounts = Discount::findOrFail($id);

        $discounts->product_id = $request->product_id;
        $discounts->vendor_id = Auth()->id();
        $discounts->discount_value = $request->discount_value;
        $discounts->start_date = $request->start_date;
        $discounts->end_date = $request->end_date;
        $discounts->status = $request->status;

        if ($discounts->save()) {
            return redirect()->route('discount-read')->with('success', 'Discount Updated SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Discount Updated Failed')->withInput();
        }
    }

    public function deleteDiscount($id)
    {
        $discounts = Discount::findOrFail($id);

        if ($discounts->vendor_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action');
        }

        if ($discounts->delete()) {
            return redirect()->route('discount-read')->with('success', 'Discount Deleted SuccessFully');
        } else {
            return redirect()->back()->with('error', 'Discount Deleted Failed');
        }
    }

    
}
