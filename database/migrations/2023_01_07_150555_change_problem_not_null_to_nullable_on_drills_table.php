<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProblemNotNullToNullableOnDrillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drills', function (Blueprint $table) {
            /** カラムに変更を加えるので、下記のような書き方
             *  tableのproblem1〜9に対して、nullableを設定して変更、という感じ 
             */
            $table->string('problem1')->nullable()->change();
            $table->string('problem2')->nullable()->change();
            $table->string('problem3')->nullable()->change();
            $table->string('problem4')->nullable()->change();
            $table->string('problem5')->nullable()->change();
            $table->string('problem6')->nullable()->change();
            $table->string('problem7')->nullable()->change();
            $table->string('problem8')->nullable()->change();
            $table->string('problem9')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drills', function (Blueprint $table) {
            /** 同様に、upの処理をもとに戻す処理を記述しておく
             *  書き方は、nullableの引数にfalseを指定してNOT NULL制約が付く
             */
            $table->string('problem1')->nullable(false)->change();
            $table->string('problem2')->nullable(false)->change();
            $table->string('problem3')->nullable(false)->change();
            $table->string('problem4')->nullable(false)->change();
            $table->string('problem5')->nullable(false)->change();
            $table->string('problem6')->nullable(false)->change();
            $table->string('problem7')->nullable(false)->change();
            $table->string('problem8')->nullable(false)->change();
            $table->string('problem9')->nullable(false)->change();
        });
    }
}
