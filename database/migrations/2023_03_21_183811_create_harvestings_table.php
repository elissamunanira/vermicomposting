<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harvestings', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('planting_id')->unsigned();
        $table->bigInteger('bin_id')->unsigned();
        $table->integer("wormQuantity");
        $table->integer("harvestCompostQuantity");
         $table->foreign('bin_id')->references('id')->on('bins')->onDelete("cascade");
        $table->foreign('planting_id')->references('id')->on('plantings')->onDelete("cascade");
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
        Schema::dropIfExists('harvestings');
    }
};
