<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicroMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('micro_menus', function (Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('ruta');

            $table->integer('sub_menu_id')->unsigned();

            $table->string('user_control');
            $table->timestamps();

            $table->foreign('sub_menu_id')
                ->references('id')
                ->on('sub_menus')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('micro_menus');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
