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

// For dev
Route::get('/', 'Frontend\PagesController@index');

//Frontend
Route::group(['namespace' => 'Frontend'], function() {

    // Adverts
    Route::resource('adverts', 'AdvertsController');

    Route::resource('products', 'ProductsController');

    Route::resource('profile', 'ProfileController');

    // Pages
    Route::get('{slug}', 'PagesController@show');
});
