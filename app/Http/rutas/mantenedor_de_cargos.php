<?php
/* list */
Route::get('/listarCargo',
    'Mantenedores\MantenedorDeCargos@index')
    ->name('listarCargo');

Route::post('/listarCargo',
    'Mantenedores\MantenedorDeCargos@search');

/* create */
Route::get('ingresarCargo',
    'Mantenedores\MantenedorDeCargos@create')
    ->name('ingresarCargo');

Route::post('ingresarCargo',
    'Mantenedores\MantenedorDeCargos@store')
    ->name('ingresarCargo');

/* update */
Route::get('actualizarCargo/{id}',
    'Mantenedores\MantenedorDeCargos@actualizar')
    ->name('actualizarCargo');

Route::post('actualizarCargo',
    'Mantenedores\MantenedorDeCargos@accionActualizar')
    ->name('actualizarCargo');

/* ver */
Route::get('verCargo/{id}',
    'Mantenedores\MantenedorDeCargos@ver')
    ->name('verCargo');

/* delete */
Route::get('eliminarCargo/{id}',
    'Mantenedores\MantenedorDeCargos@eliminar')
    ->name('eliminarCargo');