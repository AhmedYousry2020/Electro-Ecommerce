<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart as CartSession;
use Illuminate\Support\Facades\Auth;
class CheckSessionCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        if(CartSession::content()){

            $user = Auth::user();

            //check if there cart active or not (if not active then create one)   
            $cart = $user->carts->last(); 
            if(!$cart || $cart->status == 0){
                    $cart = $user->carts()->create(["status"=>"1"]);
            }
            
            if($cart->total_price){
                $total_price =  $cart->total_price;   
            }else{
                $total_price = 0;
            }

            foreach(CartSession::content() as $item){
                
                if(!$cart->hasProduct($item->id)){
                    $cart->products()->attach($item->id,["quantity"=>$item->qty]);     
                    $total_price += $item->price * $item->qty;
                }else{
                    $productInCart=0;
                    foreach($cart->products as $p){
                    if($p->id == $item->id){
                        $productInCart = $p; 
                    }
                    }
                $total_price = $total_price - ($productInCart->pivot->quantity  * $productInCart->sale_price);
            
                $cart->products()->detach($productInCart);
                $cart->products()->attach($item->id ,['quantity'=>$item->qty]);
                $total_price += $item->price * $item->qty;   
                }
                $cart->update([
                    "total_price"=>$total_price
                ]);

            }
        }

        return $next($request);
    }
}
