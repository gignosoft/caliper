<?php
namespace App\Http\Controllers\Mantenedores;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class mantenedorDePaises extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Country::paginate( 5 );
        return view( 'mantenedores.countries.listar', [
            'paises' => $paises,
            'buscar' => 'false',
        ] );
    }
    public function search()
    {
        $name   = $_POST['name'];
        if( $name == '' )
        {
            return Redirect::to('listarPais');
        }
        $paises = Country::where('name', 'like', '%'.$name.'%')->get();
        return view('mantenedores.countries.listar', [
            'paises' => $paises,
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
        return view('mantenedores.countries.insertar');
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
            'name.required'         => trans('mant_paises.msj_name_required'),
        ]);
        if ($validator->fails()) {
            return redirect('insertarPais')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones
        $pais = new Country();
        $pais->name           = strtoupper( $name );
        $pais->user_control   = $user_control;
        $pais->save();
        $request->session()->flash('alert-success', trans('mant_paises.msj_ingresado'));
        return Redirect::to('insertarPais');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = Country::find( $id );
        return view('mantenedores.countries.ver', [
            'pais'   => $pais,
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
        $pais = Country::find($id);
        return view('mantenedores.countries.actualizar', [
            'pais'   => $pais,
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
            'name.required'         => trans('mant_paises.msj_name_required'),
        ]);
        if ($validator->fails()) {
            return redirect( 'actualizarPais/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones
        $pais = Country::find( $id );
        $pais->name           = strtoupper( $name );
        $pais->user_control   = $user_control;
        $pais->save();
        $request->session()->flash( 'alert-success', trans('mant_paises.msj_actualizado') );
        return Redirect::to( 'actualizarPais/'.$id );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id, Request $request)
    {
        $pais = Country::find( $id );
        $mensaje    = trans( 'mant_paises.msj_eliminado_1').
            $pais->name.
            trans( 'mant_paises.msj_eliminado_2');
        $pais->delete();
        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( route('listarPais') );
    }


}


