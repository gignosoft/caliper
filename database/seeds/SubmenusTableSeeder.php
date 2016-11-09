<?php

use Illuminate\Database\Seeder;
use App\Models\Sub_menu;

class SubmenusTableSeeder extends Seeder
{


    private function crearSubMenu( $name, $ruta, $body, $sub, $menu_id  )

    {
        $sub_menu = new Sub_menu();

        $sub_menu->name     = $name;
        $sub_menu->ruta     = $ruta;
        $sub_menu->body     = $body;
        $sub_menu->sub      = $sub;// 0 = true 1 = true
        $sub_menu->menu_id  = $menu_id;
        $sub_menu->user_control  = 'seeder';
        $sub_menu->save();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sub menus de mantenedores
        $this->crearSubMenu( 'USUARIOS', '', 'USUARIOS', 0, 1 );
        $this->crearSubMenu( 'ACTIVOS', '', 'ACTIVOS', 0, 1 );
        $this->crearSubMenu( 'OTROS', '', 'OTROS', 0, 1 );

        // sub menus de gestiones

        $this->crearSubMenu( 'Asignar activo', 'asignarActivo', '', 1, 2 );
        $this->crearSubMenu( 'Ingreso de compra', 'ingresarCompra/1', '', 1, 2 );

    }
}
