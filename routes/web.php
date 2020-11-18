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

/**
 * Route::view('/url','view');
 */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/base', function () {
    return view('base');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/loginTemplate', function () {
    return view('loginTemplate');
});

Route::get('/registrar', function () {
    return view('registrarUsuario');
});

Route::get('/contraseña', function () {
    return view('restaurarPassword');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/2fa', 'Auth\LoginController@login')->name('auth.2fa');


Route::post('/login-two-factor/{user}', 'Auth\LoginController@login2FA')->name('login.2fa');

/* INICIO SOSA */

/*Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');*/

Route::get('/auth/login', 'Auth2\LoginController@index')->name('login');
Route::post('/auth/login', 'Auth2\LoginController@login')->name('login_post');
Route::post('/auth/logout', 'Auth2\LoginController@logout')->name('logout') ;


/* FIN SOSA */
