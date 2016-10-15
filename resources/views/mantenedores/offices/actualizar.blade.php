@extends('layouts.mantenedores.insertar.base')

@section('titulo')
    {{ trans('mant_offices.tit_actualizar') }}
@endsection

@section('titulo_principal')
    {{ trans('mant_offices.tit_actualizar') }}
@endsection

@section('formulario')

    <form action="{{ url('actualizarOficina') }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $oficina->id }}" >
        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('mant_offices.tp_datos_g1') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mant_offices.l_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $oficina->name }}">
                        </div>

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="description">{{ trans('mant_offices.l_description') }}</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   value=" {{ $oficina->description }} " >
                        </div>

                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="levelPositions_id">{{ trans('mant_offices.l_ciudad') }}</label>
                            <select class="form-control" name="city_id" id="city_id"  >
                                @foreach( $ciudades as $ciudad )
                                    @if( $ciudad->id == $oficina->city_id )
                                        <option selected value="{{ $ciudad->id }}">{{ $ciudad->name }}</option>
                                    @else
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->name }}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>

                        <!-- FIN DEL CUERPO DEL GRUPO 1 -->
                    </div>
                </div>
            </div>
            <!--fin Datos personales-->

        </div>


        <!--botones-->
        <div class="row col-sm-12 padding col-xs-12  margenes-botones">
            <input type="submit" class="btn btn-primary " value="{{ trans('mant_offices.btn_guardar') }}">

            <input type="button" class="btn btn-primary "
                   onclick='window.location ="{{ route("listarOficina") }}"'
                   value="{{ trans('mant_offices.btn_volver') }}">
        </div>
        <div class="row"> </div><hr/>
        <!-- fin botones-->
    </form>

@endsection