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

        Route::get('gestiones', function () {
            return view('gestiones/inicio');
        });


        /*|--------------------------------------------------------------------------
        | GESTIONES
        |------------------------------------------------------------------------*/

        include ('rutas/ingreso_de_compra.php');
        include ('rutas/asignar_activo.php');

        /*|--------------------------------------------------------------------------
        | MANTENEDORES
        |------------------------------------------------------------------------*/
        include ('rutas/mantenedor_de_usuarios.php');
        include ('rutas/mantenedor_de_activos.php');
        include ('rutas/mantenedor_de_cargos.php');
        include ('rutas/mantenedor_de_niveles_departamento.php');
        include ('rutas/mantenedor_de_departamentos.php');
        include ('rutas/mantenedor_de_niveles_de_cargos.php');
        include ('rutas/mantenedor_de_categorias.php');
        include ('rutas/mantenedor_de_estados_activos.php');
        include ('rutas/mantenedor_de_rubros.php');
        include ('rutas/mantenedor_de_estados_asignaciones.php');
        include ('rutas/mantenedor_de_roles.php');
        include ('rutas/mantenedor_de_ciudades.php');
        include ('rutas/mantenedor_de_oficinas.php');
        include ('rutas/mantenedor_de_empresas.php');
        include ('rutas/mantenedor_de_proveedores.php');
        include ('rutas/mantenedor_de_paises.php');

        /*|--------------------------------------------------------------------------
        | REPORTES
        |------------------------------------------------------------------------*/

        Route::get('centrocostos',
            'Reportes\CentroDeCostos@index')
            ->name('centrocostos');


    });


});









