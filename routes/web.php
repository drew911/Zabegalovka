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
Route::get('/', 'mainPageController@index')->name('index');
Route::get('/user', 'userController@show')->name('user');
Route::get('/editUser', 'userController@edit')->name('editUser');
Route::post('/updateUser', 'userController@update')->name('updateUser');
Route::get('/dishes', 'dishesController@index')->name('dishes');
Route::get('/createDishes', 'dishesController@create')->name('createDishes')->middleware('admin');
Route::post('/storeDishes', 'dishesController@store')->name('storeDishes')->middleware('admin');
Route::get('/editDish/{id}', 'dishesController@edit')->name('editDish')->middleware('admin');
Route::get('/deleteDish/{id}', 'dishesController@destroy')->name('deleteDish')->middleware('admin');
Route::post('/updateDish/{id}', 'dishesController@update')->name('updateDish')->middleware('admin');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/addToCart/{id}', 'CartController@store')->name('addToCart');
Route::post('/deleteFromCart/{id}', 'CartController@destroy')->name('deleteFromCart');
Route::post('/makeOrder', 'OrdersController@store')->name('makeOrder');
Route::get('/orders', 'OrdersController@index')->name('orders');

Route::get('/minus/{id}', ['uses' => 'CartController@minus','as' => 'cart.minus']);
Route::get('/add/{id}', ['uses' => 'CartController@add','as' => 'cart.add']);
