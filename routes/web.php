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

Auth::routes();

Route::get('/', "HomeController@index");
Route::get('/career', function () {
    return view('career');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', "HomeController@dashboard");
    Route::get('/businesses/create', "BusinessController@create");
    Route::post('/businesses', "BusinessController@store");
    Route::get('/businesses/{id}/edit', "BusinessController@edit");
    Route::put('/businesses/{id}', "BusinessController@update");
    Route::delete('/businesses/{id}', "BusinessController@destroy");
});

Route::get('/businesses', "BusinessController@index");
Route::get('/businesses/{id}', "BusinessController@show");
Route::get('/businesses/category/{category}', "BusinessController@filter");
Route::get('image/show/{id}', 'ImageController@show');

Route::get('/test', "HomeController@test");
