<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductImages;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view("dashboard.products.index",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("dashboard.products.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[

            "category_id"=>"required",
            "name"=>"required|string|max:50",
        //    "details"=>"required|string",
            "description"=>"string",
            "purchase_price"=>"required",
            "sale_price"=>"required",
            "stock"=>"required|integer",
            "color"=>"required|string",
            "SKU"=>"required"


        ]);
        if($validator->fails()){

            return redirect()->route("dashboard.products.create")->withErrors($validator);
        }
        $requestAll = $validator->validated();
        $product = Product::Create($requestAll);
        if($product){

            if($request->hasfile("image")){
                for($i=0;$i<sizeof($request->image);$i++){

                    if(!is_null($request->image[$i])){
                        $imageName = $this->UploadPhoto($request->image[$i],"uploads/"."product_images/".$product->name);

                        ProductImages::Create([
                            "product_id"=>$product->id,
                            "image"=>$imageName
                        ]);

                    }
                }
                }
        }

            return redirect()->route("dashboard.products.index")->with("success","added_auccessfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view("dashboard.products.edit",compact("product","categories"));
    }

    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->approved = 1;
        $product->save();
        return redirect()->route("dashboard.products.index")->with("success","updated_successfully");

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[

             "category_id"=>"required",
            "name"=>"required|string|max:50",
            "details"=>"required|string",
            "description"=>"string",
            "purchase_price"=>"required",
            "sale_price"=>"required",
            "stock"=>"required|integer",
            "color"=>"required|string",
            "SKU"=>"required"

        ]);

        if($validator->fails()){

            return redirect()->route("dashboard.products.edit")->withErrors($validator);
        }
        $requestAll = $validator->validated();

        $product = Product::findOrFail($id);
        $product->update($requestAll);

        return redirect()->route("dashboard.products.index")->with("success","updated_successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Storage::disk("public")->delete("/uploads/product_images".$product->name);
        return redirect()->route("dashboard.products.index")->with("success","deleted_successfully");
    }

    function UploadPhoto($image,$folder){

        $imageName = $image->getClientOriginalName();
        $path = $image->storeAs($folder, $imageName, 'public');
        return $imageName;

    }

}
