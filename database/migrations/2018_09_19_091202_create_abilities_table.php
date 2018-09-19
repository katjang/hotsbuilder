<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hero_id');
            $table->string('name');
            $table->string('title');
            $table->text('description');
            $table->text('icon')->nullable();
            $table->string('hotkey')->nullable();
            $table->unsignedInteger('cooldown')->nullable();
            $table->unsignedInteger('mana_cost')->nullable();
            $table->boolean('trait');
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
        Schema::dropIfExists('abilities');
    }
}
