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
        Schema::create('microcontrollers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cooperative_id");
            $table->string('name');
            $table->string('manufacturer');
            $table->string('architecture');
            $table->unsignedInteger('clock_speed');
            $table->unsignedInteger('flash_memory_size');
            $table->unsignedInteger('ram_size');
            $table->unsignedTinyInteger('pin_count');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->foreign("cooperative_id")->references('id')->on("cooperatives")->onDelete("cascade");
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
        Schema::dropIfExists('microcontrollers');
    }
};

