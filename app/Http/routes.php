<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {


    /*******************************/
    /**         LOGIN            **/
    /*****************************/
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

    /*******************************/

    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);


    Route::group(['middleware' => 'auth'], function(){


        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/mantenedores', function () {
            return view('mantenedores/inicio');
        });


        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE USUARIOS
        |------------------------------------------------------------------------*/

        /* list */
        Route::get('/listarUsuario',
            'Mantenedores\MantenedorDeUsuarios@listarTodos')
            ->name('listarUsuario');

        Route::post('/listarUsuario',
            'Mantenedores\MantenedorDeUsuarios@buscarUsuario');

        /* create */
        Route::get('/ingresarUsuario',
            'Mantenedores\MantenedorDeUsuarios@ingresarUsuario')
            ->name('ingresarUsuario');

        Route::post('/ingresarUsuario',
            'Mantenedores\MantenedorDeUsuarios@accionIngresarUsuario');


        /* update */
        Route::get('actualizarUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@actualizar')
            ->name('actualizarUsuario');

        Route::post('actualizarUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@accionActializarUsuario')
            ->name('actualizarUsuario');

        Route::get('/restablecerContrasenia/{id}',
            'Mantenedores\MantenedorDeUsuarios@restablecerContrasenia')
            ->name('restablecerContrasenia');

        /* delete */
        Route::get('eliminarUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@eliminarUsuario')
            ->name('eliminarUsuario');

        /* ver */
        Route::get('/verUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@verUsuario')
            ->name('verUsuario');

        // CARGA EL COMBO CIUDAD CON EL ID DEL PAÍS
        Route::get('/cargaCiudadUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');

        Route::post('/cargaCiudadUsuario',
            'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');

        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE ACTIVOS
        |------------------------------------------------------------------------*/

        /* list */
        Route::get('/listarActivo',
            'Mantenedores\MantenedorDeActivos@index')
            ->name('listarActivo');
        Route::post('/listarActivo',
            'Mantenedores\MantenedorDeActivos@search')
            ->name('listarActivo');

        /* update */
        Route::get('actualizarActivo/{id}',
            'Mantenedores\MantenedorDeActivos@edit')
            ->name('actualizarActivo');

        Route::post('actualizarActivo/{id}',
            'Mantenedores\MantenedorDeActivos@actionEdit')
            ->name('actualizarActivo');

        /* ver */
        Route::get('verActivo/{id}',
            'Mantenedores\MantenedorDeActivos@show')
            ->name('verActivo');


        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE CARGOS
        |------------------------------------------------------------------------*/

        /* list */
        Route::get('/listarCargo',
            'Mantenedores\MantenedorDeCargos@index')
            ->name('listarCargo');

        Route::post('/listarCargo',
            'Mantenedores\MantenedorDeCargos@search');

        /* create */
        Route::get('ingresarCargo',
            'Mantenedores\MantenedorDeCargos@create')
            ->name('ingresarCargo');

        Route::post('ingresarCargo',
            'Mantenedores\MantenedorDeCargos@store')
            ->name('ingresarCargo');

        /* update */
        Route::get('actualizarCargo/{id}',
            'Mantenedores\MantenedorDeCargos@actualizar')
            ->name('actualizarCargo');

        Route::post('actualizarCargo',
            'Mantenedores\MantenedorDeCargos@accionActualizar')
            ->name('actualizarCargo');

        /* ver */
        Route::get('verCargo/{id}',
            'Mantenedores\MantenedorDeCargos@ver')
            ->name('verCargo');

        /* delete */
        Route::get('eliminarCargo/{id}',
            'Mantenedores\MantenedorDeCargos@eliminar')
            ->name('eliminarCargo');

        /*
        |--------------------------------------------------------------------------
        | MANTENEDOR DE NIVELES DE DEPARTAMENTOS
        |-----------------------------------------------------------------------
        *///INICIO

        /* list */
        Route::get('/listarNivelDepartamento',
            'Mantenedores\MantenedorDeNivelesDepartamentos@listarTodos')
            ->name('listarNivelDepartamento');
        
        Route::post('/listarNivelDepartamento',
            'Mantenedores\MantenedorDeNivelesDepartamentos@buscar');

        /* create */
        Route::get('/ingresarNivelDepartamento',
            'Mantenedores\MantenedorDeNivelesDepartamentos@ingresar')
            ->name('ingresarNivelDepartamento');


        /* delete */
        Route::get('eliminarNivelDepartamento/{id}',
            'Mantenedores\MantenedorDeNivelesDepartamentos@eliminar')
            ->name('eliminarNivelDepartamento');

        /* ver */
        Route::get('/verNivelDepartamento/{id}',
            'Mantenedores\MantenedorDeNivelesDepartamentos@ver')
            ->name('verNivelDepartamento');



        /*--------------------------------------------------------------------------
        | MANTENEDOR DE DEPARTAMENTOS
        |------------------------------------------------------------------------
        /* list */
        Route::get('/listarDepartamentos',
            'Mantenedores\MantenedorDeDepartamentos@index')
            ->name('listarDepartamentos');

        Route::post('/listarDepartamentos',
            'Mantenedores\MantenedorDeDepartamentos@search');

        /* create */
        Route::get('/ingresarDepartamento',
            'Mantenedores\MantenedorDeDepartamentos@create')
            ->name('ingresarDepartamento');

        Route::post('/ingresarDepartamento',
            'Mantenedores\MantenedorDeDepartamentos@store');

        /* update */
        Route::get('actualizarDepartamento/{id}',
            'Mantenedores\MantenedorDeDepartamentos@edit')
            ->name('actualizarDepartamento');

        Route::post('actualizarDepartamento',
            'Mantenedores\MantenedorDeDepartamentos@update')
            ->name('actualizarDepartamento');

        /* ver */
        Route::get('verDepartamento/{id}',
            'Mantenedores\MantenedorDeDepartamentos@show')
            ->name('verDepartamento');

        /* eliminar */
        Route::get('eliminarDepartamento/{id}',
            'Mantenedores\MantenedorDeDepartamentos@show')
            ->name('verDepartamento');

        /*
        |--------------------------------------------------------------------------
        | MANTENEDOR DE NIVELES DE CARGOS
        |--------------------------------------------------------------------------
        *///INICIO

        /* list */
        Route::get('/listarNivelCargo',
            'Mantenedores\MantenedorDeNivelesCargos@listarTodos')
            ->name('listarNivelCargo');

        Route::post('/listarNivelCargo',
            'Mantenedores\MantenedorDeNivelesCargos@buscar');

        /* create */
        Route::get('/ingresarNivelCargo',
            'Mantenedores\MantenedorDeNivelesCargos@ingresar')
            ->name('ingresarNivelCargo');

        /* delete */
        Route::get('eliminarNivelCargo/{id}',
            'Mantenedores\MantenedorDeNivelesCargos@eliminar')
            ->name('eliminarNivelCargo');

        /* ver */
        Route::get('/verNivelCargo/{id}',
            'Mantenedores\MantenedorDeNivelesCargos@ver')
            ->name('verNivelCargo');
      /*|--------------------------------------------------------------------------
      | MANTENEDOR DE CATEGORIAS
      |------------------------------------------------------------------------*/

        /* list */
        Route::get('/listarCategorias',
            'Mantenedores\MantenedorDeCategorias@index')
            ->name('listarCategorias');

        Route::post('/listarCategorias',
            'Mantenedores\MantenedorDeCategorias@search')
            ->name('listarCategorias');

        /* create */
        Route::get('insertarRol',
            'Mantenedores\MantenedorDeCategorias@create')
            ->name('insertarCategoria');

        Route::post('insertarRol',
            'Mantenedores\MantenedorDeCategorias@store')
            ->name('insertarCategoria');

        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE ESTADOS DE ACTIVOS
        |------------------------------------------------------------------------*/

        /* list */
        Route::get('listarEstadoActivo',
            'Mantenedores\MantenedorDeEstadoActivos@index')
            ->name('listarEstadoActivo');

        Route::post('listarEstadoActivo',
            'Mantenedores\MantenedorDeEstadoActivos@search')
            ->name('listarEstadoActivo');

        /* create */
        Route::get('insertarEstadoActivo',
            'Mantenedores\MantenedorDeEstadoActivos@create')
            ->name('insertarEstadoActivo');

        Route::post('insertarEstadoActivo',
            'Mantenedores\MantenedorDeEstadoActivos@store')
            ->name('insertarEstadoActivo');

        /* update */
        Route::get('actualizarEstadoActivo/{id}',
            'Mantenedores\MantenedorDeEstadoActivos@edit')
            ->name('actualizarEstadoActivo');

        Route::post('actualizarEstadoActivo',
            'Mantenedores\MantenedorDeEstadoActivos@update')
            ->name('actualizarEstadoActivo');

        /* ver */
        Route::get('verEstadoActivo/{id}',
            'Mantenedores\MantenedorDeEstadoActivos@show')
            ->name('verEstadoActivo');

        /*eliminar*/
        Route::get('eliminarEstadoActivo/{id}',
            'Mantenedores\MantenedorDeEstadoActivos@destroy')
            ->name('eliminarEstadoActivo');
        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE RUBROS
        |------------------------------------------------------------------------*/

        /* list */
        Route::get('listarRubro',
            'Mantenedores\MantenedorDeRubros@index')
            ->name('listarRubro');

        Route::post('listarRubro',
            'Mantenedores\MantenedorDeRubros@search')
            ->name('listarRubro');
        /* create */
        Route::get('insertarRubro',
            'Mantenedores\MantenedorDeRubros@create')
            ->name('insertarRubro');

        Route::post('insertarRubro',
            'Mantenedores\MantenedorDeRubros@store')
            ->name('insertarRubro');

        /* update */
        Route::get('actualizarRubro/{id}',
            'Mantenedores\MantenedorDeRubros@edit')
            ->name('actualizarRubro');

        Route::post('actualizarRubro',
            'Mantenedores\MantenedorDeRubros@update')
            ->name('actualizarRubro');

        /* ver */
        Route::get('verRubro/{id}',
            'Mantenedores\MantenedorDeRubros@show')
            ->name('verRubro');

        /*eliminar*/
        Route::get('eliminarRubro/{id}',
            'Mantenedores\MantenedorDeRubros@destroy')
            ->name('eliminarRubro');

        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE ESTADO DE ASIGNACIONES
        |------------------------------------------------------------------------*/

        /* list */
        Route::get('listarEstadoAsignacion',
            'Mantenedores\MantenedorDeEstadoAsignaciones@index')
            ->name('listarEstadoAsignacion');

        Route::post('listarEstadoAsignacion',
            'Mantenedores\MantenedorDeEstadoAsignaciones@search')
            ->name('listarEstadoAsignacion');
        /* create */
        Route::get('insertarEstadoAsignacion',
            'Mantenedores\MantenedorDeEstadoAsignaciones@create')
            ->name('insertarEstadoAsignacion');

        Route::post('insertarEstadoAsignacion',
            'Mantenedores\MantenedorDeEstadoAsignaciones@store')
            ->name('insertarEstadoAsignacion');

        /* update */
        Route::get('actualizarEstadoAsignacion/{id}',
            'Mantenedores\MantenedorDeEstadoAsignaciones@edit')
            ->name('actualizarEstadoAsignacion');

        Route::post('actualizarEstadoAsignacion',
            'Mantenedores\MantenedorDeEstadoAsignaciones@update')
            ->name('actualizarEstadoAsignacion');

        /* ver */
        Route::get('verEstadoAsignacion/{id}',
            'Mantenedores\MantenedorDeEstadoAsignaciones@show')
            ->name('verEstadoAsignacion');

        /*eliminar*/
        Route::get('eliminarEstadoAsignacion/{id}',
            'Mantenedores\MantenedorDeEstadoAsignaciones@destroy')
            ->name('eliminarEstadoAsignacion');

        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE ESTADO DE ROLES
        |------------------------------------------------------------------------*/

        /* list */
        Route::get('listarRol',
            'Mantenedores\MantenedorDeRoles@index')
            ->name('listarRol');

        Route::post('listarRol',
            'Mantenedores\MantenedorDeRoles@search')
            ->name('listarRol');
        /* create */
        Route::get('insertarRol',
            'Mantenedores\MantenedorDeRoles@create')
            ->name('insertarRol');

        Route::post('insertarRol',
            'Mantenedores\MantenedorDeRoles@store')
            ->name('insertarRol');

        /* update */
        Route::get('actualizarRol/{id}',
            'Mantenedores\MantenedorDeRoles@edit')
            ->name('actualizarRol');

        Route::post('actualizarRol',
            'Mantenedores\MantenedorDeRoles@update')
            ->name('actualizarRol');

        /* ver */
        Route::get('verRol/{id}',
            'Mantenedores\MantenedorDeRoles@show')
            ->name('verRol');

        /*eliminar*/
        Route::get('eliminarRol/{id}',
            'Mantenedores\MantenedorDeRoles@destroy')
            ->name('eliminarRol');

    });


});


/*******************************/
/**         PROTOTIPOS       **/
/*****************************/

// asignación de activos >>
Route::get('/asignarActivoIndex', function () {
    return view('prototypes/asignarActivo/index');
});

Route::get('/asignarActivo', function () {
    return view('prototypes/asignarActivo/asignarActivo');
});
// asignación de activos <<

// ingresar compra >>

Route::get('/ingresarCompraIndex', function () {
    return view('prototypes/ingresarCompra/index');
});

// ingresar compra <<

/*******************************/







