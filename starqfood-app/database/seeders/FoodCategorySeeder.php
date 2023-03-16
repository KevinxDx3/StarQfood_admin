<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos=[
            ['category'=>'Casera','brief'=>''],
            ['category'=>'Costeña','brief'=>''],
            ['category'=>'Bebidas','brief'=>''],
            ['category'=>'Bebidas (Alcohólicas)','brief'=>''],
            ['category'=>'Postre','brief'=>''],
            ['category'=>'Desayuno','brief'=>''],
            ['category'=>'Asados','brief'=>'']
            
        ];
        DB::table('food_categories')->insert($datos);
    }
}
