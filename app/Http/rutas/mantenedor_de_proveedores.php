<?php
/* list */
Route::get('listarProveedor',
    'Mantenedores\MantenedorDeProveedores@index')
    ->name('listarProveedor');

Route::post('listarProveedor',
    'Mantenedores\MantenedorDeProveedores@search')
    ->name('listarProveedor');
/* create */
Route::get('insertarProveedor',
    'Mantenedores\MantenedorDeProveedores@create')
    ->name('insertarProveedor');

Route::post('insertarProveedor',
    'Mantenedores\MantenedorDeProveedores@store')
    ->name('insertarProveedor');

/* update */
Route::get('actualizarProveedor/{id}',
    'Mantenedores\MantenedorDeProveedores@edit')
    ->name('actualizarProveedor');

Route::post('actualizarProveedor',
    'Mantenedores\MantenedorDeProveedores@update')
    ->name('actualizarProveedor');

/* ver */
Route::get('verProveedor/{id}',
    'Mantenedores\MantenedorDeProveedores@show')
    ->name('verRubro');

/*eliminar*/
Route::get('eliminarProveedor/{id}',
    'Mantenedores\MantenedorDeProveedores@destroy')
    ->name('eliminarRubro');