@extends('layouts.layout')

@section('title', isset($place) ? 'Edit Location' : 'New Location')


@section('content')
    <div class="flex w-2/3 flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex h-11 w-full max-w-xl flex-col items-center justify-center rounded-lg bg-base-100 shadow-xl">
            <h1 class="text-lg font-semibold">
                @isset($place)
                    Edit Location
                @else
                    New Location
                @endisset
            </h1>
        </div>
        <form class="flex w-full max-w-xl flex-col items-center gap-4 self-center pb-6 text-slate-200" method="POST"
            enctype="multipart/form-data"
            action="{{ isset($place) ? route('place.update', ['place' => $place->id]) : route('place.store') }}">
            @csrf
            @if (isset($place))
                @method('put')
            @endif
            <div class="flex w-full gap-4 ">
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input w-full max-w-xs shadow-xl" name="name"
                        id="name" value="{{ old('name', $place->name ?? '') }}" />
                    @error('name')
                        <label class="label">
                            <span class="label-text-alt text-warning">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Image</span>
                    </div>
                    <input type="file" class="file-input w-full max-w-xs bg-base-100" id="picture" name="picture"/>
                    @error('picture')
                        <label class="label">
                            <span class="label-text-alt text-warning">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
            </div>
            <div class="flex w-full gap-4 pt-4 max-w-xs">
                <div class="form-control w-full">
                    <button class="btn btn-accent shadow-xl" type="submit">Save</button>
                </div>
            </div>

        </form>
    </div>
@endsection
