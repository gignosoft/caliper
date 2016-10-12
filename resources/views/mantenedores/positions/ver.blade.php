@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_cargos.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_cargos.tit_ver' ) }}
@endsection

@section('panel_body')

    <!-- Nombre  -->
    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_cargos.lvm_name' ) }}</div>
        <div class="col-xs-9">: {{ $cargo->name }}</div>
    </p>

    <!-- Nivel del cargo  -->
    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_cargos.lvm_nivel' ) }}</div>
        <div class="col-xs-9">: {{ $cargo->levelPositions->find($cargo->levelpositions_id)->level }}</div>
    </p>

    <!-- departamento  -->
    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_cargos.lvm_departamento' ) }}</div>
        <div class="col-xs-9">: {{ $cargo->departments->find($cargo->department_id)->name }}</div>
    </p>

    <!-- Usuarios  -->
    <p class="row">
        <div class="col-xs-3">{{ trans( 'mant_cargos.lvm_usuarios' ) }}</div>
    @if( count( $cargo->users ) == 0 )
        <div class="col-xs-9">: {{ trans( 'mant_cargos.msj_sin_usuarios' ) }} </div>
    @else
        <div class="col-xs-9">
            <ul>
                @foreach( $cargo->users as $user )
                    <li>{{ $user->first_name }} {{ $user->last_name  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </p>

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarCargo") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_cargos.btn_volver' ) }}"
@endsection