<?php

namespace Database\Factories;

use App\Models\FavoriteProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FavoriteProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = \App\Models\User::all()->pluck('id')->toArray();
        $productId = \App\Models\Product::all()->pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($userId),
            'product_id' => $this->faker->randomElement($productId),
        ];
    }
}
