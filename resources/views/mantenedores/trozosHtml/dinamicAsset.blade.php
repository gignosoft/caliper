<select class="form-control" name="asset_id" id="asset_id">
@if( count( $activos ) == 0 )
    <option value=''>{{ 'Seleccione una categoría para cargar los activos' }}</option>
@else
    @foreach($activos as $activo)
        <option value='{{ $activo->id }}'>{{ $activo->name }}</option>
    @endforeach
@endif
</select>
