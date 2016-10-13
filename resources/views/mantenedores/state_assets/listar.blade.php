@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_state_assets.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_state_assets.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarEstadoActivo') }}           @endsection
@section('value_btn_nuevo') {{ trans('mant_state_assets.btn_nuevo') }}  @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}                   @endsection
@section('value_btn_salir') {{ trans('mant_state_assets.btn_salir') }}  @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-10">{{ trans( 'mant_state_assets.th_name' )         }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_state_assets.th_accion' )        }}   </th>
@endsection

@section('tbody_table')

    @if( count($estados) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_state_assets.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarEstadoActivo") }}"'
                >{{ trans('mant_state_assets.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarEstadoActivo") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_state_assets.ph_name') }}">
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_state_assets.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($estados as $estado)
            <tr>
                <td>{{ $estado->name }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizarEstadoActivo/'.$estado->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_state_assets.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verEstadoActivo/'.$estado->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_state_assets.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                    data-toggle="tooltip"
                    title="{{ trans('mant_cargos.tt_Eliminar')}}"
                       @if( count( $estado->assets ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarEstadoActivo/'.$estado->id) }}',
                               '{{ $estado->name  }}',
                               '{{ trans('mant_state_assets.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_state_assets.jal_confirm_elmnar_no')}}')"
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
        {!! $estados->render() !!}
    @endif
@endsection


