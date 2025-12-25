<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>YOT Yogya - Young On Top Yogyakarta</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></noscript>
    @viteReactRefresh
    @vite(['resources/css/app.css'])

    <style>
        /* --- GLOBAL ANIMATIONS --- */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        
        .animation-delay-200 { animation-delay: 0.2s; opacity: 0; }
        .animation-delay-600 { animation-delay: 0.6s; opacity: 0; }
        .animation-delay-800 { animation-delay: 0.8s; opacity: 0; }
        .animation-delay-1000 { animation-delay: 1s; opacity: 0; }

        /* Floating Animation */
        .floating-image { animation: floating 3s ease-in-out infinite; transition: transform 0.3s ease; }
        .floating-image-container { position: relative; overflow: hidden; }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        /* --- HANGING CAROUSEL STYLES --- */
        .hanging-item {
            transform-origin: top center;
            opacity: 0;
            pointer-events: none;
            z-index: 1;
            /* Mobile default: smaller vertical drop, smaller scale */
            transform: translate(-50%, 150px) rotate(0deg) scale(0.5);
            transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            width: 260px; /* Base width for mobile */
        }

        .hanging-item.active {
            opacity: 1;
            z-index: 20;
            pointer-events: auto;
            /* Mobile active position */
            transform: translate(-50%, 30px) rotate(0deg) scale(1);
        }
        
        .hanging-item.prev {
            opacity: 0.8;
            z-index: 10;
            /* Mobile prev position: closer to center so it fits */
            transform: translate(-130%, 40px) rotate(3deg) scale(0.8);
            filter: blur(1px) grayscale(20%); 
        }

        .hanging-item.next {
            opacity: 0.8;
            z-index: 10;
             /* Mobile next position */
            transform: translate(30%, 40px) rotate(-3deg) scale(0.8);
            filter: blur(1px) grayscale(20%);
        }

        /* Desktop Overrides */
        @media (min-width: 768px) {
            .hanging-item {
                width: 320px;
                transform: translate(-50%, 200px) rotate(0deg) scale(0.5);
            }
            .hanging-item.active {
                transform: translate(-50%, 70px) rotate(0deg) scale(1);
            }
            .hanging-item.prev {
                opacity: 0.9;
                transform: translate(-160%, 60px) rotate(5deg) scale(0.85);
                filter: blur(0px) grayscale(20%); 
            }
            .hanging-item.next {
                opacity: 0.9;
                transform: translate(60%, 60px) rotate(-5deg) scale(0.85);
                filter: blur(0px) grayscale(20%);
            }
        }
        
        .hanging-item.active:hover {
            animation: swing-gentle 2.5s ease-in-out infinite;
        }

        @keyframes swing-gentle {
            0% { transform: translate(-50%, 30px) rotate(0deg) scale(1); }
            25% { transform: translate(-50%, 30px) rotate(1.5deg) scale(1); }
            75% { transform: translate(-50%, 30px) rotate(-1.5deg) scale(1); }
            100% { transform: translate(-50%, 30px) rotate(0deg) scale(1); }
        }

        @media (min-width: 768px) {
            @keyframes swing-gentle {
                0% { transform: translate(-50%, 70px) rotate(0deg) scale(1); }
                25% { transform: translate(-50%, 70px) rotate(1.5deg) scale(1); }
                75% { transform: translate(-50%, 70px) rotate(-1.5deg) scale(1); }
                100% { transform: translate(-50%, 70px) rotate(0deg) scale(1); }
            }
        }

        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Glassmorphism utility */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

<body class="bg-blue-50/50 font-[Inter] overflow-x-hidden text-gray-800">
    @include('layouts.navbar_users')
    
    <section class="relative min-h-screen flex flex-col items-center pt-20">
        
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-blue-50 mix-blend-multiply"></div>
            <div class="absolute top-0 -left-3 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
            <div class="absolute top-36 -right-4 w-96 h-96 bg-yellow-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-96 h-96 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 py-12 relative z-10 w-full">
            
            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-5xl md:text-8xl font-black text-gray-900 mb-6 tracking-tight leading-none">
                    YOUNG ON TOP
                    <span class="text-4xl md:text-6xl block text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mt-2">
                        YOGYAKARTA
                    </span>
                </h1>
                <p class="text-lg md:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-medium">
                    Komunitas anak muda Indonesia yang hadir untuk menginspirasi dan membentuk generasi penerus bangsa yang 
                    <span class="font-bold text-gray-900 bg-yellow-300 px-1 rounded-sm">strong</span>, 
                    <span class="font-bold text-gray-900 bg-blue-200 px-1 rounded-sm">smart</span>, dan 
                    <span class="font-bold text-gray-900 bg-green-200 px-1 rounded-sm">positive</span>.
                </p>
            </div>

            <div class="max-w-7xl mx-auto mb-16 animate-fade-in-up animation-delay-600 relative">
                <h2 class="sr-only">Featured Programs</h2>
                <div class="hanging-container relative h-[550px] md:h-[600px] w-full overflow-hidden">
                    <div class="absolute top-12 left-[-5%] w-[110%] h-33 z-0 pointer-events-none opacity-50">
                        <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-full">
                            <path d="M-100,5 Q720,110 1540,5" stroke="#CBD5E1" stroke-width="4" fill="none"/>
                        </svg>
                    </div>

                    <div class="hanging-stage relative w-full h-full perspective-1000">
                        @foreach ($carouselItems as $index => $item)
                            <div class="hanging-item absolute top-14 left-1/2 w-[280px] md:w-[320px] {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}">
                                <div class="absolute -top-9 left-1/2 -translate-x-1/2 z-50 flex flex-col items-center drop-shadow-md">
                                    <div class="w-3 h-3 bg-gray-400 rounded-full mb-[-8px] relative z-20 border border-white"></div>
                                    <div class="w-7 h-10 bg-green-500 rounded shadow-sm border-t-[3px] border-green-400 relative z-10 box-border">
                                        <div class="absolute top-2 left-1/2 -translate-x-1/2 w-1.5 h-4 bg-black/10 rounded-full"></div>
                                    </div>
                                </div>
                                <div class="bg-white p-3 pb-6 rounded-3xl shadow-2xl border border-white/50 mt-[-10px] relative z-40">
                                    <div class="relative h-56 md:h-64 w-full overflow-hidden rounded-2xl bg-gray-100 group shadow-inner">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['program'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" onerror="this.src='images/divisi/Technology.png'" loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                        <div class="absolute bottom-0 left-0 p-4 w-full">
                                             <span class="px-2 py-1 bg-white/20 backdrop-blur-md text-white text-xs font-bold rounded mb-2 inline-block border border-white/30">{{ $item['division'] }}</span>
                                        </div>
                                    </div>
                                    <div class="pt-5 px-2 text-center">
                                        <h3 class="text-lg font-bold text-gray-900 leading-tight mb-1 line-clamp-2">{{ $item['program'] ?: 'Program YOT' }}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <button onclick="modernPrevSlide()" aria-label="Previous Slide" class="absolute left-4 md:left-10 top-[45%] bg-white/80 backdrop-blur-sm hover:bg-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-110 z-50 text-gray-800 group border border-gray-100">
                        <i class="fas fa-chevron-left text-xl group-hover:-translate-x-1 transition-transform"></i>
                    </button>
                    <button onclick="modernNextSlide()" aria-label="Next Slide" class="absolute right-4 md:right-10 top-[45%] bg-white/80 backdrop-blur-sm hover:bg-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-110 z-50 text-gray-800 group border border-gray-100">
                        <i class="fas fa-chevron-right text-xl group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </div>

            <div class="max-w-8xl mx-auto mb-24 mt-12 animate-fade-in-up animation-delay-800">
                <div class="relative mb-16">
                    <div class="absolute -top-7 left-1/2 transform -translate-x-1/2 z-10">
                        <h2 class="bg-white px-10 py-3 rounded-full text-2xl md:text-3xl font-black text-gray-900 shadow-xl tracking-tight border-4 border-yellow-300 uppercase transform -rotate-1">
                            Our Divisions
                        </h2>
                    </div>
                    <div class="bg-yellow-300 rounded-[3rem] p-10 pt-20 md:p-20 md:pt-24 shadow-2xl text-center relative overflow-hidden border-b-8 border-yellow-400">
                        <div class="absolute top-[-50px] right-[-50px] w-64 h-64 bg-yellow-200 rounded-full opacity-50 mix-blend-multiply"></div>
                        <div class="absolute bottom-[-50px] left-[-50px] w-64 h-64 bg-yellow-400 rounded-full opacity-50 mix-blend-multiply"></div>
                        
                        <p class="text-gray-900 text-lg md:text-2xl font-semibold leading-relaxed max-w-5xl mx-auto">
                            YOT memiliki tujuh divisi: <span class="font-extrabold">Catalyst, Energy, Green, Entrepreneurship, Social, Technology,</span> dan <span class="font-extrabold">Marcomm</span>. Seluruhnya berkolaborasi membangun ekosistem positif yang berdampak.
                        </p>
                    </div>
                </div>

                <div class="relative px-4 md:px-12">
                    <div class="division-carousel-container overflow-hidden py-8 -my-4">
                        <div id="divisionCarouselTrack" class="flex transition-transform duration-500 ease-in-out gap-6">
                            @foreach ($divisionsList as $division)
                                <div class="division-card min-w-[85%] md:min-w-[calc(33.333%-16px)] bg-white rounded-[2rem] p-6 shadow-xl flex flex-col items-center text-center transform transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border border-gray-100 group">
                                    <div class="w-full aspect-square mb-6 rounded-2xl border-4 border-yellow-300 bg-gray-50 relative overflow-hidden shadow-inner group-hover:border-blue-400 transition-colors">
                                        <div class="floating-image-container w-full h-full p-2">
                                            @if(file_exists(public_path($division['image'])))
                                                 <img src="{{ asset($division['image']) }}" alt="{{ $division['name'] }}" class="w-full h-full object-contain floating-image drop-shadow-lg" loading="lazy">
                                            @else
                                                 <div class="flex items-center justify-center h-full text-yellow-500 font-bold bg-yellow-50 rounded-xl">{{ $division['name'] }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 class="bg-yellow-300 px-6 py-2 rounded-full text-lg font-black text-gray-900 mb-4 shadow-sm inline-block transform -rotate-2 group-hover:rotate-0 transition-transform">
                                        {{ $division['name'] }}
                                    </h3>
                                    <p class="text-gray-600 text-sm leading-relaxed mb-8 flex-grow font-medium px-2">
                                        {{ $division['desc'] }}
                                    </p>
                                    <a href="{{ route('division.detail', strtolower($division['name'])) }}" class="mt-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 w-full md:w-auto">
                                        Lihat Detail
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button onclick="prevDivision()" aria-label="Previous Division" class="hidden md:block absolute left-0 top-1/2 -translate-y-1/2 bg-white p-4 rounded-full shadow-2xl hover:scale-110 z-10 -ml-6 border border-gray-100 text-blue-600">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </button>
                    <button onclick="nextDivision()" aria-label="Next Division" class="hidden md:block absolute right-0 top-1/2 -translate-y-1/2 bg-white p-4 rounded-full shadow-2xl hover:scale-110 z-10 -mr-6 border border-gray-100 text-blue-600">
                        <i class="fas fa-chevron-right text-xl"></i>
                    </button>
                    
                    <!-- Mobile Nav -->
                    <div class="flex justify-center gap-4 md:hidden mt-4">
                        <button onclick="prevDivision()" class="bg-white p-3 rounded-full shadow-lg border border-gray-100 text-blue-600"><i class="fas fa-chevron-left"></i></button>
                        <button onclick="nextDivision()" class="bg-white p-3 rounded-full shadow-lg border border-gray-100 text-blue-600"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto mb-24 animate-fade-in-up animation-delay-600">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-6xl font-black text-gray-900 tracking-tight mb-4">Latest Events</h2>
                    <div class="h-2 w-32 bg-yellow-300 mx-auto rounded-full"></div>
                </div>

                <div class="space-y-8 px-4 md:px-0">
                    @forelse ($latestEvents as $event)
                        <div class="group relative bg-white border border-gray-100 rounded-3xl p-4 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-[1.01]">
                            <div class="flex flex-col md:flex-row gap-8 items-center">
                                <div class="w-full md:w-80 flex-shrink-0">
                                    <div class="aspect-[4/3] md:h-64 w-full rounded-2xl overflow-hidden relative shadow-lg">
                                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-2 rounded-xl text-center shadow-md z-10 border border-white/50">
                                            <span class="block text-2xl font-black text-gray-900 leading-none">{{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d') }}</span>
                                            <span class="block text-xs font-bold text-gray-500 uppercase">{{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('M') }}</span>
                                        </div>
                                        <img src="{{ asset('storage/' . $event->foto) }}" onerror="this.src='https://via.placeholder.com/400x300?text=Event+YOT'" alt="{{ $event->nama_kegiatan }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105" loading="lazy">
                                    </div>
                                </div>
                                <div class="flex-1 flex flex-col justify-center py-2 pr-4 text-center md:text-left">
                                    <div class="mb-4 flex flex-wrap gap-2 justify-center md:justify-start">
                                        <span class="inline-block bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $event->divisi }}</span>
                                        <span class="inline-block bg-gray-100 text-gray-600 text-xs font-bold px-3 py-1 rounded-full"><i class="fas fa-map-marker-alt mr-1"></i> {{$event->lokasi_kegiatan}}</span>
                                    </div>
                                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors">{{ $event->nama_kegiatan }}</h3>
                                    <p class="text-gray-600 text-base leading-relaxed mb-6 line-clamp-2 md:line-clamp-3 max-w-2xl">{{ $event->deskripsi ?? 'Kegiatan inspiratif dari Young On Top Yogyakarta.' }}</p>
                                    <div class="mt-auto">
                                        <a href="{{ route('division.detail', strtolower($event->divisi)) }}" class="inline-flex items-center gap-2 text-sm font-bold text-white bg-gray-900 px-6 py-3 rounded-full hover:bg-blue-600 transition-colors shadow-lg">
                                            Lihat Detail <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-20 bg-white rounded-[2rem] border-4 border-dashed border-gray-200">
                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="far fa-calendar-times text-4xl text-gray-300"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Belum Ada Event</h3>
                            <p class="text-gray-500 mt-2">Nantikan keseruan event YOT selanjutnya!</p>
                        </div>
                    @endforelse
                </div>
                
                <div class="flex justify-center mt-16">
                     <a href="{{ route('event') }}" class="group relative px-10 py-4 bg-transparent border-2 border-gray-900 text-gray-900 font-bold text-lg rounded-full hover:bg-gray-900 hover:text-white transition-all duration-300">
                        <span class="relative z-10 flex items-center gap-2">
                           Lainnya
                           <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="flex justify-center animate-fade-in-up animation-delay-1000 mb-24">
                <button class="group relative px-8 py-3 md:px-16 md:py-6 bg-yellow-300 text-gray-900 font-black text-lg md:text-2xl rounded-full shadow-[0_20px_50px_rgba(253,224,71,0.5)] hover:shadow-[0_20px_60px_rgba(253,224,71,0.7)] transition-all duration-300 hover:scale-105 hover:-translate-y-2 overflow-hidden border-b-4 md:border-b-8 border-yellow-400">
                    <span class="relative z-10 flex items-center gap-2 md:gap-3">
                        JOIN US NOW
                        <i class="fas fa-rocket group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </button>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in-up animation-delay-1000 mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12 items-start">
                    
                    <div class="lg:col-span-2 bg-gradient-to-br from-yellow-300 to-yellow-400 rounded-[2.5rem] p-8 md:p-12 shadow-2xl relative overflow-hidden text-gray-900">
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white opacity-20 rounded-full blur-2xl"></div>
                        <h2 class="text-4xl font-black mb-4">Contact Us</h2>
                        <p class="font-bold text-lg mb-2">Tertarik untuk berkolaborasi?</p>
                        <p class="text-sm mb-8 leading-relaxed opacity-90 font-medium">
                            Hubungi kami melalui form di bawah ini. Kami siap mendiskusikan peluang kerja sama lebih lanjut.
                        </p>

                        <form id="contactForm" class="space-y-4">
                            <div>
                                <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full px-5 py-4 rounded-2xl border-0 bg-white/60 placeholder-gray-600 text-gray-900 focus:outline-none focus:ring-4 focus:ring-white/50 backdrop-blur-sm transition-all font-medium" required>
                            </div>
                            <div>
                                <input type="text" id="nowa" placeholder="No Whatsapp" class="w-full px-5 py-4 rounded-2xl border-0 bg-white/60 placeholder-gray-600 text-gray-900 focus:outline-none focus:ring-4 focus:ring-white/50 backdrop-blur-sm transition-all font-medium" required>
                            </div>
                            <div>
                                <input type="email" id="email" placeholder="Email" class="w-full px-5 py-4 rounded-2xl border-0 bg-white/60 placeholder-gray-600 text-gray-900 focus:outline-none focus:ring-4 focus:ring-white/50 backdrop-blur-sm transition-all font-medium" required>
                            </div>
                            <div>
                                <textarea id="pesan" placeholder="Pesan ...." rows="4" class="w-full px-5 py-4 rounded-2xl border-0 bg-white/60 placeholder-gray-600 text-gray-900 focus:outline-none focus:ring-4 focus:ring-white/50 backdrop-blur-sm transition-all resize-none font-medium" required></textarea>
                            </div>
                            <button type="submit" class="w-full bg-black text-white font-bold py-4 px-8 rounded-full hover:bg-gray-900 transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                    
                    <div class="lg:col-span-3 flex flex-col h-full space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <!-- Info Cards -->
                            <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-50 flex items-start gap-4">
                                <div class="bg-blue-50 p-3 rounded-full text-blue-600">
                                    <i class="fas fa-map-marker-alt text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">Sekretariat</h4>
                                    <p class="text-sm text-gray-600 leading-snug">Jl. Babarsari Jl. Tambak Bayan No.2, Janti, Caturtunggal, Yogyakarta</p>
                                </div>
                            </div>
                             <div class="bg-white p-6 rounded-3xl shadow-lg border border-gray-50 flex items-start gap-4">
                                <div class="bg-green-50 p-3 rounded-full text-green-600">
                                    <i class="fab fa-whatsapp text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 mb-1">WhatsApp</h4>
                                    <p class="text-sm text-gray-600">0877-3843-8643<br><span class="text-xs text-gray-400">(Fast Response)</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full h-80 md:h-full min-h-[400px] rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white bg-gray-100 relative group">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2788.1766242797607!2d110.41597521867824!3d-7.781324937456133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599155555555%3A0x536eb168b1dca148!2sUniversitas%20Pembangunan%20Nasional%20%22Veteran%22%20Yogyakarta%20-%20Kampus%202%20Babarsari!5e1!3m2!1sid!2sid!4v1763609477629!5m2!1sid!2sid" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                title="Lokasi YOT Yogyakarta"
                                referrerpolicy="no-referrer-when-downgrade"
                                class="group-hover:scale-105 transition-transform duration-700">
                            </iframe>
                            <div class="absolute inset-0 pointer-events-none border-[3px] border-black/5 rounded-[2.5rem]"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div> 
        
        <div class="w-full z-20 relative">
            @include('layouts.footer')
        </div>

    </section>

    @stack('scripts')
    <script>
        // --- LOGIC HANGING CAROUSEL ---
        let modernCurrentSlide = 0;
        const hangingItems = document.querySelectorAll('.hanging-item'); 
        const totalModernSlides = hangingItems.length;
        let modernAutoSlideInterval;
        let autoSlideDirection = 1; 
        let isAnimating = false; 

        function updateModernCarousel() {
            const items = document.querySelectorAll('.hanging-item');
            items.forEach((item, index) => {
                item.classList.remove('active', 'prev', 'next');
                if (index === modernCurrentSlide) {
                    item.classList.add('active');
                } else if (index === (modernCurrentSlide - 1 + totalModernSlides) % totalModernSlides) {
                    item.classList.add('prev');
                } else if (index === (modernCurrentSlide + 1) % totalModernSlides) {
                    item.classList.add('next');
                }
            });
        }
        function moveSlideStep(step) {
            modernCurrentSlide = (modernCurrentSlide + step + totalModernSlides) % totalModernSlides;
            updateModernCarousel();
        }
        function modernNextSlide() {
            if(isAnimating) return;
            isAnimating = true;
            autoSlideDirection = 1;
            moveSlideStep(1);
            resetModernAutoSlide();
            setTimeout(() => { isAnimating = false; }, 800);
        }
        function modernPrevSlide() {
            if(isAnimating) return;
            isAnimating = true;
            autoSlideDirection = -1;
            moveSlideStep(-1);
            resetModernAutoSlide();
            setTimeout(() => { isAnimating = false; }, 800);
        }
        function autoSlideTick() {
            moveSlideStep(autoSlideDirection);
        }
        function startModernAutoSlide() {
            if(modernAutoSlideInterval) clearInterval(modernAutoSlideInterval);
            modernAutoSlideInterval = setInterval(autoSlideTick, 4000); // 4 seconds
        }
        function resetModernAutoSlide() {
            clearInterval(modernAutoSlideInterval);
            startModernAutoSlide();
        }

        // --- DIVISION CAROUSEL ---
        let divisionCurrentIndex = 0;
        const divisionTrack = document.getElementById('divisionCarouselTrack');
        const divisionCards = document.querySelectorAll('.division-card');
        
        function getVisibleCards() { return window.innerWidth >= 768 ? 3 : 1; }
        
        function updateDivisionCarousel() {
            if(divisionCards.length > 0 && divisionTrack) {
                const cardStyle = window.getComputedStyle(divisionTrack);
                const gap = parseFloat(cardStyle.gap) || 24;
                const cardWidth = divisionCards[0].offsetWidth;
                const moveAmount = (cardWidth + gap) * divisionCurrentIndex;
                divisionTrack.style.transform = `translateX(-${moveAmount}px)`;
            }
        }
        function nextDivision() {
            const maxIndex = divisionCards.length - getVisibleCards();
            if (divisionCurrentIndex < maxIndex) { divisionCurrentIndex++; } else { divisionCurrentIndex = 0; }
            updateDivisionCarousel();
        }
        function prevDivision() {
            if (divisionCurrentIndex > 0) { divisionCurrentIndex--; } else {
                const maxIndex = divisionCards.length - getVisibleCards();
                divisionCurrentIndex = maxIndex;
            }
            updateDivisionCarousel();
        }

        // --- CONTACT FORM LOGIC (WHATSAPP) ---
        const contactForm = document.getElementById('contactForm');
        if(contactForm) {
            contactForm.addEventListener('submit', function(event) {
                event.preventDefault(); 
                var nama = document.getElementById('nama').value;
                var nowaUser = document.getElementById('nowa').value;
                var email = document.getElementById('email').value;
                var pesan = document.getElementById('pesan').value;
                var nomorTujuan = "6287738438643"; 

                var text = "Halo Admin YOT Inspirasi,%0a%0a" +
                           "Saya ingin mendiskusikan kolaborasi.%0a" +
                           "--------------------------------%0a" +
                           "*Nama:* " + nama + "%0a" +
                           "*No WA:* " + nowaUser + "%0a" +
                           "*Email:* " + email + "%0a" +
                           "--------------------------------%0a" +
                           "*Pesan:*%0a" + pesan;

                var waUrl = "https://wa.me/" + nomorTujuan + "?text=" + text;
                window.open(waUrl, '_blank');
            });
        }

        // --- INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', () => {
            if(hangingItems.length > 0) {
                updateModernCarousel();
                startModernAutoSlide();
                const wrapper = document.querySelector('.hanging-container');
                if(wrapper) {
                    wrapper.addEventListener('mouseenter', () => clearInterval(modernAutoSlideInterval));
                    wrapper.addEventListener('mouseleave', () => startModernAutoSlide());
                    let touchStartX = 0;
                    wrapper.addEventListener('touchstart', e => touchStartX = e.changedTouches[0].screenX, {passive: true});
                    wrapper.addEventListener('touchend', e => {
                        const touchEndX = e.changedTouches[0].screenX;
                        if (!isAnimating) {
                            if (touchEndX < touchStartX - 50) modernNextSlide();
                            if (touchEndX > touchStartX + 50) modernPrevSlide();
                        }
                    }, {passive: true});
                }
            }
            updateDivisionCarousel();
        });

        window.addEventListener('resize', () => {
            divisionCurrentIndex = 0;
            updateDivisionCarousel();
        });
    </script>
</body>
</html>