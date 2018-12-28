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
    return 2;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'TestController@index')->name('index');

Route::get('/subscribe/{channel}', 'TestController@subscribe')->name('subscribe');

Route::get('/unsubscribe/{channel}', 'TestController@unsubscribe')->name('unsubscribe');

Route::get('/publish/{channel}/{message}','TestController@publish')->name('publish');
