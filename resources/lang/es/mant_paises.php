<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA PAÍSES
|--------------------------------------------------------------------------
|   name  : Este campo guarda el nombre del País.
|
*/

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

// {{ trans( 'mant_paises.msj_ingresado' ) }}

return[
    'btn_buscar'					=> 'Buscar',
    'btn_nuevo'						=> 'Nuevo',
    'btn_salir'						=> 'Salir',
    'btn_volver'					=> 'Volver',
    'btn_guardar'					=> 'Guardar',

    'tt_Editar'						=> 'Editar',
    'tt_ver_mas'					=> 'Ver más',
    'tt_Eliminar'					=> 'Eliminar',

    'ph_name'                   => 'Ingrese el nombre.',

    'tp_datos_g1'			    => 'Datos del País',

    /* Listar */
    'tit_listar'				=> 'Mantenedor de Países.',

    'th_name'                   => 'Nombre',
    'th_accion'					=> 'Acción',

    'msj_no_encontrado'         => 'No hay resultados.',



    'jal_confirm_elmnar'        => 'Se eliminará el País: ',

    /* Insertar - actualizar */
    'tit_insertar'				=> 'Ingresar nuevo País.',
    'tit_actualizar'			=> 'Actualizar País.',

    'msj_name_required'         => 'El nombre es requerido',
    'msj_ingresado'             => 'El País ha sido ingresado exitosamente',
    'msj_actualizado'           => 'El País ha sido actualizado exitosamente',

    'l_name'					=> 'Nombre',

    /* ver */
    'tp_ver'				=> 'Detalles del País.',

    'lvm_nombre'            => 'Nombre',
    'lvm_r_1'               => 'Ciudades',
    'lvm_sele_pais'         => 'Seleccionar País',


    'msj_sin'               => 'Sin ciudades asociadas.',

    'jal_confirm_elmnar'    => 'Se eliminará el País: ',
    'jal_confirm_elmnar_no' => 'El País no se puede eliminar, ya que posee ciudades asociadas',

    'msj_eliminado_1'       => 'El País: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminado.',

];

