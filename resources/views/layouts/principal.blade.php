<?php

use App\Models\Role;

$roles = Role::find(1);


?>

@include('layouts.partes.header')
@include('layouts.partes.nav')


<div class="row" >
    <div class="col-xs-3" >

        @include('layouts.acordeones.mantenedores')
        @include('layouts.acordeones.gestiones')



    <!-- inicio menú dinámico -->
        @foreach( $roles->menus as $menu )
                <div class="panel-group" id="accordion_{{ $menu->name }}">

                    <div class="panel panel-default">

                        <a data-toggle="collapse" data-parent="#accordion_{{ $menu->name }}" href="#{{ $menu->body }}">
                            <div class="panel-heading">
                                <h4 class="panel-title">

                                    {{ $menu->name }}

                                </h4>
                            </div>
                        </a>
                        <div id="{{ $menu->body }}" class="panel-collapse collapse">

                            <div class="panel-body">

                                <ul>
                                    <li>
                                        <a href="">Prueba</a>
                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>


                </div>
        @endforeach
    <!-- fin menú dinámico -->




    </div>

    <div class="col-xs-9" >
       @yield('contenido')
    </div>


</div>

</body>
</html>