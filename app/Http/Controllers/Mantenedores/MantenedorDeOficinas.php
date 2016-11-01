<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Office;
use App\Models\City;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeOficinas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = Office::paginate( 5 );

        $ciudades = City::all();

        return view( 'mantenedores.offices.listar', [
            'oficinas' => $oficinas,
            'ciudades' => $ciudades,
            'buscar' => 'false',
        ] );

    }

    public function search()
    {

        $name       = $_POST['name'];
        $city_id    = $_POST['city_id'];

        if( $name == '' && $city_id == '' )
        {
            return Redirect::to('listarOficina');
        }

        $op_1 = '=';

        if( $city_id == ''  )
        {
            $op_1       = 'like';
            $city_id    = '%'.$city_id.'%';
        }

        $oficinas = Office::where('name', 'like', '%'.$name.'%')
            ->where('city_id', $op_1, $city_id)->get();

        $ciudades = City::all();

        return view('mantenedores.offices.listar', [
            'oficinas' => $oficinas,
            'ciudades' => $ciudades,
            'buscar'  => 'true',
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = City::all();

        return view('mantenedores.offices.insertar', [
            'ciudades' => $ciudades,

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
        $description    = $_POST['description'];
        $city_id        = $_POST['city_id'];
        
        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'         => trans('mant_offices.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarOficina')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $oficina = new Office();

        $oficina->name           = $name;
        $oficina->description    = $description;
        $oficina->city_id        = $city_id;


        $oficina->user_control   = $user_control;
        $oficina->save();

        $request->session()->flash('alert-success', trans('mant_offices.msj_ingresado'));
        return Redirect::to('insertarOficina');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oficina = Office::find( $id );

        return view('mantenedores.offices.ver', [
            'oficina'   => $oficina,
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
        $oficina = Office::find($id);

        $ciudades = City::all();

        return view('mantenedores.offices.actualizar', [
            'oficina'   => $oficina,
            'ciudades'  => $ciudades,
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
        $name           = $_POST['name'];
        $id             = $_POST['id'];
        $description    = $_POST['description'];
        $city_id        = $_POST['city_id'];
        
        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'         => trans('mant_offices.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect( 'actualizarOficina/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $oficina = Office::find( $id );

        $oficina->name           = $name;
        $oficina->description    = $description;
        $oficina->city_id        = $city_id;
        
        $oficina->user_control   = $user_control;
        $oficina->save();
        $request->session()->flash( 'alert-success', trans('mant_offices.msj_actualizado') );
        return Redirect::to( 'actualizarOficina/'.$id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $oficina = Office::find( $id );

        $mensaje    = trans( 'mant_offices.msj_eliminado_1').
            $oficina->name.
            trans( 'mant_offices.msj_eliminado_2');

        $oficina->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarOficina') );
    }
}
