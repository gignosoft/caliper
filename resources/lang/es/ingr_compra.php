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
// trans( 'asig_activo.l_estado_entrega' )
// {{ trans( 'asig_activo.xxxxxxxxx' ) }}

return[

    'btn_buscar'	=> 'Buscar',
    'btn_nuevo'		=> 'Nuevo',
    'btn_salir'		=> 'Salir',
    'btn_volver'	=> '<< Volver',
    'btn_guardar'	=> 'Guardar',
    'btn_asignar'	=> 'Asignar',
    'btn_eliminar'	=> 'Eliminar',
    'btn_entregar'	=> 'Entregar',

    // index
    'tit_asgnar_activo'         => 'Asignar activo',

    'tp_asgnar_activo'          => 'Asignar activo',

    'th_identifier' => 'Rut',
    'th_first_name' => 'Nombre',
    'th_last_name'  => 'Apellido',
    'th_action'     => 'Accion',

    'msj_sinResultados' => 'Sin resultados',

    'ph_identifier' => 'Ingrese el rut',
    'ph_first_name' => 'Ingrese el nombre',
    'ph_last_name'  => 'Ingrese el Apellido',

    // create
    'tit_asgnar_activo2'    => 'Asignar activo a: ',

    'l_categoria'           => 'Categoría',
    'l_estado_entrega'           => 'Estado de la entrega',

    'isd_categoria'         => 'Seleccione una categoría',
    'isd_activo'            => 'Seleccione una categoría para cargar los activos',

    'ph_description'        => 'Ingrese un comentario',

    'th_codigo'             => 'Código',
    'th_nombre'             => 'Nombre',
    'th_estado'             => 'Estado',
    'th_accion'             => 'Acción',

    'msj_sin_activos'       => 'Sin activos asignados',

    'msj_activo_required'   => 'Seleccione un activo',

    'msj_asset_asignado_ok_1' => 'El activo: ',
    'msj_asset_asignado_ok_2' => ', ha sido asignado exitosamente.',

    'msj_elimina_1' => 'La asignación del activo: ',
    'msj_elimina_2' => ', ha sido eliminada exitosamente.',

    'msj_entrega' => ', entrega el activo: ',

    'msj_entrega_1' => 'La entrga del activo: ',
    'msj_entrega_2' => ', ha sido guardada correctamente' ,

    'jal_confirm_elmnar' => 'Se elinará la asignación del activo: ',


];

