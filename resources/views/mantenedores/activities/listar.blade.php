@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_activities.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_activities.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarRubro') }}           @endsection
@section('value_btn_nuevo') {{ trans('mant_activities.btn_nuevo') }}  @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}                   @endsection
@section('value_btn_salir') {{ trans('mant_activities.btn_salir') }}  @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-10">{{ trans( 'mant_activities.th_name' )         }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_activities.th_accion' )        }}   </th>
@endsection

@section('tbody_table')

    @if( count($rubros) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_activities.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarRubro") }}"'
                >{{ trans('mant_activities.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarRubro") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_activities.ph_name') }}">
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_activities.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($rubros as $rubro)
            <tr>
                <td>{{ $rubro->name }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizarRubro/'.$rubro->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_activities.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verRubro/'.$rubro->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_activities.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       data-toggle="tooltip"
                       title="{{ trans('mant_activities.tt_Eliminar')}}"
                       @if( count( $rubro->companies ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarRubro/'.$rubro->id) }}',
                               '{{ $rubro->name  }}',
                               '{{ trans('mant_activities.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_activities.jal_confirm_elmnar_no')}}')"
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
        {!! $rubros->render() !!}
    @endif
@endsection



