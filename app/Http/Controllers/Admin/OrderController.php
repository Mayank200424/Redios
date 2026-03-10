<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        $total_orders = OrderItem::count();
        $total_cancelOrders = OrderItem::where('order_status','cancelled')->count();
        $total_delivered = OrderItem::where('order_status','delivered')->count();
        $orders = OrderItem::with('users', 'order', 'product')->latest()->paginate(4);
        return view('admin.orders-list', compact('orders', 'total_orders','total_cancelOrders','total_delivered'));
    }
    public function orderDetails($id)
    {
        $order = OrderItem::with('users', 'order', 'product', 'vendor')->findOrFail($id);

        return view('admin.order-detail', compact('order'));
    }

    public function orderCancel(){
        $orders = OrderItem::with('users', 'order', 'product', 'vendor')->where('order_status','cancelled')->get();

        return view('admin.orders-cancel-list',compact('orders'));
    }

    public function orderDelivered(){
        $orders = OrderItem::with('users', 'order', 'product', 'vendor')->where('order_status','delivered')->get();

        return view('admin.orders-cancel-list',compact('orders'));
    }
}
