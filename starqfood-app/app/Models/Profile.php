<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Image;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $primaryKey = 'profile_id';
    // protected $guarded=[];
    protected $fillable = [
        'name',
        'last_name',
        'birthday',
        'movil',
        'telf',
    ];
    protected $hidden = [
        'user_id_fk',
        'updated_at',
        'created_at',
    ];


    protected $casts = [
        'birthday'=>'date:Y-m-d'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_fk','user_id');
    }
     //-------------------------------------------------------//
    public function image()
    {
        return $this->MorphOne(Image::class, 'imageable');
    }
}
