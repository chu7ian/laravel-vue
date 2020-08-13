<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class MyController extends Controller
{
    public function passwordForm()
    {
        return view('admin.my.passwordForm');
    }

    public function changePassword(Request $request)
    {
//下面使用的依赖是 Request

        $message = [
            'original_password.required'     => '原密码错误',
            'password.required'              => '密码不能为空',
            'password.confirmed'              => '两次密码不一致',
            'password.check_password'              => '原密码输入错误',
            'password_confirmation.required'      => '确认密码不能为空',
        ];
//        $message = [
//            'required' => 'The :attribute field is required.',
//        ];


        //验证方式1:
//        $this->validate($request,[
//            'original_password'     => 'bail|sometimes|required',
//            'password'              => 'sometimes|required|confirmed',
//            'password_confirmation' => 'sometimes|required',
//        ]);


        //验证方式2：
        //如果你希望在某个属性第一次验证失败后停止运行验证规则，你需要附加 bail 规则到该属性
        $validator = Validator::make($request->all(),[
            'original_password'     => 'bail|sometimes|required',
            'password'              => 'sometimes|required',
            'password_confirmation' => 'sometimes|required',
        ],$message);
        $validator->after(function ($validator) {
            $validator->errors()->add('field', '验证成功之后允许的回调函数，以便你进行下一步的验证，甚至在消息集合中添加更多的错误消息');
        });
//        $error = $validator->errors();
//        dd($error->first()); //字符串
//        dd($error->get('original_password')); //get返回数组
//        dd($error->all()); 返回所有
//        dd($error->has('original_password')); //是否有此参数的错误
        if ($validator->fails()) {
            return redirect('admin/changePassword')
                //如果你一个页面中有多个表单，你可以通过命名错误包来检索特定表单的错误消息。
                //只需给 withErrors 方法传递一个名字作为第二个参数
                ->withErrors($validator, 'update')
                ->withInput();
        }


        //验证方式3：
//        Validator::make($request->all(),[
//            'original_password'     => 'bail|sometimes|required',
//            'password'              => 'sometimes|required|confirmed',
//            'password_confirmation' => 'sometimes|required',
//        ])->validate();

        return 333;
    }
}
