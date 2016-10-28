<?php
/* list */
Route::get('listarRubro',
    'Mantenedores\MantenedorDeRubros@index')
    ->name('listarRubro');

Route::post('listarRubro',
    'Mantenedores\MantenedorDeRubros@search')
    ->name('listarRubro');
/* create */
Route::get('insertarRubro',
    'Mantenedores\MantenedorDeRubros@create')
    ->name('insertarRubro');

Route::post('insertarRubro',
    'Mantenedores\MantenedorDeRubros@store')
    ->name('insertarRubro');

/* update */
Route::get('actualizarRubro/{id}',
    'Mantenedores\MantenedorDeRubros@edit')
    ->name('actualizarRubro');

Route::post('actualizarRubro',
    'Mantenedores\MantenedorDeRubros@update')
    ->name('actualizarRubro');

/* ver */
Route::get('verRubro/{id}',
    'Mantenedores\MantenedorDeRubros@show')
    ->name('verRubro');

/*eliminar*/
Route::get('eliminarRubro/{id}',
    'Mantenedores\MantenedorDeRubros@destroy')
    ->name('eliminarRubro');