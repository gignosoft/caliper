@extends('layouts.principal')

@section('titulo')
    {{ trans( 'asig_activo.tit_asgnar_activo' ) }}
@endsection

@section('contenido')




    <div class="container">
        @include('layouts.mensajes')

        <div class="panel panel-info">
            <div class="panel-heading ">

                <div class="row">
                    <h3 class="col-xs-12"> {{ trans( 'asig_activo.tit_asgnar_activo2' ).
                    $usuario->first_name.' '.$usuario->last_name }} </h3>
                </div>

            </div>

            <div class="panel-body">

                <!-- Inicio del panel -->
                <p class="row" >

                    <form action={{ url("crearActivo") }} method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $usuario->id }}">

                        <label for="category_id">{{ trans( 'asig_activo.l_categoria' ) }}</label>
                        <select class="form-control"
                                onchange="cargaComboAsset('../cargaActivo/'+this.value)"
                                name="category_id" id="category_id">
                            <option value="0">{{ trans( 'asig_activo.isd_categoria' ) }}</option>
                            @foreach( $categorias as $categoria )
                                <option value="{{ $categoria->id }}">
                                    {{ $categoria->name.' ('.count($categoria->assets).')' }}
                                </option>
                            @endforeach

                        </select><br>

                        <label for="category_id">{{ 'Activo' }}</label>
                        <div id="assets">
                            <select class="form-control" name="asset_id" id="asset_id">
                                <option value="">{{ trans( 'asig_activo.isd_activo' ) }}</option>
                            </select>
                        </div><br>

                        <label for="comment">{{ 'Comentario' }}</label>
                        <textarea class="form-control" name="description" rows="5" id="comment"
                                placeholder="{{ trans( 'asig_activo.ph_description' ) }}"></textarea><br>

                        <table class="table table-striped col-xs-12">
                            <thead>
                            <tr>
                                <th class="col-xs-3">{{ trans( 'asig_activo.th_codigo' ) }}</th>
                                <th class="col-xs-4">{{ trans( 'asig_activo.th_nombre' )  }}</th>
                                <th class="col-xs-3">{{ trans( 'asig_activo.th_estado' )  }}</th>
                                <th class="col-xs-2">{{ trans( 'asig_activo.th_accion' )  }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if( count($asignaciones) == 0 )
                                <tr>
                                    <td>{{ trans( 'asig_activo.msj_sin_activos' ) }}</td>
                                </tr>

                            @else
                                @foreach( $asignaciones as $asignacion )
                                    <tr>
                                        <td >{{ $asignacion->assets->find( $asignacion->asset_id )->code }}</td>
                                        <td >{{ $asignacion->assets->find( $asignacion->asset_id )->name }}</td>
                                        <td >{{ $asignacion->assets->find( $asignacion->asset_id )
                                    ->state_assets->find( $asignacion->assets->find( $asignacion->asset_id )->state_asset_id )->name}}</td>
                                        <td >
                                            @if( ( date_diff( $ahora,$asignacion->created_at )->h ) > 1  ||
                                            ( date_diff( $ahora,$asignacion->created_at )->d ) > 0 )
                                            <input type="button" class="btn btn-warning"
                                                    onclick='window.location =" {{ url('entregaActivo/'.$asignacion->id) }} "'
                                                    value="{{ trans( 'asig_activo.btn_entregar' ) }}">
                                            @else
                                                <input type="button" class="btn btn-danger"
                                                       onclick="javascript:confirmarEliminar(
                                                '{{ url('eliminarAsignacion/'.$asignacion->id) }}',
                                                '{{ $asignacion->assets->find( $asignacion->asset_id )->name  }}',
                                                '{{ trans('asig_activo.jal_confirm_elmnar')}}'
                                                )"
                                                       value="{{ trans( 'asig_activo.btn_eliminar' ) }}">
                                            @endif
                                        </td>


                                    </tr>

                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        <div class="row">
                            <div class="btn-group col-xs-3">
                                <button type="button" onclick='window.location ="{{ url("asignarActivo") }}"' class="btn btn-primary"> {{ trans( 'asig_activo.btn_volver' ) }}</button>
                                <button type="submit" class="btn btn-success"> {{ trans( 'asig_activo.btn_asignar' ) }}</button>
                            </div>
                        </div>

                    </form>



                </p>
                <!-- fin del panel -->

            </div>

        </div>
    </div>


@endsection