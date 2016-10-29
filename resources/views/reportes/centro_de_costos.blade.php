<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




<table border="1">
    <tr>
        <td>N°                      </td>
        <td>Fecha de Adquisición    </td>
        <td>Numero de Compra        </td>
        <td>Nombre del proveedor </td>
        <td>Nombre de Activo</td>
        <td>Valor de Activo</td>
        <td>Usuario asignado</td>
        <td>Ciudad</td>
        <td>Oficina</td>
    </tr>
    @foreach( $asignaciones as $asignacion )
        <tr>
            <td>N°                      </td>
            <td>{{ $asignacion->assets->find($asignacion->asset_id)->created_at }}    </td>
            <td>{{ $asignacion->assets->find($asignacion->asset_id)
            ->purchases->find($asignacion->assets->find($asignacion->asset_id)->purchase_id)->id }}       </td>
            <td>{{ $asignacion->assets->find($asignacion->asset_id)
            ->suppliers->find($asignacion->assets->find($asignacion->asset_id)->supplier_id)->name}} </td>
            <td>{{ $asignacion->assets->find($asignacion->asset_id)->name}} </td>
            <td>{{ $asignacion->assets->find($asignacion->asset_id)->price}}</td>
            <td>{{ $asignacion->users->find($asignacion->user_id)->first_name.' '.
            $asignacion->users->find($asignacion->user_id)->last_name}} </td>
            <td>{{ $asignacion->users->find($asignacion->user_id)->cities
            ->find($asignacion->users->find($asignacion->user_id)->city_id)->name}} </td>
            <td>{{ $asignacion->users->find($asignacion->user_id)->cities
            ->find($asignacion->users->find($asignacion->user_id)->city_id)->offices}} </td>
            <?php
            //$oficina = \App\Models\Office::where('id','=',4)->get();
                foreach ( $oficinas as $oficina)
                {
                    echo $oficina->name.'<br/>';
                }

                dd($oficinas->find('city_id', 10));
            ?>
            <td>{{ $oficinas->find('city_id', 1)->name}} </td>
        </tr>
    @endforeach



</table>

</body>
</html>