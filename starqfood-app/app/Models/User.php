<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'email',
        'username',
        'password',
        'rol_id_fk',
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_confirmed_at',
        'two_factor_recovery_codes',
        'email_verified_at',
        'updated_at',
        'created_at',

    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'rol_id_fk'=>'integer',
    ];
    // public function setPasswordAttribute($password){
    //     $this->attributes['password']=bcrypt($password);
    // }


    

    public function profile(){
        return $this->hasOne(Profile::class,'user_id_fk');
    }
    public function restaurant(){
        return $this->hasMany(Restaurant::class,'user_id_fk');
    }
    public function rol(){
        return $this->belongsTo(Rol::class,'rol_id_fk','rol_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'user_id_fk');
    }

    public function evaluations(){
        return $this->hasMany(Evaluation::class,'user_id_fk');
    }
}
