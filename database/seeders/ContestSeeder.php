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
        $users = User::all();
        $places = Place::all();
        $characters = Character::all();

        foreach ($users as $user) {
            for ($i = 0; $i < rand(1, 5); $i++) {
                $contests = Contest::factory($i)->create([
                    'user_id' => $user->id,
                    'place_id' => $places->random(1)->first()->id,
                    'win' => fake()->boolean() ? null : fake()->boolean(),
                ]);
                foreach ($contests as $contest) {
                    $userCharacterHP = rand(1, 20);
                    $enemyCharacterHP = rand(1, 20);

                    $userCharacter = $characters->where('user_id', $user->id)->random(1)->first();
                    $contest->characters()->attach($userCharacter, ['hero_hp' => $userCharacterHP, 'enemy_hp' => $enemyCharacterHP]);

                    // create enemy
                    $enemyUser = $users->where('id', '!=', $user->id)->random(1)->first();
                    $enemyCharacter = $characters->where('user_id', $enemyUser->id)->random(1)->first();
                    $contest->characters()->attach($enemyCharacter, ['hero_hp' => $enemyCharacterHP, 'enemy_hp' => $userCharacterHP]);

                    /*$enemyUserContest = Contest::factory(1)->create([
                        'user_id' => $enemyUser->id,
                        'place_id' => $contest->place_id,
                        'win' => $contest->win = null ? null : !$contest->win,
                    ])->first();
                    
                    $enemyUserContest->characters()->attach($enemyCharacter);*/
                }
            }
        }
    }
}
