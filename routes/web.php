<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ProfileController;
use App\Models\Character;
use App\Models\Contest;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('place/all', [PlaceController::class, 'all'])->name('place.all');
    Route::resource('place', PlaceController::class);
    Route::get('character/all', [CharacterController::class, 'all'])->name('character.all');
    Route::resource('character', CharacterController::class);
    Route::get('contest/attack/{id}/{attackType}', [ContestController::class, 'attack'])->name('contest.attack');
    Route::get('contest/new/{character}', [ContestController::class, 'new'])->name('contest.new');
    Route::resource('contest', ContestController::class);
});

Route::get('/', function () {
    $contestCount = Contest::count();
    $characterCount = Character::count();

    return view('Arcade.home', ['contestCount' => $contestCount, 'characterCount' => $characterCount]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
