<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'suppliers';



    // | suppliers | -< | assets |
    public function assets()
    {
        return $this->belongsTo(Asset::class, 'supplier_id','id');
    }


}
