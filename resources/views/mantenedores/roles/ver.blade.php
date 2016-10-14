@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_roles.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_roles.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_roles.lvm_nombre' ) }}</div>
    <div class="col-xs-9">: {{ $rol->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_roles.lvm_r_1' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $rol->users ) == 0 )
            {{ trans( 'mant_roles.msj_sin' ) }}
        @else
            <ul>
                @foreach( $rol->users as $user )
                    <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarRol") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_roles.btn_volver' ) }}"
@endsection