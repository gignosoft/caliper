@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mantLvDepartamentos.tit_verNivelDepartamento' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mantLvDepartamentos.tp_detalle_nivel' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans('mantLvDepartamentos.l_level') }}</div>
        <div class="col-xs-9">: {{ $nivel->level }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans('mantLvDepartamentos.l_departamentos') }}</div>
    <div class="col-xs-9">
        <ul>
            @if( sizeof($departamentos) > 0)
                @foreach( $departamentos as $departamento )
                    <li>{{ $departamento->name }}</li>
                @endforeach
            @else
                <li>{{ trans('mantLvDepartamentos.li_sin_departamento') }} </li>
            @endif



        </ul>

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarNivelDepartamento") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mantLvDepartamentos.btn_volver' ) }}"
@endsection