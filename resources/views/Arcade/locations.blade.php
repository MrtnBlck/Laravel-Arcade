@extends('layouts.layout')

@section('title', 'Locations')

@section('content')
    <div class="flex w-2/3 flex-col items-center gap-4 self-center pb-6 pt-10 text-slate-200">
        <div class="flex h-11 w-full max-w-3xl flex-col items-center justify-center rounded-lg bg-base-100 shadow-xl">
            <h1 class="text-lg font-semibold">Locations</h1>
        </div>
        <div class="flex gap-4 max-w-3xl">
            <div class="card w-1/2 bg-base-100 shadow-xl image-full">
                <figure><img
                        src="https://steamuserimages-a.akamaihd.net/ugc/2058741034012526093/D413A8F912EDED5B50A0B6A9DFFB2C3DBBFF76A2/"
                        alt="Shoes" />
                </figure>
                <div class="card-body space-y-16 w-full">
                    <h2 class="card-title text-2xl text-white">Stormweil castle</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-ghost btn-sm">Edit</button>
                        <button class="btn btn-ghost btn-sm">Delete</button>
                    </div>
                </div>
            </div>
            <div class="card w-1/2 bg-base-100 shadow-xl image-full">
              <figure><img
                      src="https://steamuserimages-a.akamaihd.net/ugc/2058741034012526093/D413A8F912EDED5B50A0B6A9DFFB2C3DBBFF76A2/"
                      alt="Shoes" />
              </figure>
              <div class="card-body space-y-16 w-full">
                  <h2 class="card-title text-2xl text-white">Stormweil castle</h2>
                  <div class="card-actions justify-end">
                      <button class="btn btn-ghost btn-sm">Edit</button>
                      <button class="btn btn-ghost btn-sm">Delete</button>
                  </div>
              </div>
          </div>
        </div>
    </div>
@endsection
