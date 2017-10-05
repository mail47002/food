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
Route::get('temp/{slug}', 'Frontend\PagesController@temp');

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

    // Settings
    Route::resource('settings', 'SettingsController',  ['names' => [
        'index'     => 'admin.settings.index',
        'create'    => 'admin.settings.create',
        'store'     => 'admin.settings.store',
        'show'      => 'admin.settings.show',
        'edit'      => 'admin.settings.edit',
        'update'    => 'admin.settings.update',
        'destroy'   => 'admin.settings.destroy'
    ]]);

    // Upload
    Route::post('upload', ['as' => 'admin.uploads.store', 'uses' => 'UploadsController@store']);
});


    // Frontend
    Route::group(['namespace' => 'Frontend'], function() {
    // Adverts
    Route::resource('adverts', 'AdvertsController');

    Route::resource('products', 'ProductsController');

    //Profile
    Route::get('/profile', ['as' => 'profile.index', 'uses' => 'ProfileController@index']);
    Route::get('/profile/edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::post('/profile/edit', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::get('/profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::post('/profile/password', ['as' => 'profile.updatePassword', 'uses' => 'ProfileController@updatePassword']);
    Route::get('/profile/nickname', ['as' => 'profile.nickname', 'uses' => 'ProfileController@nickname']);
    Route::post('/profile/nickname', ['as' => 'profile.updateNickname', 'uses' => 'ProfileController@updateNickname']);

    //Profile product
    Route::get('/profile/products', ['as' => 'profile.products', 'uses' => 'ProfileController@products']);
    Route::get('/profile/products/new', ['as' => 'profile.product.new', 'uses' => 'ProfileController@productNew']);
    Route::post('/profile/products/new', ['as' => 'profile.products.productCreate', 'uses' => 'ProfileController@productCreate']);
    Route::get('/profile/products/{id}', ['as' => 'profile.product', 'uses' => 'ProfileController@product']);
    Route::get('/profile/products/edit/{id}', ['as' => 'profile.product.edit', 'uses' => 'ProfileController@productEdit']);
    Route::get('/profile/products/destroy/{id}', ['as' => 'profile.product.destroy', 'uses' => 'ProfileController@productDestroy']);
    Route::post('/profile/products/edit', ['as' => 'profile.products.productUpdate', 'uses' => 'ProfileController@productUpdate']);

    //Profile articles
    Route::get('/profile/articles', ['as' => 'profile.articles', 'uses' => 'ProfileController@articles']);
    Route::get('/articles/new', ['as' => 'articles.new', 'uses' => 'ArticlesController@new']);
    Route::post('/articles/new', ['as' => 'articles.create', 'uses' => 'ArticlesController@create']);

    //Profile adverts
    Route::get('/profile/adverts', ['as' => 'profile.adverts', 'uses' => 'ProfileController@adverts']);
    Route::get('/profile/orders', ['as' => 'profile.orders', 'uses' => 'ProfileController@orders']);
    Route::get('/profile/reviews', ['as' => 'profile.reviews', 'uses' => 'ProfileController@reviews']);
    Route::get('/profile/messages', ['as' => 'profile.messages', 'uses' => 'ProfileController@messages']);
    Route::post('/profile/image', ['as' => 'profile.updatePhoto', 'uses' => 'ProfileController@updatePhoto']);

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
    Route::get('logout', ['as' => 'login.logout', 'uses' => 'LoginController@logout']);

    // Pages
    Route::get('faqs', 'FaqsController@show');
    Route::get('feedback', 'FeedbackController@show');
    Route::post('feedback', ['as' => 'feedback.store', 'uses' => 'FeedbackController@store']);
    Route::get('{slug}', 'PagesController@show');
});
