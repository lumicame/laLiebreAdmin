<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'auth:api'], function(){
   
   });
Route::get('/districts', 'Api\DistrictApiController@index');

Route::post('/users', 'Api\UserApiController@save');
Route::get('/users', 'Api\UserApiController@show');
Route::get('/users/verify/{id}', 'Api\UserApiController@verify');


Route::get('/categories', 'Api\CategoryApiController@index');

Route::get('/products/{id}', 'Api\ProductApiController@index');

Route::get('/aisles', 'Api\AisleApiController@index');

Route::get('/types', 'Api\TypeApiController@index');
Route::get('/types/{id}/stores', 'Api\StoreApiController@show');

Route::get('/stores/{id}', 'Api\StoreApiController@index');
Route::get('/stores/{id}/products', 'Api\StoreApiController@products');

Route::get('/product/{id}', 'Api\ProductApiController@show');



///////////////////// RUTAS PARA CARRITO//////////////
Route::get('/carts/{id}', 'Api\CartApiController@index');
Route::post('/carts/{id}', 'Api\CartApiController@save');
Route::post('/carts/delete/{id}', 'Api\CartApiController@delete');

////////////////////RUTA PARA ORDENES/////////////////

Route::get('/orders/{id}', 'Api\OrderApiController@index');
Route::post('/orders/{id}', 'Api\OrderApiController@save');
Route::get('/orders/show/{id}', 'Api\OrderApiController@show');



