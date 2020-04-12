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

    Route::get('/careers/create', "CareersController@create");
    Route::post('/careers', "CareersController@store");
    Route::get('/careers/{id}/edit', "CareersController@edit");
    Route::put('/careers/{id}', "CareersController@update");
    Route::delete('/careers/{id}', "CareersController@destroy");

    Route::get('/clients/create', "ClientsController@create");
    Route::post('/clients', "ClientsController@store");
    Route::get('/clients/{id}/edit', "ClientsController@edit");
    Route::put('/clients/{id}', "ClientsController@update");
    Route::delete('/clients/{id}', "ClientsController@destroy");

    Route::get('/awards/create', "AwardsController@create");
    Route::post('/awards', "AwardsController@store");
    Route::get('/awards/{id}/edit', "AwardsController@edit");
    Route::put('/awards/{id}', "AwardsController@update");
    Route::delete('/awards/{id}', "AwardsController@destroy");
});

Route::get('/businesses', "BusinessController@index");
Route::get('/businesses/{id}', "BusinessController@show");
Route::get('/businesses/category/{category}', "BusinessController@filter");

Route::get('/careers', "CareersController@index");
Route::get('/careers/{id}', "CareersController@show");

Route::get('/awards', "AwardsController@index");
Route::get('/awards/{id}', "AwardsController@show");

Route::get('/clients', "ClientsController@index");
Route::get('/clients/{id}', "ClientsController@show");

Route::get('image/show/{id}', 'ImageController@show');

Route::get('/test', "HomeController@test");
