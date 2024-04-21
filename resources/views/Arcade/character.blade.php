@extends('layouts.layout')

@section('title', 'Character')

@section('content')
    <div class="flex w-2/3 flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex w-full gap-4">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Fasz Janos</h2>
                    <p class="text-slate-400 text-xs font-bold">Total battles: 69</p>
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
                            <td align="center">4</td>
                            <td align="center">5</td>
                            <td align="center">6</td>
                            <td align="center">7</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="join join-vertical rounded-2xl shadow-xl w-3/12">
                <button class="btn join-item bg-base-100 text-white">New Battle</button>
                <button class="btn join-item bg-base-100 text-info">Edit</button>
                <button class="btn join-item bg-base-100 text-error">Delete</button>
            </div>
        </div>
        <div class="w-full overflow-x-auto shadow-xl">
            <table class="table rounded-2xl bg-base-100 h-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th align="left" class="pl-8 w-5/12 text-sm">Location</th>
                        <th align="left" class="w-5/12 text-sm">Opponent</th>
                        <th align="right" class="w-2/12"></th>
                    </tr>
                </thead>
                <tbody class="text-lg">
                    <!-- row 1 -->
                    <tr>
                        <td align="left" class="pl-8 w-5/12">Kutykurutty</td>
                        <td align="left" class="w-5/12">Köröskeny István Pitesz (Mc Isti)</td>
                        <td align="right" class="w-2/12">
                            <button class="btn btn-ghost btn-sm text-primary">View</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>




    </div>
@endsection
