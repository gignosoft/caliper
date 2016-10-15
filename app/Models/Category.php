<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    // |categories| -< |assets|
    public function assets()
    {
        return $this->hasMany(Asset::class, 'category_id', 'id');
    }
}
