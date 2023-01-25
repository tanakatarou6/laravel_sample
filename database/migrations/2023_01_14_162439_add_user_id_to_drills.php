<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToDrills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drills', function (Blueprint $table) {
            // まずdrillsテーブルに登録されている既存のレコードを削除する
            // DBファサードのstatementメソッドを使うことで、下記のように普通のSQLっぽく書ける。
            DB::statement('DELETE FROM drills');
            // user_idのカラムを追加
            $table->unsignedBigInteger('user_id');
            // 追加したカラムに外部キーをつける、foreignでカラムを指定して、
            // referencesで紐付く別テーブルにあるカラムを指定、onでそのカラムがある別テーブルを指定。
            $table->foreign('user_id')->references('id')->on('users');
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
            // user_idのカラムを削除する。
            // 外部キー付きのカラムを削除するには、まず必ず外部キー制約を外す必要がある。
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
        });
    }
}
