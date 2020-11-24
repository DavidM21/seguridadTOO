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

#TEMPLATES CRUD ORGANIZACION

Route::get('crearOrganizacion', 'OrganizationController@create')->name('organizacion.create');
Route::get('organizaciones', 'OrganizationController@show')->name('organizacion.show');
Route::get('organizaciones/{organization}/editar', 'OrganizationController@edit')->name('organizacion.edit');
Route::patch('organizaciones/{organization}', 'OrganizationController@update')->name('organizacion.update');
Route::delete('organizaciones/{organization}', 'OrganizationController@destroy')->name('organizacion.destroy');
Route::post('organizaciones', 'OrganizationController@store')->name('organizacion.store');

#TEMPLATES CRUD EMPLEADO
Route::get('/empleados', function () {
    return view('crudEmpleado.mostrarEmpleado');
});

Route::get('/crearEmpleado', function () {
    return view('crudEmpleado.crearEmpleado');
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

