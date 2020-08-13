@extends('admin.layout.master')
@section('content')
    <div>中间部分</div>
    <br>
    <h1>修改密码</h1>
    <br>
    <form action="" method="post">
        {{csrf_field()}}
        原密码：<input type="text" name="original_password" value="">
        <br>
        新密码：<input type="text" name="password" value="">
        <br>
        确认密码：<input type="text" name="password_confirmation" value="">
        <br>
        <input type="submit" value="提交">
    </form>
@endsection