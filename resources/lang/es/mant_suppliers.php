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

    'tp_datos_g1'			    => 'Datos del proveedor',

    /* Listar */
    'tit_listar'				=> 'Mantenedor de Proveedores.',

    'th_name'                   => 'Nombre',
    'th_company_id'             => 'Empresa',
    'th_accion'					=> 'Acción',

    'isd_level'                 => 'Todas',

    'msj_no_encontrado'         => 'No hay resultados.',



    'jal_confirm_elmnar'        => 'Se eliminará el proveedor: ',

    /* Insertar - actualizar */
    'tit_insertar'				=> 'Ingresar nuevo proveedor.',
    'tit_actualizar'			=> 'Actualizar proveedor.',

    'isd_city'                  => 'Seleccione un país para cargar las ciudades.',


    'msj_name_required'         => 'El nombre es requerido',
    'msj_phone_required'        => 'El teléfono es requerido',
    'msj_email_required'        => 'El correo electrónico es requerido',
    'msj_company_id_required'   => 'El la empresa es requerida',
    'msj_city_id_required'      => 'La ciudad es requerida',


    'msj_ingresado'             => 'El proveedor ha sido ingresado exitosamente',
    'msj_actualizado'           => 'El proveedor ha sido actualizado exitosamente',

    'ph_phone'                   => 'Ingrese un número telefónico.',
    'ph_email'                   => 'Ingrese un correo electrónico.',
    'ph_description'             => 'Ingrese una descripción.',

    'l_name'					=> 'Nombre',
    'l_company_id'				=> 'Empresa',
    'l_country'				    => 'País',
    'l_city_id'				    => 'Ciudad',
    'l_email'				    => 'Email',
    'l_phone'				    => 'Teléfono',
    'l_description'				=> 'Descripción',

    /* ver */
    'tp_ver'				=> 'Detalles del proveedor.',

    'lvm_nombre'            => 'Nombre',
    'lvm_assets'            => 'Activos',
    'lvm_phone'             => 'Teléfono',
    'lvm_email'             => 'Correo electrónico',
    'lvm_country'           => 'País',
    'lvm_city'              => 'Ciudad',

    'msj_sin_1'             => 'Sin activos asociados.',

    'jal_confirm_elmnar'    => 'Se eliminará el proveedor: ',
    'jal_confirm_elmnar_no' => 'El proveedor no se puede eliminar ya que posee activos asociados',

    'msj_eliminado_1'       => 'El proveedor: ',
    'msj_eliminado_2'       => ', ha sido correctamente eliminado.',

];

