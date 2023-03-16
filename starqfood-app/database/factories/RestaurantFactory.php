<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ruc'=>fake()->unique()->ean13(),
            'category_id_fk' =>fake()->numberBetween(1,7),
            'user_id_fk'=>fake()->unique()->optional(80)->numberBetween(1,10),
            'local_name' =>fake()->company(),
            'address' =>fake()->address(),
            'local_email' => fake()->optional(80)->safeEmail(),
            'owen' =>fake()->name(),
            'local_tel' =>fake()->optional(80)->numberBetween(2000000,4000000),
            'local_movil' =>fake()->optional(80)->isbn10(),
            'description' =>fake()->optional(40)->text($maxNbChars = 100),
            'score_local'=>fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max =5) 
        ];
    }
}
