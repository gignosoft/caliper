@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_paises.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_paises.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarPais') }}               @endsection
@section('value_btn_nuevo') {{ trans('mant_paises.btn_nuevo') }}    @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}              @endsection
@section('value_btn_salir') {{ trans('mant_paises.btn_salir') }}    @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-10">{{ trans( 'mant_paises.l_name' )         }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_paises.th_accion' )        }}   </th>
@endsection

@section('tbody_table')

    @if( count($paises) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_paises.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarPais") }}"'
                >{{ trans('mant_paises.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarPais") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_paises.l_name') }}">
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_paises.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($paises as $pais)
            <tr>
                <td>{{ $pais->name }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizarPais/'.$pais->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_paises.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verPais/'.$pais->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_paises.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       data-toggle="tooltip"
                       title="{{ trans('mant_paises.tt_Eliminar')}}"
                       @if( count( $pais->cities ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarPais/'.$pais->id) }}',
                               '{{ $pais->name  }}',
                               '{{ trans('mant_paises.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_paises.jal_confirm_elmnar_no')}}')"
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
        {!! $paises->render() !!}
    @endif
@endsection



