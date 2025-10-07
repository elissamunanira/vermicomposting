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
        Schema::create('vilages', function (Blueprint $table) {
            $table->id();
            $table->integer("CodeVillage");
            $table->string("VillageName");
            $table->bigInteger("codecell")->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vilages', function (Blueprint $table) {
            //
        });
    }
};
