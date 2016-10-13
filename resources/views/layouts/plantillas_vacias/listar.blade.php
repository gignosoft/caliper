@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('xxxxxxxxxx.tit_xxxxxxxxxx') }}
@endsection


@section('titulo_panel')
    {{ trans('xxxxxxxxxx.tit_xxxxxxxxxx') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('#') }}           @endsection
@section('value_btn_nuevo') {{ trans('xxxxxxxxxx.btn_nuevo') }} @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}            @endsection
@section('value_btn_salir') {{ trans('xxxxxxxxxx.btn_salir') }} @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-5">{{ trans( 'xxxxxxxxxx.th_xxxxxxxxxx' )          }}   </th>
@endsection

@section('tbody_table')

    @if(count($cargos) == 0)
        <tr>
            <td colspan="4">{{ trans('xxxxxxxxxx.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("#") }}"'
                >{{ trans('xxxxxxxxxx.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("#") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_cargos.ph_name') }}">
                </td>

                <td>
                    <select class="form-control" name="levelpositions_id" id="levelpositions_id">
                        <option  value="">{{ trans('mant_cargos.isd_level') }}</option>
                        @foreach( $niveles as $nivele )
                            <option value="{{ $nivele->id }}">{{ $nivele->level }}</option>
                        @endforeach
                    </select>
                </td>



                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('xxxxxxxxxx.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($vars as $var)
            <tr>
                <td>{{ $var->item                                                     }}</td>

                <!-- accion -->

                <td><a class="iconos" href="{{ url('actualizar_xxxxxx/'.$var->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('xxxxxxxxxxxx.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verCargo/'.$var->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('xxxxxxxxxxxx.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                    <!-- si tiene algo asociado -->
                       @if( count( $cargo->users ) == 0 )
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminar_xxxxxx/'.$var->id) }}',
                               '{{ $var->name  }}',
                               '{{ trans('xxxxxxxxxxxx.jal_confirm_elmnar')}}'
                               )"
                       @else
                       href="javascript:alert('{{ trans('xxxxxxxxxxxx.jal_confirm_elmnar_no')}}')"
                       @endif
                    <!-- fin si tiene algo asociado -->
                       data-toggle="tooltip"
                       title="{{ trans('mant_cargos.tt_Eliminar')}}">
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
        {!! $vars->render() !!}
    @endif
@endsection