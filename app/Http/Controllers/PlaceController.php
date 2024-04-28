<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
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
        if (!Auth::user()->is_admin) {
            abort(404);
        }
        $places = Place::all();
        return view('Arcade.locations', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_admin) {
            abort(404);
        }
        return view('Arcade.newLocation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            abort(404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'picture' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        $path = $request->file('picture')->store();

        $place = Place::create([
            'name' => $validated['name'],
            'picture' => $request->file('picture')->getClientOriginalName(),
            'picture_hash' => $path,
        ]);

        return redirect()->route('place.all');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()->is_admin) {
            abort(404);
        }
        $place = Place::find($id);
        if (!$place) {
            abort(404);
        }
        return view('Arcade.newLocation', ['place' => $place]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()->is_admin) {
            abort(404);
        }
        $place = Place::find($id);
        if (!$place) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'picture' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('picture')) {
            Storage::delete($place->picture_hash);
            $path = $request->file('picture')->store();
            $place->update([
                'name' => $validated['name'],
                'picture' => $request->file('picture')->getClientOriginalName(),
                'picture_hash' => $path,
            ]);
        } else {
            $place->update([
                'name' => $validated['name'],
            ]);
        }

        return redirect()->route('place.all');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()->is_admin) {
            abort(404);
        }
        $place = Place::find($id);
        if (!$place) {
            abort(404);
        }
        Storage::delete($place->picture_hash);

        $contests = $place->contests;
        foreach ($contests as $contest) {
            $contest->characters()->detach($contest->characters()->where('enemy', true)->first());
            $contest->characters()->detach($contest->characters()->where('enemy', false)->first());
            $contest->delete();
        }

        $place->delete();
        return redirect()->route('place.all');

    }
}
