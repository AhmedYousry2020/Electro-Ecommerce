<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\AuthController;
use App\Http\Controllers\AdminControllers\HomeController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\ProductController;
use App\Http\Controllers\AdminControllers\OrderController;
use App\Http\Controllers\AdminControllers\UserController;

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

Route::get('/dashboard/index',[HomeController::class,'index'])->name("dashbard.index")->middleware("authAdmin");

Route::prefix('dashboard')->name('dashboard.')->group(function(){

    Route::get("/login",[AuthController::class, 'LoginForm'])->name("loginForm");
    Route::get("/register",[AuthController::class, 'RegisterForm'])->name("registerForm");

    Route::post("/login",[AuthController::class, 'Login'])->name("login");
    Route::post("/register",[AuthController::class, 'Register'])->name("register");

    Route::get("/logout",[AuthController::class, 'Logout'])->name("logout");
});


Route::prefix('dashboard')->middleware("authAdmin")->name("dashboard.")->group(function(){

    Route::resource('/categories',CategoryController::class);
    Route::resource('/users',UserController::class);
    Route::post('dashboard/products/approve/{product}',[ProductController::class,'approve'])->name("products.approve");
    Route::resource('/products',ProductController::class);
    Route::get('/orders',[OrderController::class,'index'])->name("orders.index");
    Route::get('/order/{id}/details',[OrderController::class,'OrderDetails'])->name("order.details");
    Route::delete('/order/{id}',[OrderController::class,'destroy'])->name("order.destroy");


});
