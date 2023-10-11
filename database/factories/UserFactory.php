<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->unique()->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'image'=>$this->faker->imageUrl('350','350'),
            'division_id' => null, // Modify as needed
            'district_id' => null, // Modify as needed
            'upazila_id' => null, // Modify as needed
            'address' => $this->faker->address,
            'union_id' => null, // Modify as needed
            'password' => bcrypt('password'), // You can use a default password or generate a random one
            'isVerified' => $this->faker->boolean,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
