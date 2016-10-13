@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_state_assets.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_state_assets.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_state_assets.lvm_nombre' ) }}</div>
    <div class="col-xs-9">: {{ $estado->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_state_assets.lvm_activos' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $estado->assets ) == 0 )
            {{ trans( 'mant_state_assets.msj_sin_activos' ) }}
        @else
            <ul>
                @foreach( $estado->assets as $asset )
                    <li>{{ $asset->name }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarEstadoActivo") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_state_assets.btn_volver' ) }}"
@endsection