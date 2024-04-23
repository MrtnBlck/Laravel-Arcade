<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Return an array of 4 whole random numbers that add up to 20
        $stats = collect(range(1, 4))->map(fn () => random_int(1, 10));
        $stats = $stats->map(fn ($stat) => round($stat / $stats->sum() * 20));



        return [
            'name' => $this->faker->name(),
            'enemy' => $this->faker->boolean(), // Only for admins

        ];
    }
}
