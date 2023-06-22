<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productFirst =Product::first();
        $productLast =Product::orderBy('id', 'desc')->first();
        $cartFirst =Cart::first();
        $cartLast =Cart::orderBy('id', 'desc')->first();

        return [
            'amount' => $this->faker->numberBetween(1, 100),
            'cart_id' => $this->faker->numberBetween($cartFirst->id, $cartLast->id),
            'product_id' => $this->faker->numberBetween($productFirst->id, $productLast->id)
            
        ];
    }
}
