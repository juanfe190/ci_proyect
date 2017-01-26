<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('description', 500);
            $table->integer('course_id')->unsigned();
            $table->integer('position');
            $table->string('url', 150);
            $table->timestamps();
        });

        Schema::table('stages', function($table){
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stages', function($table){
            $table->dropForeign('stages_course_id_foreign');
        });
        Schema::drop('stages');
    }
}
