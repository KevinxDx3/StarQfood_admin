<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RestaurantCategory;
use App\Models\Comment;
use App\Models\Evaluation;
use App\Models\Food;

class Restaurant extends Model
{
    use HasFactory;
    protected $table='restaurants';
    protected $primaryKey = 'ruc';
    public $incrementing = false;
    protected $fillable = [
        'user_id_fk',
        'ruc',
        'local_name',
        'address',
        'local_email',
        'owen',
        'local_tel',
        'local_movil',
        'description',
        'category_id_fk'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id_fk','user_id');
    }
    
    public function category(){
        return $this->belongsTo(RestaurantCategory::class,'category_id_fk','category_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'ruc_fk');
    }
    public function evaluations(){
        return $this->hasMany(Evaluation::class,'ruc_fk');
    }
    public function foods(){
        return $this->hasMany(Food::class,'ruc_fk');
    }

    ///------------------------Map------------------
    public function map(){
        return $this->hasOne(Map::class,'ruc_fk');
    }

    //---------------------------------------------
    public function image()
    {
        return $this->MorphOne(Image::class, 'imageable');
    }
}
