<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA USERS
|--------------------------------------------------------------------------
|   identifier  : Este campo guarda el nombre del estado.|
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

// {{ trans( 'mant_state_assets.xxxxxxxxx' ) }}

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

    'tp_datos_g1'			    => 'Datos del nivel del activo',

    /* Listar */
    'tit_listar'				=> 'Mantenedor de estado del activo.',

    'th_name'                   => 'Nombre',
    'th_accion'					=> 'Acción',

    'msj_no_encontrado'         => 'No hay resultados.',



    'jal_confirm_elmnar'        => 'Se eliminará el estado: ',

    /* Insertar - actualizar */
    'tit_insertar'				=> 'Ingresar nuevo estado del activo.',
    'tit_actualizar'			=> 'Actualizar estado del activo.',

    'msj_name_required'         => 'El nombre es requerido',
    'msj_ingresado'             => 'El estado a sido ingresado exitosamente',
    'msj_actualizado'           => 'El estado a sido actualizado exitosamente',

    'l_name'					=> 'Nombre',

    /* ver */
    'tp_ver'				=> 'Detalles del estado del activo.',

    'lvm_nombre'            => 'Nombre',
    'lvm_activos'           => 'Activos',

    'msj_sin_activos'       => 'Sin activos asociados.',

    'jal_confirm_elmnar'    => 'Se eliminará el estado: ',
    'jal_confirm_elmnar_no' => 'El estado no se puede eliminar ya que posee activos asociados',

    'msj_eliminado_1'       => 'El estado del activo: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminado.',

];

/*
return[
    'tit_listarUsuario'				=> 'Mantenedor de usuarios',
    'tit_ingresarUsuario'			=> 'Ingresar nuevo usuario',
    'tit_actualizarUsuario'			=> 'Actualizar usuario',
    'tit_verUsuario'				=> 'Detalle del usuario',

    'l_first_name'					=> 'Nombre',
    'l_last_name'					=> 'Apellido',
    'l_email'						=> 'Correo electrónico',
    'l_identifier'					=> 'RUT',
    'l_country'						=> 'País',
    'l_city'						=> 'Ciudad',

    'ph_first_name'					=> 'Ingrese nombre',
    'ph_last_name'					=> 'Ingrese apellido',
    'ph_email'						=> 'Ingrese su correo electrónico',
    'ph_identifier'					=> 'RUT ej: 12344567-9',

    'btn_buscar'					=> 'Buscar',
    'btn_nuevo'						=> 'Nuevo',
    'btn_salir'						=> 'Salir',
    'btn_volver'					=> 'Volver',
    'btn_guardar'					=> 'Guardar',
    'btn_pass_reset'				=> 'Reestablecer contraseña',

    'th_first_name'					=> 'Nombre',
    'th_last_name'					=> 'Apellido',
    'th_email'						=> 'Correo electrónico',
    'th_identifier'					=> 'RUT',
    'th_cities_name'				=> 'Ciudad',
    'th_countries_name'				=> 'País',
    'th_accion'						=> 'Acción',

    'msj_no_encontrado'				=> 'No se encontraron resultados.',
    'msj_identifier_requerido'		=> 'Nesesitamos conocer el RUT del usuario.',
    'msj_email_requerido'			=> 'Nesesitamos conocer el correo electrónico del usuario.',
    'msj_first_name_requerido'		=> 'Nesesitamos conocer el nombre del usuario.',
    'msj_last_name_requerido'		=> 'Nesesitamos conocer el apellido del usuario.',
    'msj_city_id_requerido'			=> 'Nesesitamos conocer la ciudad del usuario.',
    'msj_roles_requerido'			=> 'Ingrese al menos un rol.',
    'msj_positions_requerido'		=> 'Ingrese al menos un cargo.',
    'msj_departments_requerido'		=> 'Ingrese al menos un departamento.',
    'msj_identifier_unique'			=> 'El RUT ingresado, ya existe.',
    'msj_identifier_invalid'		=> 'El RUT ingresado, no es válido.',
    'msj_usuario_ingresado_ok'		=> 'El usuario ha sido correctamente ingresado.',
    'msj_usuario_actualizado_ok'	=> 'El usuario ha sido correctamente actualizado.',
    'msj_reset_pass_ok'				=> 'La contraseña ha sido restablecida correctamente.',
    'msj_eliminado_1'				=> 'El usuario: ',
    'msj_eliminado_2'				=> ', ha sido eliminado correctamente.',

    'jal_confirm_elmnar_user'		=> 'Se eliminará el usuario: ',

    'tt_Editar'						=> 'Editar',
    'tt_ver_mas'					=> 'Ver más',
    'tt_Eliminar'					=> 'Eliminar',



    'tp_datos_personales'			=> 'Datos personales',
    'tp_roles'						=> 'Roles',
    'tp_cargos'						=> 'Cargos',
    'tp_departamentos'				=> 'Departamentos',


    'isd_country'					=> 'Seleccione un país',
    'isd_city'						=> 'Seleccione una ciudad',

    'lvm_first_name'				=> 'Nombre',
    'lvm_last_name'					=> 'Apellido',
    'lvm_email'						=> 'Correo electrónico',
    'lvm_identifier'				=> 'RUT',
    'lvm_country'					=> 'País',
    'lvm_city'						=> 'Coudad',
    'lvm_roles'						=> 'Roles',
    'lvm_positions'					=> 'Cargos',
    'lvm_departments'				=> 'Departamentos',




];
*/