<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        //バリデーション済みのデータを受け取る
        $datum = $request->validated();

        //パスワードをハッシュ化
        $datum['password'] = Hash::make($datum['password']);

        // datebase usertable に登録する
        User::create($datum);

        //メッセージを一時保存する
        $request->session()->flash('front.user_register_success', true);

        //トップページへリダイレクト 
        return redirect('/');
    }
}
