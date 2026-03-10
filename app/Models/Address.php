<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['customer_id','phone','address','city','state','pincode'];

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
}
