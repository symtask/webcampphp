<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>完了タスクの一覧</title>
</head>

<body>
    <h1>完了タスクの一覧</h1>

    <div>
        <a href="/task/list">タスク一覧に戻る</a>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>タスク名</th>
                <th>期限</th>
                <th>重要度</th>
                <th>タスク終了日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->period }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 10px;">
        現在 1 ページ目<br>
        最初のページ / 前に戻る / 次に進む
    </div>

    <hr>
    <div>
        <a href="/logout">ログアウト</a>
    </div>
</body>

</html>