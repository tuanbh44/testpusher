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