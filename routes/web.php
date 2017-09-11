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
Route::get('/', 'Frontend\PagesController@home');

// Backend
Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function() {
    // Page
    Route::resource('pages', 'PageController');
});

// Frontend
Route::group(['namespace' => 'Frontend'], function() {
    // Login
    Route::get('login', 'LoginController@index');
    Route::post('login', ['as' => 'login', 'uses' => 'LoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

    // Registration
    Route::get('register', 'RegisterController@index');
    Route::post('register', ['as' => 'register', 'uses' => 'RegisterController@register']);
    Route::post('register/google', ['as' => 'register.google', 'uses' => 'RegisterController@']);
    Route::post('register/facebook', ['as' => 'register.facebook', 'uses' => 'RegisterController@']);
    Route::post('register/twitter', ['as' => 'register.twitter', 'uses' => 'RegisterController@']);
    Route::get('register/verify/{token}', ['as' => 'register.verify', 'uses' => 'RegisterController@verify']);

    // Forgot password
    Route::get('password/reset', 'ForgotPasswordController@index');
    Route::post('password/reset', ['as' => 'forgot', 'uses' => 'ForgotPasswordController@forgot']);

    // Profile
    Route::get('profile/create', ['as' => 'login.information', 'uses' => 'LoginController@information']);
    Route::post('profile/create', ['as' => 'login.save', 'uses' => 'LoginController@save']);

    Route::get('success', ['as' => 'success', 'uses' => 'LoginController@success']);

    Route::resource('profile', 'ProfileController');

    // Adverts
    Route::resource('adverts', 'AdvertsController');

    // Products
    Route::resource('products', 'ProductsController');

    // Pages
    Route::get('faq', 'PagesController@faq');
    Route::get('contact', 'PagesController@contact');
    Route::get('{slug}', 'PagesController@index');
});