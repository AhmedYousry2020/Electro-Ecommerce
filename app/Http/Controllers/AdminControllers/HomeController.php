<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(){
        

        $users = User::count();
        $orders = Order::count();
        $categories = Category::count();
        return view("/dashboard/index",compact("users","orders","categories"));
    }
}
