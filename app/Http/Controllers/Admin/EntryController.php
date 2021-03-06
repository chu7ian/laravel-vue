<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Auth;

class EntryController extends Controller
{
    public function __construct()
    {
        //添加中间方式二：
        $this->middleware('admin.auth')->except(['loginForm','login']);
    }

    /**
     * 后端首页
     * @param Response $response
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Response $response)
    {
        return view('admin.entry.index');
    }

    /**
     * 登录界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginForm()
    {
        return view('admin.entry.login');
    }

    /**
     * 登录处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        $status = Auth::guard('admin')->attempt([
            'username'=>$request->input('username'), //admin
            'password'=>$request->input('password'), //admin888
        ]);
        if($status){
            return redirect('/admin/index'); //重定向
        }
        return redirect('/admin/login')->with('error','用户名或密码错误');
    }

    /**
     * 退出登录
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
