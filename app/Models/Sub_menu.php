<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_menu extends Model
{
    //
    protected $table = 'sub_menus';

    /**
     * @return array
     */
    public function getAppends()
    {
        return $this->belongsTo(Menus::class, 'menu_id', 'id');
    }

}
