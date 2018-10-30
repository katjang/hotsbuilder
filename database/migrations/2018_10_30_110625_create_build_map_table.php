<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_map', function (Blueprint $table) {
            $table->unsignedInteger('build_id');
            $table->foreign('build_id')
                ->references('id')
                ->on('builds');

            $table->unsignedInteger('map_id');
            $table->foreign('map_id')
                ->references('id')
                ->on('maps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('build_map');
    }
}
