<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Contest;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    public function new(string $id)
    {
        $hero = Character::find($id);
        if ($hero->enemy) {
            abort(404);
        }
        $enemies = Character::where('enemy', true);
        $enemy = $enemies->get()->random(1)->first();
        if ($hero->user_id == Auth::user()->id) {
            $contest = Contest::create([
                'user_id' => Auth::user()->id,
                'place_id' => Place::all()->random(1)->first()->id,
                'win' => null,
            ]);
            $contest->characters()->attach($hero);
            $contest->characters()->attach($enemy);
            return redirect()->route('contest.show', ['contest' => $contest->id]);
        } else {
            abort(404);
        }
    }

    public function attack(string $id, string $attackType)
    {
        $contest = Contest::find($id);
        if (!$contest || $contest->user_id != Auth::user()->id || $contest->win !== null) {
            abort(404);
        }
        $history = $contest->history;
        $hero = $contest->characters()->where('enemy', false)->first();
        $enemy = $contest->characters()->where('enemy', true)->first();
        $heroHP = $hero->pivot->hero_hp;
        $enemyHP = $enemy->pivot->hero_hp;
        $attacks = ['melee', 'ranged', 'special'];

        $heroDamage = $this->attackDamage($hero, $enemy, $attackType);
        if ($enemyHP - $heroDamage <= 0) {
            $history .= $this->translateAttack($attackType, $heroDamage);
            $contest->update(['win' => true]);
            $contest->update(['history' => $history]);
            $hero->pivot->update(['enemy_hp' => 0]);
            $enemy->pivot->update(['hero_hp' => 0]);
        } else {
            $enemyAttackType = $attacks[array_rand($attacks)];
            $enemyDamage = $this->attackDamage($enemy, $hero, $enemyAttackType);
            if ($heroHP - $enemyDamage <= 0) {
                $history .= $this->translateAttack($attackType, $heroDamage);
                $history .= $this->translateAttack($enemyAttackType, $enemyDamage);
                $contest->update(['win' => false]);
                $contest->update(['history' => $history]);
                $hero->pivot->update(['hero_hp' => 0, 'enemy_hp' => $enemyHP - $heroDamage]);
                $enemy->pivot->update(['hero_hp' => $enemyHP - $heroDamage, 'enemy_hp' => 0]);
            } else {
                $history .= $this->translateAttack($attackType, $heroDamage);
                $history .= $this->translateAttack($enemyAttackType, $enemyDamage);
                $contest->update(['history' => $history]);
                $hero->pivot->update(['hero_hp' => $heroHP - $enemyDamage, 'enemy_hp' => $enemyHP - $heroDamage]);
                $enemy->pivot->update(['hero_hp' => $enemyHP - $heroDamage, 'enemy_hp' => $heroHP - $enemyDamage]);
            }
        }
        return redirect()->route('contest.show', ['contest' => $contest->id]);
    }

    public function attackDamage(Character $attacker, Character $defender, string $attackType)
    {
        $damage = 0;
        switch ($attackType) {
            case 'melee':
                $damage = (($attacker->strength * 0.7 + $attacker->accuracy * 0.1 + $attacker->magic * 0.1) - $defender->defence);
                break;
            case 'ranged':
                $damage = (($attacker->strength * 0.1 + $attacker->accuracy * 0.7 + $attacker->magic * 0.1) - $defender->defence);
                break;
            case 'special':
                $damage = (($attacker->strength * 0.1 + $attacker->accuracy * 0.1 + $attacker->magic * 0.7) - $defender->defence);
                break;
            default:
                abort(404);
        }
        return $damage < 0 ? 0 : $damage;
    }

    public function translateAttack(string $attackType, float $damage)
    {
        $translated = '';
        switch ($attackType) {
            case 'melee':
                $translated .= 'M' . ':' . $damage . ';';
                break;
            case 'ranged':
                $translated .= 'R' . ':' . $damage . ';';
                break;
            case 'special':
                $translated .= 'S' . ':' . $damage . ';';
                break;
            default:
                abort(404);
        }
        return $translated;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contest = Contest::find($id);
        $hero = $contest->characters()->where('enemy', false)->first();
        $enemy = $contest->characters()->where('enemy', true)->first();
        if ($contest->user_id == Auth::user()->id || Auth::user()->is_admin) {
            return view('Arcade.battle', ['contest' => $contest, 'hero' => $hero, 'enemy' => $enemy]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
