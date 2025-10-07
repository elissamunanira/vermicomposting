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


        if(!Schema::hasTable('binconditions')){
        Schema::create('binconditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedinteger('bin_id');
            $table->float("temperature");
            $table->float("humidity");
            $table->float("soil_moisture");
            $table->float("acidity");
            $table->foreign('bin_id')->references('id')->on('bins')->onDelete("cascade");
            $table->timestamps();
        });}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binconditions');
    }
};
