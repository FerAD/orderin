<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishToppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_topp', function(Blueprint $table) {
            $table->integer('idDish')->unsigned();
            $table->foreign('idDish')->references('idDish')->on('dishes');
            $table->integer('idTopping')->unsigned();
            $table->foreign('idTopping')->references('idTopping')->on('toppings');
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
