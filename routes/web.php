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



#TEMPLATES CRUD PUESTO
Route::get('/puestos', 'JobPositionController@index')->name('puestos.show');
Route::get('/crearPuesto', 'JobPositionController@create')->name('puestos.create');
Route::get('/editarPuesto/{jobPosition}', 'JobPositionController@edit')->name('puestos.edit');
Route::patch('/editarPuesto/{jobPosition}', 'JobPositionController@update')->name('puestos.update');
Route::delete('/puestos/{jobPosition}', 'JobPositionController@destroy')->name('puestos.destroy');
Route::post('/puestos', 'JobPositionController@store')->name('puestos.store');

#TEMPLATES CRUD EMPLEADO

#Route::get('/empleados', function () {
    #return view('crudEmpleado.mostrarEmpleado');
#});
Route::get('/empleados', 'EmployeeController@index')->name('empleado.show');
Route::get('/crearEmpleado', 'EmployeeController@create')->name('empleado.create');
Route::get('/editarEmpleado/{employee}', 'EmployeeController@edit')->name('empleado.edit');
Route::patch('/editarEmpleado/{employee}', 'EmployeeController@update')->name('empleado.update');
Route::delete('/empleados/{employee}', 'EmployeeController@destroy')->name('empleado.destroy');
Route::post('/crearEmpleado', 'EmployeeController@store')->name('empleado.store');


#
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

