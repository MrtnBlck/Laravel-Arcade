<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            if ($user->is_admin) {
                for ($i = 0; $i < rand(7, 10); $i++) {
                    Character::factory()->create(['user_id' => $user->id, 'enemy' => fake()->boolean()]);
                }
            } else {
                for ($i = 0; $i < rand(3, 5); $i++) {
                    Character::factory()->create(['user_id' => $user->id]);
                }
            }
        }
    }
}
