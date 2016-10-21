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
                    <h3 class="col-xs-12"> {{ trans( 'asig_activo.tit_asgnar_activo' ) }} </h3>
                </div>

                <div class="row">
                    <div class="col-xs-11"></div>

                    <div class="btn-group col-xs-1">
                        <button type="button"
                                class="btn btn-primary "
                                onclick='window.location =" {{ url('gestiones') }} "'>
                                {{ trans( 'asig_activo.btn_salir' ) }}
                        </button>
                    </div>

                </div>

            </div>

            <div class="panel-body">

                <h4> {{ 'Buscar usuario' }} </h4>

                <table class="table table-striped col-sm-6 col-xs-12">
                    <thead>
                    <tr>
                        <th>{{ trans( 'asig_activo.th_identifier' ) }}</th>
                        <th>{{ trans( 'asig_activo.th_first_name' ) }}</th>
                        <th>{{ trans( 'asig_activo.th_last_name' )  }}</th>
                        <th>{{ trans( 'asig_activo.th_action' )     }}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if( count( $usuarios ) == 0 )
                        <tr>
                            <td colspan="4">{{ trans( 'asig_activo.msj_sinResultados' ) }}</td>
                            <td> <button type="button" class="btn btn-primary  "
                                         onclick='window.location ="{{ url("asignarActivo") }}"'>
                                        {{ trans( 'asig_activo.btn_volver' ) }}
                                </button>
                            </td>
                        </tr>
                    @else
                        <form action={{ url("asignarActivo") }} method="post">
                            {{ csrf_field() }}
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="identifier" id="identifier"
                                           placeholder="{{ trans('asig_activo.ph_identifier') }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                           placeholder="{{ trans('asig_activo.ph_first_name') }}">
                                </td>

                                <td>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                           placeholder="{{ trans('asig_activo.ph_last_name') }}">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary ">{{ trans('asig_activo.btn_buscar') }}</button>
                                </td>
                            </tr>
                        </form>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->identifier  }}</td>
                                <td>{{ $usuario->first_name  }}</td>
                                <td>{{ $usuario->last_name   }}</td>

                                <td>
                                    <button class="btn btn-default "
                                        onclick="window.location = '{{ url('crearActivo/'.$usuario->id  ) }}' ">
                                        {{ trans( 'asig_activo.btn_asignar' )}}
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