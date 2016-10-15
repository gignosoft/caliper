@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_offices.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_offices.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_offices.lvm_nombre' ) }}</div>
    <div class="col-xs-9">: {{ $oficina->name }}</div>
    </p>

    <!-- Fila fila de información normal -->

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_offices.lvm_description' ) }}</div>
    <div class="col-xs-9">: {{ $oficina->description }}</div>
    </p>

    <!-- Fila fila de información normal -->

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_offices.lvm_city' ) }}</div>
    <div class="col-xs-9">: {{ $oficina->cities->find( $oficina->id )->name }}</div>
    </p>

    <!-- Fila fila de información normal -->



    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarOficina") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_offices.btn_volver' ) }}"
@endsection