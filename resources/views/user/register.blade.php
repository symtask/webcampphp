<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
</head>

<body>
    <h1>ユーザ登録</h1>

    {{-- バリデーションエラーの表示 --}}
    @if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif

    <form action="/user/register" method="post">
        @csrf
        名前: <input type="text" name="name" value="{{ old('name') }}"><br>
        email: <input type="text" name="email" value="{{ old('email') }}"><br>
        パスワード: <input type="password" name="password"><br>
        <button>登録する</button>
    </form>
</body>

</html>