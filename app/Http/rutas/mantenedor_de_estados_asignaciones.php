<?php
/* list */
Route::get('listarEstadoAsignacion',
    'Mantenedores\MantenedorDeEstadoAsignaciones@index')
    ->name('listarEstadoAsignacion');

Route::post('listarEstadoAsignacion',
    'Mantenedores\MantenedorDeEstadoAsignaciones@search')
    ->name('listarEstadoAsignacion');
/* create */
Route::get('insertarEstadoAsignacion',
    'Mantenedores\MantenedorDeEstadoAsignaciones@create')
    ->name('insertarEstadoAsignacion');

Route::post('insertarEstadoAsignacion',
    'Mantenedores\MantenedorDeEstadoAsignaciones@store')
    ->name('insertarEstadoAsignacion');

/* update */
Route::get('actualizarEstadoAsignacion/{id}',
    'Mantenedores\MantenedorDeEstadoAsignaciones@edit')
    ->name('actualizarEstadoAsignacion');

Route::post('actualizarEstadoAsignacion',
    'Mantenedores\MantenedorDeEstadoAsignaciones@update')
    ->name('actualizarEstadoAsignacion');

/* ver */
Route::get('verEstadoAsignacion/{id}',
    'Mantenedores\MantenedorDeEstadoAsignaciones@show')
    ->name('verEstadoAsignacion');

/*eliminar*/
Route::get('eliminarEstadoAsignacion/{id}',
    'Mantenedores\MantenedorDeEstadoAsignaciones@destroy')
    ->name('eliminarEstadoAsignacion');