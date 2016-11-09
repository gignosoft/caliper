<?php
namespace App\Http\Controllers\Mantenedores;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Menus;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class MantenedorDeRoles extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate( 5 );
        return view( 'mantenedores.roles.listar', [
            'roles' => $roles,
            'buscar' => 'false',
        ] );
    }
    public function search()
    {
        $name   = $_POST['name'];
        if( $name == '' )
        {
            return Redirect::to('listarRol');
        }
        $roles = Role::where('name', 'like', '%'.$name.'%')->get();
        return view('mantenedores.roles.listar', [
            'roles' => $roles,
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

        return view('mantenedores.roles.insertar');
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
            'name.required'         => trans('mant_roles.msj_name_required'),
        ]);
        if ($validator->fails()) {
            return redirect('insertarRol')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones
        $rol = new Role();
        $rol->name           = strtoupper( $name );
        $rol->user_control   = $user_control;
        $rol->save();
        $request->session()->flash('alert-success', trans('mant_roles.msj_ingresado'));
        return Redirect::to('insertarRol');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Role::find( $id );
        return view('mantenedores.roles.ver', [
            'rol'   => $rol,
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
        $rol = Role::find($id);
        return view('mantenedores.roles.actualizar', [
            'rol'   => $rol,
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
            'name.required'         => trans('mant_roles.msj_name_required'),
        ]);
        if ($validator->fails()) {
            return redirect( 'actualizarRol/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones
        $rol = Role::find( $id );
        $rol->name           = strtoupper( $name );
        $rol->user_control   = $user_control;
        $rol->save();
        $request->session()->flash( 'alert-success', trans('mant_roles.msj_actualizado') );
        return Redirect::to( 'actualizarRol/'.$id );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $rol = Role::find( $id );
        $mensaje    = trans( 'mant_roles.msj_eliminado_1').
            $rol->name.
            trans( 'mant_roles.msj_eliminado_2');
        $rol->delete();
        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarRol') );
    }
}