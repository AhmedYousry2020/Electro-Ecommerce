<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view("dashboard.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.categories.create");
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

            "name"=>"required|string|max:50",
            "description"=>"string"

        ]);
        if($validator->fails()){

            return redirect()->route("dashboard.categories.create")->withErrors($validator);
        }
        $requestAll = $validator->validated();
        $Category = Category::Create($requestAll);

        if($Category){
            return redirect()->route("dashboard.categories.index")->with("success","added_auccessfully");
        }
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
        $category = Category::findOrFail($id);
        
        return view("dashboard.categories.edit",compact("category"));
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

            "name"=>"required|string|max:50",
            "description"=>"string"

        ]);

        if($validator->fails()){

            return redirect()->route("dashboard.categories.edit")->withErrors($validator);
        }
        $requestAll = $validator->validated();

        $category = Category::findOrFail($id);
        $category->update($requestAll);
        
        return redirect()->route("dashboard.categories.index")->with("success","updated_successfully");
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route("dashboard.categories.index")->with("success","deleted_successfully");
    }
}
