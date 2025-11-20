@include('layout.navbar_users')

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


            <div class="max-w-6xl mx-auto mb-10 animate-fade-in-up animation-delay-600">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-8">Our Programs</h2>
                <p class="text-center text-xl text-gray-700 mb-8">Program-program YOT bertujuan untuk membangun dan memberdayakan generasi muda Yogyakarta.</p>        
                <div class="relative">
                    <div class="carousel-container overflow-hidden rounded-3xl">
                        <div id="carouselTrack" class="carousel-track flex transition-transform duration-700 ease-in-out">
                            @php
                                // Easy to edit: Just add or remove image filenames here
                                $carouselImages = [
                                    'BSOD.png',
                                    'Earthday_Dark.png',
                                    'Earthday_Light.png',
                                    'm4.jpg',
                                    'wallpaperflare.com_wallpaper (4).jpg',
                                    'ien.jpg',
                                    'maps.png',
                                    'maps.png',
                                    'wallpaperflare.com_wallpaper (4).jpg',
                                    'ien.jpg',
                                    'maps.png',
                                ];
                                
                                // Group images 
                                $slidesPerView = count($carouselImages) >= 4 ? 2 : 1;
                                $slides = array_chunk($carouselImages, $slidesPerView);
                            @endphp

                            @foreach ($slides as $slideImages)
                                <div class="carousel-slide min-w-full flex justify-center items-center p-4 gap-4">
                                    @foreach ($slideImages as $imageName)
                                        <div class="relative w-full max-w-2xl aspect-video rounded-2xl overflow-hidden shadow-2xl">
                                            <img src="{{ asset('images/carousel/' . $imageName) }}" 
                                                alt="{{ pathinfo($imageName, PATHINFO_FILENAME) }}" 
                                                class="w-full h-full object-cover">
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button onclick="previousSlide()" 
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 md:p-4 rounded-full shadow-xl transition-all duration-300 hover:scale-110 z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8 text-gray-800">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button onclick="nextSlide()" 
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 md:p-4 rounded-full shadow-xl transition-all duration-300 hover:scale-110 z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8 text-gray-800">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>

                    <div class="flex justify-center gap-2 mt-6">
                        @for ($i = 0; $i < count($slides); $i++)
                            <button onclick="goToSlide({{ $i }})" 
                                    class="carousel-indicator w-3 h-3 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-purple-600 w-8' : 'bg-gray-300 hover:bg-gray-400' }}"
                                    data-index="{{ $i }}">
                            </button>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="max-w-6xl mx-auto mb-20 mt-20 animate-fade-in-up animation-delay-800">
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
                                        'image' => '/images/divisi/IMG_2437.JPG'
                                    ],
                                    [
                                        'name' => 'GREEN',
                                        'description' => 'Menggerakkan kepedulian terhadap bumi melalui aksi nyata demi lingkungan berkelanjutan.',
                                        'icon' => 'M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.413 1.68l-1.225.956a1.5 1.5 0 00-.499 1.199 1.5 1.5 0 00.499 1.199l1.225.956c.582.373.782 1.125.413 1.68-.428.643-1.23.96-1.95.53-1.005-.603-2.133-.954-3.342-.954-1.209 0-2.337.35-3.342.953-.72.43-1.522.113-1.95-.53-.369-.555-.169-1.307.413-1.68l1.225.956a1.5 1.5 0 00.499-1.199 1.5 1.5 0 00-.499-1.199l-1.225-.956c-.582-.373-.782-1.125-.413-1.68.252-.38.632-.622 1.04-.664l.143-.048a2.25 2.25 0 011.161-.886l.51-.766a1.125 1.125 0 00.216-1.49l-1.068-.89a1.125 1.125 0 01-.405-.864V3.03a11.25 11.25 0 1110.5 0z',
                                        'image' => '/images/divisi/IMG_2437.JPG'
                                    ],
                                    [
                                        'name' => 'CATALYST',
                                        'description' => 'Menginspirasi lewat dunia pendidikan dan membangun ekosistem belajar yang seru dan bermanfaat.',
                                        'icon' => 'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5',
                                        'image' => '/images/divisi/IMG_2437.JPG'
                                    ],
                                    [
                                        'name' => 'ENERGY',
                                        'description' => 'Meningkatkan kesadaran akan pentingnya kesehatan fisik dan mental bagi produktivitas anak muda.',
                                        'icon' => 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z',
                                        'image' => '/images/divisi/IMG_2437.JPG'
                                    ],
                                    [
                                        'name' => 'ENTREPRENEURSHIP',
                                        'description' => 'Mendorong semangat kewirausahaan dan kemandirian ekonomi di kalangan pemuda.',
                                        'icon' => 'M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                                        'image' => '/images/divisi/IMG_2437.JPG'
                                    ],
                                    [
                                        'name' => 'SOCIAL',
                                        'description' => 'Menumbuhkan jiwa sosial dan kepedulian terhadap sesama melalui berbagai kegiatan amal.',
                                        'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z',
                                        'image' =>'/images/divisi/IMG_2437.JPG'
                                    ],
                                    [
                                        'name' => 'MARCOMM',
                                        'description' => 'Mengembangkan kemampuan komunikasi dan branding untuk memperluas dampak positif organisasi.',
                                        'icon' => 'M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 018.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46',
                                        'image' => '/images/divisi/IMG_2437.JPG'
                                    ]
                                ];
                            @endphp

                            @foreach ($divisions as $division)
                                <div class="division-card min-w-full md:min-w-[calc(33.333%-16px)] bg-white rounded-3xl p-6 shadow-lg flex flex-col items-center text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                                    <div class="w-full aspect-square mb-6 rounded-2xl border-2 border-[#FFF000] bg-white relative overflow-hidden group">
                                        @if(isset($division['image']) && $division['image'])
                                            <img src="{{ asset($division['image']) }}" alt="{{ $division['name'] }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                                <div class="w-24 h-24 bg-yellow-100 rounded-full mb-2 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-yellow-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $division['icon'] }}" />
                                                    </svg>
                                                </div>
                                                <span class="font-serif italic text-2xl text-yellow-500 transform -rotate-12">Photo Example</span>
                                            </div>
                                        @endif
                                    </div>
                                    <h3 class="bg-[#FFF000] px-6 py-1 rounded-full text-xl font-extrabold text-gray-900 mb-4 shadow-sm inline-block">
                                        {{ $division['name'] }}
                                    </h3>
                                    <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-grow">
                                        {{ $division['description'] }}
                                    </p>
                                    <button class="mt-auto px-6 py-2 bg-[#4F53EA] hover:bg-[#42C4E3] text-white font-bold rounded-full transition-colors duration-300 shadow-md hover:shadow-lg">
                                        Detail
                                    </button>
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

            <!-- Meet The Team Section -->
            <div class="max-w-7xl mx-auto mb-24 animate-fade-in-up animation-delay-1000">
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
                    <!-- Footer / Contact Us Section -->
        <div class="max-w-6xl mx-auto animate-fade-in-up animation-delay-1000">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">
                <!-- Left Column: Contact Form -->
                <div class="bg-[#FFF000] rounded-[2.5rem] p-8 md:p-10 shadow-xl relative overflow-hidden">
                    <h2 class="text-4xl font-extrabold text-black mb-2">Contact Us</h2>
                    <p class="text-black font-medium mb-1">Tertarik untuk berkolaborasi?</p>
                    <p class="text-black text-sm mb-6 leading-relaxed">
                        Hubungi kami melalui form di bawah ini. Kami siap mendiskusikan peluang kerja sama lebih lanjut.
                    </p>

                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <input type="text" placeholder="Nama Lengkap" class="w-full px-4 py-3 rounded-xl border border-yellow-500 bg-[#FFF000]/50 placeholder-gray-700 text-black focus:outline-none focus:ring-2 focus:ring-black focus:bg-yellow-200 transition-all" required>
                        </div>
                        <div>
                            <input type="text" placeholder="No Whatsapp" class="w-full px-4 py-3 rounded-xl border border-yellow-500 bg-[#FFF000]/50 placeholder-gray-700 text-black focus:outline-none focus:ring-2 focus:ring-black focus:bg-yellow-200 transition-all" required>
                        </div>
                        <div>
                            <input type="email" placeholder="Email" class="w-full px-4 py-3 rounded-xl border border-yellow-500 bg-[#FFF000]/50 placeholder-gray-700 text-black focus:outline-none focus:ring-2 focus:ring-black focus:bg-yellow-200 transition-all" required>
                        </div>
                        <div>
                            <textarea placeholder="Pesan ...." rows="4" class="w-full px-4 py-3 rounded-xl border border-yellow-500 bg-[#FFF000]/50 placeholder-gray-700 text-black focus:outline-none focus:ring-2 focus:ring-black focus:bg-yellow-200 transition-all resize-none" required></textarea>
                        </div>
                        <button type="submit" class="bg-black text-white font-bold py-3 px-8 rounded-full hover:bg-gray-800 transition-colors shadow-lg mt-2">
                            Submit
                        </button>
                    </form>
                </div>
                    <!-- Right Column: Contact Info & Map -->
                    <div class="flex flex-col h-full space-y-8">
                        <!-- Contact Details -->
                        <div class="space-y-4 text-gray-800">
                            <div class="flex items-start gap-4">
                                <div class="mt-1 bg-gray-100 p-2 rounded-full">
                                    <i class="fas fa-map-marker-alt text-gray-900"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Jl. Babarsari Jl. Tambak Bayan No.2, Janti, Caturtunggal</p>
                                    <p class="text-gray-600">Depok, Sleman, Yogyakarta</p>
                                </div>
                            </div>                   
                            <div class="flex items-center gap-4">
                                <div class="bg-gray-100 p-2 rounded-full">
                                    <i class="fas fa-envelope text-gray-900"></i>
                                </div>
                                <p class="text-gray-700">info@yotinspirasi.com (General)</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="bg-gray-100 p-2 rounded-full">
                                    <i class="fas fa-envelope text-gray-900"></i>
                                </div>
                                <p class="text-gray-700">brand@yotinspirasi.com (Partnership)</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="bg-gray-100 p-2 rounded-full">
                                    <i class="fas fa-phone-alt text-gray-900"></i>
                                </div>
                                <p class="text-gray-700">081385640560</p>
                            </div>       
                            <div class="flex items-center gap-4">
                                <div class="bg-gray-100 p-2 rounded-full">
                                    <i class="fab fa-whatsapp text-gray-900"></i>
                                </div>
                                <p class="text-gray-700">081385640560 (WhatsApp)</p>
                            </div>
                        </div>
                        <!-- Google Map -->
                        <div class="w-full h-64 md:h-full min-h-[300px] rounded-3xl overflow-hidden shadow-lg border border-gray-200">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2788.1766242797607!2d110.41597521867824!3d-7.781324937456133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599155555555%3A0x536eb168b1dca148!2sUniversitas%20Pembangunan%20Nasional%20%22Veteran%22%20Yogyakarta%20-%20Kampus%202%20Babarsari!5e1!3m2!1sid!2sid!4v1763609477629!5m2!1sid!2sid" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        /* Carousel Styles */
        .carousel-container {
            position: relative;
        }

        .carousel-track {
            display: flex;
        }

        .carousel-slide {
            min-width: 100%;
            flex-shrink: 0;
        }
    </style>

    <script>
        // Main Carousel functionality
        let currentSlide = 0;
        const totalSlides = {{ count($slides) }}; 
        let autoSlideInterval;

        function updateCarousel() {
            const track = document.getElementById('carouselTrack');
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            document.querySelectorAll('.carousel-indicator').forEach((indicator, index) => {
                if (index === currentSlide) {
                    indicator.classList.remove('bg-gray-300', 'hover:bg-gray-400');
                    indicator.classList.add('bg-purple-600', 'w-8');
                } else {
                    indicator.classList.remove('bg-purple-600', 'w-8');
                    indicator.classList.add('bg-gray-300', 'hover:bg-gray-400');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
            resetAutoSlide();
        }

        function previousSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateCarousel();
            resetAutoSlide();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
            resetAutoSlide();
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                nextSlide();
            }, 4000); 
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
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
            const visibleCards = getVisibleCards();
            const cardWidth = 100 / visibleCards;
            const gap = 24; // 1.5rem gap
            // Calculate translation: index * (100% / visible + gap adjustment)
            // Simplified: just translate by percentage of container width
            // Actually, with flex gap, it's a bit tricky. 
            // Let's use a simpler approach: translate by (index * (100/visible))%
            // But we need to account for the gap.
            // Alternatively, move by card width + gap.
            
            // Let's try a simpler percentage based translation assuming the gap is handled by padding/margin or calc
            // In the CSS above: min-w-[calc(33.333%-16px)] and gap-6 (24px)
            // 3 cards: (33.33% * 3) + gaps.
            
            // Let's use the card's offsetWidth + gap
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
                // Loop back to start
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
                // Loop to end
                divisionCurrentIndex = totalDivisions - visibleCards;
                updateDivisionCarousel();
            }
        }

        // Handle resize for division carousel
        window.addEventListener('resize', () => {
            divisionCurrentIndex = 0; // Reset on resize to avoid layout issues
            updateDivisionCarousel();
        });


        // Pause auto-slide on hover
        document.addEventListener('DOMContentLoaded', () => {
            const carouselContainer = document.querySelector('.carousel-container');
            
            carouselContainer.addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });

            carouselContainer.addEventListener('mouseleave', () => {
                startAutoSlide();
            });

            // Start auto-slide
            startAutoSlide();
            
            // Initial call for division carousel
            updateDivisionCarousel();
        });

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

        window.addEventListener('resize', () => {
            teamCurrentIndex = 0;
            updateTeamCarousel();
        });

        // Initial call for team carousel
        document.addEventListener('DOMContentLoaded', () => {
            updateTeamCarousel();
        });

        // Touch/swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('DOMContentLoaded', () => {
            const carouselContainer = document.querySelector('.carousel-container');

            carouselContainer.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });

            carouselContainer.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            });

            function handleSwipe() {
                if (touchEndX < touchStartX - 50) {
                    nextSlide();
                }
                if (touchEndX > touchStartX + 50) {
                    previousSlide();
                }
            }
        });
    </script>
</body>
</html>
