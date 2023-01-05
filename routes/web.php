<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;

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

Route::get('/',[FrontController::class,'index']);
Route::get('/cart',[FrontController::class,'cart'])->name('front.cart');
Route::get('/contact',[FrontController::class,'contact'])->name('front.contact');
Route::get('/about',[FrontController::class,'about'])->name('front.about');

Route::prefix('admin')->group(function() {
Route::resource('/',mainController::class);
Route::resource('/products',ProductController::class);
Route::resource('/carts',CartController::class);
Route::resource('/categories',CategoryController::class);
Route::resource('/contacts',ContactController::class);
});
Auth::routes();

Route::get('/home', [FrontController::class, 'index']);
