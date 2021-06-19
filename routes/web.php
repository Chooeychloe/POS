<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Resources\ProductResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\SuppliersResource;
use App\Http\Resources\OrderResource;
use App\Models\Product;
use App\Models\User;
use App\Models\Suppliers;
use App\Models\Order;
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
Route::resource('/products', 'ProductController');//products.index
Route::get('/products-count', [ProductController::class, 'count']);
Route::resource('/suppliers', 'SuppliersController');//suppliers.index
Route::resource('/users', 'UserController');//users.index
Route::resource('/companies', 'CompanyController');//companies.index
Route::resource('/transactions', 'TransactionController');//transactions.index
Route::get('barcode', 'ProductController@GetProductBarcodes')->name('products.barcode');//products.barcode

// API's
Route::get('/api/suppliers', function () {
    return SuppliersResource::collection(Suppliers::all());
});
Route::get('/api/users', function () {
    return UserResource::collection(User::all());
});
Route::get('/api/product', function () {
    return ProductResource::collection(Product::all());
});
Route::get('/api/orders', function () {
    return OrderResource::collection(Order::all());
});

// Dashboard
Route::resource('/dashboard', 'DashboardController');