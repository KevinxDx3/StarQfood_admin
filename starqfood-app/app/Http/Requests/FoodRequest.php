<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'category_id_fk'=>'required|integer',
            'food_name'=>'required|string',
            'ruc_fk'=>'required|max:13|min:13',
            'cost'=>'required|regex:/^\d{1,3}(\.\d{1,2})?$/',
            'wait_time'=>'nullable|string|max:3|regex:/^\d{1,3}$/',
            'visibility'=>'nullable|boolean',
            'image' => 'mimes:jpeg,png,jpg|max:10240'  
        ];
    }
}
