<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    protected $table = 'offices';

    // | offices | >- | cities |
    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }


}
