<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
            $table->string('first_name', 35);
            $table->string('last_name', 35);
            $table->string('email')->unique();
            $table->string('password', 60)->nullable();
            $table->string('username', 45)->unique();
            $table->string('country', 2);
            $table->string('country_birth', 2);
            $table->integer('rol_id')->unsigned();
            $table->string('profile_photo', 30);
            $table->boolean('activo');
            $table->rememberToken();
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
