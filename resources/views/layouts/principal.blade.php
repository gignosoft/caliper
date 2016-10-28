<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script src="{{ url("js/jquery-3.1.0.min.js") }}"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ url("js/funciones_1.js") }}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <style >
        .body{
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(img/fondo6.gif);
            background-attachment: fixed;
            background-size: 100%;
        }
    </style>

    <title> @yield('titulo')</title>
</head>
<body class="body" >
<nav class="navbar navbar-default" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=#> <img src={{ url("img/CALIPER_150X37.gif") }} alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{route('auth/login')}}">Iniciar sesión</a></li>
                @else
                    <li>
                        <a href="#">{{ Auth::user()->name }}</a>
                    </li>
                    <li><a href="{{route('auth/logout')}}">Cerrar sesión</a></li>

                @endif
            </ul>
        </div>
    </div>
</nav>



<div class="row" >
    <div class="col-xs-3" >
        <div class="panel-group" id="accordion">

            <!--MANTENEDORES >>-->
            <div class="panel panel-default">

                <a data-toggle="collapse" data-parent="#accordion" href="#mantenedores">
                    <div class="panel-heading">
                        <h4 class="panel-title">

                            MANTENEDORES

                        </h4>
                    </div>
                </a>
                <div id="mantenedores" class="panel-collapse collapse">
                    <div class="panel-body">

                        <ul>
                            <li>
                                <a href="{{ route('listarUsuario') }}">
                                    Mantenedor de usuarios
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarRol') }}">
                                    Mantenedor de roles de usuario
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarCargo') }}">
                                    Mantenedor de cargos
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarNivelCargo') }}">
                                    Mantenedor de niveles de cargos
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarDepartamentos') }}">
                                    Mantenedor de departamentos
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarNivelDepartamento') }} ">
                                    Mantenedor de niveles de departamentos
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

            <!--MANTENEDORES <<-->
            <!--PANEL 1-->
            <div class="panel panel-default">

                <a data-toggle="collapse" data-parent="#accordion" href="#panel_1">
                    <div class="panel-heading">
                        <h4 class="panel-title">

                            USUARIOS

                        </h4>
                    </div>
                </a>
                <div id="panel_1" class="panel-collapse collapse">
                    <div class="panel-body">

                        <ul>
                            <li>
                                <a href="{{ route('listarUsuario') }}">
                                    Mantenedor de usuarios
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarRol') }}">
                                    Mantenedor de roles de usuario
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarCargo') }}">
                                    Mantenedor de cargos
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarNivelCargo') }}">
                                    Mantenedor de niveles de cargos
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarDepartamentos') }}">
                                    Mantenedor de departamentos
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('listarNivelDepartamento') }} ">
                                    Mantenedor de niveles de departamentos
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!--FIN PANEL 1-->

            <!--PANEL 2-->
            <div class="panel panel-default">

                <a data-toggle="collapse" data-parent="#accordion" href="#panel_2">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            ACTIVOS
                        </h4>
                    </div>
                </a>
                <div id="panel_2" class="panel-collapse collapse">
                    <div class="panel-body">

                        <ul>
                            <li>
                                <a href="{{ route('listarActivo') }}">
                                    Mantenedor de activos
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('listarCategorias') }}">
                                    Mantenedor de categorias
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('listarEstadoActivo') }}">
                                    Mantenedor de estados de activos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--FIN PANEL 2-->
            <!--PANEL 3-->
            <div class="panel panel-default">

                <a data-toggle="collapse" data-parent="#accordion" href="#panel_3">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            OTROS
                        </h4>
                    </div>
                </a>
                <div id="panel_3" class="panel-collapse collapse">
                    <div class="panel-body">

                        <ul>
                            <li>
                                <a href="{{ route('listarRubro') }}">
                                    Mantenedor de rubro de la empresa
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('listarEstadoAsignacion') }}">
                                    Mantenedor de estado de asignaciones
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('listarCiudad') }}">
                                    Mantenedor de ciudades
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('listarOficina') }}">
                                    Mantenedor de oficinas
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('listarEmpresa') }}">
                                    Mantenedor de empresas
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('listarProveedor') }} ">
                                    Mantenedor de Proveedores
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--FIN PANEL 3-->

        </div>


    </div>



    <div class="col-xs-9" >
        @yield('contenido')
    </div>

</div>



</body>
</html>