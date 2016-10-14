@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_state_assignments.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_state_assignments.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_state_assignments.lvm_nombre' ) }}</div>
    <div class="col-xs-9">: {{ $estadoAsignacion->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_state_assignments.lvm_rel_1' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $estadoAsignacion->assignments ) == 0 )
            {{ trans( 'mant_state_assignments.msj_sin' ) }}
        @else
            ( {{ count( $estadoAsignacion->assignments ) }} )
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarEstadoAsignacion") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_state_assignments.btn_volver' ) }}"
@endsection