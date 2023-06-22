<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookStore>
 */
class BookStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'ISBN' => $this->faker->numberBetween(1000, 1000000),
            'Value' => $this->faker->randomFloat(2, 10, 100) 
        ];
    }
}
