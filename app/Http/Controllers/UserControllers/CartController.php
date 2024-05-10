<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Gloudemans\Shoppingcart\Facades\Cart as CartSession;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function index(){
        if(Auth::guest()){
            $cart = CartSession::content();
            //dd($cart);
        }else{
            $user = Auth::user();
            $cart = Cart::where("user_id",$user->id)->where("status",1)->first();
        }

        return view("website.cart",compact("cart"));
    }


    public function AddItemToCart(Request $request){

        $requestAll = $request->validate([
            "product_id"=>"required",
            "quantity"=>"required"
        ]);
        $product = Product::findOrFail($request->product_id);

        if(Auth::guest()){
            CartSession::add(
                ['id' => $product->id,
                 'name'=>$product->name,
                 'price' => $product->sale_price,
                 'image'=>$product->images[0]->image,
                 'weight'=>22,
                 'qty' => $requestAll['quantity']

                 ],
            );
        }else{
            $user = Auth::user();

            //check if there cart active or not (if not active then create one)
            $cart = $user->carts->last();
            if(!$cart || $cart->status == 0){
                    $cart = $user->carts()->create(["status"=>"1","cart_code"=>rand(1,100)]);
            }

            if($cart->total_price){
                $total_price =  $cart->total_price;
            }else{
                $total_price = 0;
            }

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
            $total_price = $total_price - ($productInCart->pivot->quantity  * $productInCart->sale_price);

            $cart->products()->detach($productInCart);
                $cart->products()->attach($product ,['quantity'=>$request->quantity]);
                $total_price += $product->sale_price * $request->quantity;
            }
            $cart->update([
                "total_price"=>$total_price
            ]);
        }

        return redirect()->route("cart.items")->with("success","added_successfully");

    }

    public function RemoveItemFromCart($product_id){

        $product = Product::findOrFail($product_id);
        if(Auth::guest()){

                       foreach(CartSession::content() as $p){
                           if($p->id == $product->id){
                           CartSession::remove($p->rowId);
                           }

           }

        }else{
            $user = Auth::user();
            $cart = $user->carts->last();

            if(!$cart || $cart->status == 0){
                $cart = $user->carts()->create(["status"=>"1"]);
            }

            $cart = Cart::where("user_id",$user->id)->where("status",1)->first();


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

        }

        return redirect()->route("cart.items")->with("success","deleted_successfully");

    }

    public function RemoveCart(){
        if(Auth::guest()){
            CartSession::destroy();
        }else{

            $user = Auth::user();
            $cart = Cart::where("user_id",$user->id)->where("status",1)->first();
            $cart->delete();

        }
        return redirect()->route("cart.items")->with("success","cleared_successfully");
    }

    public function UpdateCartItems(Request $request){

        $request->validate([
            'product_ids'=>'required|array',
            'quantities'=>'required|array'
        ]);

        if(Auth::guest()){
            foreach ($request->product_ids as $index=>$product){
                $product = Product::FindOrFail($product);
                       foreach(CartSession::content() as $p){
                           if($p->id == $product->id){
                           $quantity = $request->quantities[$index];
                           CartSession::update($p->rowId, ['qty' => $quantity]);
                           }
                       }
            }

        }else{
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
    }
        return redirect()->route("cart.items")->with("success","updated_successfully");

        }



}
