<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Linking Google fonts for icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/sidebar.css', 'resources/js/app.js', 'resources/js/sidebar.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Navbar for mobile -->
        <nav class="site-nav">
            <button class="sidebar-toggle">
                <span class="material-symbols-rounded">menu</span>
            </button>
        </nav>

        
        
        <div class="container">
            @include('layouts.sidebar')

            <!-- Site main content -->
            <div class="main-content">
                <!-- Page Heading -->
                @isset($header)
                    <h1 class="page-title">
                        {{ $header }}
                    </h1>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
