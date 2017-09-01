<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PerInsertRequest extends Request
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
            'name' => 'required|unique:roles',
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'权限项不得为空',
            'name.unique'=>'权限项存在',
            'description.required'=>'权限说明项不得为空',
        ];
    }
}