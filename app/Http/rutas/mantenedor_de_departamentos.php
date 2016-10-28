<?php
/* list */
Route::get('/listarDepartamentos',
    'Mantenedores\MantenedorDeDepartamentos@index')
    ->name('listarDepartamentos');

Route::post('/listarDepartamentos',
    'Mantenedores\MantenedorDeDepartamentos@search');

/* create */
Route::get('/ingresarDepartamento',
    'Mantenedores\MantenedorDeDepartamentos@create')
    ->name('ingresarDepartamento');

Route::post('/ingresarDepartamento',
    'Mantenedores\MantenedorDeDepartamentos@store');

/* update */
Route::get('actualizarDepartamento/{id}',
    'Mantenedores\MantenedorDeDepartamentos@edit')
    ->name('actualizarDepartamento');

Route::post('actualizarDepartamento',
    'Mantenedores\MantenedorDeDepartamentos@update')
    ->name('actualizarDepartamento');

/* ver */
Route::get('verDepartamento/{id}',
    'Mantenedores\MantenedorDeDepartamentos@show')
    ->name('verDepartamento');

/* eliminar */
Route::get('eliminarDepartamento/{id}',
    'Mantenedores\MantenedorDeDepartamentos@show')
    ->name('verDepartamento');