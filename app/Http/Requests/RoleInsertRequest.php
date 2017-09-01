<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleInsertRequest extends Request
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
            'name.required'=>'角色项不得为空',
            'name.unique'=>'角色项存在',
            'description.required'=>'角色说明项不得为空',
        ];
    }
}
