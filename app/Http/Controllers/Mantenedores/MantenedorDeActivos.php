<?php
namespace App\Http\Controllers\Mantenedores;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Asset;
use App\Models\Supplier;
use App\Models\StateAsset;
use App\Models\Category;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class MantenedorDeActivos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activos        = Asset::paginate(5);
        $estados        = StateAsset::all();

        return view('mantenedores.assets.listar', [
            'activos'       => $activos,
            'estados'       => $estados,
            'buscar'        => 'false',
        ]);
    }
    public function search()
    {
        $code           = $_POST['code'];
        $name           = $_POST['name'];
        $available      = $_POST['available'];
        $state_asset_id = $_POST['state_asset_id'];

        $ope_code           = '=';
        $ope_state_asset_id = '=';
        $ope_available      = '=';

        if( $code == '' && $ope_available == '' && $state_asset_id == '' && $name == '')
        {
            return Redirect::to('listarActivo');
        }
        if($code == '')
        {
            $code       = '%'.$code.'%';
            $ope_code   = 'like';
        }
        if($available == '')
        {
            $available       = '%'.$available.'%';
            $ope_available   = 'like';
        }
        if($state_asset_id == '')
        {
            $state_asset_id       = '%'.$state_asset_id.'%';
            $ope_state_asset_id   = 'like';
        }
        $activos = Asset::where( 'code', $ope_code, $code )
            ->Where ( 'name', 'LIKE', '%'.$name.'%' )
            ->Where ( 'available', $ope_available, $available )
            ->Where ( 'state_asset_id', $ope_state_asset_id, $state_asset_id )
            ->get();
        $proveedores    = Supplier::all();
        $estados        = StateAsset::all();

        return view('mantenedores.assets.listar', [
            'activos'       => $activos,
            'proveedores'   => $proveedores,
            'estados'       => $estados,
            'buscar'        => 'true',
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
        $activo         = Asset::find($id);
        $proveedores    = Supplier::all();
        $categorias     = Category::all();

        return view('mantenedores.assets.actualizar', [
            'activo'        => $activo,
            'proveedores'   => $proveedores,
            'categorias'    => $categorias,
        ]);
    }
    public function actionEdit($id, Request $request)
    {
        //
        //dd($_POST);
        $code           = $_POST['code'];
        $name           = $_POST['name'];
        $description    = $_POST['description'];
        $supplier_id    = $_POST['supplier_id'];
        $category_id    = $_POST['category_id'];

        $validator = Validator::make($request->all(), [
            'code'          => 'required',
            'name'          => 'required',
            'description'   => 'required',
        ],$messages = [
            'code.required'         => trans(   'mantActivos.msj_code_requerido' ),
            'name.required'         => trans(   'mantActivos.msj_name_requerido' ),
            'description.required'  => trans(   'mantActivos.msj_description_requerido'  ),
        ]);

        if ($validator->fails()) {

            return redirect('actualizarActivo/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $activo                 = Asset::find($id);
        $activo->code           = $code;
        $activo->name           = strtoupper( $name );
        $activo->description    = strtoupper( $description );
        $activo->supplier_id    = $supplier_id;
        $activo->category_id    = $category_id;

        $activo->user_control  	= $request->user()->identifier;
        $activo->save();
        $request->session()->flash('alert-success',
            trans('mantActivos.msj_asset_actualizado_ok'));
        return Redirect::to('actualizarActivo/'.$id);
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
        $activo                 = Asset::find($id);
        if( $activo->available == 0)
        {
            $disponible = trans(   'mantActivos.val_disponible' );
        }else{
            $disponible = trans(   'mantActivos.val_no_disponible' );
        }

        //dd($activo->assignments->find(1)->users);

        return view('mantenedores.assets.ver', [
            'activo'        => $activo,
            'disponible'    => $disponible,
        ]);
    }
}