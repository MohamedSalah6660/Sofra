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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group(['prefix' => 'v1' , 'namespace' => 'Api'] , function(){


	Route::get('cities', 'MainController@cities');

	Route::get('categories', 'MainController@categories');

	Route::post('contacts', 'MainController@contacts');

	Route::get('restaurant_search', 'MainController@restaurant_search');

	Route::get('products', 'MainController@products');

	Route::get('payment_methods', 'MainController@payment_methods');

	Route::get('all_notifications', 'MainController@all_notifications');

	Route::get('settings', 'MainController@settings');

	Route::post('test-notification' , 'MainController@test_notification');



Route::group(['prefix' => 'client','namespace' => 'Client'] , function()		
{	

	Route::post('register', 'AuthController@register');

	Route::post('login', 'AuthController@login');

	Route::post('reset-password', 'AuthController@reset');

	Route::post('new-password', 'AuthController@password');

	Route::get('clients', 'MainController@clients');

	Route::get('comments', 'MainController@comments');

	Route::get('product_details/{id}', 'MainController@product_details');

	Route::get('restaurant_info/{id}', 'MainController@restaurant_info');



Route::group(['middleware' => 'auth:api'] , function(){


	Route::post('register-token', 'AuthController@registerToken');

	Route::post('remove-token', 'AuthController@removeToken');

	Route::post('profile', 'AuthController@profile');

	Route::get('offers' ,'MainController@offers');

	Route::get('show/offer/{id}' ,'MainController@show_offer');

	Route::get('my-orders' ,'MainController@my_orders');

	Route::post('create-order', 'MainController@create_order');

	Route::get('show-order', 'MainController@show_order');

	Route::post('delivered/{id}', 'MainController@delivered');

	Route::post('cancelled/{id}', 'MainController@cancelled');

	Route::post('create-comment', 'MainController@create_comment');

	Route::get('current_orders' , 'MainController@current_orders');

	Route::get('last_orders' , 'MainController@last_orders');

});

});



Route::group(['prefix' => 'restaurant' , 'namespace' => 'Restaurant'] ,function()
{


	Route::post('register', 'AuthController@register');

	Route::post('login', 'AuthController@login');

	Route::post('reset-password', 'AuthController@reset');

	Route::post('new-password', 'AuthController@password');

	Route::get('restaurants', 'MainController@restaurants');

	Route::get('restaurant/{id}', 'MainController@restaurant');



Route::group(['middleware' => 'auth:api-rest'] , function(){


	Route::get('comments', 'MainController@comments');

	Route::post('profile', 'AuthController@profile');

	Route::post('register-token', 'AuthController@registerToken');

	Route::post('remove-token', 'AuthController@removeToken');

	Route::get('offers', 'MainController@offers');

	Route::get('products' ,'MainController@products');

	Route::post('product/create' , 'MainController@store');

	Route::post('product/edit/{id}' , 'MainController@update');

	Route::post('product/delete' , 'MainController@delete');

	Route::post('offer/create' , 'MainController@create_offer');

	Route::get('my-orders' ,'MainController@my_orders');

	Route::get('show-order', 'MainController@show_order');

	Route::post('accepted/{id}', 'MainController@accepted');

	Route::post('rejected/{id}', 'MainController@rejected');
	
	Route::post('delivered/{id}', 'MainController@delivered');

	Route::post('change/status' , 'MainController@change_status');

	Route::get('commission' , 'MainController@commission');


});


});


});












