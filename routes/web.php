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
Auth::routes(['verify' => true]);

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login_post');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout') ;

Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register_post');

//super
Route::get('/super/roles', 'super\RolesController@index')->name('roles.index');

Route::get('/super/roles/create', 'super\RolesController@create')->name('roles.create');
Route::post('/super/roles/store', 'super\RolesController@store')->name('roles.store');

Route::get('/super/roles/{id}/edit', 'super\RolesController@edit')->name('roles.edit');
Route::patch('/super/roles/{id}', 'super\RolesController@update')->name('roles.update');

Route::get('/super/roles/{id}/confirm', 'super\RolesController@confirm')->name('roles.confirm');
Route::delete('/super/roles/{id}' , 'super\RolesController@destroy')->name('roles.destroy');


Route::get('/users', 'Super\UsersController@index')->name('users.index');

Route::get('/users/create', 'super\UsersController@create')->name('users.create');




//Route::get('/verify', 'Auth\RegisterController@verify')->name('verify');


/* FIN SOSA */

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


