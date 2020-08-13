<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Validator;
use Hash;
//验证方式3：
class AdminPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

//    public function withValidator($validator)
//    {
//        $validator->after(function ($validator) {
//            $validator->errors()->add('field', 'Something is wrong with this field!');
//        });
//    }

    /**
     * 添加验证规则
     */
    public function addValidator()
    {
        //验证用户密码
        Validator::extend('check_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value,Auth::guard('admin')->user()->password);
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->addValidator();

        //提交的参数验证
        return [
            'original_password'     => 'sometimes|required|check_password',
            'password'              => 'sometimes|required|confirmed',
            'password_confirmation' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'original_password.required'     => '原密码错误',
            
            'password.required'              => '密码不能为空',
            'password.confirmed'              => '两次密码不一致',
            'password.check_password'              => '原密码输入错误',

            'password_confirmation.required'      => '确认密码不能为空',
        ];
    }
}
