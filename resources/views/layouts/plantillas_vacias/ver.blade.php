@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'xxxxxxxxxxxxxx.tit_verxxxxxxxxxxxxxx' ) }}
@endsection

@section('panel_title')
    {{ trans( 'xxxxxxxxxxxxxx.tit_verxxxxxxxxxxxxxx' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
        <div class="col-xs-3">{{ trans( 'xxxxxxxxxxxxxx.lvm_xxxxxxxxxxxxxx' ) }}</div>
        <div class="col-xs-9">: {{ $usuario->first_name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_roles' ) }}</div>
    <div class="col-xs-9">:<br/>
        <ul>
            @foreach( $usuario->roles as $role )
                <li>{{ $role->name }}</li>
            @endforeach
        </ul>
    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarxxxxxxxxxxxxxx") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'xxxxxxxxxxxxxx.btn_volver' ) }}"
@endsection




