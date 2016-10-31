<?php
/* list */
Route::get('listarPais',
    'Mantenedores\MantenedorDePaises@index')
    ->name('listarPais');

Route::post('listarPais',
    'Mantenedores\MantenedorDePaises@search')
    ->name('listarPais');
/* create */
Route::get('insertarPais',
    'Mantenedores\MantenedorDePaises@create')
    ->name('insertarPais');

Route::post('insertarPais',
    'Mantenedores\MantenedorDePaises@store')
    ->name('insertarPais');

/* update */
Route::get('actualizarPais/{id}',
    'Mantenedores\MantenedorDePaises@edit')
    ->name('actualizarPais');

Route::post('actualizarPais',
    'Mantenedores\MantenedorDePaises@update')
    ->name('actualizarPais');

/* ver */
Route::get('verPais/{id}',
    'Mantenedores\MantenedorDePaises@show')
    ->name('verPais');

/*eliminar*/
Route::get('eliminarPais/{id}',
    'Mantenedores\MantenedorDePaises@destroy')
    ->name('eliminarPais');