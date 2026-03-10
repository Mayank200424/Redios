<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['vendor_id', 'category_id', 'name', 'image', 'stock', 'price', 'description'];

    public function vendors()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wishlistedBy()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'carts');
    }

    // public function discounts()
    // {
    //     return $this->belongsToMany(Discount::class, 'discount_product');
    // }

    public function discount()
    {
        return $this->hasOne(Discount::class, 'product_id');
    }

    public function getFinalPriceAttribute()
    {
        $discount = $this->discount;

        if ($discount && $discount->status === 'active') {
            return $this->price - ($this->price * $discount->discount_value / 100);
        }

        return $this->price;
    }

}
