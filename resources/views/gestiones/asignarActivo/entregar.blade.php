@extends('layouts.principal')

@section('titulo')
    {{ trans( 'asig_activo.tit_asgnar_activo' ) }}
@endsection

@section('contenido')




    <div class="container">
        @include('layouts.mensajes')

        <div class="panel panel-info">
            <div class="panel-heading ">

                <div class="row">
                    <h3 class="col-xs-12"> {{ $usuario->first_name.' '.$usuario->last_name.trans( 'asig_activo.msj_entrega' ).$activo->name }} </h3>
                </div>

            </div>

            <div class="panel-body">

                <!-- Inicio del panel -->
                <p class="row" >

                <form action={{ url("entregaActivo") }} method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="user_id" value="{{ $usuario->id }}">
                    <input type="hidden" name="id" value="{{ $asignacion->id }}">


                    <label for="state_assignment_id">{{ trans( 'asig_activo.l_estado_entrega' ) }}</label>
                        <select class="form-control" name="state_assignment_id" id="state_assignment_id">
                            @foreach( $estados as $estado )
                                <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                            @endforeach
                        </select>
                    <br>

                    <label for="comment">{{ 'Comentario' }}</label>
                        <textarea class="form-control" name="description" rows="5" id="comment"
                                  placeholder="{{ trans( 'asig_activo.ph_description' ) }}">{{ $asignacion->description }}</textarea><br>

                    <div class="row">
                        <div class="btn-group col-xs-3">
                            <button type="button" onclick='window.location ="{{ url("crearActivo/".$usuario->id) }}"'
                                    class="btn btn-primary"> {{ trans( 'asig_activo.btn_volver' ) }}
                            </button>
                            <button type="submit" class="btn btn-success"> {{ 'Grabar' }}</button>
                        </div>
                    </div>

                </form>



                </p>
                <!-- fin del panel -->

            </div>

        </div>
    </div>


@endsection