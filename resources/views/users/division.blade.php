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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }

        /* --- COPY ANIMASI DARI LANDING PAGE --- */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        
        /* Hide scrollbar for clean tabs */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased relative overflow-x-hidden min-h-screen">

    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-purple-50 via-blue-50 to-pink-50 opacity-80"></div>
        <div class="absolute top-0 -left-10 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-40 -right-10 w-96 h-96 bg-[#FFF000] rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-20 w-96 h-96 bg-[#FF52D3] rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
    </div>

    @include('layouts.navbar_users')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20" x-data="{ activeTab: 'All' }">
        
        <div class="text-center mb-16 relative">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 tracking-tight mb-4">
                OUR
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-blue-700">
                    GALLERY
                </span>
            </h1>
            <div class="h-1.5 w-24 bg-[#FFF000] mx-auto rounded-full mb-6"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Dokumentasi keseruan dan dampak positif dari setiap kegiatan divisi Young On Top Yogyakarta.
            </p>
        </div>

        <div class="flex justify-start md:justify-center overflow-x-auto pb-4 mb-10 gap-3 no-scrollbar px-2">
            
            <button 
                @click="activeTab = 'All'"
                :class="activeTab === 'All' 
                    ? 'bg-[#FFF000] text-black ring-2 ring-[#FFF000] ring-offset-2' 
                    : 'bg-white text-gray-600 border border-gray-200 hover:border-blue-400 hover:text-blue-600'"
                class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 shadow-sm whitespace-nowrap">
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
                        ? 'bg-[#FFF000] text-black ring-2 ring-[#FFF000] ring-offset-2' 
                        : 'bg-white text-gray-600 border border-gray-200 hover:border-blue-400 hover:text-blue-600'"
                    class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 shadow-sm whitespace-nowrap uppercase">
                    {{ ucfirst(strtolower($tab == 'ENTREPRENEURSHIP' ? 'Entrepreneur' : $tab)) }}
                </button>
            @endforeach
        </div>

        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            
            @forelse($events as $event)
                <div 
                    x-show="activeTab === 'All' || activeTab === '{{ $event->divisi }}'"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform scale-95 translate-y-4"
                    x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                    class="break-inside-avoid group relative rounded-[1rem] overflow-hidden bg-white border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300"
                >
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/' . $event->foto) }}" 
                            alt="{{ $event->nama_kegiatan }}" 
                            class="w-full h-auto object-cover transition-transform duration-700 ease-in-out"> 
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
                    </div>

                    <div class="absolute inset-0 flex flex-col justify-end p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                        
                        <div class="mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                            <span class="bg-[#4F53EA] text-white text-[10px] font-extrabold px-3 py-1 rounded-full tracking-wider uppercase shadow-md">
                                {{ $event->divisi }}
                            </span>
                        </div>

                        <h3 class="text-white text-xl font-bold leading-tight mb-1 drop-shadow-md">
                            {{ $event->nama_kegiatan }}
                        </h3>
                        
                        <p class="text-gray-300 text-xs font-medium flex items-center gap-2 mt-1">
                            <i class="far fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d M Y') }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
                    <div class="bg-white p-6 rounded-full shadow-lg mb-4 border border-gray-100">
                        <i class="fas fa-camera text-4xl text-gray-300"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Belum ada dokumentasi</h3>
                    <p class="text-gray-500">Galeri foto belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>