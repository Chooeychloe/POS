<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/orders', 'OrderController');//orders.index
Route::resource('/products', 'ProductController');//orders.index
Route::resource('/suppliers', 'SuppliersController');//orders.index
Route::resource('/users', 'UserController');//orders.index
Route::resource('/companies', 'CompanyController');//orders.index
Route::resource('/transactions', 'TransactionController');//orders.index