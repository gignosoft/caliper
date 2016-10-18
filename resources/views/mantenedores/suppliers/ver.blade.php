@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_activities.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_activities.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_activities.lvm_nombre' ) }}</div>
    <div class="col-xs-9">: {{ $rubro->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_activities.lvm_empresas' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $rubro->companies ) == 0 )
            {{ trans( 'mant_activities.msj_sin' ) }}
        @else
            <ul>
                @foreach( $rubro->companies as $company )
                    <li>{{ $company->name }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarRubro") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_activities.btn_volver' ) }}"
@endsection