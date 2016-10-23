@extends('layouts.principal')

@section('titulo')
    {{ 'Gestiones' }}
@endsection

@section('contenido')

    <ul>
        <li>
            <a href="{{ route('asignarActivo') }}">Asignar activo</a>
        </li>
        <li>
            <a href="{{ url('ingresarCompra/1') }}">Ingreso de compra</a>
        </li>
    </ul>

@endsection