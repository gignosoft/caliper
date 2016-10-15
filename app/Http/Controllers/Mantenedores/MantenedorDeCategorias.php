<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Category;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeCategorias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::paginate( 5 );

        return view('mantenedores.categories.listar', [
            'categorias' => $categorias,
            'buscar'     => 'false',

        ]);
    }

    public function search()
    {
        //
        //dd($_POST);

        $name = $_POST['name'];

        if( $name == '' )
        {
            return Redirect::to('listarCategorias');
        }

        $categorias = Category::Where('name', 'like', '%'.$name.'%')->get();

        return view('mantenedores.categories.listar', [
            'categorias' => $categorias,
            'buscar'     => 'true',

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mantenedores.categories.insertar');
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
            'name.required'         => trans('mant_categorias.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarCategorias')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $categoria = new Category();

        $categoria->name           = $name;
        $categoria->user_control   = $user_control;

        $categoria->save();

        $request->session()->flash('alert-success', trans('mant_categorias.msj_ingresado'));
        return Redirect::to('insertarCategorias');
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
        $categoria = Category::find( $id );

        return view('mantenedores.categories.ver', [
            'categoria'   => $categoria,
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
        $categoria = Category::find($id);

        return view('mantenedores.categories.actualizar', [
            'categoria'   => $categoria,
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
        //dd($_POST);
        $name           = $_POST['name'];
        $id             = $_POST['id'];
        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
        ], $messages = [
            'name.required'         => trans('mant_categorias.msj_name_required'),
        ]);

        if ($validator->fails()) {

            return redirect('actualizarCategorias/' . $id)
                ->withErrors($validator)
                ->withInput();
        }

        // fin validaciones

        $categoria = Category::find( $id );

        $categoria->name           = $name;
        $categoria->user_control   = $user_control;

        $categoria->save();
        $request->session()->flash( 'alert-success', trans('mant_categorias.msj_actualizado') );
        return Redirect::to( 'actualizarCategorias/'.$id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $categoria = Category::find( $id );

        $mensaje    = trans( 'mant_categorias.msj_eliminado_1').
            $categoria->name.
            trans( 'mant_categorias.msj_eliminado_2');

        $categoria->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarCategorias') );
    }

}
