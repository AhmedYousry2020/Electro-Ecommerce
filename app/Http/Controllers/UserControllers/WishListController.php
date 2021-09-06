<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index(){

        $user = Auth::user();
        $wishlist = Wishlist::where("user_id",$user->id)->where("status",1)->first();

        return view("website.wishlist",compact("wishlist"));
    }


    public function AddItemToWishList(Request $request){

        $user = Auth::user();
       
        //check if there wishlist active or not (if not active then create one)   
        $wishlist = $user->wishlists->last();
      

        if(!$wishlist || $wishlist->status == 0){
            $wishlist = $user->wishlists()->create(["status"=>"1"]);
        }

        
        $requestAll = $request->validate([

            "product_id"=>"required",     
        ]);
        
       
        $product = Product::findOrFail($request->product_id);
     
        
        $wishlist->products()->attach($product);
        
        return redirect()->route("wishlist.items")->with("success","added_successfully");

    }
}
