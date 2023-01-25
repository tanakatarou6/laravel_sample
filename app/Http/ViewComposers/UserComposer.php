<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;

class UserComposer
{
  // このクラスの中でしか使わない変数(プロパティ)を作成
  protected $auth;

  public function __construct(Guard $auth)
  {
    // 普通のクラスなのでconstructを使って処理したいものを定義、初期化。
    // 初期化の際に $auth を入れていて、Guardを使うことで認証系のいろいろな情報が自動的に入ってくる。
    $this->auth = $auth;
  }

  public function compose(View $view)
  {
    // 「userという変数を使えるようにし、その中に$this->auth->user()という値を詰めてビューに渡す」という定義方法。
    $view->with('user', $this->auth->user());
  }
}
