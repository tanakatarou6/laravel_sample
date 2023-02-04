<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('drill_id');
            $table->string('problem0')->nullable();
            $table->string('problem1')->nullable();
            $table->string('problem2')->nullable();
            $table->string('problem3')->nullable();
            $table->string('problem4')->nullable();
            $table->string('problem5')->nullable();
            $table->string('problem6')->nullable();
            $table->string('problem7')->nullable();
            $table->string('problem8')->nullable();
            $table->string('problem9')->nullable();
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
        Schema::dropIfExists('problems');
    }
}
