@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mantLvDepartamentos.tit_listarNivelDepartamentos') }}
@endsection


@section('titulo_panel')
    {{ trans('mantLvDepartamentos.tit_listarNivelDepartamentos') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('ingresarNivelDepartamento') }}       @endsection
@section('value_btn_nuevo') {{ trans('mantLvDepartamentos.btn_nuevo') }} @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}                    @endsection
@section('value_btn_salir') {{ trans('mantLvDepartamentos.btn_salir') }} @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th class="col-xs-10"> {{ trans('mantLvDepartamentos.th_level')      }} </th>
    <th class="col-xs-2">  {{ trans('mantLvDepartamentos.th_accion')     }} </th>
@endsection

@section('tbody_table')

    @if($numnivelesDepartamentos == 0)
        <tr>
            <td>{{ trans('mantLvDepartamentos.msj_no_encontrado') }}</td>
            <td>

                <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarNivelDepartamento") }}"'
                >{{ trans('mantLvDepartamentos.btn_volver') }}
                </button>

            </td>
        </tr>
    @else
        <form action={{ url("listarNivelDepartamento") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>

                    <select class="form-control" name="level" id="level">
                        <option  value="0">{{ trans('mantLvDepartamentos.isd_level') }}</option>
                        @foreach( $cantidades as $cantidad )
                            <option value="{{ $cantidad->id }}">{{ $cantidad->level }}</option>
                        @endforeach
                    </select>

                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mantLvDepartamentos.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($nivelesDepartamentos as $nivelesDepartamento)
            <tr>
                <td class="col-xs-10">{{ $nivelesDepartamento->level }}</td>

                <!-- accion -->
                <td class="col-xs-2">

                    <a class="iconos"
                       href="{{ url('verNivelDepartamento/'.$nivelesDepartamento->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mantLvDepartamentos.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a>

                    @if( $nivelesDepartamento->level==$max )

                        @if( count($nivelesDepartamento->departments) )
                            | <a class="iconos"
                                 href="javascript:alert('{{ trans('mantLvDepartamentos.jal_error_elmnar_level') }}')"
                                 data-toggle="tooltip"
                                 title="{{ trans('mantLvDepartamentos.tt_Eliminar')}}">
                                <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                            </a>
                        @else
                            | <a class="iconos"
                                 href="javascript:confirmarEliminar(
                                    '{{ url('eliminarNivelDepartamento/'.$nivelesDepartamento->id) }}',
                                    '{{ $nivelesDepartamento->level }}',
                                    '{{ trans('mantLvDepartamentos.jal_confirm_elmnar_level')}}')"

                                 data-toggle="tooltip"
                                 title="{{ trans('mantLvDepartamentos.tt_Eliminar')}}">
                                <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                            </a>
                        @endif

                    @endif

                </td>
                <!-- fin accion -->
            </tr>
        @endforeach

    @endif

@endsection

@section('paginador')
    @if($buscar == 'false')
        {!! $nivelesDepartamentos->render() !!}
    @endif
@endsection