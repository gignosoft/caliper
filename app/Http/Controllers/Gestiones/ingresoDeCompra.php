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
    /*
     * Determina el Id de la última compra ingresada por el usuario
     *
     * @return int $id_max_compra
     */
    function idUltimaCompraDelUsuario( $user )
    {
        $compras = Purchase::where('user_control', '=', $user )->get();
        if( count( $compras ) > 0 )
        {
            $id_max_compra  = $compras->max('id');
        }else{
            $id_max_compra  = 0;
        }
        return $id_max_compra;
    }

    /*
     * Retorna true o false dependiendo si
     * el usuario logueado asigno algún activo
     * al numero de compra, con esto se evita que se cree un nuevo número
     * de compra.
     *
     * @return bool
     */
    function debeCrearNuevaNumero(Request $request )
    {
        $user_control   = $request->user()->identifier;
        $id_max_compra  = $this->idUltimaCompraDelUsuario( $user_control );

        if( $id_max_compra > 0 )
        {
            $activos        = Asset::where('purchase_id','=',$id_max_compra)->get();
            $num_activos    = count( $activos );
            if( $num_activos > 0)
            {
                return true;
            }else{
                return false;
            }

        }else{
            return true;
        }

    }

    function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }

    public function crearCompra( Request $request )
    {
        $user_control   = $request->user()->identifier;
        $id_max_compra  = $this->idUltimaCompraDelUsuario( $user_control );
        $crear_compra   = $this->debeCrearNuevaNumero( $request );
        //dd($crear_compra);
        if( $crear_compra )
        {
            $compra             = new Purchase();
            $compra->date       = Carbon::now();
            $compra->total      = 0;

            $compra->user_control   = $user_control;
            $compra->save();
            return $compra;

        }else{

            $compra_con_id_maximo = Purchase::find($id_max_compra);
            return $compra_con_id_maximo;
        }

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
    public function create( Request $request )
    {
        //
        //dd($_POST);
        $category_id    = $_POST['category_id'];
        $name           = $_POST['asset_name'];
        $price          = $_POST['asset_price'];
        $description    = $_POST['description'];
        $purchase_id    = $_POST['purchase_id'];
        $supplier_id    = $_POST['supplier_id'];
        $cantidad       = $_POST['cantidad'];

        //validación
        $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
            'asset_name'    => 'required',
            'asset_price'   => 'required',
            'supplier_id'   => 'required',
        ],$messages = [
            'category_id.required'      => trans(   'ingr_compra.msj_category_id_requerido' ),
            'asset_name.required'       => trans(   'ingr_compra.msj_asset_name_requerido' ),
            'asset_price.required'      => trans(   'ingr_compra.msj_asset_price_requerido'  ),
            'supplier_id.required'      => trans(   'ingr_compra.supplier_id_id_requerido'    ),
        ]);


        if ($validator->fails()) {

            return redirect('ingresarCompra/'.$purchase_id.'')
                ->withErrors($validator)
                ->withInput();
        }

        for( $i=0; $i<$cantidad; $i++)

        {
            $code           = $this->generarCodigo(10);

            while( count( Asset::where('code', '=', $code)->get() ) > 0 )
            {
                $code        = $this->generarCodigo(10);
            }

            $activo = new Asset();

            $precio = str_replace(".", "", $price);

            $activo->name           = strtoupper( $name );
            $activo->description    = strtoupper( $description );
            $activo->code           = strtoupper( $code );
            $activo->price          = str_replace(".", "", $precio);
            $activo->supplier_id    = $supplier_id;
            $activo->state_asset_id = 1;
            $activo->purchase_id    = $purchase_id;
            $activo->category_id    = $category_id;
            $activo->available      = 0; // disponible

            $activo->save();

            // sumando al total >>
            $compra         = Purchase::find( $purchase_id );
            $total_actual   = $compra->total;
            $compra->total  = $total_actual + ( $activo->price );
            $compra->save();
            // sumando al total <<
        }

        $mensaje    = trans( 'ingr_compra.msj_ingresado_1' ).
            $activo->name.
            trans( 'ingr_compra.msj_ingresado_2');

        $request->session()->flash( 'alert-success', $mensaje );
        return Redirect::to('ingresarCompra/'.$purchase_id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $activo     = Asset::find( $id );

        $id_compra  = $activo->purchase_id;

        // restando del total >>
        $compra         = Purchase::find( $id_compra );
        $total_actual   = $compra->total;
        $compra->total  = $total_actual - ( $activo->price );
        $compra->save();
        // restando del total <<

        $mensaje    = trans( 'ingr_compra.msj_eliminado_1').
            $activo->name.
            trans( 'ingr_compra.msj_eliminado_2');

        $activo->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to( url('ingresarCompra/'.$id_compra) );
    }

}
