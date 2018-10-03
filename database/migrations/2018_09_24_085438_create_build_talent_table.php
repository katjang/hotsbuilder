<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildTalentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('build_talent', function (Blueprint $table) {

            $table->unsignedInteger('build_id');
            $table->foreign('build_id')
                ->references('id')
                ->on('builds')
                ->onDelete('cascade');

            $table->unsignedInteger('talent_id');
            $table->foreign('talent_id')
                ->references('id')
                ->on('talents')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('build_talent');
    }
}
