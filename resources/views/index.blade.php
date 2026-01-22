@extends('layout')

{{--メインコンテンツ--}}
@section('contents')

<h1>ログイン</h1>
{{--登録メッセージ--}}
@if (session('front.user_register_success') == true)
<div style="color:green; border:1px solid green; padding:10px; margin-bottom:10px;">
    ユーザを登録しました！！
</div>
@endif

{{--エラーメッセージ--}}
@if ($errors->any())
<div>
    @foreach ($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif


{{--ログインフォーム--}}
<form action="/login" method="post">
    @csrf
    email：<input type="text" name="email" value="{{ old('email') }}"><br>
    パスワード：<input type="password" name="password"><br>
    <button>ログインする</button>
</form>

{{--会員登録リンク--}}
<a href="/user/register">会員登録</a>

@endsection