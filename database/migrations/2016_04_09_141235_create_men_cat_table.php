<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('men_cat', function(Blueprint $table) {
            $table->integer('idMenu')->unsigned();
            $table->foreign('idMenu')->references('idMenu')->on('menus');
            $table->integer('idCategory')->unsigned();
            $table->foreign('idCategory')->references('idCategory')->on('categories');
            $table->timestamps();
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
    }
}
