<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $table = 'roles';


    // |roles| >-< |users|
    public function users()
    {
          return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }

    // |roles| >-< |menus| ( importante que el role_id acá esté primero ya que es la clase Role)
    public function menus()
    {
        return $this->belongsToMany( Menus::class, 'menu_roles', 'role_id', 'menu_id' );
    }

}
