@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_departamentos.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_departamentos.tit_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_departamentos.lvm_departamento' ) }}</div>
        <div class="col-xs-9">: {{ $departamento->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_departamentos.lvm_cargos' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $departamento->positions ) == 0 )
            {{ trans( 'mant_departamentos.msj_sin_cargos' ) }}
        @else
            <ul>
                @foreach( $departamento->positions as $cargo )
                    <li>{{ $cargo->name }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarDepartamentos") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_departamentos.btn_volver' ) }}"
@endsection