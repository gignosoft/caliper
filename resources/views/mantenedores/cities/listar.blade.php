@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_cities.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_cities.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('insertarCiudad') }}             @endsection
@section('value_btn_nuevo') {{ trans('mant_cities.btn_nuevo') }}    @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}              @endsection
@section('value_btn_salir') {{ trans('mant_cities.btn_salir') }}   @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-7">{{ trans( 'mant_cities.th_name' )         }}   </th>
    <th class="col-xs-3">{{ trans( 'mant_cities.th_id_foreing_1' ) }}   </th>
    <th class="col-xs-2"> {{ trans( 'mant_cities.th_accion' )       }}   </th>
@endsection

@section('tbody_table')

    @if( count($ciudades) == 0 )
        <tr>
            <td colspan="4">{{ trans('mant_cities.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarCiudad") }}"'
                >{{ trans('mant_cities.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarCiudad") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_cities.ph_name') }}">
                </td>

                <td>
                    <select class="form-control" name="country_id" id="country_id">
                        <option  value="">{{ trans('mant_cities.isd_country') }}</option>
                        @foreach( $paises as $pais )
                            <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_cities.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($ciudades as $ciudad)
            <tr>
                <td>{{ $ciudad->name }}</td>
                <td>{{ $ciudad->countries->find($ciudad->country_id)->name }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizarCiudad/'.$ciudad->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_cities.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verCiudad/'.$ciudad->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_cities.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       data-toggle="tooltip"
                       title="{{ trans('mant_cities.tt_Eliminar')}}"
                       @if( ( count( $ciudad->users ) == 0 ) &&
					   ( count( $ciudad->suppliers ) == 0 ) &&
					   ( count( $ciudad->offices ) == 0 ) )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarCiudad/'.$ciudad->id) }}',
                               '{{ $ciudad->name  }}',
                               '{{ trans('mant_cities.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('mant_cities.jal_confirm_elmnar_no')}}')"
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
        {!! $ciudades->render() !!}
    @endif
@endsection



