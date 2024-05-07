<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAddress;
use App\Models\UserPhone;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            "phone_number"=>"required|min:11",
            "address"=>"required|string",
            "location_country"=>"required|string",
            "zip_code"=>"required|integer|min:5",

        ]);
        if($validator->fails()){
            return redirect()->route('account.dashboard')->withErrors($validator);

        }
        $requestAll = $validator->validated();

        $address = UserAddress::create([
            'user_id'=>Auth::user()->id,
            'address'=>$requestAll['address'],
            'location_country'=>$requestAll['location_country'],
            'zip_code'=>$requestAll['zip_code'],

        ]);

        $phone = UserPhone::create([
            'user_id'=>Auth::user()->id,
            'phone_number'=>$requestAll['phone_number'],
        ]);

        return redirect()->route('account.dashboard')->with("success","created sucessfully");

    }

    public function change_password(Request $request){

        $RequestAll = $request->validate([

          "old_password"=>"required",
          "new_password"=> "required|confirmed"
        ]);

        $user = Auth::user();

        if($RequestAll){

          if(Hash::check($request->old_password,$user->password)){
             $user->update([
                "password"=>Hash::make($request->new_password)
             ]);
          }
        }
        return redirect()->route('account.dashboard')->with("success","changed sucessfully");
      }

      public function store_product(Request $request)
      {

          $validator = Validator::make($request->all(),[

              "category_id"=>"required",
              "name"=>"required|string|max:50",
          //    "details"=>"required|string",
              "description"=>"string",
              "purchase_price"=>"required",
              "sale_price"=>"required",
              "stock"=>"required|integer",



          ]);
          if($validator->fails()){

            return redirect()->route('account.dashboard')->withErrors($validator);
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

          return redirect()->route('account.dashboard')->with("success","created sucessfully");

      }
      function UploadPhoto($image,$folder){

        $imageName = $image->getClientOriginalName();
        $path = $image->storeAs($folder, $imageName, 'public');
        return $imageName;

    }
}
