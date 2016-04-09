<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idUser');
            $table->string('name',150);
            $table->string('email',150)->unique();
            $table->boolean('status');
            $table->string('pushDisp',35)->nullable();
            $table->string('profileUrl')->nullable();
            $table->string('password',60);
            $table->uuid('token');
            $table->string('facebook_id')->unique()->nullable();
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
        Schema::drop('users');
    }
}
