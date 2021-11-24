<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-dark text-white" onload="startTime()">
        <div class="bg-dark">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-dark text-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8  bg-dark shadow text-white">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="bg-dark text-white">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
