<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA state_assignments
|--------------------------------------------------------------------------
|   name  : Este campo guarda el nombre del estado de la asignación.
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

// {{ trans( 'mant_state_assignments.xxxxxxxxx' ) }}

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

    'tp_datos_g1'			    => 'Datos del estado de asignación',

    /* Listar */
    'tit_listar'				=> 'Mantenedor de estados de asignaciones.',

    'th_name'                   => 'Nombre',
    'th_accion'					=> 'Acción',

    'msj_no_encontrado'         => 'No hay resultados.',



    'jal_confirm_elmnar'        => 'Se eliminará el estado de asignacion: ',

    /* Insertar - actualizar */
    'tit_insertar'				=> 'Ingresar nuevo estado de asignación.',
    'tit_actualizar'			=> 'Actualizar estado de asignación.',

    'msj_name_required'         => 'El nombre es requerido',
    'msj_ingresado'             => 'El estado de asignación ha sido ingresado exitosamente',
    'msj_actualizado'           => 'El estado de asignación ha sido actualizado exitosamente',

    'l_name'					=> 'Nombre',

    /* ver */
    'tp_ver'				=> 'Detalles del estado de asignación.',

    'lvm_nombre'            => 'Nombre',
    'lvm_rel_1'             => 'Asignaciones',

    'msj_sin'               => 'Sin Asignaciones asociadas.',

    'jal_confirm_elmnar'    => 'Se eliminará el estado de asignación: ',
    'jal_confirm_elmnar_no' => 'El estado de asignación no se puede eliminar ya que posee Asignaciones asociadas',

    'msj_eliminado_1'       => 'El estado de asignación: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminado.',

];

