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
    public function AddOrder(Request $request){

        $user = Auth::user();

        $order = $user->orders()->create(["status"=>"0"]);
        
        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();

        $products = $cart->products()->get();
        
      
       foreach ($products as $index=>$product){
        
        $order->products()->attach($product ,['quantity'=>$product->pivot->quantity]);
        
       }
      
       $order->update(['total_price'=>$cart->total_price]);
       $cart->delete();

        return redirect()->route("cart.items");

    }


}
