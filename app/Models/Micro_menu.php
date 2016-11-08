<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Micro_menu extends Model
{
    //
    protected $table = 'micro_menus';

    /**
     * @return array
     */
    public function sub_menus()
    {
        return $this->belongsTo(Sub_menu::class, 'sub_menu_id', 'id');
    }
}
