<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\HomeController;
use App\Http\Controllers\UserControllers\ProductController;
use App\Http\Controllers\UserControllers\CartController;
use App\Http\Controllers\UserControllers\AuthController;
use App\Http\Controllers\UserControllers\OrderController;
use App\Http\Controllers\UserControllers\WishListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/about",function(){
    return view("website.about");
});
Route::get("/contact",function(){
    return view("website.contact");
});
Route::prefix('user/account')->group(function(){

Route::get("/login",[AuthController::class, 'LoginForm'])->name("loginForm");
Route::get("/register",[AuthController::class, 'RegisterForm'])->name("registerForm");
    
Route::post("/login",[AuthController::class, 'Login'])->name("login");
Route::post("/register",[AuthController::class, 'Register'])->name("register");
    
Route::get("/logout",[AuthController::class, 'Logout'])->name("logout");

});

Route::group([],function(){


    Route::get('/home',[HomeController::class,'index'])->name("home");
    Route::get('/',[HomeController::class,'index'])->name("home");
    Route::get('/product/{id}/details',[ProductController::class,'GetSingleProductDetails'])->name("product.details");
    Route::get('/products',[ProductController::class,'GetProducts'])->name("products");
  

    Route::post('/addToCart',[CartController::class,'AddItemToCart'])->name('AddToCart')->middleware("auth:web");
    Route::get('/viewCartItem',[CartController::class,'index'])->name("cart.items")->middleware("auth:web");
    Route::post('/updateCartItems',[CartController::class,'UpdateCartItems'])->name("UpdateCartItems")->middleware("auth:web");
   
    Route::post('/addToWishList',[WishListController::class,'AddItemToWishList'])->name('AddItemToWishList')->middleware("auth:web");
    Route::get('/viewWishListItem',[WishListController::class,'index'])->name("wishlist.items")->middleware("auth:web");

    Route::delete('/product/{id}/reomveItemFromCart',[CartController::class,'RemoveItemFromCart'])->name('RemoveItemFromCart')->middleware("auth:web");
  
    Route::delete('/clearCart',[CartController::class,'RemoveCart'])->name("cart.remove")->middleware("auth:web");


    Route::get("/my-account",[HomeController::class,'AccountDashboard'])->name("account.dashboard")->middleware("auth");
    Route::get("/order/checkout",[OrderController::class,'checkout'])->name("order.checkout")->middleware("auth");
    
    Route::post("/order/store",[OrderController::class,'AddOrder'])->name("order.store")->middleware("auth");
    
});
