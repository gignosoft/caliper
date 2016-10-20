@extends('layouts.principal')

@section('titulo')
    {{ 'asignar activo' }}
@endsection

@section('contenido')




    <div class="container">
        @include('layouts.mensajes')

        <div class="panel panel-info">
            <div class="panel-heading ">
                <div class="row">
                    <h3 class="col-xs-12"> {{ 'Asignar activo' }} </h3>
                </div>

            </div>

            <div class="panel-body">

                <h5> {{  'Assignando activo a:'  }} {{ $usuario->first_name.' '.$usuario->last_name }}</h5>

                <p class="row" >

                    <form action={{ url("crearActivo") }} method="post">
                        {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{ $usuario->id }}">

                        <label for="category_id">{{ 'Categoría' }}</label>
                        <select class="form-control"
                                onchange="cargaComboAsset('../cargaActivo/'+this.value)"
                                name="category_id" id="category_id">
                            <option value="0">{{ 'Seleccione una categoría' }}</option>
                            @foreach( $categorias as $categoria )
                                <option value="{{ $categoria->id }}">
                                    {{ $categoria->name.' ('.count($categoria->assets).')' }}
                                </option>
                            @endforeach

                        </select><br>

                        <label for="category_id">{{ 'Activo' }}</label>
                        <div id="assets">
                            <select class="form-control" name="asset_id" id="asset_id">
                                <option value="">{{ 'Seleccione una categoría para cargar los activos' }}</option>
                            </select>
                        </div><br>

                        <label for="comment">{{ 'Comentario' }}</label>
                        <textarea class="form-control" name="description" rows="5" id="comment"
                                placeholder="{{ 'Ingrese un comentario.' }}"></textarea><br>


                    <div class="row">
                        <div class="btn-group col-xs-3">
                            <button type="submit" class="btn btn-success"> {{ 'Asignar' }}</button>
                        </div>
                    </div>

                    </form>

                <table class="table table-striped col-xs-12">
                    <thead>
                    <tr>
                        <th class="col-xs-3">{{ 'Código' }}</th>
                        <th class="col-xs-4">{{ 'nombre' }}</th>
                        <th class="col-xs-3">{{ 'Estado' }}</th>
                        <th class="col-xs-2">{{ 'Acción' }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if( count($asignaciones) == 0 )
                            <tr>
                                <td>{{ 'Sin activos assignados' }}</td>
                            </tr>

                        @else
                            @foreach( $asignaciones as $asignacion )
                                <tr>
                                    <td >{{ $asignacion->assets->find( $asignacion->asset_id )->code }}</td>
                                    <td >{{ $asignacion->assets->find( $asignacion->asset_id )->name }}</td>
                                    <td >{{ $asignacion->assets->find( $asignacion->asset_id )
                                ->state_assets->find( $asignacion->assets->find( $asignacion->asset_id )->state_asset_id )->name}}</td>
                                    <td >
                                        <button> {{ 'Eliminar' }} </button> </td>
                                </tr>

                            @endforeach
                        @endif

                    </tbody>
                </table>

                </p>



            </div>

        </div>
    </div>


@endsection