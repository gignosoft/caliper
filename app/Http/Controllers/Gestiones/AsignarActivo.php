<?php

namespace App\Http\Controllers\Gestiones;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;

class AsignarActivo extends Controller
{
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
        $usuario = User::find( $id );

        return view('gestiones.asignarActivo.create', [
            'usuario'  => $usuario,
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
