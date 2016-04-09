<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishOrdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_ord', function(Blueprint $table) {
            $table->integer('idDish')->unsigned();
            $table->foreign('idDish')->references('idDish')->on('dishes');
            $table->uuid('tokenOrder');
            $table->foreign('tokenOrder')->references('token')->on('orders');
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
