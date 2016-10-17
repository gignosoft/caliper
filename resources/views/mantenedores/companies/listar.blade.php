@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_companies.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_companies.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarEmpresa') }}               @endsection
@section('value_btn_nuevo') {{ trans('mant_companies.btn_nuevo') }}    @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}                  @endsection
@section('value_btn_salir') {{ trans('mant_companies.btn_salir') }}    @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-7">{{ trans( 'mant_companies.th_name' )           }}   </th>
    <th class="col-xs-3">{{ trans( 'mant_companies.th_id' )             }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_companies.th_accion' )         }}   </th>
@endsection

@section('tbody_table')

    @if( count($empresas) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_companies.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarEmpresa") }}"'
                >{{ trans('mant_companies.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarEmpresa") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_companies.ph_name') }}">
                </td>

                <td>
                    <input type="text" class="form-control" name="identifier" id="identifier"
                           placeholder="{{ trans('mant_companies.ph_identifier') }}">
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_companies.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->name }}</td>
                <td>{{ $empresa->identifier }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizarEmpresa/'.$empresa->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_companies.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verEmpresa/'.$empresa->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_companies.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       data-toggle="tooltip"
                       title="{{ trans('mant_companies.tt_Eliminar')}}"
                       @if( count( $empresa->suppliers ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarEmpresa/'.$empresa->id) }}',
                               '{{ $empresa->name  }}',
                               '{{ trans('mant_companies.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_companies.jal_confirm_elmnar_no')}}')"
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
        {!! $empresas->render() !!}
    @endif
@endsection



