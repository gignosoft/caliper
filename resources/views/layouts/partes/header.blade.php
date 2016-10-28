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