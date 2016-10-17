@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_companies.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_companies.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_companies.lvm_nombre' ) }}</div>
        <div class="col-xs-9">: {{ $empresa->name }}</div>
    </p>

    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_companies.lvm_rubro' ) }}</div>
        <div class="col-xs-9">: {{ $empresa->activities->find($empresa->activity_id)->name }}</div>
    </p>


    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_companies.lvm_r_1' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $empresa->suppliers ) == 0 )
            {{ trans( 'mant_companies.msj_sin' ) }}
        @else
            <ul>
                @foreach( $empresa->suppliers as $supplier )
                    <li>{{ $supplier->name }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarEmpresa") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_companies.btn_volver' ) }}"
@endsection