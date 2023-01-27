<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drill extends Model
{
    // DBで間違って変更さたくないカラム(ユーザーIDなど)にはロックを掛けることができる。
    // ロックのかけ方は「fillable」と「guarded」の2種類がある。
    // どちらか一方しか使用できない。

    // 【fillableについて】
    // モデルが指定した属性以外を持たなくなる
    // 【メリット】fillメソッドに対応しやすい。
    // 【デメリット】カラムが増えると都度追加する必要がある。
    protected $fillable = ['title', 'category_name', 'problem_id', 'user_id'];

    // 【guardedについて】
    // モデルから指定した属性が取り除かれる(カラムが増えてもほとんど変更しなくてよい)
    // protected $guarded =['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function problem()
    {
        return $this->hasOne('App\Problem');
    }
}
