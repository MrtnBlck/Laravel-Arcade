@extends('layouts.layout')

@section('title', 'New Character')

@section('content')
    <div class="flex w-2/3 flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex h-11 w-full max-w-xl flex-col items-center justify-center rounded-lg bg-base-100 shadow-xl">
            <h1 class="text-lg font-semibold">New Character</h1>
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
                        <span class="label-text">Available points</span>
                    </div>
                    <div class="flex input flex-col items-start justify-center w-full max-w-xs shadow-xl">
                        <span>20</span>
                    </div>
                </div>
            </div>
            <div class="flex w-full gap-4">
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Offence</span>
                    </div>
                    <div class="join w-full shadow-xl">
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl">«</button>
                        <div
                            class="join-item flex input  flex-col items-center justify-center w-1/3 max-w-xs">
                            <span>0</span>
                        </div>
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl">»</button>
                    </div>
                </div>
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Defence</span>
                    </div>
                    <div class="join w-full shadow-xl">
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl">«</button>
                        <div
                            class="join-item flex input  flex-col items-center justify-center w-1/3 max-w-xs">
                            <span>0</span>
                        </div>
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl">»</button>
                    </div>
                </div>
            </div>
            <div class="flex w-full gap-4">
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Accuracy</span>
                    </div>
                    <div class="join w-full shadow-xl">
                        <button type="button" class="btn join-item  w-1/3 bg-base-100 text-xl">«</button>
                        <div
                            class="join-item flex input  flex-col items-center justify-center w-1/3 max-w-xs">
                            <span>0</span>
                        </div>
                        <button type="button" class="btn join-item   w-1/3 bg-base-100 text-xl">»</button>
                    </div>
                </div>
                <div class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text">Magic</span>
                    </div>
                    <div class="join w-full shadow-xl">
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl">«</button>
                        <div
                            class="join-item flex input  flex-col items-center justify-center w-1/3 max-w-xs">
                            <span>0</span>
                        </div>
                        <button type="button" class="join-item btn  w-1/3 bg-base-100 text-xl">»</button>
                    </div>
                </div>
            </div>
            <div class="form-control">
                <div class="cursor-pointer">
                    <span class="label-text pr-4 text-base">Enemy</span>
                    <input type="checkbox" checked="checked" class="checkbox bg-base-100" />
                </div>
            </div>
            <div class="flex w-full gap-4 pt-1 max-w-xs">
                <div class="form-control w-full">
                    <button class="btn btn-accent shadow-xl" type="submit">Save</button>
                </div>
            </div>

        </form>
    </div>
@endsection
