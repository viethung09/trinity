<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
   Route::get('dashboard', 'DashboardController@index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('deb', function() {
    dd($renderer = Debugbar::getJavascriptRenderer());
});

Route::get('settings', function() {
//    return App\Models\User::all();
//    dd(App\Models\User::first()->settings());

//    settings()->set('gender', 'Male');
//    settings()->set('home_page', 'http://trinity.vn');
//    return App\Models\User::first();


});


