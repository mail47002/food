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
// Develop
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

// Api
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function () {
    // Products
    Route::group(['prefix' => 'products'], function() {
        Route::get('{id}', 'ProductsController@show');
    });

    // Adverts
    Route::group(['prefix' => 'adverts'], function() {
        Route::post('store', 'AdvertsController@store');
        Route::get('{id}', 'AdvertsController@show');
    });

    // Orders
    Route::group(['prefix' => 'orders'], function() {
        Route::post('store', 'OrdersController@store')->name('orders.store');
        Route::post('stored', 'OrdersController@stored');
        Route::post('{id}/confirm', 'OrdersController@confirm');
        Route::post('confirmed', 'OrdersController@confirmed');
        Route::post('{id}/cancel', 'OrdersController@cancel');
    });

    // Wish list
    Route::group(['prefix' => 'wishlist'], function() {
        Route::get('', 'WishlistController@index');
        Route::post('', 'WishlistController@store');
        Route::delete('{id}', 'WishlistController@destroy');
    });

    // Product Review Answers
    Route::group(['prefix' => 'reviews'], function () {
        Route::post('product/answer', 'ProductReviewAnswersController@store')->name('product.review.answer.store');
    });

    // User Review Answers
    Route::group(['prefix' => 'reviews'], function () {
        Route::post('user/answer', 'UserReviewAnswersController@store')->name('user.review.answer.store');
    });
});

// Frontend
Route::group(['namespace' => 'Frontend'], function() {
    // Adverts
    Route::get('', ['as' => 'adverts.index', 'uses' => 'AdvertsController@index']);
    Route::get('adverts/{slug}', ['as' => 'adverts.show', 'uses' => 'AdvertsController@show']);

    // User callback
    Route::post('callback', ['as' => 'callback.store', 'uses' => 'CallbackController@store']);

    // Advices
    Route::get('advices', ['as' => 'advices.index', 'uses' => 'AdvicesController@index']);
    Route::get('advices/{slug}', ['as' => 'advices.show', 'uses' => 'AdvicesController@show']);

    // Recipes
    Route::get('recipes', ['as' => 'recipes.index', 'uses' => 'RecipesController@index']);
    Route::get('recipes/{slug}', ['as' => 'recipes.show', 'uses' => 'RecipesController@show']);

    // Account
    Route::group(['namespace' => 'Account', 'prefix' => 'myaccount'], function() {
        // User
        Route::get('create', ['as' => 'account.user.create', 'uses' => 'UsersController@create']);
        Route::post('', ['as' => 'account.user.store', 'uses' => 'UsersController@store']);
        Route::get('', ['as' => 'account.user.show', 'uses' => 'UsersController@show']);
        Route::get('edit', ['as' => 'account.user.edit', 'uses' => 'UsersController@edit']);
        Route::put('', ['as' => 'account.user.update', 'uses' => 'UsersController@update']);
        Route::post('create/image', ['as' => 'account.image.store', 'uses' => 'UserImageController@store']);
        Route::put('edit/image', ['as' => 'account.image.update', 'uses' => 'UserImageController@update']);
        Route::get('edit/password', ['as' => 'account.password.edit', 'uses' => 'UserPasswordController@edit']);
        Route::put('edit/password', ['as' => 'account.password.update', 'uses' => 'UserPasswordController@update']);
        Route::get('edit/url', ['as' => 'account.slug.edit', 'uses' => 'UserSlugController@edit']);
        Route::put('edit/url', ['as' => 'account.slug.update', 'uses' => 'UserSlugController@update']);

        // Products
        Route::group(['prefix' => 'products'], function () {
            Route::get('', ['as' => 'account.products.index', 'uses' => 'ProductsController@index']);
            Route::get('create', ['as' => 'account.products.create', 'uses' => 'ProductsController@create']);
            Route::post('', ['as' => 'account.products.store', 'uses' => 'ProductsController@store']);
            Route::get('{id}', ['as' => 'account.products.show', 'uses' => 'ProductsController@show'])->where('id', '[0-9]+');
            Route::get('{id}/edit', ['as' => 'account.products.edit', 'uses' => 'ProductsController@edit'])->where('id', '[0-9]+');
            Route::put('{id}', ['as' => 'account.products.update', 'uses' => 'ProductsController@update']);
            Route::delete('{id}', ['as' => 'account.products.destroy', 'uses' => 'ProductsController@destroy']);
            Route::get('success', ['as' => 'account.products.success', 'uses' => 'ProductsController@success']);

            // Images
            Route::group(['prefix' => 'image'], function() {
                Route::post('upload', 'ProductImagesController@store');
                Route::delete('delete', 'ProductImagesController@destroy');
            });
        });

        // Adverts
        Route::group(['prefix' => 'adverts'], function () {
            Route::get('', ['as' => 'account.adverts.index', 'uses' => 'AdvertsController@index']);
            Route::get('create', ['as' => 'account.adverts.create', 'uses' => 'AdvertsController@create']);
            Route::post('', ['as' => 'account.adverts.store', 'uses' => 'AdvertsController@store']);
            Route::get('{id}', ['as' => 'account.adverts.show', 'uses' => 'AdvertsController@show'])->where('id', '[0-9]+');
            Route::get('{id}/edit', ['as' => 'account.adverts.edit', 'uses' => 'AdvertsController@edit'])->where('id', '[0-9]+');
            Route::put('{id}', ['as' => 'account.adverts.update', 'uses' => 'AdvertsController@update']);
            Route::delete('{id}', ['as' => 'account.adverts.destroy', 'uses' => 'AdvertsController@destroy']);
            Route::get('success', ['as' => 'account.adverts.success', 'uses' => 'AdvertsController@success']);

            // Images
            Route::group(['prefix' => 'image'], function() {
                Route::post('upload', 'AdvertImagesController@store');
                Route::delete('delete', 'AdvertImagesController@destroy');
            });
        });

        // Orders
        Route::group(['prefix' => 'orders'], function () {
            Route::get('', ['as' => 'account.orders.index', 'uses' => 'OrdersController@index']);
            Route::put('{id}', ['as' => 'account.orders.confirm', 'uses' => 'OrdersController@confirm']);
            Route::delete('{id}', ['as' => 'account.orders.destroy', 'uses' => 'OrdersController@destroy']);
        });

        // Notifications
        Route::group(['prefix' => 'notifications'], function () {
            Route::get('', ['as' => 'account.notifications.index', 'uses' => 'NotificationsController@index']);
        });

        // Messages
        Route::group(['prefix' => 'messages'], function () {
            Route::get('', ['as' => 'account.messages.index', 'uses' => 'MessagesController@index']);
            Route::post('', ['as' => 'account.messages.store', 'uses' => 'MessagesController@store']);
            Route::get('{slug}', ['as' => 'account.messages.show', 'uses' => 'MessagesController@show']);
        });

        // Reviews
        Route::group(['prefix' => 'reviews'], function () {
            Route::get('', ['as' => 'account.reviews.index', 'uses' => 'ReviewsController@index']);
        });

        // Advices
        Route::group(['prefix' => 'advices'], function () {
            Route::get('', ['as' => 'account.advices.index', 'uses' => 'AdvicesController@index']);
            Route::get('create', ['as' => 'account.advices.create', 'uses' => 'AdvicesController@create']);
            Route::post('', ['as' => 'account.advices.store', 'uses' => 'AdvicesController@store']);
            Route::get('{id}', ['as' => 'account.advices.show', 'uses' => 'AdvicesController@show'])->where('id', '[0-9]+');
            Route::get('{id}/edit', ['as' => 'account.advices.edit', 'uses' => 'AdvicesController@edit'])->where('id', '[0-9]+');
            Route::put('{id}', ['as' => 'account.advices.update', 'uses' => 'AdvicesController@update']);
            Route::delete('{id}', ['as' => 'account.advices.destroy', 'uses' => 'AdvicesController@destroy']);
            Route::get('success', ['as' => 'account.advices.success', 'uses' => 'AdvicesController@success']);
        });

        // Recipes
        Route::group(['prefix' => 'recipes'], function () {
            Route::get('', ['as' => 'account.recipes.index', 'uses' => 'RecipesController@index']);
            Route::get('create', ['as' => 'account.recipes.create', 'uses' => 'RecipesController@create']);
            Route::post('', ['as' => 'account.recipes.store', 'uses' => 'RecipesController@store']);
            Route::get('{id}', ['as' => 'account.recipes.show', 'uses' => 'RecipesController@show'])->where('id', '[0-9]+');
            Route::get('{id}/edit', ['as' => 'account.recipes.edit', 'uses' => 'RecipesController@edit'])->where('id', '[0-9]+');
            Route::put('{id}', ['as' => 'account.recipes.update', 'uses' => 'RecipesController@update']);
            Route::delete('{id}', ['as' => 'account.recipes.destroy', 'uses' => 'RecipesController@destroy']);
            Route::get('success', ['as' => 'account.recipes.success', 'uses' => 'RecipesController@success']);

            // Images
            Route::group(['prefix' => 'image'], function() {
                Route::post('upload', 'RecipeImagesController@store');
                Route::delete('delete', 'RecipeImagesController@destroy');
            });
        });

    });

    // Login & logout
    Route::group(['prefix' => 'login'], function () {
        Route::get('', 'LoginController@show');
        Route::post('', ['as' => 'login', 'uses' => 'LoginController@login']);

        // Social login
        Route::get('/{social}','LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
        Route::get('/{social}/callback','LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
    });

    Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

    // Registration
    Route::group(['prefix' => 'register'], function () {
        Route::get('', 'RegisterController@show');
        Route::post('', ['as' => 'register', 'uses' => 'RegisterController@register']);
    });

    // Verify
    Route::get('user/verify/{token}', ['as' => 'user.verify', 'uses' => 'RegisterController@verify']);

    // Forgot password
    Route::group(['prefix' => 'password'], function () {
        Route::get('reset/{token?}', 'ForgotPasswordController@showLinkRequestForm');
        Route::post('email', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('reset', 'ForgotPasswordController@reset');
    });

    // Pages
    Route::group(['prefix' => 'page'], function () {
        Route::get('faqs', 'FaqsController@show');
        Route::get('feedback', 'FeedbackController@show');
        Route::post('feedback', ['as' => 'feedback.store', 'uses' => 'FeedbackController@store']);
        Route::get('{slug}', 'PagesController@show');
    });

    // Profile
    Route::group(['namespace' => 'Profile'], function () {
        // User
        Route::get('{slug}', ['as' => 'profile.user.show', 'uses' => 'UserController@show']);

        // Products
        Route::get('{slug}/products', ['as' => 'profile.products.index', 'uses' => 'ProductsController@index']);

        // Adverts
        Route::get('{slug}/adverts', ['as' => 'profile.adverts.index', 'uses' => 'AdvertsController@index']);

        // Advices
        Route::get('{slug}/advices', ['as' => 'profile.advices.index', 'uses' => 'AdvicesController@index']);

        // Recipes
        Route::get('{slug}/recipes', ['as' => 'profile.recipes.index', 'uses' => 'RecipesController@index']);

        // Reviews
        Route::get('{slug}/reviews/create', ['as' => 'profile.reviews.create', 'uses' => 'ReviewsController@create']);

        // Product review
        Route::get('{slug}/reviews/product/create', ['as' => 'profile.reviews.product.create', 'uses' => 'ProductReviewsController@create']);
        Route::post('{slug}/reviews/product', ['as' => 'profile.reviews.product.store', 'uses' => 'ProductReviewsController@store']);
        Route::get('{slug}/reviews/product/success', ['as' => 'profile.reviews.product.success', 'uses' => 'ProductReviewsController@success']);

        // User review
        Route::get('{slug}/reviews/client/create', ['as' => 'profile.reviews.client.create', 'uses' => 'UserReviewsController@create']);
        Route::post('{slug}/reviews/client', ['as' => 'profile.reviews.client.store', 'uses' => 'UserReviewsController@store']);
        Route::get('{slug}/reviews/client/success', ['as' => 'profile.reviews.client.success', 'uses' => 'UserReviewsController@success']);
    });
});