<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;

class Rol extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $primaryKey = 'rol_id';
    public function user()
    {
        return $this->hasMany(User::class, 'rol_id_fk');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permissions_roles','rol_id_fk','id_permission_fk','rol_id','id_permission');
    }
}
