@extends('layouts.principal')

@section('titulo')
    {{ 'asignar activo' }}
@endsection

@section('contenido')
    <h3> {{  'Assignar activo a:'  }} {{ $usuario->first_name.' '.$usuario->last_name }}</h3>

@endsection