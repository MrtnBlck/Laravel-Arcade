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
            for ($i = 0; $i < rand(3, 7); $i++) {
                if ($user->is_admin) {
                    Character::factory()->create(['user_id' => $user->id, 'enemy' => fake()->boolean()]);
                } else {
                    Character::factory()->create(['user_id' => $user->id]);
                }
            }
        }
    }
}
