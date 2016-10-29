@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_state_assignments.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_state_assignments.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarEstadoAsignacion') }}               @endsection
@section('value_btn_nuevo') {{ trans('mant_state_assignments.btn_nuevo') }}    	@endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}                   		@endsection
@section('value_btn_salir') {{ trans('mant_state_assignments.btn_salir') }}    	@endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-10">{{ trans( 'mant_state_assignments.th_name' )         }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_state_assignments.th_accion' )        }}   </th>
@endsection

@section('tbody_table')

    @if( count($estadoAsignaciones) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_state_assignments.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarRubro") }}"'
                >{{ trans('mant_state_assignments.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarEstadoAsignacion") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_state_assignments.ph_name') }}">
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_state_assignments.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($estadoAsignaciones as $estadoAsignacion)
            <tr>
                <td>{{ $estadoAsignacion->name }}</td>

                <!-- accion -->
                @if( $estadoAsignacion->id < 6 )
                    <td>{{ 'sin acción' }}</td>
                @else

                <td><a class="iconos" href="{{ url('actualizarEstadoAsignacion/'.$estadoAsignacion->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_state_assignments.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verEstadoAsignacion/'.$estadoAsignacion->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_state_assignments.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       data-toggle="tooltip"
                       title="{{ trans('mant_state_assignments.tt_Eliminar')}}"
                       @if( count( $estadoAsignacion->assignments ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarEstadoAsignacion/'.$estadoAsignacion->id) }}',
                               '{{ $estadoAsignacion->name  }}',
                               '{{ trans('mant_state_assignments.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_state_assignments.jal_confirm_elmnar_no')}}')"
                            @endif

                    >
                        <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                    </a>

                </td>
                @endif
                <!-- fin accion -->
            </tr>
        @endforeach

    @endif

@endsection

@section('paginador')
    @if($buscar == 'false')
        {!! $estadoAsignaciones->render() !!}
    @endif
@endsection



