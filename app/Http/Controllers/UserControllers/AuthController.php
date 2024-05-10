<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Gloudemans\Shoppingcart\Facades\Cart as CartSession;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserPhone;

class AuthController extends Controller
{
      //login form
      public function LoginForm(){

        return view("website.login");
    }

    //register form
    public function RegisterForm(){

        return view("website.register");
    }

    //register logic
    public function Register(Request $request){

        $validator = Validator::make($request->all(),[

            "username"=>"required|string",
            "first_name"=>"required|string",
            "last_name"=>"required|string",
            "type"=>"required|string",
            "address"=>"required|string",
            "phone"=>"required|digits:11",
            "email"=>['required','email',Rule::unique("users")],
            "password"=>"required|confirmed|string|min:6",

        ]);
        if($validator->fails()){
            return redirect()->route('registerForm')->withErrors($validator);

        }
       $requestAll = $validator->validated();
       $requestAll['password'] = Hash::make($request->password);
        if($requestAll['type'] == 'user')
        {
            $user = User::create(
                [
                    'username'=>$requestAll['username'],
                    'first_name'=>$requestAll['first_name'],
                    'last_name'=>$requestAll['last_name'],
                    'type'=>$requestAll['type'],
                    'email'=>$requestAll['email'],
                    'password'=>$requestAll['password'],
                    'phone_number'=>$requestAll['phone'],
                    'address'=>$requestAll['address'],

                    ]
               );

        }else{
            $user = User::create(
                [
                    'username'=>$requestAll['username'],
                    'first_name'=>$requestAll['first_name'],
                    'last_name'=>$requestAll['last_name'],
                    'type'=>$requestAll['type'],
                    'email'=>$requestAll['email'],
                    'password'=>$requestAll['password'],
                    'phone_number'=>$requestAll['phone'],
                    'address'=>$requestAll['address'],

                    ]
               );
            $user = Artist::create(
                [
                    'username'=>$requestAll['username'],
                    'first_name'=>$requestAll['first_name'],
                    'last_name'=>$requestAll['last_name'],
                    'type'=>$requestAll['type'],
                    'email'=>$requestAll['email'],
                    'password'=>$requestAll['password'],
                    'phone_number'=>$requestAll['phone'],
                    'address'=>$requestAll['address'],

                    ]
               );

        }


       if($user){
        return redirect()->route('loginForm')->with("success","created sucessfully, please log in to continue");
       }


    }
    //login logic
    public function Login(Request $request){

        $validator = Validator::make($request->all(),[

            "email"=>"required|email",
            "password"=>"required",

        ]);

       if($validator->fails()){
        return redirect()->route('loginForm')->withErrors($validator);

       }

       $requestAll = $validator->validated();

       $credentials = [
        "email"=>$requestAll['email'],
        "password"=>$requestAll['password']
       ];

       if(Auth::attempt($credentials)){

        checkSessionCart();
        return redirect('/home');

       }else{

        return redirect()->route('loginForm')->with('error',"Unauthorized");
       }

    }

    //logout logic
    public function logout(){

        Auth::logout();
        return redirect()->route('loginForm');
    }

}
