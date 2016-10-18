@extends('layouts.mantenedores.insertar.base')

@section('titulo')
    {{ trans('mant_suppliers.tit_insertar') }}
@endsection

@section('titulo_principal')
    {{ trans('mant_suppliers.tit_insertar') }}
@endsection

@section('formulario')

    <form action="{{ url('insertarProveedor') }}" method="post">
        {{ csrf_field() }}

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
                            <input type="text" class="form-control" name="name" id="name" value=""
                                   placeholder="{{ trans('mant_suppliers.ph_name') }}">
                        </div>

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="phone">{{ trans('mant_suppliers.l_phone') }}</label>
                            <input type="number" class="form-control" name="phone" id="phone" value=""
                                   placeholder="{{ trans('mant_suppliers.ph_phone') }}">
                        </div>

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="email">{{ trans('mant_suppliers.l_email') }}</label>
                            <input type="email" class="form-control" name="email" id="email" value=""
                                   placeholder="{{ trans('mant_suppliers.ph_email') }}">
                        </div>

                        <!-- LABEL E INPUT TEXT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="description">{{ trans('mant_suppliers.l_description') }}</label>
                            <input type="text" class="form-control" name="description" id="description" value=""
                                   placeholder="{{ trans('mant_suppliers.ph_description') }}">
                        </div>

                        <!-- INPUT SELECT -->
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="levelPositions_id">{{ trans('mant_suppliers.l_company_id') }}</label>
                            <select class="form-control" name="company_id" id="company_id"  >
                                @foreach( $empresas as $empresa )
                                    <option value="{{ $empresa->id }}">{{ $empresa->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="country_id">{{ trans('mant_suppliers.l_country') }}</label>
                            <select class="form-control" name="country_id" id="country_id"
                                    onchange="cargaComboCiudad('cargaCiudadUsuario/'+this.value)" >
                                @foreach( $paises as $pais )
                                    <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <div id="comboCiudad">
                                <label for="city_id">{{ trans('mant_suppliers.l_city_id') }}</label>
                                <select class="form-control" name="city_id" id="city_id">
                                    <option selected value="">{{ trans('mant_suppliers.isd_city') }}</option>
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