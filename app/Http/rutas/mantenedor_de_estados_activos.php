<?php
/* list */
Route::get('listarEstadoActivo',
    'Mantenedores\MantenedorDeEstadoActivos@index')
    ->name('listarEstadoActivo');

Route::post('listarEstadoActivo',
    'Mantenedores\MantenedorDeEstadoActivos@search')
    ->name('listarEstadoActivo');

/* create */
Route::get('insertarEstadoActivo',
    'Mantenedores\MantenedorDeEstadoActivos@create')
    ->name('insertarEstadoActivo');

Route::post('insertarEstadoActivo',
    'Mantenedores\MantenedorDeEstadoActivos@store')
    ->name('insertarEstadoActivo');

/* update */
Route::get('actualizarEstadoActivo/{id}',
    'Mantenedores\MantenedorDeEstadoActivos@edit')
    ->name('actualizarEstadoActivo');

Route::post('actualizarEstadoActivo',
    'Mantenedores\MantenedorDeEstadoActivos@update')
    ->name('actualizarEstadoActivo');

/* ver */
Route::get('verEstadoActivo/{id}',
    'Mantenedores\MantenedorDeEstadoActivos@show')
    ->name('verEstadoActivo');

/*eliminar*/
Route::get('eliminarEstadoActivo/{id}',
    'Mantenedores\MantenedorDeEstadoActivos@destroy')
    ->name('eliminarEstadoActivo');