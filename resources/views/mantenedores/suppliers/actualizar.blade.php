@extends('layouts.mantenedores.insertar.base')

@section('titulo')
    {{ trans('mant_state_assets.tit_actualizar') }}
@endsection

@section('titulo_principal')
    {{ trans('mant_suppliers.tit_actualizar') }}
@endsection

@section('formulario')

    <form action="{{ url('actualizarProveedor') }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $proveedor->id }}" >
        <div class="panel-group" id="accordion">

            <!--inicio Datos personales-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">{{ trans('mant_suppliers.tp_datos_g1') }}</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <!-- INICIO DEL CUERPO DEL GRUPO 1 -->

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mant_suppliers.l_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   value="{{ $proveedor->name }}">
                        </div>

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="phone">{{ trans('mant_suppliers.l_phone') }}</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                   value="{{ $proveedor->phone }}">
                        </div>

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="email">{{ trans('mant_suppliers.l_email') }}</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="{{ $proveedor->email }}">
                        </div>

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="description">{{ trans('mant_suppliers.l_description') }}</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   value="{{ $proveedor->description }}">
                        </div>

                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="levelPositions_id">{{ trans('mant_suppliers.l_company_id') }}</label>
                            <select class="form-control" name="company_id" id="company_id"  >
                                @foreach( $empresas as $empresa )
                                    @if( $empresa->id == $proveedor->company_id )
                                        <option selected value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                                    @else
                                        <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="country_id">{{ trans('mant_suppliers.l_country') }}</label>
                            <select class="form-control" name="country_id" id="country_id"
                                    onchange="cargaComboCiudad('../cargaCiudadUsuario/'+this.value)" >
                                @foreach( $paises as $pais )
                                    @if( $pais->id == $id_pais_selected )
                                        <option selected value="{{ $pais->id }}">{{ $pais->name }}</option>
                                    @else
                                        <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                                    @endif

                                @endforeach

                            </select>

                        </div>
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <div id="comboCiudad">
                                <label for="city_id">{{ trans('mant_suppliers.l_city_id') }}</label>
                                <select class="form-control" name="city_id" id="city_id">
                                    @foreach( $ciudades as $ciudad )
                                        @if( $ciudad->id == $proveedor->city_id )
                                            <option selected value="{{ $ciudad->id }}">{{ $ciudad->name }}</option>
                                        @else
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->name }}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- FIN DEL CUERPO DEL GRUPO 1 -->
                    </div>
                </div>
            </div>
            <!--fin Datos personales-->

        </div>


        <!--botones-->
        <div class="row col-sm-12 padding col-xs-12  margenes-botones">
            <input type="submit" class="btn btn-primary " value="{{ trans('mant_suppliers.btn_guardar') }}">

            <input type="button" class="btn btn-primary "
                   onclick='window.location ="{{ route("listarProveedor") }}"'
                   value="{{ trans('mant_suppliers.btn_volver') }}">
        </div>
        <div class="row"> </div><hr/>
        <!-- fin botones-->
    </form>

@endsection