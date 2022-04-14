<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PackageController;

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

Route::resource('/category', CategoryController::class);
Route::get('/category/{id}/delete',[CategoryController::class,'destroy']);

Route::resource('/product', ProductController::class);
Route::get('/product/{id}/delete',[ProductController::class,'destroy']);

Route::resource('/package', PackageController::class);
Route::get('/package/{id}/delete',[PackageController::class,'destroy']);
Route::get('/package/{id}/deleteproduct',[PackageController::class,'destroyProducts']);






