<?php
/* list */
Route::get('listarCiudad',
    'Mantenedores\MantenedorDeCiudades@index')
    ->name('listarCiudad');

Route::post('listarCiudad',
    'Mantenedores\MantenedorDeCiudades@search')
    ->name('listarCiudad');
/* create */
Route::get('insertarCiudad',
    'Mantenedores\MantenedorDeCiudades@create')
    ->name('insertarCiudad');

Route::post('insertarCiudad',
    'Mantenedores\MantenedorDeCiudades@store')
    ->name('insertarCiudad');

/* update */
Route::get('actualizarCiudad/{id}',
    'Mantenedores\MantenedorDeCiudades@edit')
    ->name('actualizarCiudad');

Route::post('actualizarCiudad',
    'Mantenedores\MantenedorDeCiudades@update')
    ->name('actualizarCiudad');

/* ver */
Route::get('verCiudad/{id}',
    'Mantenedores\MantenedorDeCiudades@show')
    ->name('verCiudad');

/*eliminar*/
Route::get('eliminarCiudad/{id}',
    'Mantenedores\MantenedorDeCiudades@destroy')
    ->name('eliminarCiudad');