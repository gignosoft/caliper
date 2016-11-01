<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Company;
use App\Models\Country;
use App\Models\City;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeProveedores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores    = Supplier::paginate( 5 );
        $empresas       = Company::all();

        return view( 'mantenedores.suppliers.listar', [
            'proveedores'   => $proveedores,
            'empresas'      => $empresas,
            'buscar'        => 'false',
        ] );

    }

    public function search()
    {

        $name           = $_POST['name'];
        $company_id     = $_POST['company_id'];

        if( $name == '' && $company_id == '' )
        {
            return Redirect::to('listarProveedor');
        }
        $ope_01 = '=';

        if( $company_id == '' )
        {
            $ope_01     = 'like';
            $company_id = '%'.$company_id.'%';
        }


        $proveedores = Supplier::where('name', 'like', '%'.$name.'%')
            ->where('company_id', $ope_01, $company_id)
            ->get();

        $empresas    = Company::all();

        return view('mantenedores.suppliers.listar', [
            'proveedores'   => $proveedores,
            'empresas'      => $empresas,
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
        $empresas    = Company::all();
        $paises      = Country::all();

        return view('mantenedores.suppliers.insertar',[
            'empresas'  => $empresas,
            'paises'    => $paises,
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
        //dd($_POST);
        $name           = $_POST['name'];
        $phone          = $_POST['phone'];
        $email          = $_POST['email'];
        $description    = $_POST['description'];
        $company_id     = $_POST['company_id'];
        $city_id        = $_POST['city_id'];

        $user_control   = $request->user()->identifier;

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'phone'                 => 'required',
            'email'                 => 'required',
            'company_id'            => 'required',
            'city_id'               => 'required',
        ], $messages = [
            'name.required'         => trans('mant_suppliers.msj_name_required'),
            'phone.required'        => trans('mant_suppliers.msj_phone_required'),
            'email.required'        => trans('mant_suppliers.msj_email_required'),
            'company_id.required'   => trans('mant_suppliers.msj_company_id_required'),
            'city_id.required'      => trans('mant_suppliers.msj_city_id_required'),
        ]);

        if ($validator->fails()) {

            return redirect('insertarProveedor')
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $proveedor = new Supplier();

        $proveedor->name           = $name;
        $proveedor->phone          = $phone;
        $proveedor->email          = $email;
        $proveedor->description    = $description;
        $proveedor->company_id     = $company_id;
        $proveedor->city_id        = $city_id;


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

        $proveedor      = Supplier::find($id);
        $empresas       = Company::all();
        $paises         = Country::all();

        $id_pais_selected  = $proveedor->cities->find( $proveedor->city_id )->country_id;

        $ciudades = City::where( 'country_id','=',$id_pais_selected )->get();

        return view('mantenedores.suppliers.actualizar', [
            'proveedor'  => $proveedor,
            'paises'     => $paises,
            'empresas'   => $empresas,

            'id_pais_selected' => $id_pais_selected,
            'ciudades'         => $ciudades,
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
        $phone          = $_POST['phone'];
        $email          = $_POST['email'];
        $description    = $_POST['description'];
        $company_id     = $_POST['company_id'];

        if( isset( $_POST['city_id']) )
        {
            $city_id        = $_POST['city_id'];
        }else{
            $city_id        = '';
        }

        $user_control   = $request->user()->identifier;
        $id             = $_POST['id'];

        $validator = Validator::make($request->all(), [
            'name'                  => 'required',
            'phone'                 => 'required',
            'email'                 => 'required',
            'company_id'            => 'required',
            'city_id'               => 'required',
        ], $messages = [
            'name.required'         => trans('mant_suppliers.msj_name_required'),
            'phone.required'        => trans('mant_suppliers.msj_phone_required'),
            'email.required'        => trans('mant_suppliers.msj_email_required'),
            'company_id.required'   => trans('mant_suppliers.msj_company_id_required'),
            'city_id.required'      => trans('mant_suppliers.msj_city_id_required'),
        ]);

        if ($validator->fails()) {

            return redirect( 'actualizarProveedor/'.$id )
                ->withErrors($validator)
                ->withInput();
        }
        // fin validaciones

        $proveedor = Supplier::find( $id );

        $proveedor->name           = $name;
        $proveedor->phone          = $phone;
        $proveedor->email          = $email;
        $proveedor->description    = $description;
        $proveedor->company_id     = $company_id;
        $proveedor->city_id        = $city_id;

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
