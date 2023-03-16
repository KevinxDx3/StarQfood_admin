<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;
class Permission extends Model
{
    use HasFactory;
    protected $table='permissions';
    protected $primaryKey = 'id_permission';

    public function roles()
    {
        return $this->belongsToMany(Rol::class,'permissions_roles','id_permission_fk','rol_id_fk','id_permission','rol_id');
    }
}
