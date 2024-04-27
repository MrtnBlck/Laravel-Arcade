<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contest>
 */
class ContestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $possibleMoves = ['M', 'R', 'S'];
        $history = '';
        for ($i = 0; $i < rand(6, 10); $i++) {
            $history .= $possibleMoves[array_rand($possibleMoves)];
            $history .= ':';
            $history .= rand(1, 6);
            $history .= ';';
        }

        return [
            'history' => $history,
        ];
    }
}
