<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAssigned extends Model
{
    protected $table = "order_assigned";

    protected $fillable = [
        'order_item_id',
        'delivery_boy_id'
    ];

    public function deliveryBoy()
    {
        return $this->belongsTo(User::class,'delivery_boy_id');
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class,'order_item_id');
    }
}
