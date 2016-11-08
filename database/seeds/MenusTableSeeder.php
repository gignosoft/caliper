<?php

use Illuminate\Database\Seeder;
use App\Models\Menus;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Primer menú
        $menu = new Menus();

        $menu->name     = 'MANTENEDORES';
        $menu->body     = 'MANTENEDORES';

        $menu->user_control   = 'seeder';

        $menu->save();
        $menu->roles()->attach([1]);

        //segundo menú
        $menu = new Menus();

        $menu->name     = 'GESTIONES';
        $menu->body     = 'GESTIONES';

        $menu->user_control   = 'seeder';

        $menu->save();
        $menu->roles()->attach([1]);

    }
}
