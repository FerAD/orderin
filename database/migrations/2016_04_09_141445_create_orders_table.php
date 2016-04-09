<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->uuid('token');
            $table->primary('token');
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->integer('idBranch')->unsigned();
            $table->foreign('idBranch')->references('idBranch')->on('branches');
            $table->integer('idPaymentType')->unsigned();
            $table->foreign('idPaymentType')->references('idPaymentType')->on('paymentTypes');
            $table->boolean('status');
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
