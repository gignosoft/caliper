<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //

    protected $table = 'menus';


    public function roles()
    {
        return $this->belongsToMany( Role::class, 'menu_roles','menu_id', 'role_id' );
    }

    /**
     * @return array
     */
    public function sub_menus()
    {
        return $this->hasMany( Sub_menu::class, 'menu_id', 'id' );
    }
}
