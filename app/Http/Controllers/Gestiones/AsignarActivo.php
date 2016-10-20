<?php

namespace App\Http\Controllers\Gestiones;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Asset;
use App\Models\Assignment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AsignarActivo extends Controller
{
    public function cargaActivo($id)
    {
        $activos = Asset::where('category_id', '=', $id)
            ->where('available', '=', '0')->get();


        return view('mantenedores/trozosHtml/dinamicAsset', [
            'activos' => $activos,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios   = User::paginate( 5 );
        return view('gestiones.asignarActivo.index', [
            'usuarios'  => $usuarios,
            'buscar'    => 'false',
        ]);
    }


    public function search()
    {
        //dd( $_POST );
        $first_name   = $_POST['first_name'];
        $last_name    = $_POST['last_name'];
        $identifier   = $_POST['identifier'];


        if( $first_name == '' && $last_name == '' && $identifier == '' )
        {
            return Redirect::to('asignarActivo');
        }

        $usuarios = User::where('first_name', 'like', '%'.$first_name.'%')
            ->where('last_name', 'like', '%'.$last_name.'%')
            ->where('identifier', 'like', '%'.$identifier.'%')->get();

        return view('gestiones.asignarActivo.index', [
            'usuarios'  => $usuarios,
            'buscar'    => 'true',
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $id )
    {
        //
        $usuario    = User::find( $id );
        $categorias = Category::all();

        $asignaciones = Assignment::where( 'user_id', '=', $usuario->id )->
                                    where( 'state_assignment_id', '=', 1 )->get();

        return view('gestiones.asignarActivo.create', [
            'usuario'       => $usuario,
            'categorias'    => $categorias,
            'asignaciones'  => $asignaciones,
        ]);
    }

    public function asignar(Request $request)
    {
        //dd($_POST);
        $asset_id       = $_POST['asset_id'];
        $description    = $_POST['description'];
        $user_id        = $_POST['user_id'];

        $validator = Validator::make( $request->all(), [
            'asset_id'      => 'required',
            'user_id'       => 'required',
        ], [

        ] );


        $asignacion = new Assignment();


        $asignacion->description            = $description;
        $asignacion->assigned_at            = Carbon::now();
        $asignacion->user_id                = $user_id;
        $asignacion->asset_id               = $asset_id;
        $asignacion->state_assignment_id    = 1;

        $asignacion->state_assignment_id    = $request->user()->identifier;
        $asignacion->save();

        return Redirect::to('crearActivo/'.$user_id);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
