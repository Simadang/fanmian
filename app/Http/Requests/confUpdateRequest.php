<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class confUpdateRequest extends Request
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
            'name'=>'required',
            'content'=>'required',
            'order'=>'required|regex:/^\w{1}$/',
            'tips'=>"required",
            'type'=>"required",
            'value'=>"",
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'用户名不得为空',
            'content.required'=>'内容项不得为空',
            'order.required'=>'排序项不得为空',
            'order.regex'=>'排序项格式不正确',
        ];
    }
}
