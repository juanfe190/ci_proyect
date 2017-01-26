<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('description', 500);
            $table->integer('position');
            $table->string('item_code', 20)->unique();
            $table->integer('item_type_id')->unsigned();
            $table->integer('stage_id')->unsigned();
            $table->string('url', 150);
            $table->timestamps();
        });

        Schema::table('items', function($table){
            $table->foreign('stage_id')->references('id')->on('stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function($table){
            $table->dropForeign('items_stage_id_foreign');
        });
        Schema::drop('items');
    }
}
