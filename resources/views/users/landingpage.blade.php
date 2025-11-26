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
    <style>
/* Floating Animation */
.floating-image {
    animation: floating 3s ease-in-out infinite;
}

.floating-image-container {
    position: relative;
    overflow: hidden;
}

@keyframes floating {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0px);
    }
}

/* Optional: Different floating patterns for variety */
.division-card:nth-child(odd) .floating-image {
    animation: floating-odd 3.5s ease-in-out infinite;
}

.division-card:nth-child(even) .floating-image {
    animation: floating-even 4s ease-in-out infinite;
}

@keyframes floating-odd {
    0% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-12px) rotate(1deg);
    }
    100% {
        transform: translateY(0px) rotate(0deg);
    }
}

@keyframes floating-even {
    0% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-8px) rotate(-1deg);
    }
    100% {
        transform: translateY(0px) rotate(0deg);
    }
}

/* Hover effect enhancement */
.division-card:hover .floating-image {
    animation-duration: 1.5s;
    animation-timing-function: ease-out;
}

/* Smooth transition for the image */
.floating-image {
    transition: transform 0.3s ease;
}
</style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-gray-50 to-white font-[Inter]">
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-100 via-blue-50 to-pink-100 opacity-60"></div>
            <div class="absolute top-0 -left-3 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-blob"></div>
            <div class="absolute top-36 -right-4 w-72 h-72 bg-[#FFF000] rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-[FF52D3] rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 py-20 relative z-10">
            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 tracking-tight">
                    YOUNG ON TOP
                    <span class="text-4xl block text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-blue-500">
                        YOGYAKARTA
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Komunitas anak muda Indonesia yang hadir untuk menginspirasi dan membentuk generasi penerus bangsa yang 
                    <span class="font-bold text-black">strong, smart,</span> dan <span class="font-bold text-black">positive</span>.
                </p>
            </div>


            <!-- <div class="max-w-4xl mx-auto mb-16 animate-fade-in-up animation-delay-200">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 md:p-12 shadow-2xl border border-gray-200">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 text-center">ABOUT US</h2>
                    <div class="space-y-4 text-gray-700 text-lg leading-relaxed">
                        <p>
                            Didirikan oleh <span class="font-semibold text-gray-900">Billy Boen</span>, YOT fokus pada pengembangan skill, knowledge, dan attitude anak muda agar mampu
                            mencapai kesuksesan di usia muda sekaligus memberi dampak positif bagi sekitarnya.
                        </p>
                        <p>
                            Dengan semangat <span class="italic font-bold text-black">"Learn and Share"</span>, YOT percaya bahwa setiap anak muda punya potensi besar untuk tumbuh dan berkontribusi.
                        </p>
                        <p class="font-semibold text-gray-900 text-center">
                            Melalui berbagai program inspiratif, pelatihan, dan kegiatan sosial di bawah 6 pilar utama:
                        </p>
                    </div>
                </div>
            </div>

            <div class="max-w-4xl mx-auto mb-16 animate-fade-in-up animation-delay-400">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                    @php
                        $pillars = [
                            ['name' => 'Pendidikan', 'color' => '#FFF000', 'textColor' => 'text-black'],
                            ['name' => 'Kesehatan', 'color' => '#262626', 'textColor' => 'text-white'],
                            ['name' => 'Lingkungan', 'color' => '#FFF000', 'textColor' => 'text-black'],
                            ['name' => 'Sosial', 'color' => '#FFF000', 'textColor' => 'text-black'],
                            ['name' => 'UKM', 'color' => '#262626', 'textColor' => 'text-white'],
                            ['name' => 'Teknologi', 'color' => '#FFF000', 'textColor' => 'text-black'],
                        ];
                    @endphp

                    @foreach ($pillars as $pillar)
                        <div class="flex justify-center">
                            <button class="w-full max-w-[180px] h-12 md:h-14 flex items-center justify-center font-bold text-sm md:text-base rounded-full transition-all duration-300 hover:-translate-y-1 hover:shadow-xl {{ $pillar['textColor'] }} transform hover:scale-105"
                                style="background: {{ $pillar['color'] }}; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                                {{ $pillar['name'] }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div> -->


            <!-- MODERN 3D CAROUSEL SECTION -->
            <div class="max-w-7xl mx-auto mb-10 animate-fade-in-up animation-delay-600">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-8">Our Programs</h2>
                <p class="text-center text-xl text-gray-700 mb-12">Program-program YOT bertujuan untuk membangun dan memberdayakan generasi muda Yogyakarta.</p>        
                
                <div class="relative">
                    <!-- Main Carousel -->
                    <div class="modern-carousel-wrapper relative h-[500px] md:h-[600px] mb-8">
                        <div class="carousel-stage relative w-full h-full perspective-1000">
                            @php
                                $carouselImages = [
                                    'BSOD.png',
                                    'Earthday_Dark.png',
                                    'Earthday_Light.png',
                                    'm4.jpg',
                                    'wallpaperflare.com_wallpaper (4).jpg',                          
                                    'maps.png',
                                    'wallpaperflare.com_wallpaper (4).jpg',
                                    'maps.png',
                                ];
                            @endphp

                            @foreach ($carouselImages as $index => $imageName)
                                <div class="carousel-item absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[85%] md:w-[70%] h-[80%] transition-all duration-700 ease-out rounded-3xl overflow-hidden shadow-2xl {{ $index === 0 ? 'active' : '' }}" 
                                     data-index="{{ $index }}">
                                    <img src="{{ asset('images/carousel/' . $imageName) }}" 
                                         alt="{{ pathinfo($imageName, PATHINFO_FILENAME) }}" 
                                         class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                        <h3 class="text-2xl md:text-3xl font-bold mb-2">Program {{ $index + 1 }}</h3>
                                        <p class="text-sm md:text-base opacity-90">{{ pathinfo($imageName, PATHINFO_FILENAME) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Navigation Buttons -->
                        <button onclick="modernPrevSlide()" 
                                class="nav-btn-left absolute left-4 md:left-8 top-1/2 -translate-y-1/2 bg-white/95 hover:bg-white p-4 rounded-full shadow-2xl transition-all duration-300 hover:scale-110 z-20 backdrop-blur-sm border border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6 text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                        <button onclick="modernNextSlide()" 
                                class="nav-btn-right absolute right-4 md:right-8 top-1/2 -translate-y-1/2 bg-white/95 hover:bg-white p-4 rounded-full shadow-2xl transition-all duration-300 hover:scale-110 z-20 backdrop-blur-sm border border-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6 text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>

                    <!-- Progress Bar -->
                    <div class="relative w-full h-1 bg-gray-200 rounded-full mb-6 overflow-hidden">
                        <div id="progressBar" class="absolute left-0 top-0 h-full bg-gradient-to-r from-purple-500 to-pink-500 transition-all duration-300 rounded-full"></div>
                    </div>

                    <!-- Thumbnail Navigation -->
                    <div class="flex justify-center gap-3 overflow-x-auto pb-4 px-4 scrollbar-hide">
                        @foreach ($carouselImages as $index => $imageName)
                            <button onclick="modernGoToSlide({{ $index }})" 
                                    class="thumbnail-btn flex-shrink-0 w-20 h-20 md:w-14 md:h-14 rounded-xl overflow-hidden border-2 transition-all duration-300 hover:scale-105 {{ $index === 0 ? 'border-purple-500 ring-4 ring-purple-200' : 'border-gray-300 opacity-60 hover:opacity-100' }}"
                                    data-thumb-index="{{ $index }}">
                                <img src="{{ asset('images/carousel/' . $imageName) }}" 
                                     alt="Thumbnail {{ $index + 1 }}" 
                                     class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>

                    <!-- Counter -->
                    <div class="text-center mt-4">
                        <span class="inline-block bg-white px-6 py-2 rounded-full shadow-lg font-semibold text-gray-700">
                            <span id="currentSlideNum">1</span> / <span id="totalSlidesNum">{{ count($carouselImages) }}</span>
                        </span>
                    </div>
                </div>
            </div>

        <div class="max-w-8xl mx-auto mb-20 mt-20 animate-fade-in-up animation-delay-800">
            <div class="relative mb-16">
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 z-10">
                    <h2 class="bg-white px-8 py-2 rounded-full text-3xl font-extrabold text-gray-900 shadow-lg tracking-wider border-2 border-gray-100 uppercase">Our Division</h2>
                </div>
                <div class="bg-[#FFF000] rounded-[3rem] p-10 pt-16 md:p-16 md:pt-20 shadow-xl text-center relative overflow-hidden">
                    <p class="text-gray-900 text-lg md:text-xl font-medium leading-relaxed max-w-4xl mx-auto">
                        YOT memiliki tujuh divisi: Catalyst (pendidikan), Energy (kesehatan), Green (lingkungan), Entrepreneurship (kewirausahaan), Social (sosial), Technology (teknologi), dan Marcomm (komunikasi & branding). Seluruhnya berkolaborasi membangun ekosistem positif bagi generasi muda untuk belajar, berbagi, dan berkembang bersama.
                    </p>
                </div>
            </div>

            <div class="relative px-4 md:px-12">
                <div class="division-carousel-container overflow-hidden py-4">
                    <div id="divisionCarouselTrack" class="flex transition-transform duration-500 ease-in-out gap-6">
                        @php
                            $divisions = [
                                [
                                    'name' => 'TECHNOLOGY',
                                    'description' => 'Mengasah kemampuan digital dan inovasi teknologi untuk menciptakan perubahan positif.',
                                    'icon' => 'M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z',
                                    'image' => '/images/divisi/Technology.png',
                                    'animation_delay' => '0s'
                                ],
                                [
                                    'name' => 'GREEN',
                                    'description' => 'Menggerakkan kepedulian terhadap bumi melalui aksi nyata demi lingkungan berkelanjutan.',
                                    'icon' => 'M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.413 1.68l-1.225.956a1.5 1.5 0 00-.499 1.199 1.5 1.5 0 00.499 1.199l1.225.956c.582.373.782 1.125.413 1.68-.428.643-1.23.96-1.95.53-1.005-.603-2.133-.954-3.342-.954-1.209 0-2.337.35-3.342.953-.72.43-1.522.113-1.95-.53-.369-.555-.169-1.307.413-1.68l1.225.956a1.5 1.5 0 00.499-1.199 1.5 1.5 0 00-.499-1.199l-1.225-.956c-.582-.373-.782-1.125-.413-1.68.252-.38.632-.622 1.04-.664l.143-.048a2.25 2.25 0 011.161-.886l.51-.766a1.125 1.125 0 00.216-1.49l-1.068-.89a1.125 1.125 0 01-.405-.864V3.03a11.25 11.25 0 1110.5 0z',
                                    'image' => '/images/divisi/Green.png',
                                    'animation_delay' => '0.1s'
                                ],
                                [
                                    'name' => 'CATALYST',
                                    'description' => 'Menginspirasi lewat dunia pendidikan dan membangun ekosistem belajar yang seru dan bermanfaat.',
                                    'icon' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5',
                                    'image' => '/images/divisi/Catalyst.png',
                                    'animation_delay' => '0.2s'
                                ],
                                [
                                    'name' => 'ENERGY',
                                    'description' => 'Meningkatkan kesadaran akan pentingnya kesehatan fisik dan mental bagi produktivitas anak muda.',
                                    'icon' => 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z',
                                    'image' => '/images/divisi/Energy.png',
                                    'animation_delay' => '0.3s'
                                ],
                                [
                                    'name' => 'ENTREPRENEURSHIP',
                                    'description' => 'Mendorong semangat kewirausahaan dan kemandirian ekonomi di kalangan pemuda.',
                                    'icon' => 'M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                                    'image' => '/images/divisi/Enterpreneurship.png',
                                    'animation_delay' => '0.4s'
                                ],
                                [
                                    'name' => 'SOCIAL',
                                    'description' => 'Menumbuhkan jiwa sosial dan kepedulian terhadap sesama melalui berbagai kegiatan amal.',
                                    'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z',
                                    'image' => '/images/divisi/Social.png',
                                    'animation_delay' => '0.5s'
                                ],
                                [
                                    'name' => 'MARCOMM',
                                    'description' => 'Menumbuhkan jiwa sosial dan kepedulian terhadap sesama melalui berbagai kegiatan amal.',
                                    'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z',
                                    'image' => '/images/divisi/Marcomm.png',
                                    'animation_delay' => '0.6s'
                                ],
                            ];
                        @endphp

                        @foreach ($divisions as $division)
                            <div class="division-card min-w-full md:min-w-[calc(33.333%-16px)] bg-white rounded-3xl p-6 shadow-lg flex flex-col items-center text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                                <div class="w-full aspect-square mb-6 rounded-2xl border-2 border-[#FFF000] bg-white relative overflow-hidden group">
                                    @if(isset($division['image']) && $division['image'])
                                        <div class="floating-image-container w-full h-full overflow-hidden">
                                            <img 
                                                src="{{ asset($division['image']) }}" 
                                                alt="{{ $division['name'] }}" 
                                                class="w-full h-full object-cover floating-image"
                                                style="animation-delay: {{ $division['animation_delay'] ?? '0s' }};"
                                            >
                                        </div>
                                    @else
                                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                                            <div class="w-24 h-24 bg-yellow-100 rounded-full mb-2 flex items-center justify-center floating-image" style="animation-delay: {{ $division['animation_delay'] ?? '0s' }};">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-yellow-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $division['icon'] }}" />
                                                </svg>
                                            </div>
                                            <span class="font-serif italic text-2xl text-yellow-500 transform -rotate-12 floating-image" style="animation-delay: {{ $division['animation_delay'] ?? '0s' }};">Photo Example</span>
                                        </div>
                                    @endif
                                </div>
                                <h3 class="bg-[#FFF000] px-6 py-1 rounded-full text-xl font-extrabold text-gray-900 mb-4 shadow-sm inline-block">
                                    {{ $division['name'] }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-grow">
                                    {{ $division['description'] }}
                                </p>
                                <a href="{{ route('division.detail', strtolower($division['name'])) }}" class="mt-auto px-6 py-2 bg-[#4F53EA] hover:bg-[#42C4E3] text-white font-bold rounded-full transition-colors duration-300 shadow-md hover:shadow-lg inline-block">
                                    Detail
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button onclick="prevDivision()" 
                        class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-xl transition-all duration-300 hover:scale-110 z-10 -ml-4 md:-ml-6 border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-gray-800">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button onclick="nextDivision()" 
                        class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-xl transition-all duration-300 hover:scale-110 z-10 -mr-4 md:-mr-6 border border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-gray-800">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>
            <!-- Our Event Section -->
            <div class="max-w-8xl mx-auto mb-24 animate-fade-in-up animation-delay-600">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12">Our Event</h2>
                
                <div class="space-y-6 px-4 md:px-12">
                    @php
                        $events = [
                            [
                                'type' => 'Webinar',
                                'date' => '9 October 2025',
                                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                'image' => '/images/events/12-Light.jpg'
                            ],
                            [
                                'type' => 'Workshop',
                                'date' => '15 October 2025',
                                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                'image' => '/images/events/1715195505778.jpg'
                            ],
                            [
                                'type' => 'Seminar',
                                'date' => '22 October 2025',
                                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                                'image' => '/images/events/lol2.jpg'
                            ],
                        ];
                    @endphp

                    @foreach ($events as $event)
                        <div class="flex flex-col md:flex-row gap-6 bg-gradient-to-r from-yellow-50 to-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-yellow-200">
                            <!-- Event Image -->
                            <div class="w-full md:w-64 flex-shrink-0">
                                <div class="aspect-[4/3] rounded-xl overflow-hidden border-4 border-[#FFF000] bg-yellow-100 relative">
                                    @if(isset($event['image']) && file_exists(public_path($event['image'])))
                                        <img src="{{ asset($event['image']) }}" alt="{{ $event['type'] }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 mx-auto text-yellow-500 mb-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                </svg>
                                                <span class="font-serif italic text-xl text-yellow-600">Photo Example</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Event Details -->
                            <div class="flex-1 flex flex-col">
                                <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-3">{{ $event['type'] }}</h3>
                                <div class="flex items-center gap-2 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-gray-500 font-medium">{{ $event['date'] }}</span>
                                </div>
                                <div class="bg-white rounded-2xl p-4 border-2 border-yellow-300 flex-1">
                                    <p class="text-gray-700 leading-relaxed">{{ $event['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Meet The Team Section -->
            <div class="max-w-8xl mx-auto mb-24 animate-fade-in-up animation-delay-600">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12">Meet The Developers</h2>
                
                <div class="relative px-4 md:px-12">
                    <div class="team-carousel-container overflow-hidden py-4">
                        <div id="teamCarouselTrack" class="flex transition-transform duration-500 ease-in-out gap-6">
                            @php
                                $teamMembers = [
                                    ['name' => 'Billy Boen', 'role' => 'Founder', 'image' => 'images/team/Muhammad Sulthan Al Azzam_124230127.png'],
                                    ['name' => 'Stevanus Gunawan', 'role' => 'Co-Founder', 'image' => 'images/divisi/IMG_2437.JPG'],
                                    ['name' => 'Yance Muchtar', 'role' => 'Advisor', 'image' => 'https://ui-avatars.com/api/?name=Yance+Muchtar&background=0D8ABC&color=fff&size=512'],
                                    ['name' => 'Noverica Widjojo', 'role' => 'Director', 'image' => 'https://ui-avatars.com/api/?name=Noverica+Widjojo&background=0D8ABC&color=fff&size=512'],
                                    ['name' => 'Team Member 5', 'role' => 'Staff', 'image' => 'https://ui-avatars.com/api/?name=Team+Member+5&background=0D8ABC&color=fff&size=512'],
                                    ['name' => 'Team Member 6', 'role' => 'Staff', 'image' => 'https://ui-avatars.com/api/?name=Team+Member+6&background=0D8ABC&color=fff&size=512'],
                                ];
                            @endphp

                            @foreach ($teamMembers as $member)
                                <div class="team-card min-w-full md:min-w-[calc(50%-12px)] lg:min-w-[calc(25%-18px)] flex flex-col items-center group">
                                    <div class="w-full aspect-[3/4] mb-6 rounded-2xl overflow-hidden shadow-lg relative">
                                        <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                                            <span class="text-white font-medium">{{ $member['role'] }}</span>
                                        </div>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 text-center">{{ $member['name'] }}</h3>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <button onclick="prevTeam()" 
                            class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-xl transition-all duration-300 hover:scale-110 z-10 -ml-4 md:-ml-6 border border-gray-100 text-gray-800 hover:text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button onclick="nextTeam()" 
                            class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-xl transition-all duration-300 hover:scale-110 z-10 -mr-4 md:-mr-6 border border-gray-100 text-gray-800 hover:text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex justify-center animate-fade-in-up animation-delay-1000 mb-20">
                <button class="group relative px-12 py-5 bg-gradient-to-r from-[#FFF000] to-[#FFF000] text-black font-bold text-xl rounded-full shadow-2xl hover:shadow-yellow-500/50 transition-all duration-300 hover:scale-105 hover:-translate-y-1 overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        JOIN US NOW
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 group-hover:translate-x-1 transition-transform">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-300 to-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </div>
            @include('layouts.footer')
    </section>

    <style>
        /* Animation Keyframes */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
            opacity: 0;
        }

        .animation-delay-400 {
            animation-delay: 0.4s;
            opacity: 0;
        }

        .animation-delay-600 {
            animation-delay: 0.6s;
            opacity: 0;
        }

        .animation-delay-800 {
            animation-delay: 0.8s;
            opacity: 0;
        }

        /* Modern 3D Carousel Styles */
        .perspective-1000 {
            perspective: 1000px;
        }

        .carousel-item {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0.8) rotateY(20deg);
            pointer-events: none;
            z-index: 1;
        }

        .carousel-item.active {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1) rotateY(0deg);
            pointer-events: auto;
            z-index: 10;
        }

        .carousel-item.prev {
            opacity: 0.5;
            transform: translate(-120%, -50%) scale(0.85) rotateY(25deg);
            z-index: 5;
        }

        .carousel-item.next {
            opacity: 0.5;
            transform: translate(20%, -50%) scale(0.85) rotateY(-25deg);
            z-index: 5;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @media (max-width: 768px) {
            .carousel-item.prev,
            .carousel-item.next {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.7);
            }
        }
    </style>

    <script>
        // Modern 3D Carousel
        let modernCurrentSlide = 0;
        const totalModernSlides = {{ count($carouselImages) }};
        let modernAutoSlideInterval;

        function updateModernCarousel() {
            const items = document.querySelectorAll('.carousel-item');
            
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

            // Update thumbnails
            document.querySelectorAll('.thumbnail-btn').forEach((btn, index) => {
                if (index === modernCurrentSlide) {
                    btn.classList.remove('border-gray-300', 'opacity-60');
                    btn.classList.add('border-purple-500', 'ring-4', 'ring-purple-200');
                } else {
                    btn.classList.remove('border-purple-500', 'ring-4', 'ring-purple-200');
                    btn.classList.add('border-gray-300', 'opacity-60');
                }
            });

            // Update progress bar
            const progressPercent = ((modernCurrentSlide + 1) / totalModernSlides) * 100;
            document.getElementById('progressBar').style.width = progressPercent + '%';

            // Update counter
            document.getElementById('currentSlideNum').textContent = modernCurrentSlide + 1;
        }

        function modernNextSlide() {
            modernCurrentSlide = (modernCurrentSlide + 1) % totalModernSlides;
            updateModernCarousel();
            resetModernAutoSlide();
        }

        function modernPrevSlide() {
            modernCurrentSlide = (modernCurrentSlide - 1 + totalModernSlides) % totalModernSlides;
            updateModernCarousel();
            resetModernAutoSlide();
        }

        function modernGoToSlide(index) {
            modernCurrentSlide = index;
            updateModernCarousel();
            resetModernAutoSlide();
        }

        function startModernAutoSlide() {
            modernAutoSlideInterval = setInterval(() => {
                modernNextSlide();
            }, 5000);
        }

        function resetModernAutoSlide() {
            clearInterval(modernAutoSlideInterval);
            startModernAutoSlide();
        }

        // Division Carousel Functionality
        let divisionCurrentIndex = 0;
        const divisionTrack = document.getElementById('divisionCarouselTrack');
        const divisionCards = document.querySelectorAll('.division-card');
        const totalDivisions = divisionCards.length;
        
        function getVisibleCards() {
            return window.innerWidth >= 768 ? 3 : 1;
        }

        function updateDivisionCarousel() {
            if(divisionCards.length > 0) {
                const cardStyle = window.getComputedStyle(divisionTrack);
                const gapValue = parseFloat(cardStyle.gap) || 0;
                const cardWidthPx = divisionCards[0].offsetWidth;
                const moveAmount = (cardWidthPx + gapValue) * divisionCurrentIndex;
                
                divisionTrack.style.transform = `translateX(-${moveAmount}px)`;
            }
        }

        function nextDivision() {
            const visibleCards = getVisibleCards();
            if (divisionCurrentIndex < totalDivisions - visibleCards) {
                divisionCurrentIndex++;
                updateDivisionCarousel();
            } else {
                divisionCurrentIndex = 0;
                updateDivisionCarousel();
            }
        }

        function prevDivision() {
            const visibleCards = getVisibleCards();
            if (divisionCurrentIndex > 0) {
                divisionCurrentIndex--;
                updateDivisionCarousel();
            } else {
                divisionCurrentIndex = totalDivisions - visibleCards;
                updateDivisionCarousel();
            }
        }

        // Team Carousel Functionality
        let teamCurrentIndex = 0;
        const teamTrack = document.getElementById('teamCarouselTrack');
        const teamCards = document.querySelectorAll('.team-card');
        const totalTeamMembers = teamCards.length;

        function getVisibleTeamCards() {
            if (window.innerWidth >= 1024) return 4;
            if (window.innerWidth >= 768) return 2;
            return 1;
        }

        function updateTeamCarousel() {
            if(teamCards.length > 0) {
                const cardStyle = window.getComputedStyle(teamTrack);
                const gapValue = parseFloat(cardStyle.gap) || 0;
                const cardWidthPx = teamCards[0].offsetWidth;
                const moveAmount = (cardWidthPx + gapValue) * teamCurrentIndex;
                
                teamTrack.style.transform = `translateX(-${moveAmount}px)`;
            }
        }

        function nextTeam() {
            const visibleCards = getVisibleTeamCards();
            if (teamCurrentIndex < totalTeamMembers - visibleCards) {
                teamCurrentIndex++;
                updateTeamCarousel();
            } else {
                teamCurrentIndex = 0;
                updateTeamCarousel();
            }
        }

        function prevTeam() {
            const visibleCards = getVisibleTeamCards();
            if (teamCurrentIndex > 0) {
                teamCurrentIndex--;
                updateTeamCarousel();
            } else {
                teamCurrentIndex = totalTeamMembers - visibleCards;
                updateTeamCarousel();
            }
        }

        // Initialize on DOM load
        document.addEventListener('DOMContentLoaded', () => {
            // Modern carousel
            updateModernCarousel();
            startModernAutoSlide();

            // Pause on hover
            const carouselWrapper = document.querySelector('.modern-carousel-wrapper');
            carouselWrapper.addEventListener('mouseenter', () => {
                clearInterval(modernAutoSlideInterval);
            });
            carouselWrapper.addEventListener('mouseleave', () => {
                startModernAutoSlide();
            });

            // Other carousels
            updateDivisionCarousel();
            updateTeamCarousel();
        });

        // Handle resize
        window.addEventListener('resize', () => {
            divisionCurrentIndex = 0;
            teamCurrentIndex = 0;
            updateDivisionCarousel();
            updateTeamCarousel();
        });

        // Touch support for modern carousel
        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('DOMContentLoaded', () => {
            const carouselWrapper = document.querySelector('.modern-carousel-wrapper');

            carouselWrapper.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });

            carouselWrapper.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleModernSwipe();
            });

            function handleModernSwipe() {
                if (touchEndX < touchStartX - 50) {
                    modernNextSlide();
                }
                if (touchEndX > touchStartX + 50) {
                    modernPrevSlide();
                }
            }
        });
    </script>
</body>
</html>