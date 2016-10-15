@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_offices.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_offices.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarOficina') }}               @endsection
@section('value_btn_nuevo') {{ trans('mant_offices.btn_nuevo') }}    @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}              @endsection
@section('value_btn_salir') {{ trans('mant_offices.btn_salir') }}    @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-7">{{ trans( 'mant_offices.th_name' )         }}   </th>
    <th class="col-xs-3">{{ trans( 'mant_offices.th_city' )         }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_offices.th_accion' )        }}   </th>
@endsection

@section('tbody_table')

    @if( count($oficinas) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_offices.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarOficina") }}"'
                >{{ trans('mant_offices.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarOficina") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_offices.ph_name') }}">

                <td>
                    <select class="form-control" name="city_id" id="city_id">
                        <option  value="">{{ trans('mant_offices.isd_city') }}</option>
                        @foreach( $ciudades as $ciudad )
                            <option value="{{ $ciudad->id }}">{{ $ciudad->name }}</option>
                        @endforeach
                    </select>
                </td>
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_offices.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($oficinas as $oficina)
            <tr>
                <td>{{ $oficina->name }}</td>
                <td>{{ $oficina->cities->find($oficina->city_id)->name }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizarOficina/'.$oficina->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_offices.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verOficina/'.$oficina->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_offices.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       data-toggle="tooltip"
                       title="{{ trans('mant_offices.tt_Eliminar')}}"
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarOficina/'.$oficina->id) }}',
                               '{{ $oficina->name  }}',
                               '{{ trans('mant_offices.jal_confirm_elmnar')}}'
                               )"

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
        {!! $oficinas->render() !!}
    @endif
@endsection



