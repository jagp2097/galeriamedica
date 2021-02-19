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

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin-dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	//Password reset routes admin
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});*/

Route::get('/', 'PacienteController@index');

// Rutas del programa
Route::resource('paciente', 'PacienteController');
Route::resource('album', 'AlbumController');
Route::get('archivo/download', 'ArchivoController@download')->name('archivo.download');
Route::resource('archivo', 'ArchivoController');
Route::resource('user', 'UserController');
Route::get('password/{user}', 'UserController@password')->name('user.password');
Route::put('password/update', 'UserController@passwordUpdate')->name('user.passwordUpdate');
Route::get('user/{user}/rol', 'UserController@rol')->name('user.rol');
Route::put('rol/update', 'UserController@rolUpdate')->name('user.rolUpdate');


/*

Route::get('/log', function () {
	return view('login.login');
});


Route::get('/rol', function () {
	return view('roles.create');
});


Route::get('mi-prueba-de-ruta', function() {
    echo "esto es una ruta de prueba";
})->name('ruta.prueba');

*/