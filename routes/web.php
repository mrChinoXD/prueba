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

Route::get('/','HomeController@index')->name('home');

Auth::routes();

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware' => ['auth','admin']],
    function (){
        Route::get('home', 'HomeController@index')->name('home');
        Route::resource('users','UserController');
        Route::resource('customers','CustomersController');
        Route::resource('sales','SalesController');
        Route::resource('products','ProductsController');
        Route::get('products/active/{id}','ProductsController@active')->name('products.active');
        Route::get('customers/get/{id}','CustomersController@get')->name('customers.get');
        Route::post('customers/addbalance/{id}','CustomersController@Add_Balance')->name('customers.addbalance');
    });

Route::group(['as'=>'customer.','prefix'=>'customer','namespace'=>'Customer','middleware' => ['auth','customer']],
    function (){
        Route::get('home', 'HomeController@index')->name('home');
        Route::get('show/{id}', 'HomeController@show')->name('show');
        Route::post('buy/{id}', 'HomeController@buy')->name('buy');
    });
