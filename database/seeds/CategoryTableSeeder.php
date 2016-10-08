<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                
        $categoria = new Category();
        $categoria->name            = 'Software';
        $categoria->user_control    = 'seeder';

        $categoria->save();

        $categoria = new Category();
        $categoria->name            = 'Hardware';
        $categoria->user_control    = 'seeder';

        $categoria->save();


    }
}
