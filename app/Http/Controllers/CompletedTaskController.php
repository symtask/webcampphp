<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedTask; // ★モデルを読み込む

class CompletedTaskController extends Controller
{
    public function list()
    {
        $list = CompletedTask::all();
        return view('task.completed_list', ['list' => $list]);
    }
}
