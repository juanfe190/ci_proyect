<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->unique();
            $table->string('description', 500);
            $table->string('video_code', 20)->unique();
            $table->integer('category_id')->unsigned();
            $table->integer('difficulty_id')->unsigned();
            $table->string('svg_name', 100)->nullable();
            $table->string('url', 150);
            $table->boolean('status')->nullable();
            $table->timestamps();
        });

        Schema::table('courses', function($table){
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('difficulty_id')->references('id')->on('difficulty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function($table){
            $table->dropForeign('courses_category_id_foreign');
            $table->dropForeign('courses_difficulty_id_foreign');
        });
        Schema::drop('courses');
    }
}
