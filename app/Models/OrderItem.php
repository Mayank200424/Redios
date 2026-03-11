<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'customer_id', 'vendor_id', 'product_id', 'quantity', 'price', 'total_amount', 'payment_mode', 'payment_status', 'order_status'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function orderAssigned()
    {
        return $this->hasOne(OrderAssigned::class, 'order_item_id');
    }

}
