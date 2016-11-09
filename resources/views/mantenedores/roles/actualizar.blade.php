@extends('layouts.mantenedores.insertar.base')

@section('titulo')
    {{ trans('mant_roles.tit_actualizar') }}
@endsection

@section('titulo_principal')
    {{ trans('mant_roles.tit_actualizar') }}
@endsection

@section('formulario')

    <form action="{{ url('actualizarRol') }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $rol->id }}" >
        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('mant_roles.tp_datos_g1') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mant_roles.l_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $rol->name }}">
                        </div>

                        <!-- FIN DEL CUERPO DEL GRUPO 1 -->

                        <!--inicio menus-->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="menus">{{ trans('Acceso a menus') }}</label>
                            <div class="row">
                                @foreach($menus as $menu)
                                    <div class=" col-xs-6 ">

                                        @if( isset( $menu->roles->find($rol->id)->id ) )
                                            <input type="checkbox" name="menus[]" id="{{ $menu->id }}" value="{{ $menu->id }}" checked>{{ ' '.$menu->name }}
                                        @else
                                            <input type="checkbox" name="menus[]" id="{{ $menu->id }}" value="{{ $menu->id }}">{{ ' '.$menu->name }}
                                        @endif

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--fin menus-->

                    </div>
                </div>
            </div>
            <!--fin Datos personales-->

        </div>


        <!--botones-->
        <div class="row col-sm-12 padding col-xs-12  margenes-botones">
            <input type="submit" class="btn btn-primary " value="{{ trans('mant_roles.btn_guardar') }}">

            <input type="button" class="btn btn-primary "
                   onclick='window.location ="{{ route("listarRol") }}"'
                   value="{{ trans('mant_roles.btn_volver') }}">
        </div>
        <div class="row"> </div><hr/>
        <!-- fin botones-->
    </form>

@endsection