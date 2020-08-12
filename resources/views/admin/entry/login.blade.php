<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录界面</title>
</head>
<body>

<form action="/admin/login" method="post">
    {{csrf_field()}}
    <input type="text" name="username" value="" placeholder="输入用户名">
    <br>
    <input type="password" name="password" value="" placeholder="输入密码">
    <br>
{{--    错误信息--}}
    @if(session('error'))
        {{@session('error')}}
    @endif

    <br>
    <input type="submit" value="登录">
</form>

</body>
</html>