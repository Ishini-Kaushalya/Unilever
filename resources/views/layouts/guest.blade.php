<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#ebe6f9]">
    <div class="min-h-screen flex flex-col items-center justify-center space-y-6">

        <!-- Logo + Heading -->
        <div class="flex flex-col items-center mt-16">
            <!-- Logo -->
            <img src="{{ asset('images/unileverLogo.png') }}" 
                 class="w-20 h-22 mb-2"
                 alt="Unilever Logo">

            <!-- Custom Heading Slot -->
            {{ $heading ?? '' }}
        </div>

        <!-- White Card (wraps the form) -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
