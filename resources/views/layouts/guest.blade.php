<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://67211654735dd822d79ac35c--tangerine-genie-222549.netlify.app/build/assets/app-c208tcty.css" rel="stylesheet">
        <link href="https://67211654735dd822d79ac35c--tangerine-genie-222549.netlify.app/build/assets/app-z-rg4txu.js" rel="stylesheet">
        <!-- Scripts -->
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
