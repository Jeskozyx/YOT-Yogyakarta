@include('layouts.navbar_users')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>YOT Yogya</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
        .animation-delay-400 { animation-delay: 0.4s; opacity: 0; }
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
            transform-origin: top center; /* Titik putar di jepitan */
            opacity: 0;
            pointer-events: none;
            z-index: 1;
            /* Default hidden state */
            transform: translate(-50%, 200px) rotate(0deg) scale(0.5);
            /* Durasi animasi CSS (0.8s) disinkronkan dengan JS Timeout */
            transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Active Card (Center) */
        .hanging-item.active {
            opacity: 1;
            z-index: 20;
            pointer-events: auto;
            transform: translate(-50%, 70px) rotate(0deg) scale(1);
        }
        
        .hanging-item.active:hover {
            animation: swing-gentle 2.5s ease-in-out infinite;
        }

        /* Prev Card (Left) */
        .hanging-item.prev {
            opacity: 0.9;
            z-index: 10;
            transform: translate(-160%, 60px) rotate(5deg) scale(0.85);
            filter: blur(0px) grayscale(20%); 
        }

        /* Next Card (Right) */
        .hanging-item.next {
            opacity: 0.9;
            z-index: 10;
            transform: translate(60%, 60px) rotate(-5deg) scale(0.85);
            filter: blur(0px) grayscale(20%);
        }

        @keyframes swing-gentle {
            0% { transform: translate(-50%, 70px) rotate(0deg) scale(1); }
            25% { transform: translate(-50%, 70px) rotate(1.5deg) scale(1); }
            75% { transform: translate(-50%, 70px) rotate(-1.5deg) scale(1); }
            100% { transform: translate(-50%, 70px) rotate(0deg) scale(1); }
        }

        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-white font-[Inter] overflow-x-hidden">
    <section class="relative min-h-screen flex flex-col items-center pt-20">
        
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-100 via-blue-50 to-pink-100 opacity-60"></div>
            <div class="absolute top-0 -left-3 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob"></div>
            <div class="absolute top-36 -right-4 w-72 h-72 bg-[#FFF000] rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-[#FF52D3] rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 py-10 relative z-10 w-full">
            
            <div class="text-center mb-10 animate-fade-in-up">
                <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 tracking-tight">
                    YOUNG ON TOP
                    <span class="text-4xl block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600 mt-2">
                        YOGYAKARTA
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Komunitas anak muda Indonesia yang hadir untuk menginspirasi dan membentuk generasi penerus bangsa yang 
                    <span class="font-bold text-black">strong, smart,</span> dan <span class="font-bold text-black">positive</span>.
                </p>
            </div>

            <div class="max-w-7xl mx-auto mb-10 animate-fade-in-up animation-delay-600 relative">
                
                <div class="hanging-container relative h-[550px] md:h-[600px] w-full overflow-hidden">
                    
                    <div class="absolute top-12 left-[-5%] w-[110%] h-33 z-0 pointer-events-none">
                        <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-full">
                            <path d="M-100,5 Q720,110 1540,5" stroke="#9CA3AF" stroke-width="3" fill="none" class="opacity-70"/>
                        </svg>
                    </div>

                    <div class="hanging-stage relative w-full h-full perspective-1000">
                        @php
                            $divisions = ['TECHNOLOGY', 'GREEN', 'CATALYST', 'ENERGY', 'ENTREPRENEURSHIP', 'SOCIAL', 'MARCOMM'];
                            $carouselItems = [];
                            
                            foreach($divisions as $divisionName) {
                                $event = \App\Models\Event::where('divisi', $divisionName)
                                            ->whereNotNull('foto')
                                            ->latest()
                                            ->first();
                                
                                if($event) {
                                    $carouselItems[] = [
                                        'image' => asset('storage/' . $event->foto),
                                        'program' => $event->nama_kegiatan,
                                        'division' => $divisionName
                                    ];
                                }
                            }

                            // Fallback Data
                            if(empty($carouselItems)) {
                                $carouselItems = [
                                    ['image' => 'images/divisi/Green.png', 'program' => 'Nature Care', 'division' => 'GREEN'],
                                    ['image' => 'images/divisi/Technology.png', 'program' => 'Digital Fest', 'division' => 'TECHNOLOGY'],
                                    ['image' => 'images/divisi/Social.png', 'program' => 'Charity Run', 'division' => 'SOCIAL'],
                                    ['image' => 'images/divisi/Catalyst.png', 'program' => 'Edu Fair', 'division' => 'CATALYST'],
                                    ['image' => 'images/divisi/Energy.png', 'program' => 'Health Life', 'division' => 'ENERGY'],
                                    ['image' => 'images/divisi/Enterpreneurship.png', 'program' => 'Health Life', 'division' => 'ENTREPRENEURSHIP'],
                                    ['image' => 'images/divisi/Marcomm.png', 'program' => 'Health Life', 'division' => 'MARCOMM'],
                                ];
                            }
                        @endphp

                        @foreach ($carouselItems as $index => $item)
                            <div class="hanging-item absolute top-14 left-1/2 w-[280px] md:w-[320px] {{ $index === 0 ? 'active' : '' }}" 
                                 data-index="{{ $index }}">
                                
                                <div class="absolute -top-9 left-1/2 -translate-x-1/2 z-50 flex flex-col items-center drop-shadow-md">
                                    <div class="w-3 h-3 bg-gray-400 rounded-full mb-[-8px] relative z-20 border border-white"></div>
                                    <div class="w-7 h-10 bg-green-500 rounded shadow-sm border-t-[3px] border-green-400 relative z-10">
                                        <div class="absolute top-2 left-1/2 -translate-x-1/2 w-1.5 h-4 bg-black/10 rounded-full"></div>
                                    </div>
                                </div>

                                <div class="bg-white p-3 pb-6 rounded-2xl shadow-xl border border-gray-100 mt-[-10px] relative z-40">
                                    
                                    <div class="relative h-56 md:h-64 w-full overflow-hidden rounded-lg bg-gray-100 group shadow-inner">
                                        <img src="{{ $item['image'] }}" 
                                             alt="{{ $item['program'] }}" 
                                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                             onerror="this.src='images/divisi/Technology.png'">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-60"></div>
                                    </div>
                                    
                                    <div class="pt-4 px-2 text-left">
                                        <h3 class="text-xl font-extrabold text-gray-900 leading-tight mb-1 uppercase tracking-tight">{{ $item['division'] }}</h3>
                                        <p class="text-sm text-gray-500 font-medium line-clamp-1">{{ $item['program'] }}</p>
                                        <p class="text-xs text-gray-400 mt-2">Learn more about {{ strtolower($item['division']) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button onclick="modernPrevSlide()" 
                            class="absolute left-2 md:left-10 top-[45%] bg-white/90 backdrop-blur hover:bg-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-110 z-50 text-gray-800 border border-gray-200">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </button>
                    <button onclick="modernNextSlide()" 
                            class="absolute right-2 md:right-10 top-[45%] bg-white/90 backdrop-blur hover:bg-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-110 z-50 text-gray-800 border border-gray-200">
                        <i class="fas fa-chevron-right text-xl"></i>
                    </button>
                </div>
            </div>

            <div class="max-w-8xl mx-auto mb-20 mt-10 animate-fade-in-up animation-delay-800">
                <div class="relative mb-16">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 z-10">
                        <h2 class="bg-white px-8 py-2 rounded-full text-3xl font-extrabold text-gray-900 shadow-lg tracking-wider border-2 border-gray-100 uppercase">Our Division</h2>
                    </div>
                    <div class="bg-[#FFF000] rounded-[3rem] p-10 pt-16 md:p-16 md:pt-20 shadow-xl text-center relative overflow-hidden">
                        <p class="text-gray-900 text-lg md:text-xl font-medium leading-relaxed max-w-4xl mx-auto">
                            YOT memiliki tujuh divisi: Catalyst (pendidikan), Energy (kesehatan), Green (lingkungan), Entrepreneurship (kewirausahaan), Social (sosial), Technology (teknologi), dan Marcomm (komunikasi & branding). Seluruhnya berkolaborasi membangun ekosistem positif.
                        </p>
                    </div>
                </div>

                <div class="relative px-4 md:px-12">
                    <div class="division-carousel-container overflow-hidden py-4">
                        <div id="divisionCarouselTrack" class="flex transition-transform duration-500 ease-in-out gap-6">
                            @php
                                $divisionsList = [
                                    ['name' => 'TECHNOLOGY', 'desc' => 'Inovasi teknologi untuk perubahan positif.', 'image' => '/images/divisi/Technology.png'],
                                    ['name' => 'GREEN', 'desc' => 'Aksi nyata demi lingkungan berkelanjutan.', 'image' => '/images/divisi/Green.png'],
                                    ['name' => 'CATALYST', 'desc' => 'Ekosistem belajar yang seru dan bermanfaat.', 'image' => '/images/divisi/Catalyst.png'],
                                    ['name' => 'ENERGY', 'desc' => 'Kesehatan fisik dan mental untuk produktivitas.', 'image' => '/images/divisi/Energy.png'],
                                    ['name' => 'ENTREPRENEURSHIP', 'desc' => 'Semangat kewirausahaan dan kemandirian.', 'image' => '/images/divisi/Enterpreneurship.png'],
                                    ['name' => 'SOCIAL', 'desc' => 'Kepedulian sesama melalui kegiatan amal.', 'image' => '/images/divisi/Social.png'],
                                    ['name' => 'MARCOMM', 'desc' => 'Branding dan komunikasi yang berdampak.', 'image' => '/images/divisi/Marcomm.png'],
                                ];
                            @endphp

                            @foreach ($divisionsList as $division)
                                <div class="division-card min-w-full md:min-w-[calc(33.333%-16px)] bg-white rounded-3xl p-6 shadow-lg flex flex-col items-center text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl border border-gray-100">
                                    <div class="w-full aspect-square mb-6 rounded-2xl border-2 border-[#FFF000] bg-gray-50 relative overflow-hidden">
                                        <div class="floating-image-container w-full h-full">
                                            @if(file_exists(public_path($division['image'])))
                                                 <img src="{{ asset($division['image']) }}" alt="{{ $division['name'] }}" class="w-full h-full object-cover floating-image">
                                            @else
                                                 <div class="flex items-center justify-center h-full text-yellow-500 font-bold">{{ $division['name'] }} IMG</div>
                                            @endif
                                        </div>
                                    </div>
                                    <h3 class="bg-[#FFF000] px-6 py-1 rounded-full text-xl font-extrabold text-gray-900 mb-4 shadow-sm inline-block">
                                        {{ $division['name'] }}
                                    </h3>
                                    <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-grow">
                                        {{ $division['desc'] }}
                                    </p>
                                    <a href="{{ route('division.detail', strtolower($division['name'])) }}" class="mt-auto px-6 py-2 bg-[#4F53EA] hover:bg-[#42C4E3] text-white font-bold rounded-full transition-colors duration-300 shadow-md">
                                        Detail
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button onclick="prevDivision()" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white p-3 rounded-full shadow-xl hover:scale-110 z-10 -ml-4 border border-gray-100">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button onclick="nextDivision()" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white p-3 rounded-full shadow-xl hover:scale-110 z-10 -mr-4 border border-gray-100">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="max-w-8xl mx-auto mb-24 animate-fade-in-up animation-delay-600">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12">Our Event</h2>
                <div class="space-y-6 px-4 md:px-12">
                    @php
                        $events = [
                            ['type' => 'Webinar', 'date' => '9 Oct 2025', 'desc' => 'Webinar inspiratif tentang masa depan teknologi.', 'img' => '/images/events/12-Light.jpg'],
                            ['type' => 'Workshop', 'date' => '15 Oct 2025', 'desc' => 'Workshop hands-on pengembangan skill digital.', 'img' => '/images/events/1715195505778.jpg'],
                        ];
                    @endphp
                    @foreach ($events as $event)
                        <div class="flex flex-col md:flex-row gap-6 bg-gradient-to-r from-yellow-50 to-white rounded-3xl p-6 shadow-lg hover:shadow-xl transition-all border-2 border-yellow-100">
                            <div class="w-full md:w-64 flex-shrink-0">
                                <div class="aspect-[4/3] rounded-xl overflow-hidden border-2 border-[#FFF000] bg-gray-200">
                                     <img src="{{ asset($event['img']) }}" onerror="this.src='https://via.placeholder.com/300'" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div class="flex-1 flex flex-col justify-center">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $event['type'] }}</h3>
                                <div class="flex items-center gap-2 mb-3 text-gray-500 text-sm font-semibold">
                                    <i class="far fa-calendar-alt"></i> {{ $event['date'] }}
                                </div>
                                <p class="text-gray-700">{{ $event['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="max-w-8xl mx-auto mb-24 animate-fade-in-up animation-delay-600">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12">Meet The Developers</h2>
                <div class="relative px-4 md:px-12">
                    <div class="team-carousel-container overflow-hidden py-4">
                        <div id="teamCarouselTrack" class="flex transition-transform duration-500 ease-in-out gap-6">
                            @php
                                $teamMembers = [
                                    ['name' => 'Billy Boen', 'role' => 'Founder', 'image' => 'images/team/Muhammad Sulthan Al Azzam_124230127.png'],
                                    ['name' => 'Stevanus G', 'role' => 'Co-Founder', 'image' => 'images/divisi/IMG_2437.JPG'],
                                    ['name' => 'Noverica W', 'role' => 'Director', 'image' => 'https://ui-avatars.com/api/?name=Noverica+Widjojo&background=0D8ABC&color=fff'],
                                    ['name' => 'Team 4', 'role' => 'Staff', 'image' => 'https://ui-avatars.com/api/?name=Team+4&background=0D8ABC&color=fff'],
                                    ['name' => 'Team 5', 'role' => 'Staff', 'image' => 'https://ui-avatars.com/api/?name=Team+5&background=0D8ABC&color=fff'],
                                ];
                            @endphp
                            @foreach ($teamMembers as $member)
                                <div class="team-card min-w-full md:min-w-[calc(50%-12px)] lg:min-w-[calc(25%-18px)] flex flex-col items-center group">
                                    <div class="w-full aspect-[3/4] mb-4 rounded-2xl overflow-hidden shadow-lg relative bg-gray-200">
                                        <img src="{{ $member['image'] }}" onerror="this.src='https://ui-avatars.com/api/?name={{$member['name']}}'" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-4">
                                            <span class="text-white font-medium">{{ $member['role'] }}</span>
                                        </div>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $member['name'] }}</h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <button onclick="prevTeam()" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white p-3 rounded-full shadow-xl hover:scale-110 z-10 -ml-4 border border-gray-100">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button onclick="nextTeam()" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white p-3 rounded-full shadow-xl hover:scale-110 z-10 -mr-4 border border-gray-100">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="flex justify-center animate-fade-in-up animation-delay-1000 mb-20">
                <button class="group relative px-12 py-5 bg-[#FFF000] text-black font-bold text-xl rounded-full shadow-xl hover:shadow-yellow-400/50 transition-all duration-300 hover:scale-105 hover:-translate-y-1 overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        JOIN US NOW
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </button>
            </div>
            
            @include('layouts.footer')
        </div>
    </section>

    <script>
        // --- LOGIC HANGING CAROUSEL (FIXED BUGS: SPAM CLICK & DIRECTION) ---
        let modernCurrentSlide = 0;
        const hangingItems = document.querySelectorAll('.hanging-item'); 
        const totalModernSlides = hangingItems.length;
        let modernAutoSlideInterval;
        
        // FIX 1: Variabel Arah (1 = Kanan, -1 = Kiri)
        let autoSlideDirection = 1; 
        
        // FIX 2: Flag Animasi untuk Mencegah Spam Click
        let isAnimating = false; 

        function updateModernCarousel() {
            const items = document.querySelectorAll('.hanging-item');
            
            items.forEach((item, index) => {
                item.classList.remove('active', 'prev', 'next');
                
                // Logika Circular Buffer
                if (index === modernCurrentSlide) {
                    item.classList.add('active');
                } else if (index === (modernCurrentSlide - 1 + totalModernSlides) % totalModernSlides) {
                    item.classList.add('prev');
                } else if (index === (modernCurrentSlide + 1) % totalModernSlides) {
                    item.classList.add('next');
                }
            });
        }

        // Helper: Pindah slide sejauh step (+1 atau -1)
        function moveSlideStep(step) {
            modernCurrentSlide = (modernCurrentSlide + step + totalModernSlides) % totalModernSlides;
            updateModernCarousel();
        }

        // --- HANDLER TOMBOL NEXT/PREV ---
        function modernNextSlide() {
            // FIX: Cek apakah animasi sedang berjalan? Jika ya, stop.
            if(isAnimating) return;

            isAnimating = true; // Kunci tombol
            
            autoSlideDirection = 1; // Set arah ke kanan (user preference)
            moveSlideStep(1);
            resetModernAutoSlide();

            // Lepaskan kunci setelah durasi CSS selesai (0.8 detik = 800ms)
            setTimeout(() => { isAnimating = false; }, 800);
        }

        function modernPrevSlide() {
            if(isAnimating) return;

            isAnimating = true;

            autoSlideDirection = -1; // Set arah ke kiri (user preference)
            moveSlideStep(-1);
            resetModernAutoSlide();

            setTimeout(() => { isAnimating = false; }, 800);
        }

        // --- AUTO SLIDE ---
        function autoSlideTick() {
            // Auto slide bergerak sesuai arah terakhir yang dipilih user
            moveSlideStep(autoSlideDirection);
        }

        function startModernAutoSlide() {
            if(modernAutoSlideInterval) clearInterval(modernAutoSlideInterval);
            modernAutoSlideInterval = setInterval(autoSlideTick, 4000); // 4 detik
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
            if (divisionCurrentIndex < maxIndex) {
                divisionCurrentIndex++;
            } else {
                divisionCurrentIndex = 0;
            }
            updateDivisionCarousel();
        }

        function prevDivision() {
            if (divisionCurrentIndex > 0) {
                divisionCurrentIndex--;
            } else {
                const maxIndex = divisionCards.length - getVisibleCards();
                divisionCurrentIndex = maxIndex;
            }
            updateDivisionCarousel();
        }

        // --- TEAM CAROUSEL ---
        let teamCurrentIndex = 0;
        const teamTrack = document.getElementById('teamCarouselTrack');
        const teamCards = document.querySelectorAll('.team-card');

        function getVisibleTeamCards() {
            if (window.innerWidth >= 1024) return 4;
            if (window.innerWidth >= 768) return 2;
            return 1;
        }

        function updateTeamCarousel() {
            if(teamCards.length > 0 && teamTrack) {
                const cardStyle = window.getComputedStyle(teamTrack);
                const gap = parseFloat(cardStyle.gap) || 24;
                const cardWidth = teamCards[0].offsetWidth;
                const moveAmount = (cardWidth + gap) * teamCurrentIndex;
                teamTrack.style.transform = `translateX(-${moveAmount}px)`;
            }
        }

        function nextTeam() {
            const maxIndex = teamCards.length - getVisibleTeamCards();
            if (teamCurrentIndex < maxIndex) {
                teamCurrentIndex++;
            } else {
                teamCurrentIndex = 0;
            }
            updateTeamCarousel();
        }

        function prevTeam() {
            if (teamCurrentIndex > 0) {
                teamCurrentIndex--;
            } else {
                const maxIndex = teamCards.length - getVisibleTeamCards();
                teamCurrentIndex = maxIndex;
            }
            updateTeamCarousel();
        }

        // --- INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', () => {
            if(hangingItems.length > 0) {
                updateModernCarousel();
                startModernAutoSlide();
                
                const wrapper = document.querySelector('.hanging-container');
                if(wrapper) {
                    // Pause on Hover
                    wrapper.addEventListener('mouseenter', () => clearInterval(modernAutoSlideInterval));
                    wrapper.addEventListener('mouseleave', () => startModernAutoSlide());
                    
                    // Swipe Support
                    let touchStartX = 0;
                    wrapper.addEventListener('touchstart', e => touchStartX = e.changedTouches[0].screenX);
                    wrapper.addEventListener('touchend', e => {
                        const touchEndX = e.changedTouches[0].screenX;
                        // Mencegah swipe jika animasi sedang berjalan
                        if (!isAnimating) {
                            if (touchEndX < touchStartX - 50) modernNextSlide();
                            if (touchEndX > touchStartX + 50) modernPrevSlide();
                        }
                    });
                }
            }

            updateDivisionCarousel();
            updateTeamCarousel();
        });

        window.addEventListener('resize', () => {
            divisionCurrentIndex = 0;
            teamCurrentIndex = 0;
            updateDivisionCarousel();
            updateTeamCarousel();
        });
    </script>
</body>
</html>