<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Restaurant;

class Comment extends Model
{
    use HasFactory;
    protected $table='comments';
    protected $primaryKey='comment_id';
    protected $fillable=['commentary','ruc_fk','user_id_fk'];
    
    public function user(){

        return $this->belongsTo(User::class,'user_id_fk','user_id');
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class,'ruc_fk','ruc');
    }
}
