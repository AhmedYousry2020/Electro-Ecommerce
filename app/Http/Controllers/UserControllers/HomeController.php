<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
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
        $orders = Order::where("user_id",$user->id)->get();

        return view("website.my-account",compact("orders"));
    }


}
