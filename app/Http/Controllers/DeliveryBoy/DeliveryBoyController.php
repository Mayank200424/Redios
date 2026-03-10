<?php

namespace App\Http\Controllers\DeliveryBoy;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\OrderAssigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryBoyController extends Controller
{
    public function index()
    {
        $assigned_order_count = OrderAssigned::where('delivery_boy_id', Auth()->id())->count();
        $delivered_order_count = OrderAssigned::where('delivery_boy_id', Auth()->id())
            ->whereHas('orderItem', function ($q) {
                $q->where('order_status', 'delivered');
            })->count();
        return view('deliveryboy.index', compact('assigned_order_count','delivered_order_count'));
    }

    public function assignedOrder(){
        $assigned_orders = OrderAssigned::with('orderItem.users','orderItem.product','orderItem.order','orderItem.vendor')->where('delivery_boy_id', Auth()->id())->get();
        $orders = OrderAssigned::with('orderItem.users','orderItem.product','orderItem.order','orderItem.vendor')->paginate(5);

        return view('deliveryboy.orders-assigned-list', compact('assigned_orders','orders'));
    }

    public function deliveredOrder(){
        $delivered_orders = OrderAssigned::with(['orderItem.users','orderItem.product','orderItem.order','orderItem.vendor'])
            ->where('delivery_boy_id', auth()->id())
            ->whereHas('orderItem', fn($q) => $q->where('order_status','delivered'))
            ->get();
        return view('deliveryboy.orders-delivered-list', compact('delivered_orders'));
    }

    public function orderDetails($id)
    {
        $order = OrderAssigned::with('orderItem.users','orderItem.product','orderItem.order','orderItem.vendor')->where('delivery_boy_id', Auth()->id())->findOrFail($id);

        return view('deliveryboy.order-detail', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|in:out_of_delivery,delivered'
        ]);

        $order = OrderAssigned::with('orderItem')->where('delivery_boy_id', Auth::id())->findOrFail($id);
        $order->orderItem->order_status = $request->order_status;
        $order->orderItem->save();

        return redirect()->route('deliveryboy.assignedorder')->with('success', 'Order status updated successfully!');
    }
}
