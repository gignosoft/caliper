<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Netcaliper - login </title>

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
<!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script src="{{ url("js/jquery-3.1.0.min.js") }}"></script>
    <script src="{{ url("js/funciones_1.js") }}"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style >
        .body{
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(../img/fondoLogin_1240x803.png);
            background-attachment: fixed;
            background-size: 100%;
        }

        .elemento {
            box-shadow: 20px 20px 50px #999;
        }
    </style>

</head>
<body class="body">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"> <img src={{ url("img/CALIPER_150X37.png") }} alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lenguaje <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('lang', ['en']) }}">En</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('lang', ['es']) }}">Es</a></li>
                    </ul>
                </li>
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



<div class="container">
    @if (Session::has('errors'))
        <div class="alert alert-warning" role="alert">
            <ul>
                <strong>Oops! Something went wrong : </strong>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>


    @yield('content')


<!-- Scripts -->
</body>
</html>