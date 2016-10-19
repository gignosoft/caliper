@extends('layouts.principal')

@section('titulo')
    {{ 'Asignar activo' }}
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

                <h4> {{ 'Buscar usuario' }} </h4>

                <table class="table table-striped col-sm-6 col-xs-12">
                    <thead>
                    <tr>
                        <th>{{ 'Rut'      }}</th>
                        <th>{{ 'Nombre'   }}</th>
                        <th>{{ 'Apellido'   }}</th>
                        <th>{{ 'Acción'   }}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if( count( $usuarios ) == 0 )
                        <tr>
                            <td colspan="4">{{ 'Sin resultados' }}</td>
                            <td> <button type="button" class="btn btn-primary  "
                                         onclick='window.location ="{{ url("asignarActivo") }}"'
                                >{{ 'Volver' }}
                                </button></td>
                        </tr>
                    @else
                        <form action={{ url("asignarActivo") }} method="post">
                            {{ csrf_field() }}
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="identifier" id="identifier"
                                           placeholder="{{ trans('mantusuarios.ph_identifier') }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                           placeholder="{{ trans('mantusuarios.ph_first_name') }}">
                                </td>

                                <td>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                           placeholder="{{ trans('mantusuarios.ph_last_name') }}">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary ">{{ trans('mantusuarios.btn_buscar') }}</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->identifier                                                  }}</td>
                                <td>{{ $usuario->first_name                                                  }}</td>
                                <td>{{ $usuario->last_name                                                   }}</td>

                                <td>
                                    <button class="btn btn-default "
                                            onclick="window.location = '{{ url('crearActivo/'.$usuario->id  ) }}' "
                                             > {{ 'Assignar' }}

                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

                @if($buscar == 'false')
                    {!! $usuarios->render() !!}
                @endif

            </div>

        </div>
    </div>

@endsection