<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\UserAddress;
use App\Models\UserPhone;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders(){

        return $this->hasMany(Order::class);
    }
    public function carts(){

        return $this->hasMany(Cart::class);
    }
    public function wishlists(){

        return $this->hasMany(Wishlist::class);
    }
    public function addresses(){

        return $this->hasMany(UserAddress::class);
    }

    public function phones(){

        return $this->hasMany(UserPhone::class);
    }


}
