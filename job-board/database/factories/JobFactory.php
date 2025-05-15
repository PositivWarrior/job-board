<?php

namespace Database\Factories;

use App\Models\JobListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobFactory extends Factory
{
    /**
     * The model that corresponds to the factory.
     *
     * @var class-string<\App\Models\JobListing>
     */
    protected $model = JobListing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(3, true),
            'salary' => fake()->numberBetween(5_000, 150_000),
            'location' => fake()->city(),
            'category' => fake()->randomElement(JobListing::$categories),
            'experience' => fake()->randomElement(JobListing::$experience),
        ];
    }
}
