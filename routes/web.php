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
    return redirect('guests');
});

Route::resource('guests', 'GuestController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('manages',[
   'uses' => 'UserController@manage_index',
   'as' => 'manages.index',
]);
//Route::get('manages/users',[
//    'uses' => 'UserController@user_index',
//    'as' => 'users.index',
//]);
Route::resource('manages/users','UserController');

Route::get('manages/customers',[
   'uses' => 'UserController@customer_index',
   'as' => 'users.customer',
]);
