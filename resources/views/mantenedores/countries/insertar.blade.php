@extends('layouts.mantenedores.insertar.base')

@section('titulo')
    {{ trans('mant_paises.tit_listar') }}
@endsection

@section('titulo_principal')
    {{ trans('mant_paises.tit_actualizar') }}
@endsection

@section('formulario')

    <form action="{{ url('insertarPais') }}" method="post">
        {{ csrf_field() }}

        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('mant_paises.tit_insertar') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mant_paises.th_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value=""
                                   placeholder="{{ trans('mant_paises.ph_name') }}">
                        </div>

                        <!-- FIN DEL CUERPO DEL GRUPO 1 -->
                    </div>
                </div>
            </div>
            <!--fin Datos personales-->

        </div>


        <!--botones-->
        <div class="row col-sm-12 padding col-xs-12  margenes-botones">
            <input type="submit" class="btn btn-primary " value="{{ trans('mant_paises.btn_guardar') }}">

            <input type="button" class="btn btn-primary "
                   onclick='window.location ="{{ route("listarPais") }}"'
                   value="{{ trans('mant_paises.btn_volver') }}">
        </div>
        <div class="row"> </div><hr/>
        <!-- fin botones-->
    </form>

@endsection