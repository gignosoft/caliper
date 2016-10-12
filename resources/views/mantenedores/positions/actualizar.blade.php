@extends('layouts.mantenedores.actualizar.base')

@section('titulo')
    {{ trans('mant_cargos.tit_actualizar') }}
@endsection

@section('titulo_principal')
    {{ trans('mant_cargos.tit_actualizar') }}
@endsection

@section('formulario')
    <form action="{{ url('actualizarCargo') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $cargo->id }}">


        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('mant_cargos.tp_cargos') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mant_cargos.l_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $cargo->name }}">
                        </div>

                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="levelPositions_id">{{ trans('mant_cargos.l_nivel') }}</label>
                            <select class="form-control" name="levelpositions_id" id="levelpositions_id"  >
                                @foreach( $niveles as $nivel )

                                    @if( $nivel->id == $cargo->levelpositions_id )
                                        <option selected value="{{ $nivel->id }}">{{ $nivel->level }}</option>
                                    @else
                                        <option value="{{ $nivel->id }}">{{ $nivel->level }}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>


                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="department_id">{{ trans('mant_cargos.l_nivel') }}</label>
                            <select class="form-control" name="department_id" id="department_id"  >
                                @foreach( $departments as $department )

                                    @if( $department->id == $cargo->department_id )
                                        <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                                    @else
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
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
            <input type="submit" class="btn btn-primary " value="{{ trans('mant_cargos.btn_guardar') }}">                &nbsp;
            <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarCargo") }}"'
                   value="{{ trans('mant_cargos.btn_volver') }}">
        </div>
        <!-- fin botones-->


    </form>
@endsection

