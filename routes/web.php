<?php

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

Route::get('/home', 'HomeController@index')->name('home');


// Admin Panel

Route::group(['namespace'=> 'Admin'] , function(){

	Route::any('logout', 'AuthController@logout')->name('logout');

	Route::resource('restaurants' , 'RestaurantController')->only('index', 'destroy');

	Route::resource('orders' , 'OrderController')->only('index', 'show');

	Route::resource('cities' ,'CityController');

	Route::resource('clients' ,'ClientController')->only('index', 'show');

	Route::resource('categories' ,'CategoryController');

	Route::resource('payments' ,'PaymentController');

	Route::resource('payment_methods' ,'PaymentMethodController');

	Route::resource('offers' ,'OfferController')->only('index' , 'destroy');

	Route::resource('contacts' ,'ContactController')->only('index' , 'destroy');

	Route::resource('settings' ,'SettingController')->only('edit' ,'update');

	Route::get('changePassword','AuthController@ChangePassword');

	Route::post('changePassword','AuthController@changePasswordSave')->name('changePasswordUser');



});
