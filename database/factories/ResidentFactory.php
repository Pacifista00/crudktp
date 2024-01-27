<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => fake()->nik(),
            'name' => fake()->name(),
            'image_path' => 'resident_pictures/profile.jpg',
            'gender' => fake()->randomElement(['Male', 'Female']),
            'birthplace' => $this->faker->city,
            'birthdate' => $this->faker->dateTime('-17 years'),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'religion' => fake()->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
            'profession' => fake()->jobTitle,
        ];
    }
}
