<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControllers\HomeController;
use App\Http\Controllers\UserControllers\ProductController;
use App\Http\Controllers\UserControllers\CartController;
use App\Http\Controllers\UserControllers\AuthController;
use App\Http\Controllers\UserControllers\OrderController;
use App\Http\Controllers\UserControllers\WishListController;
use App\Http\Controllers\UserControllers\AccountController;

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
  
    Route::get('/autocomplete',[HomeController::class,'autocomplete'])->name('autocomplete');


    Route::post('/addToCart',[CartController::class,'AddItemToCart'])->name('AddToCart');
    Route::get('/viewCartItem',[CartController::class,'index'])->name("cart.items");
    Route::post('/updateCartItems',[CartController::class,'UpdateCartItems'])->name("UpdateCartItems");
    Route::delete('/product/{id}/reomveItemFromCart',[CartController::class,'RemoveItemFromCart'])->name('RemoveItemFromCart');
    Route::delete('/clearCart',[CartController::class,'RemoveCart'])->name("cart.remove");

    Route::post('/addToWishList',[WishListController::class,'AddItemToWishList'])->name('AddItemToWishList')->middleware("auth:web");
    Route::get('/viewWishListItem',[WishListController::class,'index'])->name("wishlist.items")->middleware("auth:web");

  

    Route::get("/my-account",[HomeController::class,'AccountDashboard'])->name("account.dashboard")->middleware("auth");
    Route::post("/my-account",[AccountController::class,'store'])->name("account.dashboard.store")->middleware("auth");
    Route::post("/my-account/change-password",[AccountController::class,'change_password'])->name("account.dashboard.change_password")->middleware("auth");

    Route::get("/order/checkout",[OrderController::class,'checkout'])->name("order.checkout")->middleware("auth");
    
    Route::post("/order/store",[OrderController::class,'AddOrder'])->name("order.store")->middleware("auth");
    
});
