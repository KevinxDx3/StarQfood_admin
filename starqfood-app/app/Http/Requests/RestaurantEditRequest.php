<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantEditRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'user_id_fk'=>'nullable|integer',
            'ruc'=>'required|max:13|min:13|unique:restaurants,ruc,'.$this->ruc_old.',ruc',
            'local_name'=>'required|min:3|max:40',
            'address'=>'required|max:150',
            'local_email'=>'nullable|email|max:40',
            'owen'=>'required|string|max:30|min:3',
            'local_tel'=>'nullable|string|min:7|max:9',
            'local_movil'=>'nullable|string|min:9|max:10',
            'description'=>'nullable|string',
            'category_id_fk'=>'required|integer',
            'image' => 'mimes:jpeg,png,jpg|max:10240'  
        ];
    }
}
