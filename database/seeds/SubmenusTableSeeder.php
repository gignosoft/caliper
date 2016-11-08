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
        // dato uno

        $sub_menu = new Sub_menu();

        $sub_menu->name     = 'sub_menu_con_ruta';
        $sub_menu->ruta     = 'listarUsuario';
        $sub_menu->body     = '';
        $sub_menu->sub      = 1;// 1 = false
        $sub_menu->menu_id  = 1;

        $sub_menu->user_control  = 'seeder';


        $sub_menu->save();
        // dato dos

        $sub_menu = new Sub_menu();

        $sub_menu->name     = 'sub_menu_con_menu_dentro';
        $sub_menu->ruta     = '';
        $sub_menu->body     = 'sub_menu_1';
        $sub_menu->sub      = 0;// 0 = true
        $sub_menu->menu_id  = 1;

        $sub_menu->user_control  = 'seeder';


        $sub_menu->save();






    }
}
