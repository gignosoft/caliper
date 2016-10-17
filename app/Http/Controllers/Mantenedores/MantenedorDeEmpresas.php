<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Company;
use App\Models\Activity;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeEmpresas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Company::paginate( 5 );

        return view( 'mantenedores.companies.listar', [
            'empresas' => $empresas,
            'buscar' => 'false',
        ] );

    }

    public function search()
    {

        $name           = $_POST['name'];
        $identifier     = $_POST['identifier'];


        if( $name == '' && $identifier == '' )
        {
            return Redirect::to('listarEmpresa');
        }

        $empresas = Company::where('name', 'like', '%'.$name.'%')
            ->where('identifier', 'like', '%'.$identifier.'%')->get();

        return view('mantenedores.companies.listar', [
            'empresas'  => $empresas,
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
        $rubros   = Activity::all();
        return view('mantenedores.companies.insertar', [
            'rubros'    => $rubros,
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
        //dd($_POST);
        $name           = $_POST['name'];
        $identifier     = $_POST['identifier'];
        $activity_id    = $_POST['activity_id'];

        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'identifier'            => 'required',
        ], $messages = [
            'name.required'         => trans('mant_companies.msj_name_required'),
            'identifier.required'   => trans('mant_companies.msj_identifier_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarEmpresa')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $empresa = new Company();

        $empresa->name           = $name;
        $empresa->identifier     = $identifier;
        $empresa->activity_id    = $activity_id;

        $empresa->user_control   = $user_control;
        $empresa->save();

        $request->session()->flash('alert-success', trans('mant_companies.msj_ingresado'));
        return Redirect::to('insertarEmpresa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Company::find( $id );

        return view('mantenedores.companies.ver', [
            'empresa'   => $empresa,
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
        $empresa    = Company::find($id);
        $rubros      = Activity::all();

        return view('mantenedores.companies.actualizar', [
            'empresa'   => $empresa,
            'rubros'    => $rubros,
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
        $identifier     = $_POST['identifier'];
        $activity_id    = $_POST['activity_id'];
        $id             = $_POST['id'];

        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'identifier'            => 'required',
        ], $messages = [
            'name.required'         => trans('mant_companies.msj_name_required'),
            'identifier.required'   => trans('mant_companies.msj_identifier_required'),
        ]);

        if ($validator->fails()) {

            return redirect( 'actualizarEmpresa/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $empresa = Company::find( $id );

        $empresa->name           = $name;
        $empresa->identifier     = $identifier;
        $empresa->activity_id    = $activity_id;

        $empresa->user_control   = $user_control;

        $empresa->save();
        $request->session()->flash( 'alert-success', trans('mant_companies.msj_actualizado') );
        return Redirect::to( 'actualizarEmpresa/'.$id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $empresa = Company::find( $id );

        $mensaje    = trans( 'mant_companies.msj_eliminado_1').
            $empresa->name.
            trans( 'mant_companies.msj_eliminado_2');

        $empresa->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarEmpresa') );
    }
}
