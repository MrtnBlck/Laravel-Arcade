<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Contest;
use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = Place::all();
        $characters = Character::all();

        foreach ($characters as $character) {
            if ($character->enemy) {
                continue;
            }
            $contestCount = rand(5, 7);
            $contests = Contest::factory($contestCount)->create([
                'user_id' => $character->user_id,
                'place_id' => $places->random(1)->first()->id,
                'win' => fake()->boolean() ? null : fake()->boolean(),
            ]);

            foreach ($contests as $contest) {
                $contest->update([
                    'place_id' => $places->random(1)->first()->id,
                    'win' => fake()->boolean() ? null : fake()->boolean(),
                ]);
                $characterHP = $contest->win === null ? rand(1, 20) : ($contest->win ? rand(1, 20) : 0);
                $enemyCharacterHP = $contest->win === null ? rand(1, 20) : ($contest->win ? 0 : rand(1, 20));

                $contest->characters()->attach($character, ['hero_hp' => $characterHP, 'enemy_hp' => $enemyCharacterHP]);

                // create enemy
                $enemyCharacter = $characters->where('enemy', true)->random(1)->first();
                $contest->characters()->attach($enemyCharacter, ['hero_hp' => $enemyCharacterHP, 'enemy_hp' => $characterHP]);
            }
        }
    }
}
