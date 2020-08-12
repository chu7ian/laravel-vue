@extends('admin.layout.master')
@section('content')
    <div>中间部分</div>
    <br>
    <h1>后端首页</h1>
    <br>
    {{Auth::guard('admin')->user()->username}}
    <a href="/admin/changePassword">修改密码</a> |
    <a href="/admin/logout">退出</a>
@endsection