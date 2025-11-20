<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Animation Keyframes */
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </head>
    <body class="font-[Inter] text-gray-900 antialiased bg-gradient-to-br from-gray-50 to-white">
        <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 overflow-hidden">
            <!-- Background Blobs -->
            <div class="absolute inset-0 -z-10">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-100 via-blue-50 to-pink-100 opacity-60"></div>
                <div class="absolute top-0 -left-3 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob"></div>
                <div class="absolute top-36 -right-4 w-72 h-72 bg-[#FFF000] rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 left-20 w-72 h-72 bg-[#FF52D3] rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
            </div>

            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white/80 backdrop-blur-sm shadow-2xl border border-gray-200 overflow-hidden sm:rounded-3xl relative z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
