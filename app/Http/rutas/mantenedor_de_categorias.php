<?php
/* list */
Route::get('/listarCategorias',
    'Mantenedores\MantenedorDeCategorias@index')
    ->name('listarCategorias');

Route::post('/listarCategorias',
    'Mantenedores\MantenedorDeCategorias@search')
    ->name('listarCategorias');

/* create */
Route::get('insertarCategorias',
    'Mantenedores\MantenedorDeCategorias@create')
    ->name('insertarCategoria');

Route::post('insertarCategorias',
    'Mantenedores\MantenedorDeCategorias@store')
    ->name('insertarCategoria');

/* update */
Route::get('actualizarCategorias/{id}',
    'Mantenedores\MantenedorDeCategorias@edit')
    ->name('actualizarCategorias');

Route::post('actualizarCategorias',
    'Mantenedores\MantenedorDeCategorias@update')
    ->name('actualizarCategorias');

/* ver */
Route::get('verCategorias/{id}',
    'Mantenedores\MantenedorDeCategorias@show')
    ->name('verCategorias');

/*eliminar*/
Route::get('eliminarCategorias/{id}',
    'Mantenedores\MantenedorDeCategorias@destroy')
    ->name('eliminarCategorias');