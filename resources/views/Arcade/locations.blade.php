@extends('layouts.layout')

@section('title', 'Locations')

@section('content')
    <div class="flex w-full max-w-4xl flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex h-11 w-full flex-col items-center justify-center rounded-lg bg-base-100 shadow-xl">
            <h1 class="text-lg font-semibold">Locations</h1>
        </div>
        @for ($i = 0; $i < count($places) - (count($places) % 2 == 1 ? 2 : 1); $i += 2)
            <div class="flex gap-4 w-full">
                <div class="card w-full bg-base-100 shadow-xl h-40">
                    <div class="relative w-full pl-6 pb-4 pr-4 rounded-xl space-y-4 h-full">
                        <div class="absolute inset-0 bg-cover bg-center opacity-40 rounded-xl"
                            style="background-image: url('{{ Illuminate\Support\Facades\Storage::url($places[$i]->picture_hash) }}')">
                        </div>
                        <div class="flex w-full flex-col items-start justify-between rounded-xl h-full pb-4">
                            <p class="font-semibold text-xl z-10 drop-shadow-2xl">{{ $places[$i]->name }}</p>
                            <form class="flex w-full gap-2 z-10 justify-end"
                                action="{{ route('place.destroy', ['place' => $places[$i]->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="btn btn-ghost text-white z-10"
                                    href={{ route('place.edit', ['place' => $places[$i]->id]) }}>Edit</a>
                                <button class="btn btn-ghost text-error z-10">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card w-full bg-base-100 shadow-xl h-40">
                    <div class="relative w-full pl-6 pb-4 pr-4 rounded-xl space-y-4 h-full">
                        <div class="absolute inset-0 bg-cover bg-center opacity-40 rounded-xl"
                            style="background-image: url('{{ Illuminate\Support\Facades\Storage::url($places[$i + 1]->picture_hash) }}')">
                        </div>
                        <div class="flex w-full flex-col items-start justify-between rounded-xl h-full pb-4">
                            <p class="font-semibold text-xl z-10 drop-shadow-2xl">{{ $places[$i + 1]->name }}</p>
                            <form class="flex w-full gap-2 z-10 justify-end"
                                action="{{ route('place.destroy', ['place' => $places[$i + 1]->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="btn btn-ghost text-white z-10"
                                    href={{ route('place.edit', ['place' => $places[$i + 1]->id]) }}>Edit</a>
                                <button class="btn btn-ghost text-error z-10">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
        @if (count($places) % 2 == 1)
            <div class="flex gap-4 w-full">
                <div class="card w-full bg-base-100 shadow-xl h-40">
                    <div class="relative w-full pl-6 pb-4 pr-4 rounded-xl space-y-4 h-full">
                        <div class="absolute inset-0 bg-cover bg-center opacity-40 rounded-xl"
                            style="background-image: url('{{ Illuminate\Support\Facades\Storage::url($places[count($places) - 1]->picture_hash) }}')">
                        </div>
                        <div class="flex w-full flex-col items-start justify-between rounded-xl h-full pb-4">
                            <p class="font-semibold text-xl z-10 drop-shadow-2xl">{{ $places[count($places) - 1]->name }}
                            </p>
                            <form class="flex w-full gap-2 z-10 justify-end"
                                action="{{ route('place.destroy', ['place' => $places[count($places) - 1]->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="btn btn-ghost text-white z-10"
                                    href={{ route('place.edit', ['place' => $places[count($places) - 1]->id]) }}>Edit</a>
                                <button class="btn btn-ghost text-error z-10">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card w-full h-40">
                </div>
            </div>
        @endif
    </div>
@endsection
