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
        <td>Estado del activo</td>
        <td>Ciudad</td>
        <td>Cargo</td>
        <td>departamento</td>
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
            <td>{{ $asignacion->state_assignments->find($asignacion->state_assignment_id)->name }}</td>
            <td>{{ $asignacion->users->find($asignacion->user_id)->cities
            ->find($asignacion->users->find($asignacion->user_id)->city_id)->name}} </td>

            <td>
                @foreach( $asignacion->users->find($asignacion->user_id)->positions as $position )
                    {{ $position->name }}.<br/>
                @endforeach
            </td>

            <td>
                @foreach( $asignacion->users->find($asignacion->user_id)->positions as $position )
                    {{ $position->departments->find( $position->department_id )->name }}.<br/>
                @endforeach
            </td>
        </tr>
    @endforeach



</table>

</body>
</html>