<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id','address_id','order_number','total_amount'];

    public function items()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class,'address_id');
    }
}
