<?php

namespace App\Http\Controllers\Gestiones;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Asset;
use App\Models\Assignment;
use App\Models\StateAssignment;

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
        $ahora    = Carbon::now();       

        $asignaciones = Assignment::where( 'user_id', '=', $usuario->id )->
                                    where( 'state_assignment_id', '=', 1 )->get();

        return view('gestiones.asignarActivo.create', [
            'usuario'       => $usuario,
            'categorias'    => $categorias,
            'asignaciones'  => $asignaciones,
            'ahora'           => $ahora,
        ]);
    }

    public function asignar(Request $request)
    {
        //dd($_POST);
        $asset_id       = $_POST['asset_id'];
        $description    = $_POST['description'];
        $user_id        = $_POST['user_id'];
        // inicio validación
        $validator = Validator::make( $request->all(), [
            'asset_id'      => 'required',
        ], [
            'asset_id.required' => trans( 'asig_activo.msj_activo_required' ),
        ] );

        if ($validator->fails()) {

            return redirect('crearActivo/'.$user_id)
                ->withErrors($validator)
                ->withInput();
        }
        // fin validación

        $activo                 = Asset::find($asset_id);
        $activo->available      = 1;

        $asignacion = new Assignment();


        $asignacion->description            = strtoupper( $description );
        $asignacion->assigned_at            = Carbon::now();
        $asignacion->user_id                = $user_id;
        $asignacion->asset_id               = $asset_id;
        $asignacion->state_assignment_id    = 1;

        $asignacion->user_control           = $request->user()->identifier;
        $asignacion->save();

        $request->session()->flash('alert-success',
            trans('asig_activo.msj_asset_asignado_ok_1').$activo->name.trans('asig_activo.msj_asset_asignado_ok_2') );

        $activo->save();
        return Redirect::to('crearActivo/'.$user_id);
    }

    public function edit( $id )
    {
        $asignacion = Assignment::find( $id );        
        $usuario    = $asignacion->users->find( $asignacion->user_id );
        $activo     = $asignacion->assets->find( $asignacion->asset_id );
        

        $estados    = StateAssignment::all();

        return view('gestiones.asignarActivo.entregar', [
            'asignacion' => $asignacion,
            'usuario'    => $usuario,    
            'activo'     => $activo,
            'estados'    => $estados,
        ]);
    }

    /**
     * Esta función se ejecuta cuando se entrega el activo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd( $_POST );
        $state_assignment_id    = $_POST['state_assignment_id'];
        $description            = $_POST['description'];
        $id                     = $_POST['id'];

        $user_id                = $_POST['user_id'];

        $asignacion             = Assignment::find( $id );
        $activo                 = Asset::find( $asignacion->asset_id );

        $asignacion->state_assignment_id    = $state_assignment_id;
        $asignacion->description            = strtoupper( $description );
        $asignacion->returned_at            = Carbon::now();

        $activo->state_asset_id     = 2; // pasa el activo a usado.
        if( $state_assignment_id == 4 || $state_assignment_id == 5 ) // el estado del activo depende de la entrega
        {
            $activo->available          = 1; // disponible
        }else{
            $activo->available          = 0; // no disponible
        }
        $activo->save();

        $asignacion->user_control       = $request->user()->identifier;

        $asignacion->save();

        $request->session()->flash('alert-success',
            trans( 'asig_activo.msj_entrega_1' ).$activo->name.trans( 'asig_activo.msj_entrega_2' ) );
        return Redirect::to('crearActivo/'.$user_id);
    }

    public function destroy($id, Request $request)
    {
        $asignacion = Assignment::find( $id );
        $user_id    = $asignacion->user_id;
        
        $activo     = Asset::find( $asignacion->asset_id );
        
        $mensaje    = trans('asig_activo.msj_elimina_1');
        $mensaje    .= $activo->name;
        $mensaje    .= trans('asig_activo.msj_elimina_2');

        $asignacion->delete();

        $request->session()->flash( 'alert-success', $mensaje);
        return Redirect::to('crearActivo/'.$user_id);
    }

}
