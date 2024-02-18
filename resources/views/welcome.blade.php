<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/app.css">

</head>

<body class="antialiased bg-gray-200">
    <div class="min-h-screen flex flex-col justify-center items-center">
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ route('notes.index') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Notes</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <h1 class="text-5xl font-bold mb-8 text-center text-gray-800">
            Welcome to LiteNotes
        </h1>

        <p class="text-lg text-gray-600 mb-8 text-center">A simple and lightweight note-taking app.</p>

        <a href="{{ route('register') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Get
            Started</a>
    </div>
</body>

</html>
