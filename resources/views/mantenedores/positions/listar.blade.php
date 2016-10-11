@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_cargos.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_cargos.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('ingresarCargo') }}           @endsection
@section('value_btn_nuevo') {{ trans('mant_cargos.btn_nuevo') }} @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}            @endsection
@section('value_btn_salir') {{ trans('mant_cargos.btn_salir') }} @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-5">{{ trans( 'mant_cargos.th_name' )          }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_cargos.th_level_id' )      }}   </th>
    <th class="col-xs-3">{{ trans( 'mant_cargos.th_department_id' ) }}   </th>
    <th class="col-xs-2">{{ trans( 'mant_cargos.th_action' )        }}   </th>
@endsection

@section('tbody_table')

    @if(count($cargos) == 0)
        <tr>
            <td colspan="4">{{ trans('mant_cargos.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarCargo") }}"'
                >{{ trans('mant_cargos.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarCargo") }} method="post">
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
                    <select class="form-control" name="department_id" id="department_id">
                        <option  value="">{{ trans('mant_cargos.isd_department_id') }}</option>
                        @foreach( $departamentos as $departamento )
                            <option value="{{ $departamento->id }}">{{ $departamento->name }}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_cargos.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($cargos as $cargo)
            <tr>
                <td>{{ $cargo->name                                                     }}</td>
                <td>{{ $cargo->levelPositions->find($cargo->levelpositions_id)->level   }}</td>
                <td>{{ $cargo->departments->find($cargo->department_id)->name           }}</td>

                <td><a class="iconos" href="{{ url('actualizarCargo/'.$cargo->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_departamentos.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('#') }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_departamentos.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       href="javascript:confirmarEliminar(
                               '{{ url('#') }}',
                               '{{ $cargo->name  }}',
                               '{{ trans('mant_departamentos.jal_confirm_elmnar_user')}}'
                               )"
                       data-toggle="tooltip"
                       title="{{ trans('mant_departamentos.tt_Eliminar')}}">
                        <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                    </a>

                </td>
            </tr>
        @endforeach

    @endif

@endsection

@section('paginador')
    @if($buscar == 'false')
        {!! $cargos->render() !!}
    @endif
@endsection