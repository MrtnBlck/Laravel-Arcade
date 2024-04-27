<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-[100svh] w-screen bg-base-200">
    <div class="navbar bg-base-300">
        <div class="flex-1">
            <a class="px-2 text-xl font-semibold text-white" href="/">Gladiator chronicles</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1 ">
                @auth
                    <li>
                        <details>
                            <summary>
                                Options
                            </summary>
                            <ul class="bg-base-100 p-2 z-10">
                                <li><a href="{{ route('character.all') }}">My characters</a></li>
                                <li><a href="{{ route('character.create') }}">New character</a></li>
                                <li><a href="{{ route('place.all') }}">All Locations</a></li>
                                @if (Auth::user()->is_admin)
                                    <li><a href="{{ route('place.create') }}">New Location</a></li>
                                @endif
                            </ul>
                        </details>
                    </li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <li><a onclick="event.preventDefault(); this.closest('form').submit();"
                                href="{{ route('logout') }}">Log out</a></li>
                    </form>
                @else
                    <li><a href="{{ route('login') }}">Log in</a></li>
                    <li><a href="{{ route('register') }}">Sign up</a></li>
                @endauth
            </ul>
        </div>
    </div>
    <div class="container mx-auto flex flex-col px-4">
        @yield('content')
    </div>
</body>

</html>
