<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('register','RegisterController');
Route::resource('login','LoginController');
Route::post('login/normal','LoginController@normalLogin');
Route::post('login/facebook/{user}/{email}/{fb_id}/{pushDisp}','LoginController@facebookLogin');
Route::resource('restaurant','RestaurantController');
Route::post('restaurant/getCloser/{token}','RestaurantController@listingCloser');
Route::resource('menu','MenuController');
Route::post('menu/categories/{token}/{idBranch}','MenuController@getCategories');
Route::post('menu/categories/dishes/{token}/{idBranch}/{idCategory}','MenuController@getDishes');
Route::post('create/order/{idUser}/{idBranch}/{userToken}','OrderController@createOrder');
Route::get('{idUser}/orders/{userToken}','OrderController@getMyOrders');
?>