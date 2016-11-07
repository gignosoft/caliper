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
}
