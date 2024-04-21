@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <div class="flex w-fit flex-col items-center gap-4 self-center pt-32">
        <h1 class="text-center text-5xl font-black text-white">Arcade</h1>
        <p class="text-center font-semibold text-white">Lorem</p>

        <div class="flex space-x-4">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Total Characters</h2>
                    <p class="text-5xl font-medium">69</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">View</button>
                    </div>
                </div>
            </div>

            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Total Battles</h2>
                    <p class="text-5xl font-medium">420</p>

                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">View</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
