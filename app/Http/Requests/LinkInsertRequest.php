<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkInsertRequest extends Request
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
     * 定义添加友情链接的验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            //设定友情链接添加规则
            'title' => 'required|unique:link',
            'url' =>'required'
        ];
    }

     public function messages()
    {
        return [
            'title.required'=>'链接名必填',
            'title.unique'=>'链接名已存在',
            'url.required'=>'链接地址必填'
        ];
    }
}
