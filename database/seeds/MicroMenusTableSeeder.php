<?php

use Illuminate\Database\Seeder;
use App\Models\Micro_menu;

class MicroMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function creaMenu( $name, $ruta, $sub_menu_id )

    {
        $micro_menu = new Micro_menu();

        $micro_menu->name           = $name;
        $micro_menu->ruta           = $ruta;

        $micro_menu->sub_menu_id    = $sub_menu_id;
        $micro_menu->user_control   = 'seeder';

        $micro_menu->save();
    }

    public function run()
    {
        // usuarios -->
        $this->creaMenu( 'Mantenedor de usuarios', 'listarUsuario', 1 );
        $this->creaMenu( 'Mantenedor de roles de usuario', 'listarRol', 1 );
        $this->creaMenu( 'Mantenedor de cargos', 'listarCargo', 1 );
        $this->creaMenu( 'Mantenedor de niveles de cargos', 'listarNivelCargo', 1 );
        $this->creaMenu( 'Mantenedor de departamentos', 'listarDepartamentos', 1 );
        $this->creaMenu( 'Mantenedor de niveles de departamentos', 'listarNivelDepartamento', 1 );


        // activos -->
        $this->creaMenu( 'Mantenedor de activos', 'listarActivo', 2 );
        $this->creaMenu( 'Mantenedor de categorias', 'listarCategorias', 2 );
        $this->creaMenu( 'Mantenedor de estados de activos', 'listarEstadoActivo', 2 );

        // otros -->
        $this->creaMenu( 'Mantenedor de rubro de la empresa', 'listarRubro', 3 );
        $this->creaMenu( 'Mantenedor de estado de asignaciones', 'listarEstadoAsignacion', 3 );
        $this->creaMenu( 'Mantenedor de ciudades', 'listarCiudad', 3 );
        $this->creaMenu( 'Mantenedor de oficinas', 'listarOficina', 3 );
        $this->creaMenu( 'Mantenedor de empresas', 'listarEmpresa', 3 );
        $this->creaMenu( 'Mantenedor de Proveedores', 'listarProveedor', 3 );
        $this->creaMenu( 'Mantenedor de Países', 'listarPais', 3 );

    }
}
