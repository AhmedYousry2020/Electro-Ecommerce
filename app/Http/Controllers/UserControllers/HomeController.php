<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAddress;

class HomeController extends Controller
{
    public function index(Request $request){

        $products = Product::when($request->input('searchBy'),function($q) use ($request){

            return $q->where('name','like','%'.$request->input('searchBy').'%');
        })->with("category")->orderBy('name', 'asc')->get();


        return view("website/home",compact("products"));
    }


    public function AccountDashboard(){

        $user = Auth::user();
        $orders = Cart::where("user_id",$user->id)->get();
        // $addresses = $user->addresses()->first();
        // $phones = $user->phones()->first();
        $categories = Category::all();


        return view("website.my-account",compact("orders",'user',"categories"));
    }

    public function autocomplete(Request $request){
        $data =  Product::select("id","name","sale_price")
        ->where('name','like','%'.$request->input('searchBy').'%')->get();
         foreach($data as $item){
          $image = $item->images()->first();
          $item->image =$image->image;
          $item->link = route('product.details',$item->id);
          $item->sale_price = number_format($item->sale_price,2);
        }

        return response()->json($data);

    }
}
