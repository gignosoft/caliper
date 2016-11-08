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


    /**
     * @return array
     */
    public function micro_menus()
    {
        return $this->hasMany( Micro_menu::class, 'sub_menu_id', 'id' );
    }

}
