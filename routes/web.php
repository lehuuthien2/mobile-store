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


//View::composer('layouts.guests', function ($view) {
//    $view->factories = mobileS\Factory::pluck( 'name', 'factory_id');
//});

Route::get('/', function () {
    return redirect('/manages');
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

Route::resource('manages/products', 'ProductController');
Route::get('manages/customers',[
    'uses' => 'UserController@customer_index',
    'as' => 'users.customer',
]);

Route::get('news', [
    'uses' => 'GuestController@news',
    'as' => 'guests.news'
]);
Route::get('cart', [
    'uses' => 'GuestController@cart',
    'as' => 'guests.cart'
]);
Route::get('factory/{slug}', [
    'uses' => 'GuestController@factory',
    'as' => 'guests.factory'
]);
Route::get('detail/{product_id}', [
    'uses' => 'GuestController@product_detail',
    'as' => 'guests.product_detail'
]);
Route::get('search', [
    'uses' => 'GuestController@search',
    'as' => 'guests.search'
]);
Route::get('news_detail', [
    'uses' => 'GuestController@news_detail',
    'as' => 'guests.news_detail'
]);
Route::get('contact', [
    'uses' => 'GuestController@contact',
    'as' => 'guests.contact'
]);
Route::post('success', [
    'uses' => 'GuestController@success',
    'as' => 'guests.success'
]);
Route::post('addCart/{product}',[
   'uses' => 'GuestController@addCart',
   'as' => 'addCart' ,
]);
Route::post('Cart/{rowId}',[
    'uses' => 'GuestController@updateCart',
    'as' => 'updateCart'
]);
Route::delete('Cart/{rowId}',[
    'uses' => 'GuestController@remove',
    'as' => 'updateCart'
]);
Route::post('/comment', [
   'uses' => 'GuestController@comment',
   'as' => 'comment'
]);

