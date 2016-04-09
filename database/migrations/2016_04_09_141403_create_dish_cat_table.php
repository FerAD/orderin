<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_cat',function(Blueprint $table) {
            $table->integer('idCategory')->unsigned();
            $table->foreign('idCategory')->references('idCategory')->on('categories');
            $table->integer('idDish')->unsigned();
            $table->foreign('idDish')->references('idDish')->on('dishes');
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
