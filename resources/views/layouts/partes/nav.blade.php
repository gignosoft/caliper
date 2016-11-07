<nav class="navbar navbar-default" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"> <img src={{ url("img/CALIPER_150X37.gif") }} alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Acciones de usuario <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Cambiar contraseña</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{route('auth/login')}}">Iniciar sesión</a></li>
                @else
                    <li>
                        <a href="#">{{ 'Identificado como: [ '.Auth::user()->first_name.' '.Auth::user()->last_name.' ]' }}</a>
                    </li>
                    <li><a href="{{route('auth/logout')}}">Cerrar sesión</a></li>

                @endif
            </ul>
        </div>
    </div>
</nav>