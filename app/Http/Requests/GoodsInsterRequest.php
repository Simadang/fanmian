<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsInsterRequest extends Request
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
            'title' => 'required',
            'num'=>'required|regex:/^\d{1,4}$/',
            'price'=>'required|regex:/^\d{1,9}$/',
            'tid'=>'required',
            'intro'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'商品名不得为空',
            'num.required'=>'密码不得为空',
            'num.regex'=>'请输入1-9999区间内的商品数量',
            'price.required'=>'商品价格不得为空',
            'price.regex'=>'请输入正确的商品价格格式',
            'tid.required'=>'请选择商品类型',
            'intro.required'=>'请输入您对本商品的描述',
        ];
    }
}
