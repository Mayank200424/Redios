<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function products()
    {
        $this->hasMany(Product::class, 'vendor_id');
    }

    public function wishlist()
    {
        $this->belongsToMany(Product::class, 'wishlists');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'carts');
    }

    public function login()
    {
        return $this->hashMany(LoginLog::class, 'user_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }

    public function orders_items()
    {
        return $this->hasMany(OrderItem::class, 'customer_id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class, 'vendor_id');
    }

}
