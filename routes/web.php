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
//Route::get('', 'Admin\EmpresaController@getLogo')->name('getLogo');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    /*Rutas USUARIO*/
    Route::get('usuario', 'UsuarioController@index')->name('usuario');
    //Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario');
    Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario');
    //Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar_usuario');
    Route::put('usuario/{id}', 'UsuarioController@actualizar')->name('actualizar_usuario');
    Route::delete('usuario/{id}', 'UsuarioController@eliminar')->name('eliminar_usuario');
    //Route::get('usuario/{nombre?}/{pass?}', 'UsuarioController@index')->name('users');
    
    /*Rutas METODO_PAGO*/
    Route::get('metodo_pago', 'Metodo_pagoController@index')->name('metodo_pago');
    Route::post('metodo_pago', 'Metodo_pagoController@guardar')->name('guardar_metodo_pago');
    Route::put('metodo_pago/{id}', 'Metodo_pagoController@actualizar')->name('actualizar_metodo_pago');
    Route::delete('metodo_pago/{id}', 'Metodo_pagoController@eliminar')->name('eliminar_metodo_pago');
    
    /*Rutas PRODUCTO*/
    Route::get('producto', 'ProductoController@index')->name('producto');
    Route::post('producto', 'ProductoController@guardar')->name('guardar_producto');
    Route::put('producto/{id}', 'ProductoController@actualizar')->name('actualizar_producto');
    Route::delete('producto/{id}', 'ProductoController@eliminar')->name('eliminar_producto');

    /*Rutas ADDSTOCK*/
    //Route::get('producto', 'ProductoController@index')->name('producto');
    Route::post('stock', 'AddStockController@guardar')->name('guardar_stock');
    //Route::put('producto/{id}', 'ProductoController@actualizar')->name('actualizar_producto');
    //Route::delete('producto/{id}', 'ProductoController@eliminar')->name('eliminar_producto');

    /*Rutas OFERTA*/
    Route::get('oferta', 'OfertaController@index')->name('oferta');
    Route::post('oferta', 'OfertaController@guardar')->name('guardar_oferta');
    Route::put('oferta/{id}', 'OfertaController@actualizar')->name('actualizar_oferta');
    Route::delete('oferta/{id}', 'OfertaController@eliminar')->name('eliminar_oferta');

    /*Rutas CATEGORIA*/
    Route::get('categoria', 'CategoriaController@index')->name('categoria');
    Route::post('categoria', 'CategoriaController@guardar')->name('guardar_categoria');
    Route::put('categoria/{id}', 'CategoriaController@actualizar')->name('actualizar_categoria');
    Route::delete('categoria/{id}', 'CategoriaController@eliminar')->name('eliminar_categoria');

    /*Rutas CUPON*/
    Route::get('cupon', 'CuponController@index')->name('cupon');
    Route::post('cupon', 'CuponController@guardar')->name('guardar_cupon');
    Route::put('cupon/{id}', 'CuponController@actualizar')->name('actualizar_cupon');
    Route::delete('cupon/{id}', 'CuponController@eliminar')->name('eliminar_cupon');

    /*Rutas EMPRESA*/
    Route::get('empresa', 'EmpresaController@index')->name('empresa');
    //Route::post('empresa', 'EmpresaController@guardar')->name('guardar_empresa');
    Route::put('empresa/{id}', 'EmpresaController@actualizar')->name('actualizar_empresa');
    //Route::delete('empresa/{id}', 'EmpresaController@eliminar')->name('eliminar_empresa');

    /*Rutas CUENTA_BANCARIA*/
    Route::get('cuenta_bancaria', 'Cuenta_bancariaController@index')->name('cuenta_bancaria');
    Route::post('cuenta_bancaria', 'Cuenta_bancariaController@guardar')->name('guardar_cuenta_bancaria');
    Route::put('cuenta_bancaria/{id}', 'Cuenta_bancariaController@actualizar')->name('actualizar_cuenta_bancaria');
    Route::delete('cuenta_bancaria/{id}', 'Cuenta_bancariaController@eliminar')->name('eliminar_cuenta_bancaria');

    /*Rutas CORREO*/
    Route::get('correo', 'CorreoController@index')->name('correo');
    Route::post('correo', 'CorreoController@guardar')->name('guardar_correo');
    Route::put('correo/{id}', 'CorreoController@actualizar')->name('actualizar_correo');
    Route::delete('correo/{id}', 'CorreoController@eliminar')->name('eliminar_correo');
    
    /*Rutas OFERTA_PRODUCTO*/
    Route::get('oferta_producto', 'Oferta_productoController@index')->name('oferta_producto');
    Route::post('oferta_producto', 'Oferta_productoController@guardar')->name('guardar_oferta_producto');
    Route::put('oferta_producto/{id}', 'Oferta_productoController@actualizar')->name('actualizar_oferta_producto');
    Route::delete('oferta_producto/{id}', 'Oferta_productoController@eliminar')->name('eliminar_oferta_producto');


    /*Rutas USUARIO_SISTEMA*/
    Route::get('usuario_sistema', 'Usuario_sistemaController@index')->name('usuario_sistema');
    Route::post('usuario_sistema', 'Usuario_sistemaController@guardar')->name('guardar_usuario_sistema');
    Route::put('usuario_sistema/{id}', 'Usuario_sistemaController@actualizar')->name('actualizar_usuario_sistema');
    Route::delete('usuario_sistema/{id}', 'Usuario_sistemaController@eliminar')->name('eliminar_usuario_sistema');
    /*Rutas GALERIA*/
    //Route::get('galeria', 'GaleriaController@index')->name('galeria');
    Route::post('galeria', 'GaleriaController@guardar')->name('guardar_galeria');
    Route::put('galeria/edit/{id}', 'GaleriaController@actualizar')->name('actualizar_galeria');
    Route::get('galeria/imagenes/{id}', 'GaleriaController@getImagenes')->name('get_imagenes');
    Route::get('galeria/infoGal/{id}', 'GaleriaController@getInfoGaleria')->name('get_infoGaleria');
    Route::delete('galeria/imagenes/{name}', 'GaleriaController@eliminarImagen')->name('eliminar_imagen');
    //Route::delete('galeria/{id}', 'GaleriaController@eliminar')->name('eliminar_galeria');
    /*Rutas IMAGEN*/
    Route::get('imagen', 'ImagenController@index')->name('oferta_imagen');
    Route::post('imagen', 'ImagenController@guardar')->name('guardar_imagen');
    Route::put('imagen/{id}', 'ImagenController@actualizar')->name('actualizar_imagen');
    //Route::delete('imagen/{id}', 'ImagenController@eliminar')->name('eliminar_imagen');
});

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('usuario/{nombre?}/{pass?}', function ($name) {
//     return $name;
// })->where('nombre', '[A-Za-z]+')->name('users');