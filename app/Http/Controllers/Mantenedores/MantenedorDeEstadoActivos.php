<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\StateAsset;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeEstadoActivos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $estados = StateAsset::paginate( 5 );

        return view('mantenedores.state_assets.listar', [
            'estados' => $estados,
            'buscar'  => 'false',
        ]);

    }


    public function search()

    {

        $name   = $_POST['name'];

        if( $name == '' )
        {
            return Redirect::to('listarEstadoActivo');
        }

        $estados = StateAsset::where('name', 'like', '%'.$name.'%')->get();

        return view('mantenedores.state_assets.listar', [
            'estados' => $estados,
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
        return view('mantenedores.state_assets.insertar');
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
            'name.required'         => trans('mant_state_assets.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarEstadoActivo')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $estado = new StateAsset();

        $estado->name           = strtoupper( $name );
        $estado->user_control   = $user_control;

        $estado->save();

        $request->session()->flash('alert-success', trans('mant_state_assets.msj_ingresado'));
        return Redirect::to('insertarEstadoActivo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $estado = StateAsset::find( $id );

        return view('mantenedores.state_assets.ver', [
            'estado'   => $estado,
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
        $estado = StateAsset::find($id);

        return view('mantenedores.state_assets.actualizar', [
            'estado'   => $estado,
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
            'name.required'         => trans('mant_state_assets.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect( 'actualizarEstadoActivo/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $estado = StateAsset::find( $id );

        $estado->name           = strtoupper( $name );
        $estado->user_control   = $user_control;

        $estado->save();
        $request->session()->flash( 'alert-success', trans('mant_state_assets.msj_actualizado') );
        return Redirect::to( 'actualizarEstadoActivo/'.$id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, Request $request )
    {
        $estado = StateAsset::find($id);

        $mensaje    = trans( 'mant_state_assets.msj_eliminado_1').
            $estado->name.
            trans( 'mant_state_assets.msj_eliminado_2');

        $estado->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to(route('listarEstadoActivo'));
    }
}
