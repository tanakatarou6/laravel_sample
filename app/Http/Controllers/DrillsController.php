<?php

namespace App\Http\Controllers;

use App\Drill;
use App\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrillsController extends Controller
{
    // タイピング練習一覧画面を表示するindexアクション(メソッド)
    public function index()
    {
        $drills = Drill::all();
        return view('drills.index', ['drills' => $drills]);
    }

    // 自身の登録した練習問題の画面(マイページ)を表示するmypageアクション(メソッド)
    public function mypage()
    {
        $drills = Auth::user()->drills()->get();
        return view('drills.mypage', compact('drills'));
    }

    // 練習登録画面を表示するnewアクション(メソッド)
    public function new()
    {
        return view('drills.new');
    }

    // 練習問題を登録するcreateアクション
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'problem0' => 'string|max:255',
            'problem1' => 'string|nullable|max:255',
            'problem2' => 'string|nullable|max:255',
            'problem3' => 'string|nullable|max:255',
            'problem4' => 'string|nullable|max:255',
            'problem5' => 'string|nullable|max:255',
            'problem6' => 'string|nullable|max:255',
            'problem7' => 'string|nullable|max:255',
            'problem8' => 'string|nullable|max:255',
            'problem9' => 'string|nullable|max:255'
        ]);

        // drillモデルインスタンスを生成
        $drill = new Drill;

        // problemモデルインスタンスを生成
        $problem = new Problem;

        // DBに登録する方法は2つある
        // ①.レコードを1つ1つ入れる方法
        // 保守性が良くない(DB変更の度、修正が必要)
        // $drill->title = $request->title;
        // $drill->category_name = $request->category_name;
        // $drill->save();

        // ②.fillメソッドを使って一気に入れる方法
        // $fillableを使用していないと、更新したくないレコードが更新されてしまうので注意
        // $drill->fill($request->all())->save();
        Auth::user()->drills()->save($drill->fill($request->all()));

        // dd($request);
        // problemsテーブルに値を登録するため、postデータから値を取得・設定
        for ($i = 0; $i < 10; $i++) {
            $problem['problem' . $i] = $request->input('problem' . $i);
        }

        // dd($problem);
        $drill->problem()->save($problem->fill($request->all()));

        $problem->fill($request->all())->save();
        // dd($problem);
        // dd($drill);

        // リダイレクトし、その際、sessionフラッシュにメッセージを入れる
        return redirect('/drills')->with('flash_message', __('Registered.'));
    }

    // タイピング練習を開始するshowアクション
    public function show($id)
    {
        // GETパラメータが数字かどうかチェックする
        if (!ctype_digit($id)) {
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed'));
        }

        $drill = Drill::find($id);

        return view('Drills.show', ['drill' => $drill]);
    }

    // 登録済み練習問題を編集するeditアクション
    public function edit($id)
    {
        // 必須パラメータのIDを引数に設定。
        // GETパラメータが数字かどうかチェックする
        // 事前にチェックすることでDBへのアクセスを減らせる(WEBサーバーへのアクセスのみで済む)
        if (!ctype_digit($id)) {
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        // $drill = Drill::find($id);
        $drill = Auth::user()->drills()->find($id);
        $problem = Problem::find($id);
        // dd($problem);
        // dd($drill);

        return view('drills.edit', ['drill' => $drill], ['problem' => $problem]);
    }

    // 編集画面で修正した練習問題でDBに登録してある問題を更新するupdateアクション
    public function update(Request $request, $id)
    {
        // GETパラメータが数字かどうかチェックする
        if (!ctype_digit($id)) {
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed'));
        }

        // $drill = Drill::find($id);
        $drill = Auth::user()->drills()->find($id);

        // $drill->fill($request->all())->save();
        Auth::user()->drills()->save($drill->fill($request->all()));

        return redirect('/drills')->with('flash_message', __('Updated.'));
    }

    // 登録済みの練習問題を削除するdestroyアクション
    public function destroy($id)
    {
        // GETパラメータが数字かどうかチェックする
        if (!ctype_digit($id)) {
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed'));
        }

        // $drill = Drill::find($id);
        // $drill->delete();

        // こう書いたほうがスマート
        // Drill::find($id)->delete();
        Auth::user()->drills()->find($id)->delete();

        return redirect('/drills')->with('flash_message', __('Destroyed.'));
    }
}
