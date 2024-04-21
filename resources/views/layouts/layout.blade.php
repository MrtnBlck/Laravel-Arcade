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
            <a class="px-2 text-xl font-semibold text-white" href="/">Arcade</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a href="">Log in</a></li>
                <li><a href="">Sign up</a></li>
            </ul>
        </div>
    </div>
    <div class="container mx-auto flex flex-col px-4">
        @yield('content')
    </div>
</body>

</html>
