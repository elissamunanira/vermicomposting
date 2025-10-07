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
        Schema::create('cooperatives', function (Blueprint $table) {
            $table->id();
            $table->string('co_operativename');
            $table->string('co_operativemanager');
            $table->string('co_operative_email')->unique();
            $table->integer('co_operative_telephone');
            $table->tinyInteger('status')->default(0);
            $table->date('starting_date');
            $table->string('province');
            $table->string('district');
            $table->string('sector');
            $table->string('cell');
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
        Schema::dropIfExists('cooperatives');
    }
};
