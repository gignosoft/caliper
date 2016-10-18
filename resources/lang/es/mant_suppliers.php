<?php

/*
|--------------------------------------------------------------------------
| CAMPOS QUE ESTAN EN LA TABLA suppliers.
|--------------------------------------------------------------------------
|   company_id  : Este campo guarda la referencia a la tabla empresa.
|   city_id     : Este campo guarda la referencia a la tabla ciudad.
|   name        : Este campo guarda el nombre del proveedor.
|   email       : Este campo guarda el mail del proveedor.
|   phone       : Este campo guarda el teléfono del proveedor.
|   description : Este campo guarda la descripción del proveedor.
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

// {{ trans( 'mant_suppliers.xxxxxxxxx' ) }}

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

    'tp_datos_g1'			    => 'Datos del rubro',

    /* Listar */
    'tit_listar'				=> 'Mantenedor de rubros o giros.',

    'th_name'                   => 'Nombre',
    'th_accion'					=> 'Acción',

    'msj_no_encontrado'         => 'No hay resultados.',



    'jal_confirm_elmnar'        => 'Se eliminará el rubro: ',

    /* Insertar - actualizar */
    'tit_insertar'				=> 'Ingresar nuevo rubro.',
    'tit_actualizar'			=> 'Actualizar rubro.',

    'msj_name_required'         => 'El nombre es requerido',
    'msj_ingresado'             => 'El rubro ha sido ingresado exitosamente',
    'msj_actualizado'           => 'El rubro ha sido actualizado exitosamente',

    'l_name'					=> 'Nombre',

    /* ver */
    'tp_ver'				=> 'Detalles del rubro.',

    'lvm_nombre'            => 'Nombre',
    'lvm_empresas'          => 'Empresas',

    'msj_sin'               => 'Sin empresas asociadas.',

    'jal_confirm_elmnar'    => 'Se eliminará el rubro: ',
    'jal_confirm_elmnar_no' => 'El rubro no se puede eliminar ya que posee empresas asociadas',

    'msj_eliminado_1'       => 'El rubro: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminado.',

];

