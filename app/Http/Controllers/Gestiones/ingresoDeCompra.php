<?php

namespace App\Http\Controllers\Gestiones;

use Illuminate\Http\Request;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Asset;
use App\Models\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ingresoDeCompra extends Controller
{
    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }

    public function crearCompra( Request $request )
    {
        $compra = new Purchase();

        $compra->date    = Carbon::now();
        $compra->total   = 0;

        $compra->user_control   = $request->user()->identifier;
        $compra->save();
        return $compra;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $codigo, Request $request )
    {
        if( $codigo == '1' )
        {
            $compra = $this->crearCompra( $request );
        }else{
            $compra = Purchase::find( $codigo );
        }
        //
        $proveedores    = Supplier::all();
        $activos        = Asset::where( 'purchase_id','=',$compra->id )->get();
        $categorias     = Category::all();

        return view('gestiones.ingresoDeCompra.ingresoCompra', [

            'proveedores'   => $proveedores,
            'compra'        => $compra,
            'activos'       => $activos,
            'categorias'    => $categorias,
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
        //dd($_POST);
        $category_id    = $_POST['category_id'];
        $name           = $_POST['asset_name'];
        $price          = $_POST['asset_price'];
        $description    = $_POST['description'];
        $purchase_id    = $_POST['purchase_id'];
        $supplier_id    = $_POST['supplier_id'];

        $code           = $this->generarCodigo(10);

        while( count( Asset::where('code', '=', $code)->get() ) > 0 )
        {
            $code           = $this->generarCodigo(10);
        }

        $activo = new Asset();

        $activo->name           = $name;
        $activo->description    = $description;
        $activo->code           = $code;
        $activo->price          = $price;
        $activo->supplier_id    = $supplier_id;
        $activo->state_asset_id = 1;
        $activo->purchase_id    = $purchase_id;
        $activo->category_id    = $category_id;


        $activo->save();

        return Redirect::to('ingresarCompra/'.$purchase_id);


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
