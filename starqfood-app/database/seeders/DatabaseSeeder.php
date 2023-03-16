<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolSeeder::class,
            PermissionSeeder::class,
            PermissionRolesSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            RestaurantCategorySeeder::class,
            RestaurantSeeder::class,
            FoodCategorySeeder::class
            
         ]);
    }
}
