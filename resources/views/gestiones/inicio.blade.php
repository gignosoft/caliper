@extends('layouts.principal')

@section('titulo')
    {{ 'Gestiones' }}
@endsection

@section('contenido')

    <ul>

        <li><a href="{{ route('asignarActivo') }}                   ">Asignar activo                </a></li>
    </ul>

@endsection