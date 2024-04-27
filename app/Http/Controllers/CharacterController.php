<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    public function all()
    {
        $characters = Character::all()->where('user_id', Auth::user()->id);
        return view('Arcade.characters', ['characters' => $characters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Arcade.newCharacter');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'points' => 'required|integer',
            'offence' => 'required|integer',
            'defence' => 'required|integer',
            'accuracy' => 'required|integer',
            'magic' => 'required|integer',
            'enemy' => 'nullable|string',
        ]);
        if (20 - $validated['points'] != $validated['offence'] + $validated['defence'] + $validated['accuracy'] + $validated['magic']) {
            return redirect()->back()->withErrors(['points' => 'Points must be less or equal to offence + defence + accuracy + magic']);
        }
        $character = Character::create([
            'name' => $validated['name'],
            'strength' => $validated['offence'],
            'defence' => $validated['defence'],
            'accuracy' => $validated['accuracy'],
            'magic' => $validated['magic'],
            'enemy' => array_key_exists('enemy', $validated) ? true : false,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('character.show', ['character' => $character->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $character = Character::find($id);
        if ($character && $character->user_id == Auth::user()->id) {
            return view('Arcade.character', ['character' => $character]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $character = Character::find($id);
        if ($character) {
            return view('Arcade.newCharacter', ['character' => $character]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $character = Character::find($id);
        if (!$character) {
            abort(404);
        }
        if ($character->user_id == Auth::user()->id) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'points' => 'required|integer',
                'offence' => 'required|integer',
                'defence' => 'required|integer',
                'accuracy' => 'required|integer',
                'magic' => 'required|integer',
                'enemy' => 'nullable|string',
            ]);
            if (20 - $validated['points'] != $validated['offence'] + $validated['defence'] + $validated['accuracy'] + $validated['magic']) {
                return redirect()->back()->withErrors(['points' => 'Points must be less or equal to offence + defence + accuracy + magic']);
            }
            $character->update([
                'name' => $validated['name'],
                'strength' => $validated['offence'],
                'defence' => $validated['defence'],
                'accuracy' => $validated['accuracy'],
                'magic' => $validated['magic'],
                'enemy' => array_key_exists('enemy', $validated) ? true : false,
            ]);

            return redirect()->route('character.show', ['character' => $character->id]);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $character = Character::find($id);
        if (!$character || $character->user_id != Auth::user()->id) {
            abort(404);
        }
        $contests = $character->contests;
        foreach ($contests as $contest) {
            $contest->characters()->detach($contest->characters()->where('enemy', true)->first());
            $contest->characters()->detach($contest->characters()->where('enemy', false)->first());
            $contest->delete();
        }
        $character->delete();
        return redirect()->route('character.all');
    }
}
