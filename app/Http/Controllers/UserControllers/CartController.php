<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function index(){

        $user = Auth::user();
        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();

        return view("website.cart",compact("cart"));
    }


    public function AddItemToCart(Request $request){

        $user = Auth::user();

        //check if there cart active or not (if not active then create one)   
        $cart = $user->carts->last();
        
        if(!$cart || $cart->status == 0){
            $cart = $user->carts()->create(["status"=>"1"]);
        }

        
        $requestAll = $request->validate([

            "product_id"=>"required",
            "quantity"=>"required"
        ]);
        

        if($cart->total_price){
            $total_price =  $cart->total_price;   
        }else{
            $total_price = 0;
        }
        $product = Product::findOrFail($request->product_id);

   
       if(!$cart->hasProduct($product->id)){

        $cart->products()->attach($product,["quantity"=>$request->quantity]);
        
        $total_price += $product->sale_price * $request->quantity;
        
       
       }else{
       
        $productInCart=0;
        foreach($cart->products as $p){
           if($p->id == $request->product_id){
            $productInCart = $p; 
           }
        }
        // dd($cart->total_price);
        // dd($productInCart->pivot->quantity);
        // dd($productInCart->sale_price);
        // dd($cart->total_price - ($productInCart->pivot->quantity  * $productInCart->sale_price));
      
       
        $total_price = $total_price - ($productInCart->pivot->quantity  * $productInCart->sale_price);
       
        $cart->products()->detach($productInCart);
        
        $cart->products()->attach($product ,['quantity'=>$request->quantity]);
        $total_price += $product->sale_price * $request->quantity;
        
       }
      
       $cart->update([

        "total_price"=>$total_price
       ]);

        return redirect()->route("cart.items")->with("success","added_successfully");

    }

    public function RemoveItemFromCart($product_id){

        
        $user = Auth::user();
        $cart = $user->carts->last();
        
        if(!$cart || $cart->status == 0){
            $cart = $user->carts()->create(["status"=>"1"]);
        }

        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();

        $product = Product::findOrFail($product_id);
        
        $quantity = 0;

        foreach($cart->products as $p){
           if($p->id == $product_id){
            $quantity = $p->pivot->quantity;
        
           }

        }
       
        $cart->update([

            "total_price"=> $cart->total_price - ($quantity  * $product->sale_price)
        ]);
        $cart->products()->detach($product);
      
        return redirect()->route("cart.items")->with("success","deleted_successfully");

    }

    public function RemoveCart(){

        $user = Auth::user();
        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();
        $cart->delete();
        return redirect()->route("cart.items")->with("success","cleared_successfully");
    }

    public function UpdateCartItems(Request $request){
       
        $request->validate([  
            'product_ids'=>'required|array',
            'quantities'=>'required|array'
        ]);
       
      
        $user = Auth::user();
        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();  
       
        if($cart->total_price){
            $total_price =  $cart->total_price;   
        }else{
            $total_price = 0;
        }
        
        foreach ($request->product_ids as $index=>$product){
         $product = Product::FindOrFail($product);

                foreach($cart->products as $p){
                    if($p->id == $product->id){
                    $quantity = $p->pivot->quantity;
                
                    }
        
                }

         $total_price = $total_price - ($quantity * $product->sale_price);

         $cart->products()->detach($product);

         $cart->products()->attach($product ,['quantity'=>$request->quantities[$index]]);
         $total_price += $product->sale_price * $request->quantities[$index];
        
        }
        $cart->update(['total_price'=>$total_price]);
        
        return redirect()->route("cart.items")->with("success","updated_successfully");

        }
        
             
   
}
