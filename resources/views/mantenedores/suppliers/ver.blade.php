@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_suppliers.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_suppliers.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_suppliers.lvm_nombre' ) }}</div>
        <div class="col-xs-9">: {{ $proveedor->name }}</div>
    </p>

    <!-- Fila fila de información normal -->
    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_suppliers.lvm_phone' ) }}</div>
        <div class="col-xs-9">: {{ $proveedor->phone }}</div>
    </p>

    <!-- Fila fila de información normal -->
    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_suppliers.lvm_email' ) }}</div>
        <div class="col-xs-9">: {{ $proveedor->email }}</div>
    </p>

    <!-- Fila fila de información normal -->
    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_suppliers.lvm_country' ) }}</div>
        <div class="col-xs-9">: {{
        $proveedor->cities->find( $proveedor->city_id )
        ->countries->find( $proveedor->cities->find( $proveedor->city_id )->country_id )->name

        }}</div>
    </p>

    <!-- Fila fila de información normal -->
    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_suppliers.lvm_city' ) }}</div>
        <div class="col-xs-9">: {{ $proveedor->cities->find( $proveedor->city_id )->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_suppliers.lvm_assets' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $proveedor->assets ) == 0 )
            {{ trans( 'mant_suppliers.msj_sin_1' ) }}
        @else
            <ul>
                @foreach( $proveedor->assets as $asset )
                    <li>{{ $asset->name }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarProveedor") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_suppliers.btn_volver' ) }}"
@endsection