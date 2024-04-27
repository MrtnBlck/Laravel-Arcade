@extends('layouts.layout')

@section('title', 'Character')

@section('content')
    <div class="flex w-2/3 min-w-max flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex w-full gap-4">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">{{ $character->name }}</h2>
                    <p class="text-slate-400 text-xs font-bold">Total battles: {{ $character->contests()->count() }}</p>
                    <p class="{{ $character->enemy ? 'text-error' : 'text-success' }} text-xs font-bold">
                        {{ $character->enemy ? 'Enemy' : 'Hero' }}</p>
                </div>
            </div>
            <div class="w-full overflow-x-auto shadow-xl">
                <table class="table rounded-2xl bg-base-100 h-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th align="center">Offence</th>
                            <th align="center">Defence</th>
                            <th align="center">Accuracy</th>
                            <th align="center">Magic</th>
                        </tr>
                    </thead>
                    <tbody class="text-3xl font-bold">
                        <!-- row 1 -->
                        <tr>
                            <td align="center">{{ $character->strength }}</td>
                            <td align="center">{{ $character->defence }}</td>
                            <td align="center">{{ $character->accuracy }}</td>
                            <td align="center">{{ $character->magic }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form class="w-3/12" action="{{ route('character.destroy', ['character' => $character->id]) }}" method="POST">
                @csrf
                @method('delete')
                <div class="join join-vertical w-full h-full shadow-xl rounded-2xl">
                    <a class="btn join-item bg-base-100 text-white flex-auto h-full p-0 m-0"
                        href={{ route('contest.new', ['character' => $character->id]) }}
                        {{ $character->enemy ? 'disabled' : '' }}>New Battle</a>
                    <a class="btn join-item bg-base-100 text-info flex-auto h-full p-0 m-0"
                        href={{ route('character.edit', ['character' => $character->id]) }}>Edit</a>
                    <button class="btn join-item bg-base-100 text-error flex-auto h-full p-0 m-0">Delete</button>
                </div>
            </form>
        </div>
        @if ($character->contests()->count() > 0)
            <div class="w-full overflow-x-auto shadow-xl">
                <table class="table rounded-2xl bg-base-100 h-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th align="left" class="pl-8 w-5/12 text-sm">Location</th>
                            <th align="left" class="w-5/12 text-sm">Opponent</th>
                            <th align="center" class="w-1/12 text-sm">Status</th>
                            <th align="right" class="w-1/12"></th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <!-- row 1 -->
                        @foreach ($character->contests as $contest)
                            <tr>
                                <td align="left" class="pl-8 w-5/12">{{ $contest->place->name }}</td>
                                <td align="left" class="w-4/12">
                                    {{ $contest->characters->where('id', '!=', $character->id)->first()->name }}</t>
                                <td align="center" class="w-2/12">
                                    {{ $contest->win === null ? 'In progress' : ($character->enemy ? ($contest->win ? 'Defeat' : 'Victory') : ($contest->win ? 'Victory' : 'Defeat')) }}
                                </td>
                                <td align="right" class="w-1/12">
                                    <a class="btn btn-ghost btn-sm text-primary"
                                        href={{ route('contest.show', ['contest' => $contest->id]) }}>View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
