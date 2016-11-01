<?php
/*
|--------------------------------------------------------------------------
| REFERENCIAS DE LAS CLAVES  (CLAVE) => (VALOR)
|--------------------------------------------------------------------------
|   i   	: Para todos los tipos de imputs.
|   l   	: Para todos los tipos de labels.
|   isd 	: Para los valores por defecto de un select. (ej: ingrese ciudades)
|   cl  	: para un label o texto de un check.
|   tit 	: para un título de la vista (tit_nombreDeLaVista)
|   ph 		: para un placeholder de un input text.
|   btn		: para un boton.
|   th		: para un titulo de una columna de una tabla.
|   msj		: para un mensaje.
|   tt		: para un tooltip.
|   tp		: para un titulo de un panel.
|   jal		: para un alerta de javascript.
|   lvm		: para el lavel de ver mas .
|
|
*/
// trans( 'ingr_compra.msj_ingresado_1' )
// {{ trans( 'ingr_compra.xxxxxxxxx' ) }}
return[
    'tit_ingresar_compra'           => 'Asignar activo',
    'btn_eliminar'	                => 'Eliminar',
    'btn_salir'		                => 'Salir',
    'btn_agregar'		            => 'Agregar',

    'tp_compra_n'                   => 'Compra Nº:',
    'isd_categoria'         => 'Seleccione una categoría',
    'isd_proveedor'         => 'Seleccione un proveedor',
    'l_categoria'           => 'Categoría',
    'l_proveedor'           => 'Proveedor',
    'l_nombre_activo'       => 'Nombre del Activo',
    'l_precio_activo'       => 'Precio del activo',
    'l_descripcion'         => 'Descripción',

    'ph_nombre_activo'      => 'ingrese nombre activo',
    'ph_descipcion_activo'  => 'Ingrese la descripción del activo',

    'th_codigo'             => 'Código',
    'th_nombre'             => 'Nombre',
    'th_precio'             => 'Precio',
    'th_accion'             => 'Acción',
    'jal_confirm_elmnar'    => 'Se eliminará el activo: ',

    'msj_eliminado_1'       => 'El activo: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminado. ',

    'msj_ingresado_1'       => 'El activo: ',
    'msj_ingresado_2'       => ', ha sido correctamente ingresado. ',

    'msj_category_id_requerido'      => 'La categoría es requerida. ',
    'msj_asset_name_requerido'       => 'El activo es requerido. ',
    'msj_asset_price_requerido'      => 'El precio es requerido. ',
    'supplier_id_id_requerido'       => 'El proveedor es requerido.. ',

];
