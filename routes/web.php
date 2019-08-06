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

Route::get('/', 'InicioController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('usuario', 'UsuarioController@index')->name('usuario');
    Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario');
    Route::get('usuario/{nombre?}/{pass?}', 'UsuarioController@index')->name('users');
});

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('usuario/{nombre?}/{pass?}', function ($name) {
//     return $name;
// })->where('nombre', '[A-Za-z]+')->name('users');