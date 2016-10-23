@extends('layouts.principal')

@section('titulo')
    {{ 'Ingreso de compra' }}
@endsection

@section('contenido')
    @include('layouts.mensajes')

    <div class="panel panel-info">
        <div class="panel-heading ">

            <div class="row">
                <h3 class="col-xs-12"> {{ 'Compra Nº:'.$compra->id }} </h3>
            </div>

        </div>

        <div class="panel-body">

            <!-- Inicio del panel -->
            <p class="row" >

            <form action={{ url("ingresarCompra") }} method="post">
                {{ csrf_field() }}
                <input type="hidden" name="purchase_id" value="{{ $compra->id }}">

                <label for="category_id">{{ trans( 'Categoría' ) }}</label>
                <select class="form-control"
                        name="category_id" id="category_id">
                    <option value="0">{{ 'ingrese una categoría' }}</option>
                    @foreach( $categorias as $categoria )
                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                    @endforeach

                </select><br>

                <label for="supplier_id">{{ trans( 'Proveedor' ) }}</label>
                <select class="form-control"
                        name="supplier_id" id="supplier_id">
                    <option value="0">{{ 'Seleccione un proveedor' }}</option>
                    @foreach( $proveedores as $proveedor )
                        <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                    @endforeach

                </select><br>

                <label for="asset_name">{{ 'Nombre del Activo'  }}</label>
                <input type="text" class="form-control" name="asset_name" id="asset_name" value=""
                       placeholder="{{ 'ingrese nombre activo' }}"><br>

                <label for="asset_price">{{ 'Precio del activo'  }}</label>
                <input type="number" class="form-control" name="asset_price" id="asset_price" value=""
                       ><br>


                <label for="comment">{{ 'Descripción' }}</label>
                        <textarea class="form-control" name="description" rows="5" id="comment"
                                  placeholder="{{ trans( 'Ingrese la descripción del activo' ) }}"></textarea><br>

                <table class="table table-striped col-xs-12">
                    <thead>
                    <tr>
                        <th class="col-xs-2">{{ 'Código'   }}</th>
                        <th class="col-xs-4">{{ 'Nombre'   }}</th>
                        <th class="col-xs-3">{{ 'Precio'   }}</th>
                        <th class="col-xs-3">{{ 'Acción'   }}</th>
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
                                <td>{{ 'accion' }}      </td>
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
                            {{ trans( 'Salir' ) }}
                        </button>
                        <button type="submit"
                                class="btn btn-success">
                            {{ 'Agregar' }}
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