<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



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

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('/movie', MovieController::class);
Route::get('/movie/{id}/delete',[MovieController::class,'destroy']);

Route::resource('/category', CategoryController::class);
Route::get('/category/{id}/delete',[CategoryController::class,'destroy']);

Route::resource('/product', ProductController::class);
Route::get('/product/{id}/delete',[ProductController::class,'destroy']);




