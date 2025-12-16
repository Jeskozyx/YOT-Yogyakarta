<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/app.jsx'])
        <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">
    </head>
    
    {{-- Gunakan warna teks putih/terang agar kontras dengan background gelap --}}
    <body class="font-[Inter] text-white antialiased">
        
        {{-- PERBAIKAN PENTING: --}}
        {{-- 1. ID harus sama dengan di app.jsx: id="react-color-bends-background" --}}
        {{-- 2. Gunakan background gelap (bg-black) agar aurora terlihat jelas --}}
        {{-- 3. Pastikan ada class -z-50 agar di belakang form --}}
        <div id="react-color-bends-background" class="fixed inset-0 -z-50 w-full h-full bg-black"></div>

        <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    {{-- Ubah logo jadi putih/terang --}}
                    <x-application-logo class="w-20 h-20 fill-current text-white" />
                </a>
            </div>

            {{-- Ubah container form jadi gelap dan transparan --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-900/50 backdrop-blur-md shadow-2xl border border-gray-700 overflow-hidden sm:rounded-3xl relative z-10">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>