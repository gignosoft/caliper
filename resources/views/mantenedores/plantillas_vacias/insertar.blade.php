@extends('layouts.mantenedores.insertar.base')

@section('titulo')
    {{ trans('++++++++++++++++++.++++++++++++++++') }}
@endsection

@section('titulo_principal')
    {{ trans('++++++++++++++++++.++++++++++++++++') }}
@endsection

@section('formulario')
    <form action="{{ url('++++++++++++++') }}" method="post">
        {{ csrf_field() }}

        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('++++++++++++++++++.++++++++++++++++') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                    <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="++++++++++++">{{ trans('++++++++++++++++++.++++++++++++++++') }}</label>
                            <input type="text" class="form-control" name="++++++++++++" id="++++++++++++" value=""
                                   placeholder="{{ trans('++++++++++++++++++.++++++++++++++++') }}">
                        </div>

                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="levelPositions_id">{{ trans('++++++++++++++++++.++++++++++++++++') }}</label>
                            <select class="form-control" name="++++++++++++" id="++++++++++++"  >
                                <option value="" >{{ trans('++++++++++++++++++.++++++++++++++++') }}</option>
                                @foreach( $XXXXXXXXS as $XXXXXXXX )
                                    <option value="{{ $XXXXXXXX }}">{{ $XXXXXXXX }}</option>
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
            <input type="submit" class="btn btn-primary " value="{{ trans('++++++++++++++++++.++++++++++++++++') }}">

            <input type="button" class="btn btn-primary "
                   onclick='window.location ="{{ route("++++++++++++++++") }}"'
                   value="{{ trans('++++++++++++++++++.++++++++++++++++') }}">
        </div>
        <div class="row"> </div><hr/>
        <!-- fin botones-->

    </form>
@endsection