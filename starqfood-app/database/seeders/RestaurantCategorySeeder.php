<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos=[
            ['category'=>'Comida Rápida'],
            ['category'=>'Casual'],
            ['category'=>'Cafeteria'],
            ['category'=>'Bar'],
            ['category'=>'Bar-Restaurant'],
            ['category'=>'Casual'],
            ['category'=>'Temático']
        ];
        DB::table('restaurant_categories')->insert($datos);
    }
}
