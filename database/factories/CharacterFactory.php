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
        //$stats = collect(range(1, 4))->map(fn () => random_int(1, 10));
        //$stats = $stats->map(fn ($stat) => round($stat / $stats->sum() * 20));

        $defence = random_int(1, 3);
        
        $numberCount = 3;
        $total = 20 - $defence;

        //array of 4 numbers
        $numbers = array_fill(0, $numberCount + 1, 0);
        $numbers[0] = 0;
        $numbers[$numberCount] = $total;

        for ($i = 1; $i < $numberCount; $i++) {
            $numbers[$i] = random_int(0, $total);
        }

        sort($numbers);
        // [0, 3, 5, 7, 20]
        $stats = array_fill(0, $numberCount, 0);
        for ($i = 0; $i < $numberCount; $i++) {
            $stats[$i] = $numbers[$i + 1] - $numbers[$i];
        }
        // [3, 2, 2, 13]


        return [
            'name' => fake()->firstName(),
            'defence' => $defence,
            'strength' => $stats[0],
            'accuracy' => $stats[1],
            'magic' => $stats[2],
        ];
    }
}
