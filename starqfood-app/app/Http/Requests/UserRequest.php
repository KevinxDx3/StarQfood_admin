<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:25',
            'last_name' => 'required|string|min:3|max:25',
            'email' => 'required|min:3|max:40|unique:users,email|email',
            'username' => 'required|min:3|max:25|unique:users,username',
            'birthday' => 'date',
            'movil' => 'string|min:9|max:10',
            'telf' => 'string|min:6|max:7',
            'image' => 'mimes:jpeg,png,jpg|max:10240'
        ];
    }
}
