<?php

use Illuminate\Database\Seeder;
use App\Models\Sub_menu;

class SubmenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // USUARIOS
        $sub_menu = new Sub_menu();

        $sub_menu->name     = 'USUARIOS';
        $sub_menu->ruta     = '';
        $sub_menu->body     = 'USUARIOS';
        $sub_menu->sub      = 0;// 0 = true
        $sub_menu->menu_id  = 1;
        $sub_menu->user_control  = 'seeder';


        $sub_menu->save();

        // ACTIVOS
        $sub_menu = new Sub_menu();

        $sub_menu->name     = 'ACTIVOS';
        $sub_menu->ruta     = '';
        $sub_menu->body     = 'ACTIVOS';
        $sub_menu->sub      = 0;// 0 = true
        $sub_menu->menu_id  = 1;
        $sub_menu->user_control  = 'seeder';


        $sub_menu->save();

        // OTROS
        $sub_menu = new Sub_menu();

        $sub_menu->name     = 'OTROS';
        $sub_menu->ruta     = '';
        $sub_menu->body     = 'OTROS';
        $sub_menu->sub      = 0;// 0 = true
        $sub_menu->menu_id  = 1;
        $sub_menu->user_control  = 'seeder';


        $sub_menu->save();







    }
}
