<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|min:3|max:40|unique:users,email|email',
            'username' => 'required|min:3|max:25|unique:users,username',
            'password' => 'required|min:3|confirmed|',
            'rol_id_fk'=>'required|between:1,3'
        ];
    }
    public function getDataProfile()
    {
        $nameCom=explode(" ",$this->get('name'));
        if(count($nameCom)==1){
            $name=$nameCom[0];
            $lastName=$nameCom[0];
        }else if (count($nameCom)==2){
            $name=$nameCom[0];
            $lastName=$nameCom[1];
        }else if (count($nameCom)==3){
            $name=$nameCom[0];
            $lastName=$nameCom[1]. " ".$nameCom[2];
        }else{
            $name=$nameCom[0]. " ".$nameCom[1];
            $lastName=$nameCom[2]. " ".$nameCom[3];
        }

            return [
                'name' => ucwords($name),
                'last_name' => ucwords($lastName),
            ];
    }
}
