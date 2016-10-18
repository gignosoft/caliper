@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_suppliers.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_suppliers.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarProveedor') }}                  @endsection
@section('value_btn_nuevo') {{ trans('mant_suppliers.btn_nuevo') }}    @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}                   @endsection
@section('value_btn_salir') {{ trans('mant_suppliers.btn_salir') }}    @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-7">{{ trans( 'mant_suppliers.th_name' )         }}   </th>
    <th class="col-xs-3">{{ trans( 'mant_suppliers.th_company_id' )   }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_suppliers.th_accion' )        }}   </th>
@endsection

@section('tbody_table')

    @if( count($proveedores) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_suppliers.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarProveedor") }}"'
                >{{ trans('mant_suppliers.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarProveedor") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_suppliers.ph_name') }}">
                </td>

                <td>
                    <select class="form-control" name="company_id" id="company_id">
                        <option  value="">{{ trans('mant_suppliers.isd_level') }}</option>
                        @foreach( $empresas as $empresa )
                            <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_suppliers.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->name }}</td>
                <td>{{ $proveedor->companies->find( $proveedor->company_id )->name }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizarProveedor/'.$proveedor->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_suppliers.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verProveedor/'.$proveedor->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_suppliers.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       data-toggle="tooltip"
                       title="{{ trans('mant_suppliers.tt_Eliminar')}}"
                       @if( count( $proveedor->assets ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarProveedor/'.$proveedor->id) }}',
                               '{{ $proveedor->name  }}',
                               '{{ trans('mant_suppliers.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_suppliers.jal_confirm_elmnar_no')}}')"
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
        {!! $proveedores->render() !!}
    @endif
@endsection



