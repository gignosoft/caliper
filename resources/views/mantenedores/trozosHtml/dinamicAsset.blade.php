<select class="form-control" name="asset_id" id="asset_id">
@if( count( $activos ) == 0 )
    <option value=''>{{ trans( 'asig_activo.isd_activo' ) }}</option>
@else
    @foreach($activos as $activo)
        <option value='{{ $activo->id }}'>{{ $activo->name.' ('.substr ( $activo->description, 0 ,40 ).'... )' }}</option>
    @endforeach
@endif
</select>
