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

Route::get('/', "HomeController@index");
Route::get('/home', "HomeController@index");

Route::get('/career', function () {
    return view('career');
});

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/business', "BusinessController@index");

Route::get('/about', function() {
    return view('about');
});

Route::get('/test', "HomeController@test");