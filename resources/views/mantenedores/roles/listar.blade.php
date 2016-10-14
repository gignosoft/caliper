@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_roles.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_roles.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarRol') }}               @endsection
@section('value_btn_nuevo') {{ trans('mant_roles.btn_nuevo') }}    @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}              @endsection
@section('value_btn_salir') {{ trans('mant_roles.btn_salir') }}    @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-10">{{ trans( 'mant_roles.th_name' )         }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_roles.th_accion' )        }}   </th>
@endsection

@section('tbody_table')

    @if( count($roles) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_roles.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarRol") }}"'
                >{{ trans('mant_roles.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarRol") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_roles.ph_name') }}">
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_roles.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($roles as $rol)
            <tr>
                <td>{{ $rol->name }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizarRol/'.$rol->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_roles.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verRol/'.$rol->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_roles.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       data-toggle="tooltip"
                       title="{{ trans('mant_roles.tt_Eliminar')}}"
                       @if( count( $rol->users ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarRol/'.$rol->id) }}',
                               '{{ $rol->name  }}',
                               '{{ trans('mant_roles.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_roles.jal_confirm_elmnar_no')}}')"
                            @endif

                    >
                        <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                    </a>

                </td>
                <!-- fin accion -->
            </tr>
        @endforeach

    @endif

@endsection

@section('paginador')
    @if($buscar == 'false')
        {!! $roles->render() !!}
    @endif
@endsection



