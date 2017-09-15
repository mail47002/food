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

// For develop
Route::get('/', 'Frontend\PagesController@index');

// Backend
Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function() {
    // Login
    Route::get('/', 'LoginController@index');
    Route::post('/', ['as' => 'admin.login', 'uses' => 'LoginController@login']);
    Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'LoginController@logout']);

    // Dashboard
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);

    // Pages
    Route::resource('pages', 'PagesController',  ['names' => [
        'index'     => 'admin.pages.index',
        'create'    => 'admin.pages.create',
        'store'     => 'admin.pages.store',
        'show'      => 'admin.pages.show',
        'edit'      => 'admin.pages.edit',
        'update'    => 'admin.pages.update',
        'destroy'   => 'admin.pages.destroy'
    ]]);

    // FAQs
    Route::resource('faqs', 'FaqsController',  ['names' => [
        'index'     => 'admin.faqs.index',
        'create'    => 'admin.faqs.create',
        'store'     => 'admin.faqs.store',
        'show'      => 'admin.faqs.show',
        'edit'      => 'admin.faqs.edit',
        'update'    => 'admin.faqs.update',
        'destroy'   => 'admin.faqs.destroy'
    ]]);

    // Upload
    Route::post('upload', ['as' => 'admin.uploads.store', 'uses' => 'UploadsController@store']);
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
    Route::get('faqs', 'FaqsController@show');
    Route::get('{slug}', 'PagesController@show');
});