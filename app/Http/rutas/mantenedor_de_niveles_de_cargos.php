<?php
/* list */
Route::get('/listarNivelCargo',
    'Mantenedores\MantenedorDeNivelesCargos@listarTodos')
    ->name('listarNivelCargo');

Route::post('/listarNivelCargo',
    'Mantenedores\MantenedorDeNivelesCargos@buscar');

/* create */
Route::get('/ingresarNivelCargo',
    'Mantenedores\MantenedorDeNivelesCargos@ingresar')
    ->name('ingresarNivelCargo');

/* delete */
Route::get('eliminarNivelCargo/{id}',
    'Mantenedores\MantenedorDeNivelesCargos@eliminar')
    ->name('eliminarNivelCargo');

/* ver */
Route::get('/verNivelCargo/{id}',
    'Mantenedores\MantenedorDeNivelesCargos@ver')
    ->name('verNivelCargo');