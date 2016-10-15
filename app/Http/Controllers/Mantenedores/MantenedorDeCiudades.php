<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\City;
use App\Models\Country;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class MantenedorDeCiudades extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades   = City::paginate( 5 );
        $paises     = Country::all();

        return view( 'mantenedores.cities.listar', [
            'ciudades'  => $ciudades,
            'paises'    => $paises,
            'buscar'    => 'false',
        ] );

    }

    public function search()
    {
        //dd($_POST);

        $name         = $_POST['name'];
        $country_id   = $_POST['country_id'];

        $op_1         = '=';

        if( $name == '' && $country_id == '' )
        {
            return Redirect::to('listarCiudad');
        }

        if( $country_id == '' )
        {
            $op_1 = 'like';
            $country_id = '%'.$country_id.'%';
        }

        $ciudades = City::where('name', 'like', '%'.$name.'%')
            ->where('country_id', $op_1, $country_id)
            ->get();

        $paises     = Country::all();

        return view('mantenedores.cities.listar', [
            'ciudades'  => $ciudades,
            'paises'    => $paises,
            'buscar'    => 'true',
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Country::all();
        
        return view('mantenedores.cities.insertar', [
            'paises'   => $paises,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name           = $_POST['name'];
        $user_control   = $request->user()->identifier;
        $country_id     = $_POST['country_id'];

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'         => trans('mant_cities.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarCiudad')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $ciudad = new City();

        $ciudad->name           = $name;
        $ciudad->country_id     = $country_id;

        $ciudad->user_control   = $user_control;

        $ciudad->save();

        $request->session()->flash('alert-success', trans('mant_cities.msj_ingresado'));
        return Redirect::to('insertarCiudad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudad = City::find( $id );

        return view('mantenedores.cities.ver', [
            'ciudad'   => $ciudad,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudad = City::find($id);
        $paises = Country::all();

        return view('mantenedores.cities.actualizar', [
            'ciudad'    => $ciudad,
            'paises'    => $paises,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request )
    {
        //dd($_POST);
        $name           = $_POST['name'];
        $id             = $_POST['id'];
        $country_id     = $_POST['country_id'];
        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'         => trans('mant_cities.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect( 'actualizarCiudad/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $ciudad = City::find( $id );

        $ciudad->name           = $name;
        $ciudad->user_control   = $user_control;
        $ciudad->country_id     = $country_id;

        $ciudad->save();
        $request->session()->flash( 'alert-success', trans('mant_cities.msj_actualizado') );
        return Redirect::to( 'actualizarCiudad/'.$id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $ciudad = City::find( $id );

        $mensaje    = trans( 'mant_cities.msj_eliminado_1').
            $ciudad->name.
            trans( 'mant_cities.msj_eliminado_2');

        $ciudad->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarCiudad') );
    }
}
