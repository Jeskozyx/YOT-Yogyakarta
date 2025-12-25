<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Division Gallery - YOT Yogyakarta</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        h1, h2, h3, .font-heading { font-family: 'Outfit', sans-serif; }
        [x-cloak] { display: none !important; }

        /* Smooth masonry transitions */
        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1.5rem;
        }

        /* Fun blob animation */
        @keyframes subtle-float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
        }
        .animate-float { animation: subtle-float 6s ease-in-out infinite; }
        
        @keyframes blob-spin {
            0% { transform: translate(0, 0) scale(1) rotate(0deg); }
            33% { transform: translate(30px, -50px) scale(1.1) rotate(120deg); }
            66% { transform: translate(-20px, 20px) scale(0.9) rotate(240deg); }
            100% { transform: translate(0, 0) scale(1) rotate(360deg); }
        }
        .animate-blob-spin { animation: blob-spin 20s infinite linear; }
        
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8F9FD] text-gray-900 antialiased relative overflow-x-hidden min-h-screen flex flex-col">

    <!-- Background Decoration -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-full bg-[#FAFAFA]"></div>
        <div class="absolute -top-[10%] -left-[10%] w-[50%] h-[50%] bg-blue-100/50 rounded-full blur-[100px] animate-blob-spin"></div>
        <div class="absolute top-[20%] right-[10%] w-[30%] h-[30%] bg-yellow-100/50 rounded-full blur-[80px] animate-blob-spin animation-delay-2000"></div>
        <div class="absolute bottom-[10%] left-[20%] w-[40%] h-[40%] bg-purple-100/50 rounded-full blur-[90px] animate-blob-spin animation-delay-4000"></div>
    </div>

    @include('layouts.navbar_users')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 flex-grow" x-data="{ activeTab: 'All' }">
        
        <!-- Header Section -->
        <div class="text-center mb-12 relative pt-10">
            <!-- <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-600 text-xs font-bold tracking-wider mb-4 animate-fade-in-up">
                ✨ CAPTURING MOMENTS
            </span> -->
            <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 relative inline-block animate-fade-in-up delay-100">
                OUR <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">GALLERY</span>
                <svg class="absolute -top-6 -right-8 w-12 h-12 text-yellow-400 animate-float" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed animate-fade-in-up delay-200">
                A visual journey through the impact, joy, and togetherness of Young On Top Yogyakarta's activities.
            </p>
        </div>

        <!-- Filter Tabs -->
        <div class="flex justify-start md:justify-center overflow-x-auto pb-6 mb-8 gap-3 no-scrollbar px-2 animate-fade-in-up delay-300">
            <button 
                @click="activeTab = 'All'"
                :class="activeTab === 'All' 
                    ? 'bg-gray-900 text-white shadow-lg scale-105' 
                    : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 border border-gray-100'"
                class="px-6 py-3 rounded-2xl text-sm font-bold transition-all duration-300 shadow-sm whitespace-nowrap border">
                All Gallery
            </button>

            @php
                $tabs = [
                    'TECHNOLOGY', 'SOCIAL', 'CATALYST', 'GREEN', 
                    'MARCOMM', 'ENERGY', 'ENTREPRENEURSHIP'
                ];
            @endphp

            @foreach($tabs as $tab)
                <button 
                    @click="activeTab = '{{ $tab }}'" 
                    :class="activeTab === '{{ $tab }}' 
                        ? 'bg-gray-900 text-white shadow-lg scale-105' 
                        : 'bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 border border-gray-100'"
                    class="px-6 py-3 rounded-2xl text-sm font-bold transition-all duration-300 shadow-sm whitespace-nowrap uppercase border">
                    {{ ucfirst(strtolower($tab == 'ENTREPRENEURSHIP' ? 'Entrepreneur' : $tab)) }}
                </button>
            @endforeach
        </div>

        <!-- Gallery Grid -->
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            @forelse($events as $event)
                <div 
                    x-show="activeTab === 'All' || activeTab === '{{ $event->divisi }}'"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform scale-90 translate-y-8"
                    x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                    class="masonry-item group relative rounded-3xl overflow-hidden bg-white shadow-sm hover:shadow-2xl transition-all duration-500 cursor-pointer"
                >
                    <div class="relative overflow-hidden aspect-[4/3] md:aspect-auto">
                        <img src="{{ asset('storage/' . $event->foto) }}" 
                            alt="{{ $event->nama_kegiatan }}" 
                            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"> 
                        
                        <!-- Overlay on Hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                            <span class="inline-block bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full w-fit mb-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-100">
                                {{ $event->divisi }}
                            </span>
                            <h3 class="text-white text-xl font-bold leading-tight transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-200">
                                {{ $event->nama_kegiatan }}
                            </h3>
                            <p class="text-gray-300 text-sm mt-1 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-300">
                                {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-24 text-center animate-fade-in-up">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6 animate-float">
                        <i class="fas fa-images text-4xl text-gray-300"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum ada dokumentasi</h3>
                    <p class="text-gray-500 max-w-md mx-auto">Kami sedang mengumpulkan momen-momen seru. Cek kembali nanti ya!</p>
                </div>
            @endforelse
        </div>

    </div>

    @include('layouts.footer')

</body>
</html>
