<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ProductImages;
use App\Models\Wishlist;
class Product extends Model
{
    use HasFactory;

    protected $fillable = ["category_id","name","description","details","purchase_price","sale_price","stock","color","SKU","approved"];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function carts(){

        return $this->belongsToMany(Cart::class,'product_cart');
     }
     public function wishlists(){

        return $this->belongsToMany(Wishlist::class,'product_wishlist');
     }

     public function orders(){

        return $this->belongsToMany(Order::class,'product_order');
     }

     public function images(){
         return $this->hasMany(ProductImages::class);
     }


}
