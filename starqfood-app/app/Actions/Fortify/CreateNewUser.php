<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'rol_id_fk'=>['required',Rule::in(2,3)],
        ])->validate();

        $user = User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'rol_id_fk'=>$input['rol_id_fk'],
        ]);
        $data=$this->getDataProfile($input['name']);
        $profile=$user->profile()->create($data);
        
        return $user;

    }
    public function getDataProfile(string $input)
    {
        $nameCom=explode(" ",$input);
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
