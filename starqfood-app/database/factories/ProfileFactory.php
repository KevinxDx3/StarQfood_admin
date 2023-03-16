<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>fake()->firstName(),
            'last_name' =>fake()->lastName(),
            'birthday'=>fake()->dateTimeBetween('-90 years', '-350 days'),
            'movil' =>fake()->optional(80)->isbn10(),
            'telf' =>fake()->optional(80)->numberBetween(2000000,4000000),
            'user_id_fk'=>fake()->unique()->numberBetween(1,10),
        ];
    }
}
