<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('test/{id}', [TestController::class, 'testMethod']);
Route::get('products', [ProductsController::class, 'index']);
Route::post('products', [ProductsController::class, 'store']);

Route::resource('users', UsersController::class);
