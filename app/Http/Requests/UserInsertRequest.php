<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserInsertRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:home_user|regex:/^\w{6,18}$/',
            'password'=>'required',
            'repassword'=>'required|same:password',
            'phone'=>'required|regex:/^1[35784]\d{9}$/',
            'email'=>"required|email"
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'用户名不得为空',
            'username.unique'=>'用户名存在',
            'username.regex'=>'用户名格式错误(需6~18位)',
            'password.required'=>'密码不得为空',
            'repassword.required'=>'确认密码不得为空',
            'repassword.same'=>'俩次密码不一致',
            'phone.required'=>'手机号不得为空',
            'phone.regex'=>'手机号格式不正确',
            'email.required'=>'邮箱不得为空',
            'email.email'=>'邮箱格式不正确',
        ];
    }
}
