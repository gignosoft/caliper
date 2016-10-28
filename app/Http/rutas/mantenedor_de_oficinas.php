<?php
/* list */
Route::get('listarOficina',
    'Mantenedores\MantenedorDeOficinas@index')
    ->name('listarOficina');

Route::post('listarOficina',
    'Mantenedores\MantenedorDeOficinas@search')
    ->name('listarOficina');
/* create */
Route::get('insertarOficina',
    'Mantenedores\MantenedorDeOficinas@create')
    ->name('insertarOficina');

Route::post('insertarOficina',
    'Mantenedores\MantenedorDeOficinas@store')
    ->name('insertarOficina');

/* update */
Route::get('actualizarOficina/{id}',
    'Mantenedores\MantenedorDeOficinas@edit')
    ->name('actualizarOficina');

Route::post('actualizarOficina',
    'Mantenedores\MantenedorDeOficinas@update')
    ->name('actualizarOficina');

/* ver */
Route::get('verOficina/{id}',
    'Mantenedores\MantenedorDeOficinas@show')
    ->name('verOficina');

/*eliminar*/
Route::get('eliminarOficina/{id}',
    'Mantenedores\MantenedorDeOficinas@destroy')
    ->name('eliminarOficina');