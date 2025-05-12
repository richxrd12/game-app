<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\ProductStatus;
use App\Models\Category;

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
        $isDiscounted = $this->faker->boolean(40); // 40% probabilidad de descuento

        return [
            'image' => 'https://media.game.es/COVERV2/3D_L/139/139300.png',
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 200),
            'is_discounted' => $isDiscounted,
            'discount' => $isDiscounted ? $this->faker->randomFloat(2, 1, 50) : 0.00,
            'product_status_id' => ProductStatus::inRandomOrder()->first()?->id,
            'category_id' => Category::inRandomOrder()->first()?->id,
        ];
    }
}
