<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateAssignment extends Model
{
    //
    protected $table = 'state_assignments';


    // |state_assignments| >-< |assignments|
    public function assignments()
    {
        return $this->hasMany(Assignment::class,
            'state_assignment_id',
            'id'
        );
    }

}
