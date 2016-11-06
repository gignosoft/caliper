@extends('layouts.principal')

@section('contenido')

<div class="row">

    <div class="col-xs-2">
        <div class="panel-group" id="accordion">

            <!--PANEL UNO-->
            <div class="panel panel-info">

                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse">
                            TÍTULO DEL PANEL
                        </a>
                    </h4>
                </div>

                <div id="collapse" class="panel-collapse collapse in">
                    <div class="panel-body">

                        ACÁ EL CONTENIDO

                    </div>
                </div>
            </div>

            <!--PANEL DOS-->
            <div class="panel panel-info">

                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1">
                            TÍTULO DEL PANEL
                        </a>
                    </h4>
                </div>

                <div id="collapse_1" class="panel-collapse collapse">
                    <div class="panel-body">

                        ACÁ EL CONTENIDO

                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <div class="col-xs-10"></div>




@endsection