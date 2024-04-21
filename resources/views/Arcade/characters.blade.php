@extends('layouts.layout')

@section('title', 'My Characters')

@section('content')
    <div class="flex w-2/3 flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex h-11 w-full flex-col items-center justify-center rounded-lg bg-base-100 shadow-xl">
            <h1 class="text-lg font-semibold">My Characters</h1>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="table rounded-xl bg-base-100">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Name</th>
                        <th align="center">Defence</th>
                        <th align="center">Offence</th>
                        <th align="center">Accuracy</th>
                        <th align="center">Magic</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr>
                        <th>Fasz Janos</th>
                        <td align="center">4</td>
                        <td align="center">5</td>
                        <td align="center">6</td>
                        <td align="center">7</td>
                        <td align="right" class="w-1">
                            <button class="btn btn-ghost btn-sm text-primary">View</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
