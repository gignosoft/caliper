<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Activity;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeRubros extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubros = Activity::paginate( 5 );
        
        return view( 'mantenedores.activities.listar', [
            'rubros' => $rubros,
            'buscar' => 'false',
        ] );

    }
    
    public function search()
    {

        $name   = $_POST['name'];

        if( $name == '' )
        {
            return Redirect::to('listarRubro');
        }

        $rubros = Activity::where('name', 'like', '%'.$name.'%')->get();

        return view('mantenedores.activities.listar', [
            'rubros' => $rubros,
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
        return view('mantenedores.activities.insertar');
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

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'         => trans('mant_activities.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarRubro')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $rubro = new Activity();

        $rubro->name           = strtoupper( $name );
        $rubro->user_control   = $user_control;

        $rubro->save();

        $request->session()->flash('alert-success', trans('mant_activities.msj_ingresado'));
        return Redirect::to('insertarRubro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rubro = Activity::find( $id );

        return view('mantenedores.activities.ver', [
            'rubro'   => $rubro,
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
        $rubro = Activity::find($id);

        return view('mantenedores.activities.actualizar', [
            'rubro'   => $rubro,
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
        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'         => trans('mant_activities.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect( 'actualizarRubro/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $rubro = Activity::find( $id );

        $rubro->name           = strtoupper( $name );
        $rubro->user_control   = $user_control;

        $rubro->save();
        $request->session()->flash( 'alert-success', trans('mant_activities.msj_actualizado') );
        return Redirect::to( 'actualizarRubro/'.$id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $rubro = Activity::find( $id );

        $mensaje    = trans( 'mant_activities.msj_eliminado_1').
            $rubro->name.
            trans( 'mant_activities.msj_eliminado_2');

        $rubro->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarRubro') );
    }
}
