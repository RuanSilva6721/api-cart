<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userFirst =User::first();
        $userLast =User::orderBy('id', 'desc')->first();

        return [
            'user_id' => $this->faker->numberBetween($userFirst->id, $userLast->id)
        ];
    }
}
