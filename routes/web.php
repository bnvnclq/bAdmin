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

Auth::routes([
    'register' => false,
    'reset' => false,
    ]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function () {
    return view('welcome');
})->middleware(['hasPermission:user']);
/********************************************************************************************
 * ******************************************************************************************
 * 
 * Routes for Logged in users.
 * 
 * ******************************************************************************************
 ********************************************************************************************/
Route::group(['middleware' => ['auth']], function() {
    //
    Route::group(['middleware' => ['hasPermission:user']], function() {
        // Route::get('/test', 'HomeController@index')->name('home');
        Route::get('/users', 'UserController@index')->name('users');

        Route::group(['middleware' => ['hasPermission:user_update']], function() {
            Route::get('/users/add', 'UserController@addView')->name('users_add_view');
            Route::post('/users/add', 'UserController@add')->name('users_add');

            Route::get('/users/edit/{id}', 'UserController@editView')->name('users_edit_view');
            Route::post('/users/edit/{id}', 'UserController@edit')->name('users_edit');

            Route::get('/users/disable/{id}', 'UserController@disable')->name('users_disable');
            Route::get('/users/enable/{id}', 'UserController@enable')->name('users_enable');
        });
    });
});


/********************************************************************************************
 * ******************************************************************************************
 * 
 * Routes for guest.
 * 
 * ******************************************************************************************
 ********************************************************************************************/