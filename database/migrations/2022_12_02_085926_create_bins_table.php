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
        Schema::create('bins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("member_id");
            $table->unsignedBigInteger("cooperative_id");
            $table->string("code")->unique();
            $table->tinyInteger('status')->default(0);
            $table->string("microcontroller_type");
            $table->string("worm_type");
            $table->string("province");
            $table->string("district");
            $table->string("sector");
            $table->string("cell");
            $table->foreign("member_id")->references('id')->on("members")->onDelete("cascade");
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
        Schema::dropIfExists('bins');
    }
};
