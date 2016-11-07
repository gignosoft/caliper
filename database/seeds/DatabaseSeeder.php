<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $this->call(CountryTableSeeder::class);


        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserRoleSeeder::class);

        


        // | activities | -< | companies |
        $this->call(ActivityTableSeeder::class);
        $this->call(CompanyTableSeeder::class);


        //Supplier - Proveedor
        $this->call(SupplierTableSeeder::class);

        $this->call(LevelDepartmentsSeeder::class);
        $this->call(DepartmentsSeeder::class);


        // | levels | -< | positions |
        $this->call(LevelPositionsTableSeeder::class);
        $this->call(PositionTableSeeder::class);

        // | Users | >-< | positions |
        $this->call(PositionUser_TableSeeder::class);



        $this->call(purchasesTableSeeder::class);


        // |state_assignments| >-< |assignments|
        $this->call(CategoryTableSeeder::class);

        $this->call(StateAssetTableSeeder::class);
        $this->call(AssetTableSeeder::class);


        $this->call(StateAssignmentTableSeeder::class);
        $this->call(AssignmentTableSeeder::class);

        $this->call(OfficesTableSeeder::class);

        $this->call(MenusTableSeeder::class);



        Model::reguard();
    }
}
