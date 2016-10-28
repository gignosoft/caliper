<?php
/* list */
Route::get('listarEmpresa',
    'Mantenedores\MantenedorDeEmpresas@index')
    ->name('listarEmpresa');

Route::post('listarEmpresa',
    'Mantenedores\MantenedorDeEmpresas@search')
    ->name('listarEmpresa');
/* create */
Route::get('insertarEmpresa',
    'Mantenedores\MantenedorDeEmpresas@create')
    ->name('insertarEmpresa');

Route::post('insertarEmpresa',
    'Mantenedores\MantenedorDeEmpresas@store')
    ->name('insertarEmpresa');

/* update */
Route::get('actualizarEmpresa/{id}',
    'Mantenedores\MantenedorDeEmpresas@edit')
    ->name('actualizarEmpresa');

Route::post('actualizarEmpresa',
    'Mantenedores\MantenedorDeEmpresas@update')
    ->name('actualizarEmpresa');

/* ver */
Route::get('verEmpresa/{id}',
    'Mantenedores\MantenedorDeEmpresas@show')
    ->name('verEmpresa');

/*eliminar*/
Route::get('eliminarEmpresa/{id}',
    'Mantenedores\MantenedorDeEmpresas@destroy')
    ->name('eliminarEmpresa');
