<?php

Route::get('ingresarCompra/{codigo}',
    'Gestiones\ingresoDeCompra@index')
    ->name('ingresarCompra');

Route::post('ingresarCompra',
    'Gestiones\ingresoDeCompra@create')
    ->name('ingresarCompra');

Route::get('eliminarActivo/{id}',
    'Gestiones\ingresoDeCompra@destroy')
    ->name('eliminarActivo');



// debub
Route::get('prueba_1_1/{user}',
    'Gestiones\ingresoDeCompra@idUltimaCompraDelUsuario');