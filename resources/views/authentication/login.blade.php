@extends('authentication.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 ">
                <div class="panel panel-default elemento">
                    <div class="panel-heading">{{ trans('auth.login') }}</div>
                    <div class="panel-body">
                        <form name="MyForm" class="form" action="{{ route('auth/login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>{{ trans('auth.usuario') }}</label>
                                <input class="form-control" type="email" name="email" id="email"
                                       onautocomplete="cargaPerfil('../cargaRol/'+this.value) "
                                       onmouseleave="cargaPerfil('../cargaRol/'+this.value) "
                                       onkeydown="cargaPerfil('../cargaRol/'+this.value) " value="">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('auth.pass') }}</label>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="password" name="password" id="password" value="">
                            </div>

                            <div class="form-group">
                                <div id="roles">

                                </div>
                            </div>

                            <input class="btn btn-primary" type="submit" value="{{ trans('auth.boton_login') }}">



                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection