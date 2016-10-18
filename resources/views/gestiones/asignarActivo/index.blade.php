@extends('layouts.principal')

@section('titulo')
    {{ 'Asignar activo' }}
@endsection

@section('contenido')

    <div class="container">
        @include('layouts.mensajes')

        <div class="panel panel-info">
            <div class="panel-heading ">
                <div class="row">
                    <h3 class="col-xs-12"> {{ 'Asignar activo' }} </h3>
                </div>

            </div>

            <div class="panel-body">

                <h4> {{ 'Buscar usuario' }} </h4>

                <table class="table table-striped col-sm-6 col-xs-12">
                    <thead>
                    <tr>
                        <th>{{ 'Rut'      }}</th>
                        <th>{{ 'Nombre'   }}</th>
                        <th>{{ 'Acción'   }}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @yield('tbody_table')
                    </tbody>
                </table>

                @yield('paginador')

            </div>

        </div>
    </div>

@endsection