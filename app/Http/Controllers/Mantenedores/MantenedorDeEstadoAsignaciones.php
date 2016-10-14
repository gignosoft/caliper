<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StateAssignment;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeEstadoAsignaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoAsignaciones = StateAssignment::paginate( 5 );

        return view( 'mantenedores.state_assignments.listar', [
            'estadoAsignaciones' => $estadoAsignaciones,
            'buscar' => 'false',
        ] );
    }

    public function search()
    {
        $name   = $_POST['name'];

        if( $name == '' )
        {
            return Redirect::to('listarEstadoAsignacion');
        }

        $estadoAsignaciones = StateAssignment::where('name', 'like', '%'.$name.'%')->get();

        return view('mantenedores.state_assignments.listar', [
            'estadoAsignaciones' => $estadoAsignaciones,
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
        return view('mantenedores.state_assignments.insertar');
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
            'name.required'         => trans('mant_state_assignments.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarEstadoAsignacion')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $estadoAsignacion = new StateAssignment();

        $estadoAsignacion->name           = $name;
        $estadoAsignacion->user_control   = $user_control;

        $estadoAsignacion->save();

        $request->session()->flash('alert-success', trans('mant_state_assignments.msj_ingresado'));
        return Redirect::to('insertarEstadoAsignacion');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoAsignacion = StateAssignment::find($id);

        return view('mantenedores.state_assignments.actualizar', [
            'estadoAsignacion'   => $estadoAsignacion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $name           = $_POST['name'];
        $id             = $_POST['id'];
        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'         => trans('mant_state_assignments.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect( 'actualizarEstadoAsignacion/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $estadoAsignacion = StateAssignment::find( $id );

        $estadoAsignacion->name           = $name;
        $estadoAsignacion->user_control   = $user_control;

        $estadoAsignacion->save();
        $request->session()->flash( 'alert-success', trans('mant_state_assignments.msj_actualizado') );
        return Redirect::to( 'actualizarEstadoAsignacion/'.$id );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoAsignacion = StateAssignment::find( $id );

        return view('mantenedores.state_assignments.ver', [
            'estadoAsignacion'   => $estadoAsignacion,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, Request $request )
    {
        $estadoAsignacion = StateAssignment::find( $id );

        $mensaje    = trans( 'mant_state_assignments.msj_eliminado_1').
            $estadoAsignacion->name.
            trans( 'mant_state_assignments.msj_eliminado_2');

        $estadoAsignacion->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarEstadoAsignacion') );
    }



}
