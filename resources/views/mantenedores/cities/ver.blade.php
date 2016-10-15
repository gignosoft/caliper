@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mant_cities.tit_ver' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mant_cities.tp_ver' ) }}
@endsection

@section('panel_body')

    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_cities.lvm_nombre' ) }}</div>
    <div class="col-xs-9">: {{ $ciudad->name }}</div>
    </p>

    <!-- Fila fila de información normal -->
    <!-- Fila de información normal -->

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_cities.lvm_pais' ) }}</div>
    <div class="col-xs-9">: {{ $ciudad->countries->find($ciudad->country_id)->name }}</div>
    </p>

    <!-- Fila fila de información normal -->


    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_cities.lvm_r_1' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $ciudad->users ) == 0 )
            {{ trans( 'mant_cities.msj_sin' ) }}
        @else
            <ul>
                @foreach( $ciudad->users as $user )
                    <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_cities.lvm_r_2' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $ciudad->suppliers ) == 0 )
            {{ trans( 'mant_cities.msj_sin_r1' ) }}
        @else
            <ul>
                @foreach( $ciudad->suppliers as $supplier )
                    <li>{{ $supplier->name }} </li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

    <!-- Fila de información tipo lista  -->
    <p class="row">
    <div class="col-xs-3">{{ trans( 'mant_cities.lvm_r_3' ) }}</div>
    <div class="col-xs-9">:
        @if( count( $ciudad->offices ) == 0 )
            {{ trans( 'mant_cities.msj_sin_r2' ) }}
        @else
            <ul>
                @foreach( $ciudad->offices as $office )
                    <li>{{ $office->name }} </li>
                @endforeach
            </ul>
        @endif

    </div>
    </p>

    <!-- Fin fila de información tipo lista  -->

@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarCiudad") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mant_cities.btn_volver' ) }}"
@endsection