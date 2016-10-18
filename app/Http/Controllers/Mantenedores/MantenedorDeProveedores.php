<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Models\Supplier;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MantenedorDeProveedores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Supplier::paginate( 5 );

        return view( 'mantenedores.suppliers.listar', [
            'proveedores' => $proveedores,
            'buscar' => 'false',
        ] );

    }

    public function search()
    {

        $name   = $_POST['name'];

        if( $name == '' )
        {
            return Redirect::to('listarProveedor');
        }

        $proveedores = Supplier::where('name', 'like', '%'.$name.'%')->get();

        return view('mantenedores.suppliers.listar', [
            'proveedores' => $proveedores,
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
        return view('mantenedores.suppliers.insertar');
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
            'name.required'         => trans('mant_suppliers.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarProveedor')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $proveedor = new Supplier();

        $proveedor->name           = $name;
        $proveedor->user_control   = $user_control;

        $proveedor->save();

        $request->session()->flash('alert-success', trans('mant_suppliers.msj_ingresado'));
        return Redirect::to('insertarProveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Supplier::find( $id );

        return view('mantenedores.suppliers.ver', [
            'proveedor'   => $proveedor,
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
        $proveedor = Supplier::find($id);

        return view('mantenedores.suppliers.actualizar', [
            'proveedor'   => $proveedor,
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
            'name.required'         => trans('mant_suppliers.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect( 'actualizarProveedor/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $proveedor = Supplier::find( $id );

        $proveedor->name           = $name;
        $proveedor->user_control   = $user_control;

        $proveedor->save();
        $request->session()->flash( 'alert-success', trans('mant_suppliers.msj_actualizado') );
        return Redirect::to( 'actualizarProveedor/'.$id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $proveedor = Supplier::find( $id );

        $mensaje    = trans( 'mant_suppliers.msj_eliminado_1').
            $proveedor->name.
            trans( 'mant_suppliers.msj_eliminado_2');

        $proveedor->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarProveedor') );
    }
}
