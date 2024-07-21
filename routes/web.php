<?php

use App\Http\Controllers\Admin\AdminFrontController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\MainFrontController;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/dashboard',[AdminFrontController::class,'index']);
Route::get('/category',[CategoryController::class,'index']);
Route::get('/create',[CategoryController::class,'create']);
Route::post('/post',[CategoryController::class,'store']);
Route::get('/edit/{id}',[CategoryController::class,'edit']);
Route::delete('/delete/{id}',[CategoryController::class,'destroy']);
Route::put('/update/{id}',[CategoryController::class,'update']);
// Routes for product controller is starting here
Route::get('/product',[ProductController::class,'index']);
Route::post('/post',[ProductController::class,'store']);
Route::get('/createProduct',[ProductController::class,'create']);
Route::get('/editProduct/{id}',[ProductController::class,'editProduct']);
Route::put('/update/{id}',[ProductController::class,'updateProduct']);
Route::delete('/delete/{id}',[ProductController::class,'destroyProduct']);

//Routes for frontEnd are written here

Route::get('/',[MainFrontController::class,'index']);
Route::get('/about',[MainFrontController::class,'about']);
Route::get('/login',[MainFrontController::class,'login']);
Route::get('/register',[MainFrontController::class,'register']);
Route::get('/checkout',[CheckoutController::class,'index']);
Route::get('/contact',[MainFrontController::class,'contact']);
Route::get('/shop_details/{id}',[MainFrontController::class,'shop_details']);
Route::get('/shop',[MainFrontController::class,'shop']);
Route::get('/shopping_cart',[CartController::class,'viewCart']);
Route::get('/blog_details',[MainFrontController::class,'blog_details']);
// Route::post('/registeredUser',[MainFrontController::class,'registeredUser']);
// Route::post('/loginUser',[MainFrontController::class,'loginUser']);
// Route::get('/logout',[MainFrontController::class,'logout']);
Route::post('/registeredUser',[MainFrontController::class,'registeredUser']);
Route::post('/loginUser',[MainFrontController::class,'loginUser']);
Route::get('logout',[MainFrontController::class,'logout']);
Route::post('/add-to-cart',[CartController::class,'addProduct']);
Route::post('/update-cart',[CartController::class,'updateCart']);
Route::post('/delete-product',[CartController::class,'deleteProduct']);
Route::post('/place-order',[CheckoutController::class,'placeorder']);
Route::get('my-orders',[UserController::class,'index']);    