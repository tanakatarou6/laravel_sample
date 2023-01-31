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
            $table->string('problem_0')->nullable();
            $table->string('problem_1')->nullable();
            $table->string('problem_2')->nullable();
            $table->string('problem_3')->nullable();
            $table->string('problem_4')->nullable();
            $table->string('problem_5')->nullable();
            $table->string('problem_6')->nullable();
            $table->string('problem_7')->nullable();
            $table->string('problem_8')->nullable();
            $table->string('problem_9')->nullable();
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
