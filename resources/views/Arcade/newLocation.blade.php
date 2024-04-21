@extends('layouts.layout')

@section('title', 'New Location')

@section('content')
    <div class="flex w-2/3 flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex h-11 w-full max-w-xl flex-col items-center justify-center rounded-lg bg-base-100 shadow-xl">
            <h1 class="text-lg font-semibold">New Location</h1>
        </div>
        <form class="flex w-full max-w-xl flex-col items-center gap-4 self-center pb-6 text-slate-200" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="flex w-full gap-4 ">
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Name</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input w-full max-w-xs shadow-xl" />
                </div>
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Image</span>
                    </div>
                    <input type="file" class="file-input w-full max-w-xs bg-base-100" />
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
