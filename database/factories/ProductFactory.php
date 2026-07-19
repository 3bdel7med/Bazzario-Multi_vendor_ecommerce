<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
        $vendor = \App\Models\User ::where('role', 'vendor');
        return [
            "name"=> $this->faker->word(),
            'shop_id' =>$this->faker->randomElement(\App\Models\Shop::pluck('id')->toArray()) ?? \App\Models\Shop::factory(),
            'category_id' => $this->faker->randomElement(\App\Models\Category::pluck('id')->toArray()) ?? \App\Models\Category::factory(),
            "slug"=> Str::slug($this->faker->word()) . '-' . Str::random(5),
            "description"=> $this->faker->text,
            "price"=> $this->faker->randomFloat(2, 1, 1000),
            "status"=> $this->faker->boolean,
            "image"=> null,
            "stock"=> $this->faker->numberBetween(0, 100),
            "is_active"=> $this->faker->boolean,

        ];
    }
}
