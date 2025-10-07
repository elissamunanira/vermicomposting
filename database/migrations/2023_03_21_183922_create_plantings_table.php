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
        Schema::create('plantings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bin_id')->unsigned();
            $table->tinyInteger('status')->default(0);
            $table->integer("wormQuantity");
            $table->integer("WasteQuantity");
            $table->integer("ExpectedCompostQuantity");
            $table->foreign('bin_id')->references('id')->on('bins')->onDelete("cascade");
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
        Schema::dropIfExists('plantings');
    }
};
