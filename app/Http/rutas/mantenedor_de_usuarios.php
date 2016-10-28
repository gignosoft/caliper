<?php
/* list */
Route::get('/listarUsuario',
    'Mantenedores\MantenedorDeUsuarios@listarTodos')
    ->name('listarUsuario');

Route::post('/listarUsuario',
    'Mantenedores\MantenedorDeUsuarios@buscarUsuario');

/* create */
Route::get('/ingresarUsuario',
    'Mantenedores\MantenedorDeUsuarios@ingresarUsuario')
    ->name('ingresarUsuario');

Route::post('/ingresarUsuario',
    'Mantenedores\MantenedorDeUsuarios@accionIngresarUsuario');


/* update */
Route::get('actualizarUsuario/{id}',
    'Mantenedores\MantenedorDeUsuarios@actualizar')
    ->name('actualizarUsuario');

Route::post('actualizarUsuario/{id}',
    'Mantenedores\MantenedorDeUsuarios@accionActializarUsuario')
    ->name('actualizarUsuario');

Route::get('/restablecerContrasenia/{id}',
    'Mantenedores\MantenedorDeUsuarios@restablecerContrasenia')
    ->name('restablecerContrasenia');

/* delete */
Route::get('eliminarUsuario/{id}',
    'Mantenedores\MantenedorDeUsuarios@eliminarUsuario')
    ->name('eliminarUsuario');

/* ver */
Route::get('/verUsuario/{id}',
    'Mantenedores\MantenedorDeUsuarios@verUsuario')
    ->name('verUsuario');

// CARGA EL COMBO CIUDAD CON EL ID DEL PAÍS
Route::get('/cargaCiudadUsuario/{id}',
    'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');

Route::post('/cargaCiudadUsuario',
    'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');