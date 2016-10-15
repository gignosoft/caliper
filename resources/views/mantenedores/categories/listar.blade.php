@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_categorias.tit_listarCategoria') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_categorias.tit_listarCategoria') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarCategorias') }}           @endsection
@section('value_btn_nuevo') {{ trans('mant_categorias.btn_nuevo') }} @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('#') }}                              @endsection
@section('value_btn_salir') {{ trans('mant_categorias.btn_salir') }} @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-10">{{ trans('mant_categorias.th_name')          }}</th>
@endsection

@section('tbody_table')

    @if( count($categorias) == 0)
        <tr>
            <td colspan="4">{{ trans('mant_categorias.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarCategorias") }}"'
                >{{ trans('mant_categorias.btn_volver') }}
                </button></td>
        </tr>
    @else

        <form action={{ url("listarCategorias") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_categorias.ph_name') }}">
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_categorias.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->name                    }}</td>


                <td><a class="iconos" href="{{ url('actualizarCategorias/'.$categoria->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_categorias.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verCategorias/'.$categoria->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_categorias.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       @if( count( $categoria->assets ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarCategorias/'.$categoria->id) }}',
                               '{{ $categoria->name  }}',
                               '{{ trans('mant_categorias.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_categorias.jal_confirm_elmnar_no')}}')"
                       @endif
                       data-toggle="tooltip"
                       title="{{ trans('mant_categorias.tt_Eliminar')}}">
                        <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                    </a>

                </td>
            </tr>

        @endforeach
    @endif

@endsection

@section('paginador')
    @if($buscar == 'false')
        {!! $categorias->render() !!}
    @endif
@endsection
