<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Seller;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'seller_id' => $this->faker->randomElement(Seller::pluck('id')->toArray()),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'sub_category_id' => $this->faker->optional()->randomElement(SubCategory::pluck('id')->toArray()),
            'name' => $this->faker->word,
            'slug' => $this->faker->unique()->slug,
            'thumbnail' => $this->faker->imageUrl('450','450'), // You should generate a valid URL or file path here.
            'images' => $this->faker->imageUrl('450','450'),    // You should generate a valid URL or file path here.
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'discount' => $this->faker->numberBetween(0, 100),
            'stock' => $this->faker->numberBetween(0, 1000),
            'stock_type' => $this->faker->numberBetween(1, 3), // Change these values as per your needs.
            'sale' => $this->faker->randomElement([true, false]),
            'condition' => $this->faker->randomElement(['new', 'popular', 'traditional', 'feature', 'seasonal']),
            'added_by' => $this->faker->randomElement(['admin', 'seller', 'farmer']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
