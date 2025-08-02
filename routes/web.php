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

use App\Http\Controllers\TalkToCeoEmailController;

Route::get('locale/{locale}', function($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes();

Route::get('/', "HomeController@index");

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', "HomeController@about");

Route::post('/talk-to-ceo', [TalkToCeoEmailController::class, 'send'])->name('talk_to_ceo.send');

Route::group(['middleware' => ['auth']], function() {
//    Route::get('/dashboard', "HomeController@dashboard");
    Route::get('/dashboard/summary', "HomeController@dashboardSummary");
    Route::get('/dashboard/businesses/status/{status}', "BusinessController@status");
    Route::get('/dashboard/businesses', "HomeController@dashboardBusinesses");
    Route::get('/dashboard/careers', "HomeController@dashboardCareers");
    Route::get('/dashboard/clients', "HomeController@dashboardClients");
    Route::get('/dashboard/awards', "HomeController@dashboardAwards");
    Route::get('/dashboard/users', "HomeController@dashboardUsers");

    Route::get('/businesses/search', "BusinessController@search");
    Route::post('/businesses/search', "BusinessController@attemptSearch");
    Route::get('/businesses/sort', "BusinessController@sort");
    Route::post('/businesses/sort', "BusinessController@storeSort");
    Route::get('/businesses/create', "BusinessController@create");
    Route::post('/businesses', "BusinessController@store");
    Route::get('/businesses/{id}/edit', "BusinessController@edit");
    Route::put('/businesses/{id}', "BusinessController@update");
    Route::delete('/businesses/{id}', "BusinessController@destroy");

    Route::get('/careers/search', "CareersController@search");
    Route::post('/careers/search', "CareersController@attemptSearch");
    Route::get('/careers/sort', "CareersController@sort");
    Route::post('/careers/sort', "CareersController@storeSort");
    Route::get('/careers/create', "CareersController@create");
    Route::post('/careers', "CareersController@store");
    Route::get('/careers/{id}/edit', "CareersController@edit");
    Route::put('/careers/{id}', "CareersController@update");
    Route::delete('/careers/{id}', "CareersController@destroy");

    Route::get('/clients/search', "ClientsController@search");
    Route::post('/clients/search', "ClientsController@attemptSearch");
    Route::get('/clients/sort', "ClientsController@sort");
    Route::post('/clients/sort', "ClientsController@storeSort");
    Route::get('/clients/create', "ClientsController@create");
    Route::post('/clients', "ClientsController@store");
    Route::get('/clients/{id}/edit', "ClientsController@edit");
    Route::put('/clients/{id}', "ClientsController@update");
    Route::delete('/clients/{id}', "ClientsController@destroy");

    Route::get('/awards/search', "AwardsController@search");
    Route::post('/awards/search', "AwardsController@attemptSearch");
    Route::get('/awards/sort', "AwardsController@sort");
    Route::post('/awards/sort', "AwardsController@storeSort");
    Route::get('/awards/create', "AwardsController@create");
    Route::post('/awards', "AwardsController@store");
    Route::get('/awards/{id}/edit', "AwardsController@edit");
    Route::put('/awards/{id}', "AwardsController@update");
    Route::delete('/awards/{id}', "AwardsController@destroy");

    Route::get('/users/search', "UsersController@search");
    Route::post('/users/search', "UsersController@attemptSearch");
    Route::get('/users/create', "UsersController@create");
    Route::post('/users', "UsersController@store");
    Route::get('/users/{id}/edit', "UsersController@edit");
    Route::put('/users/{id}', "UsersController@update");
    Route::delete('/users/{id}', "UsersController@destroy");
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

Route::get('/image/show/{id}', 'ImageController@show');
Route::post('upload_image/', "ImageController@store");
Route::get('/preload_image/{id}', "ImageController@preload");
Route::post('delete_image/', "ImageController@deleteImage");

Route::get('/test', "HomeController@test");
