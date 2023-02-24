<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['web']], function () {
    // your routes here
});
Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@show');
Route::post('/products', 'ProductController@store');

Route::get('/carts', 'CartController@index');
Route::get('/carts/{id}', 'CartController@checkout');
Route::post('/carts', 'CartController@store');
Route::get('/carts/checkout', 'CartController@checkout');

Route::get('/cart-items', 'CartItemController@index');
Route::get('/cart-items/{id}', 'CartItemController@show');
Route::post('/cart-items', 'CartItemController@store');

Route::get('/orders', 'OrderController@index');
Route::get('/orders/{id}', 'OrderController@show');
Route::post('/orders', 'OrderController@store');
