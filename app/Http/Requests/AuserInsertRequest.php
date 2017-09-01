<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AuserInsertRequest extends Request
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
            'username' => 'required|unique:admin_user|regex:/^\w{6,18}$/',
            'password'=>'required',
            'repassword'=>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'用户名不得为空',
            'username.unique'=>'用户名存在',
            'username.regex'=>'用户名格式错误(6~18位)',
            'password.required'=>'密码不得为空',
            'repassword.required'=>'确认密码不得为空',
            'repassword.same'=>'俩次密码不一致',
        ];
    }
}
