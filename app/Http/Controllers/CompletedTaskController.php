<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedTask;
use Illuminate\Support\Facades\Auth; // ★追加

class CompletedTaskController extends Controller
{
    public function list()
    {
        // 修正後： 自分のID (Auth::id()) と一致するものだけを取得
        $list = CompletedTask::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('task.completed_list', ['list' => $list]);
    }
}
