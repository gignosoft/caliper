<?php
/* list */
Route::get('/listarNivelDepartamento',
    'Mantenedores\MantenedorDeNivelesDepartamentos@listarTodos')
    ->name('listarNivelDepartamento');

Route::post('/listarNivelDepartamento',
    'Mantenedores\MantenedorDeNivelesDepartamentos@buscar');

/* create */
Route::get('/ingresarNivelDepartamento',
    'Mantenedores\MantenedorDeNivelesDepartamentos@ingresar')
    ->name('ingresarNivelDepartamento');


/* delete */
Route::get('eliminarNivelDepartamento/{id}',
    'Mantenedores\MantenedorDeNivelesDepartamentos@eliminar')
    ->name('eliminarNivelDepartamento');

/* ver */
Route::get('/verNivelDepartamento/{id}',
    'Mantenedores\MantenedorDeNivelesDepartamentos@ver')
    ->name('verNivelDepartamento');