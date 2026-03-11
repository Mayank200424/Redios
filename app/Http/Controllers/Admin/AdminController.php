<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\LoginLog;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $customers     = User::where('role', '=', 'customer')->count();
        $vendors       = User::where('role', '=', 'vendor')->count();
        $categories    = Category::whereNull('parent_id')->count();
        $subcategories = Category::whereNotNull('parent_id')->count();
        $total_revenue = OrderItem::where('order_status', '!=', 'cancelled')->sum('total_amount');
        $total_deliveryboy = User::where('role','=','delivery_boy')->count();
        $login_logs = LoginLog::with('user')->whereRelation('user', 'role', '!=', 'admin')->latest()->paginate(15);

        return view('admin.index', compact('customers', 'vendors', 'categories', 'subcategories', 'login_logs','total_deliveryboy','total_revenue'));
    }
    public function customers()
    {
        $customers = User::where('role', '=', 'customer')->latest()->paginate(5);
        return view('admin.customer-list', compact('customers'));
    }

    public function vendors(){
        $vendors = User::where('role', '=', 'vendor')->latest()->paginate(5);
        return view('admin.vendor-list', compact('vendors'));
    }

    public function deliveryboys(){
        $deliveryboys = User::where('role', '=', 'delivery_boy')->latest()->paginate(5);
        return view('admin.deliveryboy-list', compact('deliveryboys'));
    }

    public function search(Request $request)
    {
        $users = User::where('role', 'customer')->where('name', 'like', "%$request->search%")->get();

        return response()->json($users);
    }

    public function vendorSearch(Request $request)
    {
        $vendors = User::where('role', 'vendor')->where('name', 'like', "%$request->search%")->get();
        
        return response()->json(['vendors' => $vendors]);
    }

    public function deliveryboySearch(Request $request)
    {
        $deliveryboys = User::where('role', 'delivery_boy')->where('name', 'like', "%$request->search%")->get();
        
        return response()->json($deliveryboys);
    }

}
