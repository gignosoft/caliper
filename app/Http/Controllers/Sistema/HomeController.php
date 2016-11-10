<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }


    public function cargaRol( $correo )
    {
        $users = User::where( 'email', '=', $correo )->get();

        foreach ( $users as $user )
        {
            $roles = $user->roles;
        }


        $select_1 = "<label for=\"country_id\">Rol</label>";
        $select_2 = "<select class='form-control'  name='rol_id' id='rol_id' >";
        $select_3 = '';

        foreach ( $roles as $rol )
        {
            $select_3 = $select_3.''."<option value='$rol->id'>$rol->name</option>";
        }

        $select_4 = "</select>";

        $select = $select_1.$select_2.$select_3.$select_4;

        return $select;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
