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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [
    'as' => 'getFrontend',
    'uses' => 'MyController@getFrontend'
]);

Route::get('/sent', [
   'as' => 'sent',
   'uses' => 'MyController@sent'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-api', [
    'as' => 'user',
    'uses' => 'UserApiController@getUserApi'
]);

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::get('/getCurrentUser', [
    'as' => 'getCurrentUser',
    'uses' => 'HomeController@getCurrentUser'
]);

Route::match(['get', 'post'], '/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('find', [
    'as' => 'find',
    'uses' => 'SearchController@find'
]);

Route::get('product/{id}', [
   'as' => 'product',
   'uses' => 'SearchController@getInfo'
]);

Route::get('index', [
   'as' => 'index',
   'uses' => 'SearchController@index'
]);