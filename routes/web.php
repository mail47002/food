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
    Route::resource('pages', 'PagesController',  [
        'names' => [
            'index'     => 'admin.pages.index',
            'create'    => 'admin.pages.create',
            'store'     => 'admin.pages.store',
            'show'      => 'admin.pages.show',
            'edit'      => 'admin.pages.edit',
            'update'    => 'admin.pages.update',
            'destroy'   => 'admin.pages.destroy'
        ]
    ]);

    // FAQs
    Route::resource('faqs', 'FaqsController',  [
        'names' => [
            'index'     => 'admin.faqs.index',
            'create'    => 'admin.faqs.create',
            'store'     => 'admin.faqs.store',
            'show'      => 'admin.faqs.show',
            'edit'      => 'admin.faqs.edit',
            'update'    => 'admin.faqs.update',
            'destroy'   => 'admin.faqs.destroy'
        ]
    ]);

    // Settings
    Route::resource('settings', 'SettingsController',  [
        'names' => [
            'index'     => 'admin.settings.index',
            'create'    => 'admin.settings.create',
            'store'     => 'admin.settings.store',
            'show'      => 'admin.settings.show',
            'edit'      => 'admin.settings.edit',
            'update'    => 'admin.settings.update',
            'destroy'   => 'admin.settings.destroy'
        ]
    ]);

    // Upload
    Route::post('upload', ['as' => 'admin.uploads.store', 'uses' => 'UploadsController@store']);
});


// Frontend
Route::group(['namespace' => 'Frontend'], function() {
    // Profile
    Route::group(['namespace' => 'Profile'], function() {
        // User
        Route::get('profile/create', ['as' => 'profile.user.create', 'uses' => 'UsersController@create']);
        Route::post('profile', ['as' => 'profile.user.store', 'uses' => 'UsersController@store']);
        Route::get('profile/{id}', ['as' => 'profile.user.show', 'uses' => 'UsersController@show'])->where('id', '[0-9]+');
        Route::get('profile/{id}/edit', ['as' => 'profile.user.edit', 'uses' => 'UsersController@edit'])->where('id', '[0-9]+');
        Route::put('profile/{id}', ['as' => 'profile.user.update', 'uses' => 'UsersController@update'])->where('id', '[0-9]+');

        Route::get('profile/{id}/password', ['as' => 'profile.password.edit', 'uses' => 'PasswordController@edit'])->where('id', '[0-9]+');;
        Route::put('profile/{id}/password', ['as' => 'profile.password.update', 'uses' => 'PasswordController@update'])->where('id', '[0-9]+');;

        // Products
        Route::get('profile/products', ['as' => 'profile.products.index', 'uses' => 'ProductsController@index']);
        Route::get('profile/products/create', ['as' => 'profile.products.create', 'uses' => 'ProductsController@create']);
        Route::post('profile/products', ['as' => 'profile.products.store', 'uses' => 'ProductsController@store']);
        Route::get('profile/products/{id}', ['as' => 'profile.products.show', 'uses' => 'ProductsController@show'])->where('id', '[0-9]+');
        Route::get('profile/products/{id}/edit', ['as' => 'profile.products.edit', 'uses' => 'ProductsController@edit'])->where('id', '[0-9]+');
        Route::put('profile/products/{id}', ['as' => 'profile.products.update', 'uses' => 'ProductsController@update']);
        Route::delete('profile/products/{id}', ['as' => 'profile.products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('profile/products/success', ['as' => 'profile.products.success', 'uses' => 'ProductsController@success']);

        Route::post('profile/products/image/store', 'ProductImagesController@store');
        Route::put('profile/products/image/{id}', 'ProductImagesController@update');
        Route::delete('profile/products/image/{id}', 'ProductImagesController@destroy');

        // Adverts
        Route::resource('profile/adverts', 'AdvertsController', [
            'names' => [
                'index'     => 'profile.adverts.index',
                'create'    => 'profile.adverts.create',
                'store'     => 'profile.adverts.store',
                'show'      => 'profile.adverts.show',
                'edit'      => 'profile.adverts.edit',
                'update'    => 'profile.adverts.update',
                'destroy'   => 'profile.adverts.destroy'
            ]
        ]);

        // Articles
        Route::resource('profile/articles', 'ArticlesController', [
            'names' => [
                'index'     => 'profile.articles.index',
            ]
        ]);

        // Advices
        Route::resource('profile/advices', 'AdvicesController', [
            'names' => [
                // 'index'     => 'profile.advices.index',
                'create'    => 'profile.advices.create',
                'store'     => 'profile.advices.store',
                'show'      => 'profile.advices.show',
                'edit'      => 'profile.advices.edit',
                'update'    => 'profile.advices.update',
                'destroy'   => 'profile.advices.destroy'
            ]
        ]);

        // Recipes
        Route::resource('profile/recipes', 'RecipesController', [
            'names' => [
                // 'index'     => 'profile.recipes.index',
                'create'    => 'profile.recipes.create',
                'store'     => 'profile.recipes.store',
                'show'      => 'profile.recipes.show',
                'edit'      => 'profile.recipes.edit',
                'update'    => 'profile.recipes.update',
                'destroy'   => 'profile.recipes.destroy'
            ]
        ]);


    });

    //Profile articles
//    Route::get('/profile/articles', ['as' => 'profile.articles', 'uses' => 'ProfileController@articles']);
//    Route::get('/articles/new', ['as' => 'articles.new', 'uses' => 'ArticlesController@new']);
//    Route::post('/articles/new', ['as' => 'articles.create', 'uses' => 'ArticlesController@create']);

    //Profile adverts
//    Route::get('/profile/adverts', ['as' => 'profile.adverts', 'uses' => 'ProfileController@adverts']);
//    Route::get('/profile/orders', ['as' => 'profile.orders', 'uses' => 'ProfileController@orders']);
//    Route::get('/profile/reviews', ['as' => 'profile.reviews', 'uses' => 'ProfileController@reviews']);
//    Route::get('/profile/messages', ['as' => 'profile.messages', 'uses' => 'ProfileController@messages']);
//    Route::post('/profile/image', ['as' => 'profile.updatePhoto', 'uses' => 'ProfileController@updatePhoto']);

    // Login & logout
    Route::get('login', 'LoginController@show');
    Route::post('login', ['as' => 'login', 'uses' => 'LoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

    // Registration
    Route::get('register', 'RegisterController@show');
    Route::post('register', ['as' => 'register', 'uses' => 'RegisterController@register']);

    // Forgot password
    Route::get('password/forgot', 'ForgotPasswordController@show');
    Route::post('password/forgot', ['as' => 'password.forgot', 'uses' => 'ForgotPasswordController@forgot']);

//    Route::get('validation', ['as' => 'login.validation', 'uses' => 'LoginController@validationEmail']);
//    Route::get('information', ['as' => 'login.information', 'uses' => 'LoginController@information']);
//    Route::post('information', ['as' => 'login.save', 'uses' => 'LoginController@save']);
//    Route::get('forgot', ['as' => 'forgot', 'uses' => 'LoginController@forgot']);
//    Route::get('success', ['as' => 'success', 'uses' => 'LoginController@success']);

    // Pages
    Route::get('faqs', 'FaqsController@show');
    Route::get('feedback', 'FeedbackController@show');
    Route::post('feedback', ['as' => 'feedback.store', 'uses' => 'FeedbackController@store']);
    Route::get('{slug}', 'PagesController@show');
});
