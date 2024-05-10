<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{


    public function checkout(){

        $user = Auth::user();
        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();

        $products = $cart->products()->get();


        return view("website.checkout",compact("cart","products"));
    }
    public function payment(){

        $user = Auth::user();
        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();

        $products = $cart->products()->get();


        return view("website.payment",compact("cart","products",'user'));
    }
    public function AddOrder(){

        $user = Auth::user();

        // $order = $user->orders()->create(["status"=>"0"]);

        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();

        $cart->delete();

        return redirect()->route("cart.items");

    }


}
