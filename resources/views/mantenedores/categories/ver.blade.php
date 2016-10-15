@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_categorias.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_categorias.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_categorias.lvm_nombre' ) }}</div>
    <div class="col-xs-9">: {{ $categoria->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_categorias.lvm_r_1' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $categoria->assets ) == 0 )
            {{ trans( 'mant_categorias.msj_sin' ) }}
        @else
            <ul>
                @foreach( $categoria->assets as $asset )
                    <li>{{ $asset->name }} </li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarCategorias") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_categorias.btn_volver' ) }}"
@endsection