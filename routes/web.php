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
        //
        // Route::get('/test', 'HomeController@index')->name('home');
    });
});


/********************************************************************************************
 * ******************************************************************************************
 * 
 * Routes for guest.
 * 
 * ******************************************************************************************
 ********************************************************************************************/