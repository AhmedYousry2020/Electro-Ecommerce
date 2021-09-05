<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
class Cart extends Model
{
    use HasFactory;
    protected $fillable =["user_id","total_price","status"]; 


    public function user(){

        return $this->belongsTo(User::class);
    }
    public function products(){

        return $this->belongsToMany(Product::class,'product_cart')->withPivot("quantity");
    }
}
