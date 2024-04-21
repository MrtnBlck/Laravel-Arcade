@extends('layouts.layout')

@section('title', 'Battle')

@section('content')
    <div class="flex w-2/3 flex-col items-center gap-4 self-center pb-6 pt-6 text-slate-200">
        <div class="card w-full bg-base-100 shadow-xl">
            <div class="relative w-full p-8 rounded-xl space-y-4">
                <div
                    class="absolute inset-0 bg-cover bg-center opacity-40 bg-[url('https://steamuserimages-a.akamaihd.net/ugc/2058741034012526093/D413A8F912EDED5B50A0B6A9DFFB2C3DBBFF76A2/')] rounded-xl">
                </div>
                <div class="flex w-full h-14 flex-col items-center justify-center rounded-xl">
                  <p class="font-bold text-3xl z-10 drop-shadow-xl">Stormweil Castle</p>  
                  <p class="font-light text-xl z-10 drop-shadow-xl">Victory</p>
                </div>

                <div class="flex gap-6 w-full rounded-xl">
                    <div class="w-full h-full join join-vertical z-10 border-2 border-info border-opacity-20">
                        <div
                            class="join-item flex h-16 w-full max-w-xl items-center justify-around rounded-xl bg-base-200 bg-opacity-90 shadow-xl">
                            <p class="font-bold text-xl">Fasz Janos</p>
                            <p class="font-bold text-xl text-error">420 HP</p>
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
                                        <td align="center">4</td>
                                        <td align="center">5</td>
                                        <td align="center">6</td>
                                        <td align="center">7</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="w-full h-full join join-vertical z-10 border-2 border-error border-opacity-20">
                        <div
                            class=" join-item flex h-16 w-full max-w-xl items-center justify-around rounded-xl bg-base-200 bg-opacity-90 shadow-xl">
                            <p class="font-bold text-xl">MC Isti</p>
                            <p class="font-bold text-xl text-error">69 HP</p>
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
                                        <td align="center">4</td>
                                        <td align="center">5</td>
                                        <td align="center">6</td>
                                        <td align="center">7</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="flex w-2/5 gap-4 z-10">
                    <button class="btn w-1/3 bg-base-200 bg-opacity-90 text-white z-10">Melee</button>
                    <button class="btn w-1/3 bg-base-200 bg-opacity-90 text-info z-10">Ranged</button>
                    <button class="btn w-1/3 bg-base-200 bg-opacity-90 text-error z-10">Special</button>
                </div>

            </div>
        </div>
        <div class="w-full overflow-x-auto shadow-xl">
            <table class="table rounded-2xl bg-base-100 h-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th align="center" class="text-lg text-white" colspan="2">History</th>
                    </tr>
                    <tr>
                        <th align="center" class="pl-8 w-5/12 text-sm">Character</th>
                        <th align="center" class="w-5/12 text-sm">Action</th>
                    </tr>
                </thead>
                <tbody class="text-lg">
                    <!-- row 1 -->
                    <tr>
                        <td align="center" class="pl-8 w-5/12">Köröskeny István Pitesz (Mc Isti)</td>
                        <td align="center" class="w-5/12">Special Attack</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
