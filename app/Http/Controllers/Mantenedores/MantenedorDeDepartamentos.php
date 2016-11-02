<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Departments;
use App\Models\LevelDepartments;

class MantenedorDeDepartamentos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments    = Departments::paginate( 5 );
        $niveles        = LevelDepartments::all();

        return view('mantenedores.departments.listar',[
            'departments'   => $departments,
            'niveles'       => $niveles,
            'buscar'        => 'false',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $nombre = $_POST['name'];
        $level  = $_POST['levelDepartments_id'];

        $niveles        = LevelDepartments::all();

        if( $level == 0 )
        {
            if($nombre == '')
            {
                return Redirect::to('listarDepartamentos');   
            }else{
                $departments = Departments::where('name', 'LIKE', '%' . $nombre . '%')->get();
            }            
        }else{
            $departments = Departments::where('name', 'LIKE', '%' . $nombre . '%')
                ->Where('levelDepartments_id', '=', $level)
                ->get();
        }


        return view('mantenedores.departments.listar', [
            'departments'   => $departments,
            'niveles'       => $niveles,
            'buscar'        => 'true',
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $niveles        = LevelDepartments::all();

        return view('mantenedores.departments.ingresar', [
            'niveles'       => $niveles,

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
        //
        //dd($_POST);
        $name                   = $_POST['name'];
        $levelDepartments_id    = $_POST['levelDepartments_id'];

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'levelDepartments_id'   => 'required',
        ], $messages = [
            'name.required'                 => trans('mant_departamentos.msj_name_required'),
            'levelDepartments_id.required'  => trans('mant_departamentos.msj_levelDepartments_id_required'),
        ]);

        if ($validator->fails()) {

            return redirect('ingresarDepartamento')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones


        $department                         = new Departments();
        $department->name                   = strtoupper( $name );
        $department->levelDepartments_id    = $levelDepartments_id;

        $department->user_control  	        = $request->user()->identifier;
        $department->save();

        $request->session()->flash('alert-success', trans('mant_departamentos.msj_departamento_ingresado'));
        return Redirect::to('ingresarDepartamento');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
        $departamento = Departments::find( $id );

        return view('mantenedores.departments.ver', [

            'departamento' => $departamento,

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
        //
        //dd('aca');
        $departamento = Departments::find($id);

        $niveles        = LevelDepartments::all();

        return view('mantenedores.departments.actualizar', [

            'niveles'       => $niveles,
            'departamento' => $departamento,

        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request )
    {
        //dd($_POST);
        $id                     = $_POST['id'];
        $name                   = $_POST['name'];
        $levelDepartments_id    = $_POST['levelDepartments_id'];

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'                 => trans('mant_departamentos.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('actualizarDepartamento/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones


        $department                         = Departments::find($id);
        $department->name                   = strtoupper( $name );
        $department->levelDepartments_id    = $levelDepartments_id;

        $department->user_control  	        = $request->user()->identifier;
        $department->save();

        $request->session()->flash( 'alert-success',
            trans('mant_departamentos.msj_departamento_actualizar') );
        return Redirect::to('actualizarDepartamento/'.$id);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        //
        $departmento = Departments::find($id);

        $mensaje    = trans( 'mant_departamentos.msj_eliminado_1').
            $departmento->name.
            trans( 'mant_departamentos.msj_eliminado_2');

        $departmento->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to(route('listarUsuario'));

    }
}
