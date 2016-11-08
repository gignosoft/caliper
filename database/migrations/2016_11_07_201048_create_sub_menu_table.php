<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sub_menus', function (Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('ruta');
            $table->string('body');
            $table->boolean('sub');

            $table->integer('menu_id')->unsigned();

            $table->string('user_control');
            $table->timestamps();

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
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
        Schema::dropIfExists('sub_menus');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
