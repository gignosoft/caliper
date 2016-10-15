<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA ROLES
|--------------------------------------------------------------------------
|   name            : Este campo guarda el nombre de la oficina.
|   description     : Este campo guarda la descripcion de la oficina.
|   city_id         : Este campo guarda la referencia a la ciudad.
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

// {{ trans( 'mant_offices.xxxxxxxxx' ) }}

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

    'tp_datos_g1'			    => 'Datos de la oficina',

    /* Listar */
    'tit_listar'				=> 'Mantenedor de oficinas.',

    'th_name'                   => 'Nombre',
    'th_city'                   => 'Ciudad',
    'th_accion'					=> 'Acción',
    
    'isd_city'                  => 'Todas',

    'msj_no_encontrado'         => 'No hay resultados.',



    'jal_confirm_elmnar'        => 'Se eliminará la oficina: ',

    /* Insertar - actualizar */
    'tit_insertar'				=> 'Ingresar nueva oficina.',
    'tit_actualizar'			=> 'Actualizar oficina.',

    'msj_name_required'         => 'El nombre es requerido',
    'msj_ingresado'             => 'La oficina ha sido ingresada exitosamente',
    'msj_actualizado'           => 'La oficina ha sido actualizada exitosamente',

    'l_name'					=> 'Nombre',
    'l_description'				=> 'Descripción',
    'l_ciudad'				    => 'Ciudad',
    
    'ph_description'            => 'ingrese la descripción',

    /* ver */
    'tp_ver'				=> 'Detalles de la oficina.',

    'lvm_nombre'            => 'Nombre',
    'lvm_description'       => 'Descripción',
    'lvm_city'              => 'Ciudad',

    'msj_sin'               => 'Sin usuarios asociadas.',

    'jal_confirm_elmnar'    => 'Se eliminará la oficina: ',
    'jal_confirm_elmnar_no' => 'La oficina no se puede eliminar, ya que posee usuarios asociadas',

    'msj_eliminado_1'       => 'La oficina: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminada.',

];

