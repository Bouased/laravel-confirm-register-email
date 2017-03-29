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

Route::group([
	'namespace'  => 'Site' ,  // Controllers Within The "App\Http\Controllers\Site" Namespace
    'prefix'     => 'site' ,  // Matches The "/site/users" URL
    'as'         => 'site.',  // action
   // 'middleware' => 'auth'
], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group([
        'namespace' => 'Auth', //App\Http\Controllers\Site\Auth
    ], function () {
        // Authentication Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset');

        // Email confirmation 
        Route::get('confirmation/resend', 'RegisterController@resend');
        Route::get('confirmation/{id}/{token}', 'RegisterController@confirm');
    });


});

Route::group([
	'namespace'  => 'Admin' ,  // Controllers Within The "App\Http\Controllers\Admin" Namespace
    'prefix'     => 'admin' ,  // Matches The "/admin/users" URL
    'as'         => 'admin.',  // action
    //'middleware' => 'auth.admin'
], function() {

    // main page for the admin section (app/views/admin/dashboard.blade.php)
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group([
        'namespace' => 'Auth', //App\Http\Controllers\Admin\Auth
    ], function () {
        // Authentication Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset');

        // Email confirmation 
        Route::get('confirmation/resend', 'RegisterController@resend');
        Route::get('confirmation/{id}/{token}', 'RegisterController@confirm');        
    });

});

