

@include('layouts.partes.header')
@include('layouts.partes.nav')


<div class="row" >
    <div class="col-xs-3" >

        @include('layouts.acordeones.mantenedores')
        @include('layouts.acordeones.gestiones')
        @include('layouts.acordeones.dinamico')


    </div>

    <div class="col-xs-9" >
       @yield('contenido')
    </div>


</div>

</body>
</html>