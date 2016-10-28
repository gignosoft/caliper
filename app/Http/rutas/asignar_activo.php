<?php
Route::get('asignarActivo',
    'Gestiones\AsignarActivo@index')
    ->name('asignarActivo');

Route::post('asignarActivo',
    'Gestiones\AsignarActivo@search')
    ->name('asignarActivo');

Route::get('crearActivo/{id}',
    'Gestiones\AsignarActivo@create')
    ->name('crearActivo');

Route::post('crearActivo',
    'Gestiones\AsignarActivo@asignar')
    ->name('crearActivo');

Route::get('eliminarAsignacion/{id}',
    'Gestiones\AsignarActivo@destroy')
    ->name('eliminarAsignacion');

Route::get('entregaActivo/{id}',
    'Gestiones\AsignarActivo@edit')
    ->name('entregaActivo');

Route::post('entregaActivo',
    'Gestiones\AsignarActivo@update')
    ->name('entregaActivo');

// para el combo de activos
Route::get('cargaActivo/{id}',
    'Gestiones\AsignarActivo@cargaActivo')
    ->name('cargaActivo');