<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'suppliers';

    // | suppliers | >- | companies |
    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id','id');
    }

    // | suppliers | -< | assets |
    public function assets()
    {
        return $this->hasMany(Asset::class, 'supplier_id','id');
    }

    // | suppliers | -< | offices |
    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id','id');
    }


}
