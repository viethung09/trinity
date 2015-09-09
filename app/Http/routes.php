<?php

Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');


Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {

    Route::pattern('id', '[0-9]+');
    Route::get('dashboard', 'DashboardController@index');
    Route::get('pages', 'PagesController@index');

    Route::get('{name?}', 'TrinityController@showView');

});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

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


