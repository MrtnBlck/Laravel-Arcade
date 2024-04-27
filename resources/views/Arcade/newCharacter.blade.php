@extends('layouts.layout')

@section('title', isset($character) ? 'Edit Character' : 'New Character')
@php
    $points = 20;
    $offence = 0;
    $defence = 0;
    $accuracy = 0;
    $magic = 0;
    $enemy = false;
    if (isset($character)) {
        $offence = $character->strength;
        $defence = $character->defence;
        $accuracy = $character->accuracy;
        $magic = $character->magic;
        $points = 20 - ($offence + $defence + $accuracy + $magic);
        $enemy = $character->enemy;
    }
@endphp

@section('content')
    <div class="flex w-2/3 flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex h-11 w-full max-w-xl flex-col items-center justify-center rounded-lg bg-base-100 shadow-xl">
            <h1 class="text-lg font-semibold">
                {{ isset($character) ? 'Edit Character' : 'New Character' }}
            </h1>
        </div>
        <form class="flex w-full max-w-xl flex-col items-center gap-4 self-center pb-6 text-slate-200" method="POST"
            action="{{ isset($character) ? route('character.update', ['character' => $character->id]) : route('character.store') }}">
            @csrf
            @if (isset($character))
                @method('PUT')
            @endif
            <div class="flex w-full gap-4 ">
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input w-full max-w-xs shadow-xl" name="name"
                        id="name" value="{{ old('name', $character->name ?? '') }}" />
                    @error('name')
                        <label class="label">
                            <span class="label-text-alt text-warning">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Available points</span>
                    </div>
                    <input type="text" name="points" id="points" class="input w-full max-w-xs shadow-xl text-center"
                        readonly value="{{ old('points', $points) }}" />
                    @error('points')
                        <label class="label">
                            <span class="label-text-alt text-warning">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
            </div>
            <div class="flex w-full gap-4">
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Offence</span>
                    </div>
                    <div class="join w-full shadow-xl">
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl"
                            id="decreaseOffence">«</button>
                        <input type="text" name="offence" id="offence" value="{{ old('offence', $offence) }}" readonly
                            class="join-item input w-1/3 max-w-xs text-center" />
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl"
                            id="increaseOffence">»</button>
                    </div>
                </div>
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Defence</span>
                    </div>
                    <div class="join w-full shadow-xl">
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl"
                            id="decreaseDefence">«</button>
                        <input type="text" name="defence" id="defence" value="{{ old('defence', $defence) }}" readonly
                            class="join-item input w-1/3 max-w-xs text-center" />
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl"
                            id="increaseDefence">»</button>
                    </div>
                </div>
            </div>
            <div class="flex w-full gap-4">
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Accuracy</span>
                    </div>
                    <div class="join w-full shadow-xl">
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl"
                            id="decreaseAccuracy">«</button>
                        <input type="text" name="accuracy" id="accuracy" value="{{ old('accuracy', $accuracy) }}"
                            readonly class="join-item input w-1/3 max-w-xs text-center" />
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl"
                            id="increaseAccuracy">»</button>
                    </div>
                </div>
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Magic</span>
                    </div>
                    <div class="join w-full shadow-xl">
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl"
                            id="decreaseMagic">«</button>
                        <input type="text" name="magic" id="magic" value="{{ old('magic', $magic) }}" readonly
                            class="join-item input w-1/3 max-w-xs text-center" />
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl"
                            id="increaseMagic">»</button>
                    </div>
                </div>
            </div>
            <div class="form-control">
                <div class="cursor-pointer">
                    <span class="label-text pr-4 text-base">Enemy</span>
                    <input type="checkbox" class="checkbox bg-base-100" name="enemy" id="enemy"
                        {{ old('enemy', $enemy ?? false) ? 'checked' : '' }}
                        {{ Auth::user()->is_admin ? '' : 'disabled' }} />
                </div>
            </div>
            <div class="flex w-full gap-4 pt-1 max-w-xs">
                <div class="form-control w-full">
                    <button class="btn btn-accent shadow-xl" type="submit" name="save" id="save">Save</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var points = document.getElementById('points');
        var incOffenceButton = document.getElementById('increaseOffence');
        var decOffenceButton = document.getElementById('decreaseOffence');
        var offenceInput = document.getElementById('offence');
        var incDefenceButton = document.getElementById('increaseDefence');
        var decDefenceButton = document.getElementById('decreaseDefence');
        var defenceInput = document.getElementById('defence');
        var incAccuracyButton = document.getElementById('increaseAccuracy');
        var decAccuracyButton = document.getElementById('decreaseAccuracy');
        var accuracyInput = document.getElementById('accuracy');
        var incMagicButton = document.getElementById('increaseMagic');
        var decMagicButton = document.getElementById('decreaseMagic');
        var magicInput = document.getElementById('magic');

        incOffenceButton.addEventListener('click', function() {
            if (parseInt(points.value) > 0) {
                points.value = parseInt(points.value) - 1;
                offenceInput.value = parseInt(offenceInput.value) + 1;
            }
        });

        decOffenceButton.addEventListener('click', function() {
            if (parseInt(offenceInput.value) > 0) {
                points.value = parseInt(points.value) + 1;
                offenceInput.value = parseInt(offenceInput.value) - 1;
            }
        });

        incDefenceButton.addEventListener('click', function() {
            if (parseInt(points.value) > 0) {
                points.value = parseInt(points.value) - 1;
                defenceInput.value = parseInt(defenceInput.value) + 1;
            }
        });

        decDefenceButton.addEventListener('click', function() {
            if (parseInt(defenceInput.value) > 0) {
                points.value = parseInt(points.value) + 1;
                defenceInput.value = parseInt(defenceInput.value) - 1;
            }
        });

        incAccuracyButton.addEventListener('click', function() {
            if (parseInt(points.value) > 0) {
                points.value = parseInt(points.value) - 1;
                accuracyInput.value = parseInt(accuracyInput.value) + 1;
            }
        });

        decAccuracyButton.addEventListener('click', function() {
            if (parseInt(accuracyInput.value) > 0) {
                points.value = parseInt(points.value) + 1;
                accuracyInput.value = parseInt(accuracyInput.value) - 1;
            }
        });

        incMagicButton.addEventListener('click', function() {
            if (parseInt(points.value) > 0) {
                points.value = parseInt(points.value) - 1;
                magicInput.value = parseInt(magicInput.value) + 1;
            }
        });

        decMagicButton.addEventListener('click', function() {
            if (parseInt(magicInput.value) > 0) {
                points.value = parseInt(points.value) + 1;
                magicInput.value = parseInt(magicInput.value) - 1;
            }
        });
    </script>
@endsection
