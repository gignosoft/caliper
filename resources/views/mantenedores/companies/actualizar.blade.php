@extends('layouts.mantenedores.insertar.base')

@section('titulo')
    {{ trans('mant_companies.tit_actualizar') }}
@endsection

@section('titulo_principal')
    {{ trans('mant_companies.tit_actualizar') }}
@endsection

@section('formulario')

    <form action="{{ url('actualizarEmpresa') }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $empresa->id }}" >
        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('mant_companies.tp_datos_g1') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mant_companies.l_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $empresa->name }}">
                        </div>

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="identifier">{{ trans('mant_companies.l_id') }}</label>
                            <input type="text" class="form-control" name="identifier" id="identifier"
                                   value="{{ $empresa->identifier }}">
                        </div>

                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="levelPositions_id">{{ trans('mant_companies.l_rubro') }}</label>
                            <select class="form-control" name="activity_id" id="activity_id"  >
                                @foreach( $rubros as $rubro )
                                    @if( $rubro->id == $empresa->activity_id  )
                                        <option selected value="{{ $rubro->id }}">{{ $rubro->name }}</option>
                                    @else
                                        <option value="{{ $rubro->id }}">{{ $rubro->name }}</option>
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
            <input type="submit" class="btn btn-primary " value="{{ trans('mant_companies.btn_guardar') }}">

            <input type="button" class="btn btn-primary "
                   onclick='window.location ="{{ route("listarEmpresa") }}"'
                   value="{{ trans('mant_companies.btn_volver') }}">
        </div>
        <div class="row"> </div><hr/>
        <!-- fin botones-->
    </form>

@endsection