<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">

        <!-- Scripts -->
        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/app.jsx'])

        <style>
             /* --- GLOBAL ANIMATIONS --- */
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob { animation: blob 7s infinite; }
            .animation-delay-2000 { animation-delay: 2s; }
            .animation-delay-4000 { animation-delay: 4s; }
        </style>
        @stack('styles')
    </head>
    <body class="font-[Inter] text-gray-900 antialiased bg-gray-50 overflow-hidden relative">
        
        <!-- Background Blobs -->
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-blue-50 mix-blend-multiply"></div>
            <div class="absolute top-0 -left-4 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
            <div class="absolute top-0 -right-4 w-96 h-96 bg-yellow-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-96 h-96 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10 px-6">
            <div class="mb-8">
                <a href="/">
                    <x-application-logo class="w-24 h-24 text-gray-900 fill-current" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white/70 backdrop-blur-xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/50 rounded-[2.5rem] relative overflow-hidden">
                 <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-400 via-yellow-400 to-green-400"></div>
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-sm text-gray-500 font-medium">
                &copy; {{ date('Y') }} Young On Top Yogyakarta. All rights reserved.
            </div>
        </div>
        
        @stack('scripts')
    </body>
</html>