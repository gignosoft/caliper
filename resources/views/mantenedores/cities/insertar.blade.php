@extends('layouts.mantenedores.insertar.base')

@section('titulo')
    {{ trans('mant_cities.tit_insertar') }}
@endsection

@section('titulo_principal')
    {{ trans('mant_cities.tit_insertar') }}
@endsection

@section('formulario')

    <form action="{{ url('insertarCiudad') }}" method="post">
        {{ csrf_field() }}

        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('mant_cities.tp_datos_g1') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mant_cities.l_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value=""
                                   placeholder="{{ trans('mant_cities.ph_name') }}">
                        </div>
                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="xxxxxxxxxx">{{ trans('mant_cities.l_id_foreing_1') }}</label>
                            <select class="form-control" name="country_id" id="country_id"  >
                                @foreach( $paises as $pais )
                                        <option value="{{ $pais->id }}">{{ $pais->name }}</option>
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
            <input type="submit" class="btn btn-primary " value="{{ trans('mant_cities.btn_guardar') }}">

            <input type="button" class="btn btn-primary "
                   onclick='window.location ="{{ route("listarCiudad") }}"'
                   value="{{ trans('mant_cities.btn_volver') }}">
        </div>
        <div class="row"> </div><hr/>
        <!-- fin botones-->
    </form>

@endsection