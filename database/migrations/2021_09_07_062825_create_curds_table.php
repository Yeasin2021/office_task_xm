<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name')->nullable();
            $table->string('Address')->nullable();
            $table->integer('Phone')->nullable();
            $table->string('Education')->nullable();
            $table->string('Email')->nullable();
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
        Schema::dropIfExists('curds');
    }
}
