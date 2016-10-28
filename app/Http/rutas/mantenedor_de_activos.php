<?php
/* list */
Route::get('/listarActivo',
    'Mantenedores\MantenedorDeActivos@index')
    ->name('listarActivo');
Route::post('/listarActivo',
    'Mantenedores\MantenedorDeActivos@search')
    ->name('listarActivo');

/* update */
Route::get('actualizarActivo/{id}',
    'Mantenedores\MantenedorDeActivos@edit')
    ->name('actualizarActivo');

Route::post('actualizarActivo/{id}',
    'Mantenedores\MantenedorDeActivos@actionEdit')
    ->name('actualizarActivo');

/* ver */
Route::get('verActivo/{id}',
    'Mantenedores\MantenedorDeActivos@show')
    ->name('verActivo');