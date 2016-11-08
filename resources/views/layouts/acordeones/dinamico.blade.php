<?php

use App\Models\Role;

$roles      = Role::find(1);
$menus      = $roles->menus;

?>

@foreach( $menus as $menu )

    <?php $sub_menus  = $menu->sub_menus;?>

    <div class="panel-group" id="accordion_{{ $menu->name }}">

        <!--MANTENEDORES >>-->
        <div class="panel panel-default">

            <a data-toggle="collapse" data-parent="#accordion" href="#{{ $menu->body }}">
                <div class="panel-heading">
                    <h4 class="panel-title">

                        {{ $menu->name }}

                    </h4>
                </div>
            </a>

            <div id="{{ $menu->body }}" class="panel-collapse collapse">
                <div class="panel-body">
                    @foreach( $sub_menus as $sub_menu )
                        <!-- inicio cuerpo mantenedores -->
                        <div class="panel-group" id="_accordion_{{ $sub_menu->name }}">

                            <!-- Usuarios -->
                            <div class="panel panel-default">

                                @if( $sub_menu->sub  )
                                    <a  data-parent="#_accordion_{{ $sub_menu->name }}" href="{{ url( $sub_menu->ruta ) }}">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"> {{ $sub_menu->name }} </h4>
                                        </div>
                                    </a>
                                @else
                                    <a data-toggle="collapse" data-parent="#_accordion_{{ $sub_menu->name }}" href="#{{ $sub_menu->body }}">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">

                                                {{ $sub_menu->name }}

                                            </h4>
                                        </div>
                                    </a>

                                    <div id="{{ $sub_menu->body }}" class="panel-collapse collapse">
                                        <div class="panel-body">

                                            @foreach( $sub_menu->micro_menus  as $micro_menu)
                                                <div class="panel panel-default">
                                                    <a  data-parent="#_accordion_{{ $micro_menu->name }}" href="{{ url( $micro_menu->ruta ) }}">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"> {{ $micro_menu->name }} </h4>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endif


                            </div>


                        </div>
                        <!-- fin cuerpo mantenedores -->
                     @endforeach
                </div>
            </div>

        </div>


    </div>
@endforeach

