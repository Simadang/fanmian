<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class confInsertRequest extends Request
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
            'title' => 'required|unique:config',
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
            'title.required'=>'标题不得为空',
            'title.unique'=>'该标题已存在',
            'name.required'=>'用户名不得为空',
            'content.required'=>'内容项不得为空',
            'order.required'=>'排序项不得为空',
            'order.regex'=>'排序项格式不正确',
        ];
    }
}
