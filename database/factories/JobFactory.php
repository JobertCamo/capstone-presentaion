<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->sentence(255),
            'requirements' => fake()->randomElement(['PHP Javascript HTML5 CSS', 'JAVA MYSQL Python C++']),
            'salary' => fake()->randomElement(['25,000', '30,000', '40,000', '50,000']),
            'location' => fake()->randomElement(['Quezon City', 'Caloocan City', 'Makati City', 'Pasig City']),
            'schedule' => fake()->randomElement(['Full Time',  'Part Time']),
        ];
    }
}
