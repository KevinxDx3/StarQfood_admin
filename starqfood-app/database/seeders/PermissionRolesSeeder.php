<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arreglo=array();
        for($i=1;$i<=17;$i++){
            $arreglo['rol_id_fk']=1;
            $arreglo['id_permission_fk']=$i;
            DB::table('permissions_roles')->insert($arreglo);
        }

        $arreglo1=[
            ['rol_id_fk'=>2,'id_permission_fk'=>1],
            ['rol_id_fk'=>2,'id_permission_fk'=>2],
            ['rol_id_fk'=>2,'id_permission_fk'=>4],
            ['rol_id_fk'=>2,'id_permission_fk'=>5],
            ['rol_id_fk'=>2,'id_permission_fk'=>10],
            ['rol_id_fk'=>2,'id_permission_fk'=>11],
            ['rol_id_fk'=>2,'id_permission_fk'=>12],
            ['rol_id_fk'=>2,'id_permission_fk'=>16]
        ];
        DB::table('permissions_roles')->insert($arreglo1);
        $arreglo2=[
            ['rol_id_fk'=>3,'id_permission_fk'=>1],
            ['rol_id_fk'=>3,'id_permission_fk'=>2],
            ['rol_id_fk'=>3,'id_permission_fk'=>16],
            ['rol_id_fk'=>3,'id_permission_fk'=>17]
        ];
        DB::table('permissions_roles')->insert($arreglo2);
    }
}
