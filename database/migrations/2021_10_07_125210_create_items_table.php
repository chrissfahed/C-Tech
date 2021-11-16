<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->enum('status',['NEW','USED'])->default('NEW');
            $table->string('brand')->nullable();
            $table->string('type');
            $table->string('displayname');
            $table->integer('price')->unsigned();
            $table->integer('qty');
            $table->string('description');
            $table->string('image');
            $table->boolean('isfeatured')->default('1');
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
        Schema::dropIfExists('items');
    }
}
