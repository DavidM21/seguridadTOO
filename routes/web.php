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


/*
Route::get('/', function () {
    return view('welcome');
})->name('/');
*/

Route::group(['prefix'=>'business', 'middleware'=>'permission:Gestor Organizaciones'], function (){
    #TEMPLATES CRUD ORGANIZACION
    Route::get('organizations', 'OrganizationController@show')->name('organizacion.show');

    Route::get('organizations/create', 'OrganizationController@create')->name('organizacion.create');
    Route::post('organizations/store', 'OrganizationController@store')->name('organizacion.store');

    Route::get('organizations/{organization}/edit', 'OrganizationController@edit')->name('organizacion.edit');
    Route::patch('organizations/{organization}', 'OrganizationController@update')->name('organizacion.update');

    Route::get('organizations/{organization}/confirm', 'OrganizationController@confirm')->name('organizacion.confirm');
    Route::delete('organizations/{organization}', 'OrganizationController@destroy')->name('organizacion.destroy');
});

Route::group(['prefix'=>'business', 'middleware'=>'permission:Gestor Departamentos'], function (){
    #TEMPLATES CRUD DEPARTAMENTO
    Route::get('departments', 'DepartmentController@show')->name('departamento.show');

    Route::get('departments/create', 'DepartmentController@create')->name('departamento.create');
    Route::post('departments/store', 'DepartmentController@store')->name('departamento.store');

    Route::get('departments/{department}/edit', 'DepartmentController@edit')->name('departamento.edit');
    Route::patch('departments/{department}', 'DepartmentController@update')->name('departamento.update');

    Route::get('departments/{department}/confirm', 'DepartmentController@confirm')->name('departamento.confirm');
    Route::delete('departments/{department}', 'DepartmentController@destroy')->name('departamento.destroy');

});

Route::group(['prefix'=>'business', 'middleware'=>'permission:Gestor Secciones'], function (){
    #TEMPLATES CRUD SECCION
    Route::get('sections', 'SectionController@show')->name('seccion.show');
#TEMPLATES CRUD ORGANIZACION

    Route::get('sections/create', 'SectionController@create')->name('seccion.create');
    Route::post('sections/store', 'SectionController@store')->name('seccion.store');

    Route::get('sections/{section}/edit', 'SectionController@edit')->name('seccion.edit');
    Route::patch('sections/{section}', 'SectionController@update')->name('seccion.update');

    Route::get('sections/{section}/confirm', 'SectionController@confirm')->name('seccion.confirm');
    Route::delete('sections/{section}', 'SectionController@destroy')->name('seccion.destroy');
});

Route::group(['prefix'=>'business', 'middleware'=>'permission:Gestor Puestos'], function (){
    #TEMPLATES CRUD PUESTO
    Route::get('/jobpositions', 'JobPositionController@index')->name('puestos.show');

    Route::get('/jobpositions/create', 'JobPositionController@create')->name('puestos.create');
    Route::post('/jobpositions/store', 'JobPositionController@store')->name('puestos.store');

    Route::get('/jobpositions/{jobPosition}', 'JobPositionController@edit')->name('puestos.edit');
    Route::patch('/jobpositions/{jobPosition}', 'JobPositionController@update')->name('puestos.update');

    Route::get('/jobpositions/{jobPosition}/confirm', 'JobPositionController@confirm')->name('puestos.confirm');
    Route::delete('/jobpositions/{jobPosition}', 'JobPositionController@destroy')->name('puestos.destroy');
});

Route::group(['prefix'=>'business', 'middleware'=>'permission:Gestor Empleados'], function (){
    #TEMPLATES CRUD EMPLEADO
    Route::get('/employees', 'EmployeeController@index')->name('empleado.show');

    Route::get('/employees/create', 'EmployeeController@create')->name('empleado.create');
    Route::post('/employees/store', 'EmployeeController@store')->name('empleado.store');

    Route::get('/employees/{employee}/edit', 'EmployeeController@edit')->name('empleado.edit');
    Route::patch('/editarEmpleado/{employee}', 'EmployeeController@update')->name('empleado.update');

    Route::get('/employees/{employee}/confirm', 'EmployeeController@confirm')->name('empleado.confirm');
    Route::delete('/employees/{employee}', 'EmployeeController@destroy')->name('empleado.destroy');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('auth/2fa', 'Auth\LoginController@login')->name('auth.2fa');


Route::post('/login-two-factor/{user}', 'Auth\LoginController@login2FA')->name('login.2fa');

/* INICIO SOSA */

Auth::routes(['verify' => true]);


Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login_post');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout') ;

Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register_post');

Route::get('/verify/{id}', 'Auth\VerificationController@resendEmail')->name('verify.resend');

// Super Administrador & Administrador

// Roles

Route::group(['prefix'=>'super', 'namespace'=>'super', 'middleware'=>'role:Super Administrador'], function(){
    Route::resource('roles', 'RolesController');
    Route::get('/roles/{id}/confirm', 'RolesController@confirm')->name('roles.confirm');
});

// Users
Route::group(['prefix'=>'admin', 'namespace'=>'super', 'middleware'=>'role:Super Administrador|Administrador'], function (){
    Route::resource('users', 'UsersController');
    Route::get('/users/{id}/confirm', 'UsersController@confirm')->name('users.confirm');
});
/* FIN SOSA */

//Cris
Route::get('/estadistica', 'ActivityStatisticController@mostrarestadistica')->name('estadistica.mostrarestadistica');
Route::get('/estadistica/search', 'ActivityStatisticController@search')->name('estadistica.search');

Route::get('/estado', 'ActivityStatisticController@mostrarestado')->name('estado.mostrarestado');


//Route::get('/password/reset', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

//Cris Password expiracion

Route::middleware(['auth'])->group(function () {
    Route::middleware(['password_expired'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });
    Route::get('password/expired', 'Auth\ExpiredPasswordController@expired')
        ->name('password.expired');
    Route::post('password/post_expired', 'Auth\ExpiredPasswordController@postExpired')
        ->name('password.post_expired');
});
//Final Cris
