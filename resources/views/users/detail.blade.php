@include('layouts.navbar_users')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ strtoupper($division ?? 'Division') }} - YOT Yogyakarta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .activity-card {
            transition: all 0.3s ease;
        }
        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Custom scrollbar for modal members list */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 to-white font-[Inter]">
    
    @php
        $divisionData = [
            'technology' => [
                'name' => 'TECHNOLOGY',
                'description' => 'Mengasah kemampuan digital dan inovasi teknologi untuk menciptakan perubahan positif.',
                'color' => '#FFF000',
                'textColor' => 'text-black',
                'image' => 'images/divisi/Technology.png'
            ],
            'green' => [
                'name' => 'GREEN',
                'description' => 'Menggerakkan kepedulian terhadap bumi melalui aksi nyata demi lingkungan berkelanjutan.',
                'color' => '#262626',
                'textColor' => 'text-white',
                'image' => '/images/divisi/Green.png'
            ],
            'catalyst' => [
                'name' => 'CATALYST',
                'description' => 'Menginspirasi lewat dunia pendidikan dan membangun ekosistem belajar yang seru dan bermanfaat.',
                'color' => '#FFF000',
                'textColor' => 'text-black',
                'image' => '/images/divisi/Catalyst.png'
            ],
            'energy' => [
                'name' => 'ENERGY',
                'description' => 'Meningkatkan kesadaran akan pentingnya kesehatan fisik dan mental bagi produktivitas anak muda.',
                'color' => '#262626',
                'textColor' => 'text-white',
                'image' => '/images/divisi/Energy.png'
            ],
            'entrepreneurship' => [
                'name' => 'ENTREPRENEURSHIP',
                'description' => 'Mendorong semangat kewirausahaan dan kemandirian ekonomi di kalangan pemuda.',
                'color' => '#FFF000',
                'textColor' => 'text-black',
                'image' => '/images/divisi/Enterpreneurship.png'
            ],
            'social' => [
                'name' => 'SOCIAL',
                'description' => 'Menumbuhkan jiwa sosial dan kepedulian terhadap sesama melalui berbagai kegiatan amal.',
                'color' => '#262626',
                'textColor' => 'text-white',
                'image' => '/images/divisi/Social.png'
            ],
            'marcomm' => [
                'name' => 'MARCOMM',
                'description' => 'Mengembangkan kemampuan komunikasi dan branding untuk memperluas dampak positif organisasi.',
                'color' => '#FFF000',
                'textColor' => 'text-black',
                'image' => '/images/divisi/Marcomm.png'
            ],
        ];

        $currentDivision = $divisionData[$division] ?? $divisionData['technology'];
        
        // Ambil data kegiatan dari database berdasarkan divisi
        $events = \App\Models\Event::where('divisi', $currentDivision['name'])->latest()->get();
        
        // Siapkan data untuk carousel dari foto-foto kegiatan
        $carouselImages = [];
        foreach($events as $event) {
            if($event->foto) {
                $carouselImages[] = [
                    'src' => asset('storage/' . $event->foto),
                    'alt' => $event->nama_kegiatan,
                    'title' => $event->nama_kegiatan
                ];
            }
        }
        
        // Jika tidak ada foto dari database, gunakan default images
        if(empty($carouselImages)) {
            $defaultImages = ['BSOD.png'];
            foreach($defaultImages as $image) {
                $carouselImages[] = [
                    'src' => asset('images/carousel/' . $image),
                    'alt' => pathinfo($image, PATHINFO_FILENAME),
                    'title' => 'Default Image'
                ];
            }
        }
        
        // Group images untuk carousel (2 per slide)
        $slidesPerView = count($carouselImages) >= 4 ? 2 : 1;
        $carouselSlides = array_chunk($carouselImages, $slidesPerView);
    @endphp

    <main class="w-full max-w-7xl mx-auto py-10 px-4 sm:px-8 lg:px-16">
        
        <div class="mb-12 text-center">
            <div class="inline-block px-8 py-3 rounded-full mb-4 shadow-lg" style="background-color: {{ $currentDivision['color'] }}">
                <h1 class="text-4xl md:text-5xl font-extrabold {{ $currentDivision['textColor'] }}">
                    {{ $currentDivision['name'] }}
                </h1>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <div class="rounded-3xl overflow-hidden shadow-2xl border-4" style="border-color: {{ $currentDivision['color'] }}">
                @if(isset($currentDivision['image']) && file_exists(public_path($currentDivision['image'])))
                    <img src="{{ asset($currentDivision['image']) }}" alt="{{ $currentDivision['name'] }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full aspect-square bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-image text-6xl text-gray-400 mb-4"></i>
                            <p class="text-gray-500 font-semibold">{{ $currentDivision['name'] }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">About {{ $currentDivision['name'] }}</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    {{ $currentDivision['description'] }}
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: {{ $currentDivision['color'] }}">
                            <i class="fas fa-check {{ $currentDivision['textColor'] }}"></i>
                        </div>
                        <p class="text-gray-700">Mengembangkan skill dan knowledge anggota</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: {{ $currentDivision['color'] }}">
                            <i class="fas fa-check {{ $currentDivision['textColor'] }}"></i>
                        </div>
                        <p class="text-gray-700">Menyelenggarakan program dan kegiatan berkualitas</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: {{ $currentDivision['color'] }}">
                            <i class="fas fa-check {{ $currentDivision['textColor'] }}"></i>
                        </div>
                        <p class="text-gray-700">Memberikan dampak positif bagi masyarakat</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-8">Gallery Kegiatan</h2>
            <p class="text-center text-xl text-gray-700 mb-8">Dokumentasi kegiatan dan momen {{ $currentDivision['name'] }}</p>
            
            <div class="relative">
                <div class="carousel-container overflow-hidden rounded-3xl ">
                    <div id="divisionCarouselTrack" class="carousel-track flex transition-transform duration-700 ease-in-out">
                        @foreach ($carouselSlides as $slideIndex => $slideImages)
                            <div class="carousel-slide min-w-full flex justify-center items-center p-4 gap-4">
                                @foreach ($slideImages as $image)
                                    <div class="relative w-full max-w-2xl aspect-video rounded-2xl overflow-hidden shadow-2xl border-4" style="border-color: {{ $currentDivision['color'] }}">
                                        <img src="{{ $image['src'] }}" 
                                            alt="{{ $image['alt'] }}" 
                                            class="w-full h-full object-cover">
                                        <!-- <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                                            <p class="text-sm font-semibold">{{ $image['title'] }}</p>
                                        </div> -->
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                <button onclick="previousGallerySlide()" 
                        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 md:p-4 rounded-full shadow-xl transition-all duration-300 hover:scale-110 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8 text-gray-800">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button onclick="nextGallerySlide()" 
                        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 md:p-4 rounded-full shadow-xl transition-all duration-300 hover:scale-110 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 md:w-8 md:h-8 text-gray-800">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                <div class="flex justify-center gap-2 mt-6">
                    @for ($i = 0; $i < count($carouselSlides); $i++)
                        <button onclick="goToGallerySlide({{ $i }})" 
                                class="gallery-indicator w-3 h-3 rounded-full transition-all duration-300 {{ $i === 0 ? 'w-8' : 'bg-gray-300 hover:bg-gray-400' }}"
                                style="{{ $i === 0 ? 'background-color: ' . $currentDivision['color'] : '' }}"
                                data-index="{{ $i }}">
                        </button>
                    @endfor
                </div>
            </div>
        </div>

        <div class="mb-16">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Kegiatan & Program</h2>
                <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">
                    {{ $events->count() }} Kegiatan
                </span>
            </div>

            @if($events->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events as $event)
                        <div class="activity-card bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100 relative group">
                            <div class="relative h-48 overflow-hidden">
                                @if($event->foto && file_exists(public_path('storage/' . $event->foto)))
                                    <img src="{{ asset('storage/' . $event->foto) }}" 
                                         alt="{{ $event->nama_kegiatan }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-calendar text-4xl text-gray-400"></i>
                                    </div>
                                @endif
                                
                                <div class="absolute top-4 right-4">
                                    <span class="bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $event->tanggal_pelaksanaan->format('d M') }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $event->nama_kegiatan }}</h3>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                    {{ Str::limit($event->deskripsi, 100) }}
                                </p>
                                <div class="flex items-center justify-between text-sm text-gray-500">
                                    <div class="flex items-center gap-2">
                                        <i class="far fa-calendar"></i>
                                        <span>{{ $event->tanggal_pelaksanaan->format('d M Y') }}</span>
                                    </div>
                                    @if($event->anggota && count($event->anggota) > 0)
                                        <div class="flex items-center gap-1">
                                            <i class="fas fa-users"></i>
                                            <span>{{ count($event->anggota) }} Anggota</span>
                                        </div>
                                    @endif
                                </div>
                                <button onclick="openEventModal({{ $event->id }})" class="mt-4 w-full px-4 py-2 bg-gray-50 hover:bg-gray-100 text-gray-900 text-sm font-semibold rounded-lg transition-colors duration-200 border border-gray-200">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <i class="fas fa-calendar-plus text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Kegiatan</h3>
                    <p class="text-gray-500 mb-4">Divisi {{ $currentDivision['name'] }} belum memiliki kegiatan yang tercatat.</p>
                    @auth
                        <a href="{{ route('kegiatan') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            <i class="fas fa-plus mr-2"></i>Tambah Kegiatan Pertama
                        </a>
                    @endauth
                </div>
            @endif
        </div>

        <div class="text-center py-16 px-8 rounded-3xl shadow-xl" style="background-color: {{ $currentDivision['color'] }}">
            <h2 class="text-3xl md:text-4xl font-bold {{ $currentDivision['textColor'] }} mb-4">
                Tertarik Bergabung?
            </h2>
            <p class="{{ $currentDivision['textColor'] }} text-lg mb-8 opacity-90">
                Jadilah bagian dari {{ $currentDivision['name'] }} dan berkontribusi untuk perubahan positif!
            </p>
            <a href="{{ url('/') }}" class="inline-block px-8 py-4 bg-white text-gray-900 font-bold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                Kembali ke Beranda
            </a>
        </div>

    </main>

    <div id="eventModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" aria-hidden="true" onclick="closeEventModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border-4" style="border-color: {{ $currentDivision['color'] }}">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start flex-col">
                        
                        <div id="modal-image-wrapper" class="w-full mb-4 hidden rounded-xl overflow-hidden shadow-md">
                            <img id="modal-image" src="" alt="Foto Kegiatan" class="w-full h-48 sm:h-64 object-cover">
                        </div>

                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-2xl leading-6 font-bold text-gray-900 mb-2" id="modal-title"></h3>
                            <div class="flex items-center justify-center sm:justify-start gap-2 text-gray-500 mb-4">
                                <i class="fas fa-map-marker-alt"></i>
                                <span id="modal-location" class="text-sm font-medium"></span>
                            </div>
                            <div class="flex items-center justify-center sm:justify-start gap-2 text-gray-500 mb-4">
                                <i class="far fa-calendar"></i>
                                <span id="modal-date" class="text-sm font-medium"></span>
                            </div>
                            
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 mb-6 leading-relaxed" id="modal-description"></p>
                                
                                <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <i class="fas fa-users text-gray-400"></i>
                                    Anggota yang Terlibat
                                </h4>
                                <div id="modal-members" class="space-y-2 max-h-60 overflow-y-auto pr-2 custom-scrollbar">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200" onclick="closeEventModal()">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Event Data
        const eventsData = {
            @foreach($events as $event)
            {{ $event->id }}: {
                // FIXED: Menggunakan asset() untuk URL lengkap, bukan hanya nama file
                foto: "{{ $event->foto ? asset('storage/' . $event->foto) : '' }}",
                title: "{{ $event->nama_kegiatan }}",
                location: "{{ $event->lokasi_kegiatan }}",
                date: "{{ $event->tanggal_pelaksanaan->format('d M Y') }}",
                description: `{{ $event->deskripsi }}`,
                members: @json($event->anggota)
            },
            @endforeach
        };

        function openEventModal(id) {
            const event = eventsData[id];
            if (!event) return;

            // --- Logic Gambar Modal ---
            const imageWrapper = document.getElementById('modal-image-wrapper');
            const imageElement = document.getElementById('modal-image');

            if (event.foto) {
                imageElement.src = event.foto;
                imageWrapper.classList.remove('hidden');
            } else {
                imageWrapper.classList.add('hidden');
            }
            // ---------------------------

            document.getElementById('modal-title').textContent = event.title;
            document.getElementById('modal-date').textContent = event.date;
            document.getElementById('modal-location').textContent = event.location;
            document.getElementById('modal-description').textContent = event.description;

            const membersContainer = document.getElementById('modal-members');
            membersContainer.innerHTML = '';

            if (event.members && event.members.length > 0) {
                event.members.forEach(member => {
                    const memberDiv = document.createElement('div');
                    memberDiv.className = 'flex justify-between items-center bg-gray-50 p-3 rounded-xl border border-gray-100 hover:bg-gray-100 transition-colors duration-200';
                    
                    // Handle both old format (string) and new format (object)
                    let name = member;
                    let role = 'Anggota';
                    
                    if (typeof member === 'object' && member !== null) {
                        name = member.nama;
                        role = member.jabatan;
                    }

                    memberDiv.innerHTML = `
                        <span class="font-medium text-sm text-gray-900">${name}</span>
                        <span class="text-xs font-semibold text-gray-600 bg-gray-200 px-3 py-1 rounded-full">${role}</span>
                    `;
                    membersContainer.appendChild(memberDiv);
                });
            } else {
                membersContainer.innerHTML = `
                    <div class="text-center py-4 text-gray-400">
                        <i class="fas fa-user-slash mb-2"></i>
                        <p class="text-sm italic">Tidak ada data anggota.</p>
                    </div>
                `;
            }

            document.getElementById('eventModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeEventModal() {
            document.getElementById('eventModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Gallery Carousel functionality
        let currentGallerySlide = 0;
        const totalGallerySlides = {{ count($carouselSlides) }};
        const divisionColor = '{{ $currentDivision["color"] }}';

        function updateGalleryCarousel() {
            const track = document.getElementById('divisionCarouselTrack');
            track.style.transform = `translateX(-${currentGallerySlide * 100}%)`;
            
            document.querySelectorAll('.gallery-indicator').forEach((indicator, index) => {
                if (index === currentGallerySlide) {
                    indicator.classList.remove('bg-gray-300', 'hover:bg-gray-400');
                    indicator.classList.add('w-8');
                    indicator.style.backgroundColor = divisionColor;
                } else {
                    indicator.classList.remove('w-8');
                    indicator.classList.add('bg-gray-300', 'hover:bg-gray-400');
                    indicator.style.backgroundColor = '';
                }
            });
        }

        function nextGallerySlide() {
            currentGallerySlide = (currentGallerySlide + 1) % totalGallerySlides;
            updateGalleryCarousel();
        }

        function previousGallerySlide() {
            currentGallerySlide = (currentGallerySlide - 1 + totalGallerySlides) % totalGallerySlides;
            updateGalleryCarousel();
        }

        function goToGallerySlide(index) {
            currentGallerySlide = index;
            updateGalleryCarousel();
        }

        // Auto-slide functionality
        let autoSlideInterval = setInterval(() => {
            nextGallerySlide();
        }, 4000);

        // Pause auto-slide on hover
        document.addEventListener('DOMContentLoaded', () => {
            const carouselContainer = document.querySelector('.carousel-container');
            
            if (carouselContainer) {
                carouselContainer.addEventListener('mouseenter', () => {
                    clearInterval(autoSlideInterval);
                });

                carouselContainer.addEventListener('mouseleave', () => {
                    autoSlideInterval = setInterval(() => {
                        nextGallerySlide();
                    }, 4000);
                });
            }
        });
    </script>

</body>
</html>