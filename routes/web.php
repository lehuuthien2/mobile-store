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
Route::get('manages/products/removeImage/',[
    'uses' => 'ProductController@removeImage',
    'as' => 'removeImage'
]);
Route::get('manages/products/addImage/{id}',[
   'uses' => 'ProductController@addImage',
   'as' => 'addImage'
]);
Route::get('manages/comments/display/{id}', [
    'uses' => 'CommentController@display',
    'as' => 'display'
]);
Route::resource('manages/users','UserController');

Route::resource('manages/products', 'ProductController');
Route::resource('manages/news', 'NewsController');
Route::resource('manages/orders', 'OrderController');
Route::resource('manages/comments', 'CommentController');
Route::resource('manages/factories', 'FactoryController');
Route::get('manages/customers',[
    'uses' => 'UserController@customer_index',
    'as' => 'users.customer',
]);

Route::get('news', [
    'uses' => 'GuestController@news',
    'as' => 'guests.news'
]);
Route::get('cart', [
    'uses' => 'OrderController@cart',
    'as' => 'guests.cart'
]);
Route::get('factory/{slug}', [
    'uses' => 'GuestController@factory',
    'as' => 'guests.factory'
]);
Route::get('detail/{slug}', [
    'uses' => 'GuestController@product_detail',
    'as' => 'guests.product_detail'
]);
Route::get('search', [
    'uses' => 'GuestController@search',
    'as' => 'guests.search'
]);
Route::get('news_detail/{slug}', [
    'uses' => 'GuestController@news_detail',
    'as' => 'guests.news_detail'
]);
Route::get('contact', [
    'uses' => 'GuestController@contact',
    'as' => 'guests.contact'
]);
Route::post('addCart/{product}',[
   'uses' => 'OrderController@addCart',
   'as' => 'addCart' ,
]);
Route::post('Cart/{rowId}',[
    'uses' => 'OrderController@updateCart',
    'as' => 'updateCart'
]);
Route::delete('Cart/{rowId}',[
    'uses' => 'OrderController@remove',
    'as' => 'remove'
]);
Route::post('success', [
   'uses' => 'OrderController@store',
   'as' => 'makeOrder'
]);
Route::post('/comment', [
   'uses' => 'CommentController@store',
   'as' => 'comment'
]);
Route::get('user/{id}', [
   'uses' => 'GuestController@user_info',
   'as' => 'user'
]);
Route::put('user/{id}', [
    'uses' => 'GuestController@updateCustomer',
    'as' => 'updateCustomer'
]);
Route::get('user/{id}/orders', [
   'uses' => 'GuestController@orders',
   'as'=> 'guests.orders'
]);
Route::get('orders/detail/{id}',[
   'uses' => 'GuestController@order_detail',
   'as' => 'guests.order_detail'
]);
Route::get('cancelOrder/{id}', [
   'uses' => 'GuestController@cancelOrder',
   'as' => 'guests.cancel'
]);

Route::get('search/products', [
   'uses' => 'ProductController@search',
   'as' => 'searchProduct'
]);
Route::get('search/users', [
    'uses' => 'UserController@search',
    'as' => 'searchUser'
]);
Route::get('search/orders', [
    'uses' => 'OrderController@search',
    'as' => 'searchOrder'
]);
Route::get('search/comments', [
    'uses' => 'CommentController@search',
    'as' => 'searchComment'
]);
Route::get('search/news', [
    'uses' => 'NewsController@search',
    'as' => 'searchNews'
]);
Route::get('search/customers', [
    'uses' => 'UserController@searchCustomers',
    'as' => 'searchCustomer'
]);


