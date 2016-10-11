@extends('layouts.mantenedores.actualizar.base')

@section('titulo')
    {{ trans('xxxxxxxxxx.tit_xxxxxxxxxxx') }}
@endsection

@section('titulo_principal')
    {{ trans('xxxxxxxxxx.tit_xxxxxxxxxxx') }}
@endsection

@section('formulario')
    <form action="{{ url('actualizar_xxxxxxxxxx') }}" method="post">
        {{ csrf_field() }}

        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('xxxxxxxxxx.tp_xxxxxxxxxx') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="xxxxxxxxxx">{{ trans('mant_xxxxxxxxxx.l_xxxxxxxxxx') }}</label>
                            <input type="text" class="form-control" name="xxxxxxxxxx" id="xxxxxxxxxx" value=""
                                   placeholder="{{ trans('mant_cargos.ph_name') }}">
                        </div>

                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="xxxxxxxxxx">{{ trans('mant_xxxxxxxxxx.l_xxxxxxxxxx') }}</label>
                            <select class="form-control" name="xxxxxxxxxx" id="xxxxxxxxxx"  >
                                @foreach( $niveles as $nivel )
                                    <option value="{{ $nivel->id }}">{{ $nivel->level }}</option>
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
            <input type="submit" class="btn btn-primary " value="{{ trans('mant_xxxxxxxxxx.btn_guardar') }}">

            <input type="button" class="btn btn-primary "
                   onclick='window.location ="{{ route("xxxxxxxxxx") }}"'
                   value="{{ trans('mant_xxxxxxxxxx.btn_salir') }}">
        </div>
        <div class="row"> </div><hr/>
        <!-- fin botones-->

    </form>
@endsection

