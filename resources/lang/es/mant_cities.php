<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA CITIES
|--------------------------------------------------------------------------
|   name        : Este campo guarda el nombre de la ciudad.
|   country_id  : Este campo guarda el id del país.
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

// {{ trans( 'mant_cities.xxxxxxxxx' ) }}

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

    'tp_datos_g1'			    => 'Datos de la ciudad',

    /* Listar */
    'tit_listar'				=> 'Mantenedor de ciudades.',

    'th_name'                   => 'Nombre',
    'th_id_foreing_1'           => 'País',
    'th_accion'					=> 'Acción',

    'isd_country'               => 'Todos',

    'msj_no_encontrado'         => 'No hay resultados.',



    'jal_confirm_elmnar'        => 'Se eliminará la ciudad: ',

    /* Insertar - actualizar */
    'tit_insertar'				=> 'Ingresar nueva ciudad.',
    'tit_actualizar'			=> 'Actualizar ciudad.',

    'msj_name_required'         => 'El nombre es requerido',
    'msj_ingresado'             => 'La ciudad ha sido ingresada exitosamente',
    'msj_actualizado'           => 'La ciudad ha sido actualizada exitosamente',

    'l_name'					=> 'Nombre',
    'l_id_foreing_1'			=> 'País',

    /* ver */
    'tp_ver'				=> 'Detalles de la ciudad.',

    'lvm_nombre'            => 'Nombre',
    'lvm_pais'              => 'País',
    'lvm_r_1'               => 'Usuarios',
    'lvm_r_2'               => 'Proveedores',
    'lvm_r_3'               => 'Oficinas',

    'msj_sin'               => 'Sin usuarios asociados.',
    'msj_sin_r1'            => 'Sin proveedores asociados.',
    'msj_sin_r2'            => 'Sin oficinas asociadas.',

    'jal_confirm_elmnar'    => 'Se eliminará la ciudad: ',
    'jal_confirm_elmnar_no' => 'La ciudad no se puede eliminar, ya que posee datos asociadas',

    'msj_eliminado_1'       => 'La ciudad: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminada.',

];

