<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>$this->faker->randomElement(Category::pluck('id')->toArray()),
            'name'=>$this->faker->name(),
            'slug'=>$this->faker->unique()->slug(),
            'image'=>$this->faker->imageUrl('350','350'),
            'status'=>$this->faker->randomElement(['active','inactive']),
        ];
    }
}
