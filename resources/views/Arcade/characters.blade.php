@extends('layouts.layout')

@section('title', 'My Characters')

@section('content')
    <div class="flex w-2/3 min-w-max flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex h-11 w-full flex-col items-center justify-center rounded-lg bg-base-100 shadow-xl">
            <h1 class="text-lg font-semibold">My Characters</h1>
        </div>
        <div class="w-full overflow-x-auto shadow-xl">
            <table class="table rounded-xl bg-base-100">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Name</th>
                        @if (Auth::user()->is_admin)
                            <td align="center">Type</td>
                        @endif
                        <th align="center">Defence</th>
                        <th align="center">Offence</th>
                        <th align="center">Accuracy</th>
                        <th align="center">Magic</th>
                        <th align="center">Battles</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characters as $character)
                        <tr>
                            <th>{{ $character->name }}</th>
                            @if (Auth::user()->is_admin)
                                <td align="center">{{ $character->enemy ? "enemy" : "hero" }}</td>
                            @endif
                            <td align="center">{{ $character->defence }}</td>
                            <td align="center">{{ $character->strength }}</td>
                            <td align="center">{{ $character->accuracy }}</td>
                            <td align="center">{{ $character->magic }}</td>
                            <td align="center">{{ $character->contests()->count() }}</td>
                            <td align="right" class="w-1">
                                <a class="btn btn-ghost btn-sm text-primary"
                                    href={{ route('character.show', ['character' => $character->id]) }}>View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
