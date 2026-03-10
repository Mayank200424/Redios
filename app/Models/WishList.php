<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable = ['customer_id','product_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
