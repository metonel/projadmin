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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/comenzi', 'OrderController@index');

Route::get('/addprod', 'ProductController@create');

Route::resource('product', 'ProductController');

Route::resource('category', 'CategoryController');

Route::resource('subcategorie', 'SubcategorieController');

Route::resource('orders', 'OrderController');

Route::resource('news', 'NewsController');

Route::resource('slider', 'SliderController');