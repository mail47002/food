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

    //Profile
    Route::resource('profile', 'ProfileController');
    Route::get('edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::post('edit', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

    //login & Register
    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@index']);
    Route::post('login', ['as' => 'login.session', 'uses' => 'LoginController@login']);
    Route::get('registration', ['as' => 'login.registration', 'uses' => 'LoginController@registration']);
    Route::post('registration', ['as' => 'login.register', 'uses' => 'LoginController@register']);
    Route::get('validation', ['as' => 'login.validation', 'uses' => 'LoginController@validationEmail']);
    Route::get('information', ['as' => 'login.information', 'uses' => 'LoginController@information']);
    Route::post('information', ['as' => 'login.save', 'uses' => 'LoginController@save']);
    Route::get('forgot', ['as' => 'forgot', 'uses' => 'LoginController@forgot']);
    Route::get('success', ['as' => 'success', 'uses' => 'LoginController@success']);


    // Pages
    Route::get('{slug}', 'PagesController@show');
});
