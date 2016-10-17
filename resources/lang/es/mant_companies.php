<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA COMPANIES
|--------------------------------------------------------------------------
|   name        : Este campo guarda el nombre de la empresa.
|   identifier  : Este campo guarda el rut de la empresa.
|   activity_id : Este campo guarda la referencia a la tabla actividad.
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

// {{ trans( 'mant_companies.xxxxxxxxx' ) }}

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
    'ph_identifier'             => 'RUT. ej: 14940929-7',


    'tp_datos_g1'			    => 'Datos de la empresa',

    /* Listar */
    'tit_listar'				=> 'Mantenedor de empresas',

    'th_name'                   => 'Nombre',
    'th_id'                     => 'RUT.',
    'th_accion'					=> 'Acción',

    'msj_no_encontrado'         => 'No hay resultados.',



    'jal_confirm_elmnar'        => 'Se eliminará la empresa: ',

    /* Insertar - actualizar */
    'tit_insertar'				=> 'Ingresar nueva empresa.',
    'tit_actualizar'			=> 'Actualizar empresa.',

    'msj_name_required'         => 'El nombre es requerido',
    'msj_identifier_required'   => 'El rut es requerido',
    'msj_ingresado'             => 'La empresa ha sido ingresada exitosamente',
    'msj_actualizado'           => 'La empresa ha sido actualizada exitosamente',

    'l_name'					=> 'Nombre',
    'l_id'					    => 'Rut',
    'l_rubro'					=> 'Rubro o giro',

    /* ver */
    'tp_ver'				=> 'Detalles de la empresa.',

    'lvm_nombre'            => 'Nombre',
    'lvm_rubro'             => 'Robro o giro',
    'lvm_r_1'               => 'Proveedores',

    'msj_sin'               => 'Sin Proveedores asociadas.',

    'jal_confirm_elmnar'    => 'Se eliminará La empresa: ',
    'jal_confirm_elmnar_no' => 'La empresa no se puede eliminar, ya que posee proveedores asociadas',

    'msj_eliminado_1'       => 'La empresa: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminada.',

];

