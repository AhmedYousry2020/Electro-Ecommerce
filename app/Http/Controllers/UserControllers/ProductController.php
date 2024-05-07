<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{

    public function GetProducts(Request $request){

        $products = Product::where(["category_id",$request->category_id,'approved',true])->paginate(4);

        return view("website.products",compact("products"));

    }


    public function GetSingleProductDetails($id){
        $product = Product::findOrFail($id);
        $products = Product::where("category_id",$product->category_id)->get();

        return view("website/single-product",compact("product","products"));

    }
}
