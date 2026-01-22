<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * トップページ を表示する
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * ログイン処理
     */
    public function login(AdminLoginPostRequest $request)
    {
        $datum = $request->validated();

        // 認証失敗時
        if (Auth::guard('admin')->attempt($datum) === false) {
            return back()
                ->withInput()
                ->withErrors(['auth' => 'ログインIDかパスワードに誤りがあります。',]);
        }

        // 認証成功時
        $request->session()->regenerate();
        return redirect()->intended('/admin/top');
    }


    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();
        $request->session()->regenerate();
        return redirect(route('admin.index'));
    }
}
