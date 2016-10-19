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

                    <form action={{ url("#") }} method="post">
                        {{ csrf_field() }}


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
                        <textarea class="form-control" rows="5" id="comment"
                                placeholder="{{ 'Ingrese un comentario.' }}"></textarea><br>


                        <button type="submit" class="btn btn-primary ">{{ trans('mantusuarios.btn_buscar') }}</button>

                        </tr>
                    </form>

                </p>



            </div>

        </div>
    </div>


@endsection