<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost; // ★Step2で作ったバリデーション
use App\Models\User; // ★ユーザーモデル
use Illuminate\Support\Facades\Hash; // ★ハッシュ化に必要 [cite: 16]

class UserController extends Controller
{
    // 登録画面を表示する
    public function index()
    {
        return view('user.register');
    }

    // 実際にDBに登録する
    public function register(UserRegisterPost $request)
    {
        // 1. バリデーション済みのデータを受け取る [cite: 12]
        $datum = $request->validated();

        // 2. パスワードをハッシュ化（暗号化）して書き換える [cite: 13, 14, 15]
        $datum['password'] = Hash::make($datum['password']);

        // 3. データベース(usersテーブル)に登録する
        // createメソッドを使うには、Userモデル側でfillableの設定が必要だが、
        // LaravelのデフォルトUserモデルは設定済みなのでそのまま使える
        User::create($datum);

        // 4. 「登録しました」メッセージを一時保存する [cite: 27, 423]
        $request->session()->flash('front.user_register_success', true);

        // 5. トップページ（ログイン画面）へリダイレクト 
        return redirect('/');
    }
}