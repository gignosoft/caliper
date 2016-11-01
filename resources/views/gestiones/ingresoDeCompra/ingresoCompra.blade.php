@extends('layouts.principal')

@section('titulo')
    {{ trans( 'ingr_compra.tit_ingresar_compra' ) }}
@endsection

@section('contenido')
    <div class="container">
    @include('layouts.mensajes')

    <div class="panel panel-info">
        <div class="panel-heading ">

            <div class="row">
                <h3 class="col-xs-12"> {{ trans( 'ingr_compra.tp_compra_n' ).$compra->id }} </h3>
            </div>

        </div>

        <div class="panel-body">

            <!-- Inicio del panel -->
            <p class="row" >

            <form action={{ url("ingresarCompra") }} method="post">
                {{ csrf_field() }}
                <input type="hidden" name="purchase_id" value="{{ $compra->id }}">

                <label for="category_id">{{ trans( 'ingr_compra.l_categoria' ) }}</label>
                <select class="form-control"
                        name="category_id" id="category_id">
                    <option value="">{{ trans( 'ingr_compra.isd_categoria' ) }}</option>
                    @foreach( $categorias as $categoria )
                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                    @endforeach

                </select><br>

                <label for="supplier_id">{{ trans( 'ingr_compra.l_proveedor' ) }}</label>
                <select class="form-control"
                        name="supplier_id" id="supplier_id">
                    <option value="">{{ trans( 'ingr_compra.isd_proveedor' ) }}</option>
                    @foreach( $proveedores as $proveedor )
                        <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                    @endforeach

                </select><br>

                <label for="asset_name">{{ trans( 'ingr_compra.l_nombre_activo' )  }}</label>
                <input type="text" class="form-control" name="asset_name" id="asset_name" value=""
                       placeholder="{{ trans( 'ingr_compra.ph_nombre_activo' ) }}"><br>

                <label for="asset_price">{{ trans( 'ingr_compra.l_precio_activo' )  }}</label>
                <input type="number" class="form-control" name="asset_price" id="asset_price" step=any value=""><br>


                <label for="comment">{{ trans( 'ingr_compra.l_descripcion' ) }}</label>
                        <textarea class="form-control" name="description" rows="5" id="comment"
                                  placeholder="{{ trans( 'ingr_compra.ph_descipcion_activo' ) }}"></textarea><br>

                <table class="table table-striped col-xs-12">
                    <thead>
                    <tr>
                        <th class="col-xs-2">{{ trans( 'ingr_compra.th_codigo' ) }}</th>
                        <th class="col-xs-4">{{ trans( 'ingr_compra.th_nombre' ) }}</th>
                        <th class="col-xs-3">{{ trans( 'ingr_compra.th_precio' ) }}</th>
                        <th class="col-xs-3">{{ trans( 'ingr_compra.th_accion' ) }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if( count($activos) == 0 )
                        <tr>
                            <td>{{ trans( 'Sin activos associados a la compra' ) }}</td>
                        </tr>

                    @else
                        @foreach($activos as $activo)
                            <tr>
                                <td>{{ $activo->code }} </td>
                                <td>{{ $activo->name }} </td>
                                <td>{{ $activo->price }}</td>
                                <td>
                                    <input type="button" class="btn btn-danger"
                                           onclick="javascript:confirmarEliminar(
                                                   '{{ url('eliminarActivo/'.$activo->id) }}',
                                                   '{{ $activo->name  }}',
                                                   '{{ trans( 'ingr_compra.jal_confirm_elmnar' )}}'
                                                   )"
                                           value="{{ trans( 'ingr_compra.btn_eliminar' ) }}">
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>

                <div class="row">
                    <div class="btn-group col-xs-3">
                        <button type="button"
                                onclick='window.location ="{{ url("gestiones") }}"'
                                class="btn btn-primary">
                            {{ trans( 'ingr_compra.btn_salir' ) }}
                        </button>
                        <button type="submit"
                                class="btn btn-success">
                            {{ trans( 'ingr_compra.btn_agregar' ) }}
                        </button>
                    </div>
                </div>

            </form>



            </p>
            <!-- fin del panel -->


        </div>

    </div>
    </div>
@endsection