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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Frontend
Route::group(['namespace' => 'Frontend'], function() {

  // Adverts
  Route::resource('adverts', 'AdvertsController');

  Route::resource('products', 'ProductsController');

  Route::resource('profile', 'ProfileController');

  //login & Register
  Route::get('login', ['as' => 'login', 'uses' => 'LoginController@login']);
  Route::get('registration', ['as' => 'login.registration', 'uses' => 'LoginController@registration']);
  Route::post('registration', ['as' => 'login.register', 'uses' => 'LoginController@register']);
  Route::get('forgot', ['as' => 'forgot', 'uses' => 'LoginController@forgot']);
  Route::get('success', ['as' => 'success', 'uses' => 'LoginController@success']);
  Route::get('information', ['as' => 'information', 'uses' => 'LoginController@information']);



});
