<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA POSITIONS
|--------------------------------------------------------------------------
|   name                : Este campo guarda nombre.
|   department_id       : Este campo guarda el id del departamento.
|   levelpositions_id   : Este campo guarda el nivel de la posicion.
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

// {{ trans( 'mant_cargos.xxxxxxxxx' ) }}

return[
    'tit_listar'                    => 'Mantenedor de cargos',
    'tit_insertar'                  => 'Ingresar nuevo cargo',
    'tit_actualizar'                => 'Actualizar cargo',
    'tit_ver'                       => 'Detalle del cargo',

    'th_name'					    => 'Nombre',
    'th_level_id'					=> 'Nivel',
    'th_department_id'			    => 'Departamento',
    'th_action'			            => 'Acción',

    'l_name'					    => 'Nombre',
    'l_nivel'					    => 'Nivel',
    'l_departamento'			    => 'Departamento',

    'ph_name'					    => 'Ingrese nombre',

    'btn_buscar'					=> 'Buscar',
    'btn_nuevo'						=> 'Nuevo',
    'btn_salir'						=> 'Salir',
    'btn_volver'					=> 'Volver',
    'btn_guardar'					=> 'Guardar',

    'isd_level'                     => 'Todos',
    'isd_department_id'             => 'Todos',

    'tp_cargos'						=> 'Datos del cargo',

    'msj_no_encontrado'             => 'Sin resultados.',
    'msj_name_required'             => 'Necesitamos saber el nombre del cargo.',
    'msj_insert_ok'                 => 'El cargo ha sido ingresado exitosamente.',
    'msj_update_ok'                 => 'El cargo ha sido actualizado exitosamente.',
    'msj_sin_usuarios'              => 'Sin usuarios asignados.',

    'msj_eliminado_1'              => 'El cargo: ',
    'msj_eliminado_2'              => ', ha sido correctamente eliminado.',


    'lvm_name'				        => 'Nombre',
    'lvm_nivel'				        => 'Nivel',
    'lvm_departamento'				=> 'Departamento',
    'lvm_usuarios'				    => 'Usuarios',

    'jal_confirm_elmnar_user'       => 'Se eliminará el cargo: ',
    'jal_confirm_elmnar_cargo'      => 'No es posible eliminar el cargo, ya que posee usuarios asociados. ',

    'tt_Editar'						=> 'Editar',
    'tt_ver_mas'					=> 'Ver más',
    'tt_Eliminar'					=> 'Eliminar',

];


