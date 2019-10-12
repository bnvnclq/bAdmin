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
    Route::group(['middleware' => ['hasPermission:users']], function() {
        // Route::get('/test', 'HomeController@index')->name('home');
        Route::get('/users', 'UserController@index')->name('users');

        Route::group(['prefix' => 'users', 'middleware' => ['hasPermission:users_update']], function() {
            Route::get('/add', 'UserController@addView')->name('users_add_view');
            Route::post('/add', 'UserController@add')->name('users_add');

            Route::get('/edit/{id}', 'UserController@editView')->name('users_edit_view');
            Route::post('/edit/{id}', 'UserController@edit')->name('users_edit');

            Route::get('/disable/{id}', 'UserController@disable')->name('users_disable');
            Route::get('/enable/{id}', 'UserController@enable')->name('users_enable');
        });
    });
    
    Route::group(['prefix' => 'settings', 'middleware' => ['hasPermission:settings']], function() {
        Route::get('/', 'SettingsController@index')->name('settings');
            
        Route::group(['prefix' => 'default-value'], function() {
            Route::get('/', 'SettingsController@indexDefaultValue')->name('settings_default_value');
            Route::post('/', 'SettingsController@saveDefaultValue')->name('settings_default_value_save');
        });

        Route::group(['prefix' => 'module'], function() {
            Route::get('/', 'SettingsController@indexModule')->name('settings_module');
            Route::post('/', 'SettingsController@saveModule')->name('settings_module_save');
        });
        
        
        Route::group(['prefix' => 'user-types'], function() {
            Route::get('/', 'SettingsController@indexUserTypes')->name('settings_user_types');
            Route::get('/{id}', 'SettingsController@editUserTypes')->name('settings_user_types_edit');
            Route::post('/{id}', 'SettingsController@updateUserTypes')->name('settings_user_types_save');
            
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