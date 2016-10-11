<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Position;
use App\Models\Departments;
use App\Models\LevelPositions;

class MantenedorDeCargos extends Controller
{
    private $datosPorPagina = 5;



    public function index()
    {
        $cargos         = Position::paginate($this->datosPorPagina);
        $niveles        = LevelPositions::all();
        $departamentos  = Departments::all();

        return view('mantenedores.positions.listar', [
            'cargos'        => $cargos,
            'niveles'       => $niveles,
            'departamentos' => $departamentos,
            'buscar'        => 'false',
        ]);
    }


    public function search()
    {
        //dd($_POST);
        $name                   = $_POST['name'];
        $levelpositions_id      = $_POST['levelpositions_id'];
        $department_id          = $_POST['department_id'];

        if( $name == '' && $levelpositions_id == '' && $department_id == '')
        {
            return redirect('listarCargo');
        }

        $ope_levelpositions_id = '=';
        $ope_department_id     = '=';

        if($levelpositions_id == '')
        {
            $levelpositions_id       = '%'.$levelpositions_id.'%';
            $ope_levelpositions_id   = 'like';
        }

        if($department_id == '')
        {
            $department_id       = '%'.$department_id.'%';
            $ope_department_id   = 'like';
        }

        $cargos = Position::where( 'name',  'like', '%'.$name.'%' )
                         ->Where ( 'levelpositions_id', $ope_levelpositions_id, $levelpositions_id )
                         ->Where ( 'department_id', $ope_department_id, $department_id )
                         ->get();
        $niveles        = LevelPositions::all();
        $departamentos  = Departments::all();

        return view('mantenedores.positions.listar', [
            'cargos'        => $cargos,
            'niveles'       => $niveles,
            'departamentos' => $departamentos,
            'buscar'        => 'true',
        ]);

    }


    public function create()
    {
        $niveles        = LevelPositions::all();
        $departamentos  = Departments::all();

        return view('mantenedores.positions.insertar',[
            'niveles'       => $niveles,
            'departamentos' => $departamentos,
        ]);
    }


    public function store(Request $request)
    {
        //dd($_POST);
        $name                   = $_POST['name'];
        $levelpositions_id      = $_POST['levelpositions_id'];
        $department_id          = $_POST['department_id'];

        $validator = Validator::make($request->all(), [
            'name'          => 'required',
        ], $messages = [
            'name.required' => trans( 'mant_cargos.msj_name_required' ),
        ]);

        if ($validator->fails()) {

            return redirect('ingresarCargo')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones


        $cargo = new Position();
        $cargo->name                = $name;
        $cargo->LevelPositions_id   = $levelpositions_id;
        $cargo->department_id       = $department_id;
        $cargo->user_control        = $request->user()->identifier;

        $cargo->save();

        $request->session()
            ->flash('alert-success',
                trans( 'mant_cargos.msj_insert_ok' )
            );

        return Redirect::to('ingresarCargo');
    }

    public function actualizar($id)
    {


        $cargo          = Position::find($id);
        $niveles        = LevelPositions::all();
        $departments    = Departments::all();

        return view('mantenedores.positions.actualizar',
            [
                'cargo'         => $cargo,
                'niveles'       => $niveles,
                'departments'   => $departments,
            ]);
    }

    public function accionActualizar(Request $request)
    {
        //dd($_POST);

        $id                 = $_POST['id'];
        $name               = $_POST['name'];
        $levelpositions_id  = $_POST['LevelPositions_id'];
        $department_id      = $_POST['department_id'];


        $validator = Validator::make($request->all(), [
            'name'          => 'required',
        ], $messages = [
            'name.required' => trans( 'mant_cargos.msj_name_required' ),
        ]);

        if ($validator->fails()) {

            return redirect('actualizarCargo/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones


        $cargo = Position::find($id);
        $cargo->name                = $name;
        $cargo->LevelPositions_id   = $levelpositions_id;
        $cargo->department_id       = $department_id;
        $cargo->user_control        = $request->user()->identifier;

        $cargo->save();

        $request->session()->flash('alert-success',
            'El Cargo ha sido correctamente actualizado.');
        return Redirect::to('actualizarCargo/' . $id);


    }

    public function ver($id)
    {
        $cargo                      = Position::find($id);
        $usuarios                   = $cargo->users;//User::all();
        $numUsuarios                = count ( $usuarios );

       // dd($usuarios);
        return view('mantenedores/verCargo',
            [
                'cargo'         => $cargo,
                'numUsuarios'   => $numUsuarios,
                'usuarios'      => $usuarios,
            ]);

    }

    public function eliminar($id, Request $request)
    {
        //dd($_POST);
        $cargo      = Position::find($id);
        $mensaje    = 'El cargo: '.$cargo->name.', ha sido correctamente eliminado.';

        $cargo->delete();
        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to('listarCargo');
    }
}
