@extends('layouts.principal')


@section('titulo')
    {{ 'Mantenedores' }}
@endsection


@section('contenido')

    <ul>

        <li><a href="{{ route('listarUsuario') }}                   ">Mantenedor de usuarios                </a></li>
        <li>Activos
            <ul>
                <li><a href="{{ route('listarActivo') }}            ">Mantenedor de activos                </a></li>
                <li><a href="{{ route('listarCategorias') }}        ">Mantenedor de categorias              </a></li>
                <li><a href="{{ route('listarEstadoActivo') }}      ">Mantenedor de estados de activos      </a></li>
            </ul>
        </li>
        <li>Cargos
            <ul>
                <li><a href="{{ route('listarCargo') }}             ">Mantenedor de cargos                  </a></li>
                <li><a href="{{ route('listarNivelCargo') }}        ">Mantenedor de niveles de cargos       </a></li>
            </ul>
        </li>
        <li>Departamentos
            <ul>
                <li><a href="{{ route('listarDepartamentos') }} ">Mantenedor de departamentos           </a></li>
                <li><a href="{{ route('listarNivelDepartamento') }} ">Mantenedor de niveles de departamentos</a></li>
            </ul>
        </li>
    </ul>

@endsection