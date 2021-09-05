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
     
        $total_price += $product->sale_price * $request->quantity;
    
        $cart->products()->attach($product,["quantity"=>$request->quantity]);
        

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
        foreach($cart->products as $product){
           if($product->id == $product_id){
            $quantity = $product->pivot->quantity;
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
            'prdouct_ids'=>'required|array',
            'quantities'=>'required|array'
        ]);
        dd($request->all());
      
        exit();
        $user = Auth::user();
        $cart = Cart::where("user_id",$user->id)->where("status",1)->first();  
        $total_price = 0;

        foreach ($request->prdouct_ids as $index=>$product){
            $product = Product::FindOrFail($product);
        $total_price += $product->sale_price * $request->quantities[$index];
    
         $cart->products()->attach($product ,['quantity'=>$request->quantities[$index]]);
         
        }
        $cart->update(['total_price'=>$total_price]);
        
        return redirect()->route("cart.items")->with("success","updated_successfully");

        }
        
             
   
}
