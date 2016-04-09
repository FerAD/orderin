<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sch_cat', function(Blueprint $table) {
            $table->integer('idSchedule')->unsigned();
            $table->foreign('idSchedule')->references('idSchedule')->on('categorySchedules');
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
