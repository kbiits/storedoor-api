<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($this->faker);
        $categoriesId = Category::all()->pluck('id')->toArray();
        $userId = User::all()->pluck('id')->toArray();
        return [
            'title' => $this->faker->productName,
            'description' => $this->faker->realText(500),
            'img' => 'https://source.unsplash.com/random',
            'price' => $this->faker->numberBetween(1000, 99999999), // password
            'category_id' => $this->faker->randomElement($categoriesId),
            'rating' => $this->faker->numberBetween(0, 5),
            'user_id' => $this->faker->randomElement($userId),
        ];
    }
}
