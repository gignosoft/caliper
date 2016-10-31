@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_paises.tit_listar' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_paises.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_paises.lvm_nombre' ) }}</div>
    <div class="col-xs-9">: {{ $pais->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3"><br> {{ trans( 'mant_paises.lvm_r_1' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $pais->cities ) == 0 )
            {{ trans( 'mant_paises.lvm_sele_pais' ) }}
        @else
            <ul>
                @foreach( $pais->cities as $citie )
                   <li>{{ $citie->name  }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!--    Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarPais") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_paises.btn_volver' ) }}"
@endsection