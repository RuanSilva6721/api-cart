<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Arr::random([
                "Samsung",
                "LG",
                "Sony",
                "Panasonic",
                "Philips",
                "Electrolux",
                "Whirlpool",
                "Bosch",
                "Miele",
                "Haier",
              ]),

        ];
    }
}
