<?php
/* list */
Route::get('listarRol',
    'Mantenedores\MantenedorDeRoles@index')
    ->name('listarRol');

Route::post('listarRol',
    'Mantenedores\MantenedorDeRoles@search')
    ->name('listarRol');
/* create */
Route::get('insertarRol',
    'Mantenedores\MantenedorDeRoles@create')
    ->name('insertarRol');

Route::post('insertarRol',
    'Mantenedores\MantenedorDeRoles@store')
    ->name('insertarRol');

/* update */
Route::get('actualizarRol/{id}',
    'Mantenedores\MantenedorDeRoles@edit')
    ->name('actualizarRol');

Route::post('actualizarRol',
    'Mantenedores\MantenedorDeRoles@update')
    ->name('actualizarRol');

/* ver */
Route::get('verRol/{id}',
    'Mantenedores\MantenedorDeRoles@show')
    ->name('verRol');

/*eliminar*/
Route::get('eliminarRol/{id}',
    'Mantenedores\MantenedorDeRoles@destroy')
    ->name('eliminarRol');