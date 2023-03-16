<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createMultiplePermission = [
            ['permission'=>'create_prof'],
            ['permission'=>'update_prof'],
            ['permission'=>'delete_prof'],
            ['permission'=>'create_rest'],
            ['permission'=>'update_rest'],
            ['permission'=>'delate_rest'],
            ['permission'=>'create_crest'],
            ['permission'=>'update_crest'],
            ['permission'=>'delate_crest'],
            ['permission'=>'create_food'],
            ['permission'=>'update_food'],
            ['permission'=>'delate_food'],
            ['permission'=>'create_cfood'],
            ['permission'=>'update_cfood'],
            ['permission'=>'delate_cfood'],
            ['permission'=>'comment'],
            ['permission'=>'evaluation']
        ];
        DB::table('permissions')->insert($createMultiplePermission);
    }
}
