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
                <!-- inicio cuerpo mantenedores -->
                <div class="panel-group" id="mantenedores_accordion">

                    <!-- Usuarios -->
                    <div class="panel panel-default">

                        <a data-toggle="collapse" data-parent="#mantenedores_accordion" href="#usuarios">
                            <div class="panel-heading">
                                <h4 class="panel-title">

                                    Usuarios

                                </h4>
                            </div>
                        </a>

                        <div id="usuarios" class="panel-collapse collapse">
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

                    <!-- activos -->
                    <div class="panel panel-default">

                            <a data-toggle="collapse" data-parent="#mantenedores_accordion" href="#activos">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        ACTIVOS
                                    </h4>
                                </div>
                            </a>
                            <div id="activos" class="panel-collapse collapse">
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

                    <!--Otros-->
                    <div class="panel panel-default">

                            <a data-toggle="collapse" data-parent="#mantenedores_accordion" href="#otros">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        OTROS
                                    </h4>
                                </div>
                            </a>
                            <div id="otros" class="panel-collapse collapse">
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
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('listarPais') }} ">
                                                Mantenedor de Países
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                </div>
                <!-- fin cuerpo mantenedores -->
            </div>
        </div>

    </div>


</div>