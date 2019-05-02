<html>
<head>
<meta charset='utf-8'>
</head>
<body>
Hello!

@if (Auth::check())
    {{\Auth::user()->name}}さん<br />
    <a href="/auth/logout">Logout</a>
@else
    ゲストさん<br />
    <a href="/auth/login">Login</a><br />
    <a href="/auth/register">会員登録</a>
@endif
</body>
</html>