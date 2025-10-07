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
        Schema::create('worms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cooperative_id");
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('population');
            $table->float('price', 8, 2);

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
        Schema::dropIfExists('worms');
    }
};
