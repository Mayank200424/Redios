<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['vendor_id', 'product_id', 'discount_value', 'start_date', 'end_date', 'start_time', 'end_time', 'status'];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
