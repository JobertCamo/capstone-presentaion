<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => 'tae@example.com',
            'gender' => 'male',
            'birth_date' => 'male',
            'contact' => 'male',
            'address' => 'male',
            'nationality' => 'male',
            'religion' => 'male',
            'civil_status' => 'male',
            'resume' => 'male',
            'refered_by' => 'male',
            'job_position' => 'male',
            'status' => 'male',
            'score' => 'male',
        ];
    }
}
