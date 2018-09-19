<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hero_id');
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->string('ability');
            $table->unsignedInteger('sort');
            $table->unsignedInteger('cooldown')->nullable();
            $table->unsignedInteger('mana_cost')->nullable();
            $table->unsignedInteger('level');
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
        Schema::dropIfExists('talents');
    }
}
