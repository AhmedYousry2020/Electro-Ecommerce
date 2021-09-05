<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function index(){

        $orders = Order::all();
        return view("dashboard.orders.index",compact("orders"));

    }

    public function OrderDetails($id){

        $order = Order::findOrFail($id);
        $products = $order->products()->get();

       return view("dashboard.orders.details",compact("order","products"));


    }

    public function destroy($id){

        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route("dashboard.orders.index")->with("success","deleted_successfully");

    }
}
