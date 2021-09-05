<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AuthController extends Controller
{
    //login form 
    public function LoginForm(){

        return view("dashboard.login");
    }

    //register form
    public function RegisterForm(){

        return view("dashboard.register");
    }

    //register logic
    public function Register(Request $request){

        $validator = Validator::make($request->all(),[

            "name"=>"required|string",
            "email"=>['required','email',Rule::unique("admins")],
            "password"=>"required|confirmed|string|min:6",
    
        ]);
        if($validator->fails()){
            return redirect()->route('dashboard.registerForm')->withErrors($validator);
    
        }
       $requestAll = $validator->validated();
       $requestAll['password'] = Hash::make($request->password);
       
       $admin = Admin::create($requestAll);

       if($admin){
        return redirect('/dashboard/index');
       }
  

    }
    //login logic
    public function Login(Request $request){

        $validator = Validator::make($request->all(),[
            
            "email"=>"required|email",
            "password"=>"required",
    
        ]);

       if($validator->fails()){
        return redirect()->route('dashboard.loginForm')->withErrors($validator);

       }

       $requestAll = $validator->validated();
      
       $credentials = [
        "email"=>$requestAll['email'],
        "password"=>$requestAll['password']
       ];

       if(Auth::guard('admin')->attempt($credentials)){
        return redirect('/dashboard/index');

       }else{

        return redirect()->route('dashboard.loginForm')->with('error',"Unauthorized");
       }

    }

    //logout logic
    public function logout(){
    
        Auth::guard("admin")->logout();
        return redirect()->route('dashboard.loginForm');
    }

}
