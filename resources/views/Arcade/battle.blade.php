@extends('layouts.layout')

@section('title', 'Battle')

@section('content')
    <div class="flex w-2/3 min-w-max flex-col items-center gap-4 self-center pb-6 pt-6 text-slate-200">
        <div class="card w-full bg-base-100 shadow-xl">
            <div class="relative w-full p-8 rounded-xl space-y-4">
                <div class="absolute inset-0 bg-cover bg-center opacity-40 rounded-xl"
                    style="background-image: url('{{ Illuminate\Support\Facades\Storage::url($contest->place->picture_hash) }}')">
                </div>
                <div class="flex w-full h-14 flex-col items-center justify-center rounded-xl">
                    <p class="font-bold text-3xl z-10 drop-shadow-2xl">{{ $contest->place->name }}</p>
                    @if ($contest->win !== null)
                        <p
                            class="{{ $contest->win ? 'text-success' : 'text-error' }} font-light text-xl z-10 drop-shadow-2xl">
                            {{ $contest->win ? 'Hero wins' : 'Enemy wins' }}</p>
                    @endif
                </div>

                <div class="flex gap-6 w-full rounded-xl">
                    <div class="w-full h-full join join-vertical z-10 border-2 border-info border-opacity-20">
                        <div
                            class="join-item flex h-16 w-full max-w-xl items-center justify-around rounded-xl bg-base-200 bg-opacity-90 shadow-xl">
                            <p class="font-bold text-xl">{{ $hero->name }}</p>
                            <p class="font-bold text-xl text-error">{{ $hero->pivot->hero_hp }} HP</p>
                        </div>
                        <div class="join-item w-full overflow-x-auto shadow-xl">
                            <table class="join-item table h-full bg-base-200 bg-opacity-90">

                                <thead>
                                    <tr>
                                        <th align="center">Offence</th>
                                        <th align="center">Defence</th>
                                        <th align="center">Accuracy</th>
                                        <th align="center">Magic</th>
                                    </tr>
                                </thead>
                                <tbody class="text-2xl font-bold">
                                    <!-- row 1 -->
                                    <tr>
                                        <td align="center">{{ $hero->strength }}</td>
                                        <td align="center">{{ $hero->defence }}</td>
                                        <td align="center">{{ $hero->accuracy }}</td>
                                        <td align="center">{{ $hero->magic }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="w-full h-full join join-vertical z-10 border-2 border-error border-opacity-20">
                        <div
                            class=" join-item flex h-16 w-full max-w-xl items-center justify-around rounded-xl bg-base-200 bg-opacity-90 shadow-xl">
                            <p class="font-bold text-xl">{{ $enemy->name }}</p>
                            <p class="font-bold text-xl text-error">{{ $enemy->pivot->hero_hp }} HP</p>
                        </div>
                        <div class="join-item w-full overflow-x-auto shadow-xl">
                            <table class="join-item table h-full bg-base-200 bg-opacity-90">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th align="center">Offence</th>
                                        <th align="center">Defence</th>
                                        <th align="center">Accuracy</th>
                                        <th align="center">Magic</th>
                                    </tr>
                                </thead>
                                <tbody class="text-2xl font-bold">
                                    <!-- row 1 -->
                                    <tr>
                                        <td align="center">{{ $enemy->strength }}</td>
                                        <td align="center">{{ $enemy->defence }}</td>
                                        <td align="center">{{ $enemy->accuracy }}</td>
                                        <td align="center">{{ $enemy->magic }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                @if ($contest->win === null && $hero->user_id === Auth::user()->id)
                    <div class="flex w-2/5 gap-4 z-10">
                        <a class="btn w-1/3 bg-base-200 bg-opacity-90 text-white z-10"
                            href={{ route('contest.attack', ['id' => $contest->id, 'attackType' => 'melee']) }}>Melee</a>
                        <a class="btn w-1/3 bg-base-200 bg-opacity-90 text-info z-10"
                            href={{ route('contest.attack', ['id' => $contest->id, 'attackType' => 'ranged']) }}>Ranged</a>
                        <a class="btn w-1/3 bg-base-200 bg-opacity-90 text-error z-10"
                            href={{ route('contest.attack', ['id' => $contest->id, 'attackType' => 'special']) }}>Special</a>
                    </div>
                @endif
            </div>
        </div>
        @if ($contest->history)
            <div class="w-full overflow-x-auto shadow-xl">
                <table class="table rounded-2xl bg-base-100 h-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th align="center" class="text-lg text-white" colspan="4">History</th>
                        </tr>
                        <tr>
                            <th align="center" class="pl-8 w-1/12"></th>
                            <th align="center" class="w-5/12 text-sm">Character</th>
                            <th align="center" class="w-5/12 text-sm">Action</th>
                            <th align="center" class="pr-8 w-1/12 text-sm">Damage</th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <!-- row 1 -->
                        @foreach (explode(';', $contest->history) as $i => $action)
                            @php
                                if ($i == count(explode(';', $contest->history)) - 1) {
                                    continue;
                                }
                            @endphp
                            <tr>
                                <td align="center" class="pl-8 w-1/12">{{ $i + 1 }}.</td>
                                <td align="center" class="w-5/12">{{ $i % 2 == 0 ? $hero->name : $enemy->name }}</td>
                                <td align="center" class="w-5/12">
                                    @switch(explode(":", $action)[0])
                                        @case('S')
                                            Special
                                        @break

                                        @case('M')
                                            Melee
                                        @break

                                        @case('R')
                                            Ranged
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td align="center" class="pr-8 w-1/12">{{ explode(':', $action)[1] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
