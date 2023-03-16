<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:25',
            'last_name' => 'required|string|min:3|max:25',
            'email' => 'required|min:5|max:40|email|unique:users,email,'.$this->id.',user_id',
            'birthday' =>'nullable|date',
            'movil' => 'nullable|string|min:9|max:10',
            'telf' => 'nullable|string|min:6|max:7',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:10240'
        ];
    }
}