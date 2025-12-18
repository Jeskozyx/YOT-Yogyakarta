<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event - YOT Jogja</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        
        .date-badge {
            transform: skewX(-12deg);
        }
        .date-badge span {
            transform: skewX(12deg);
            display: inline-block;
        }
    </style>
</head>
<body class="bg-white text-gray-900">

    @include('layouts.navbar_users')

    <div class="pt-32 pb-20 container mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold italic uppercase tracking-wider mb-2">
                <span class="text-yellow-400 text-6xl mr-2">/</span> NEWS & EVENT
            </h1>
            <p class="text-xl font-semibold text-gray-500 italic">YOT Yogyakarta / Activities</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">

            <a href="{{ route('event.detail', ['id' => 1]) }}" class="group block">
                <div class="overflow-hidden w-full h-64 mb-4 relative">
                    <img src="https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=800&auto=format&fit=crop" 
                         alt="Event 1" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="mb-3">
                    <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                        <span>19 Nov 2025</span>
                    </div>
                </div>
                <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                    YOT National Conference 2025: Menginspirasi Generasi Muda
                </h3>
            </a>

            <a href="{{ route('event.detail', ['id' => 2]) }}" class="group block">
                <div class="overflow-hidden w-full h-64 mb-4 relative">
                    <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?q=80&w=800&auto=format&fit=crop" 
                         alt="Event 2" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="mb-3">
                    <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                        <span>13 Nov 2025</span>
                    </div>
                </div>
                <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                    Muda Sukses Roadshow: Kunjungan ke Kampus UGM dan UNY
                </h3>
            </a>

            <a href="{{ route('event.detail', ['id' => 3]) }}" class="group block">
                <div class="overflow-hidden w-full h-64 mb-4 relative">
                    <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=800&auto=format&fit=crop" 
                         alt="Event 3" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="mb-3">
                    <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                        <span>12 Nov 2025</span>
                    </div>
                </div>
                <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                    Workshop Public Speaking bersama Mentor Profesional YOT
                </h3>
            </a>

            <a href="{{ route('event.detail', ['id' => 4]) }}" class="group block">
                <div class="overflow-hidden w-full h-64 mb-4 relative">
                    <img src="https://images.unsplash.com/photo-1531058020387-3be344556be6?q=80&w=800&auto=format&fit=crop" 
                         alt="Event 4" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="mb-3">
                    <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                        <span>10 Okt 2025</span>
                    </div>
                </div>
                <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                    Social Campaign: Aksi Bersih Pantai Parangtritis
                </h3>
            </a>

            <a href="{{ route('event.detail', ['id' => 5]) }}" class="group block">
                <div class="overflow-hidden w-full h-64 mb-4 relative">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=800&auto=format&fit=crop" 
                         alt="Event 5" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="mb-3">
                    <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                        <span>05 Okt 2025</span>
                    </div>
                </div>
                <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                    Love Donation: Donor Darah Serentak Bersama PMI
                </h3>
            </a>

            <a href="{{ route('event.detail', ['id' => 6]) }}" class="group block">
                <div class="overflow-hidden w-full h-64 mb-4 relative">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b955?q=80&w=800&auto=format&fit=crop" 
                         alt="Event 6" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="mb-3">
                    <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                        <span>01 Okt 2025</span>
                    </div>
                </div>
                <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                    Gathering Member Baru Batch 15 YOT Yogyakarta
                </h3>
            </a>

        </div>

        @if(request('all'))
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12 mt-12 animate-fade-in-up">
                
                <a href="{{ route('event.detail', ['id' => 7]) }}" class="group block">
                    <div class="overflow-hidden w-full h-64 mb-4 relative">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop" 
                             alt="Event 7" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="mb-3">
                        <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                            <span>28 Sep 2025</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                        Company Visit: Belajar Budaya Kerja di Startup Unicorn
                    </h3>
                </a>

                <a href="{{ route('event.detail', ['id' => 8]) }}" class="group block">
                    <div class="overflow-hidden w-full h-64 mb-4 relative">
                        <img src="https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?q=80&w=800&auto=format&fit=crop" 
                             alt="Event 8" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="mb-3">
                        <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                            <span>15 Sep 2025</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                        Webinar Series: Mental Health Awareness untuk Mahasiswa
                    </h3>
                </a>

                <a href="{{ route('event.detail', ['id' => 9]) }}" class="group block">
                    <div class="overflow-hidden w-full h-64 mb-4 relative">
                        <img src="https://images.unsplash.com/photo-1560439514-e960a3ef5019?q=80&w=800&auto=format&fit=crop" 
                             alt="Event 9" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="mb-3">
                        <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                            <span>10 Sep 2025</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300">
                        YOT Green Campaign: Penanaman 1000 Bakau
                    </h3>
                </a>

            </div>
        @endif


        <div class="mt-20 flex justify-center">
            @if(!request('all'))
                <a href="{{ route('event', ['all' => 'true']) }}" class="px-6 py-2 border-2 border-black font-bold text-black hover:bg-black hover:text-white transition duration-300 uppercase tracking-widest text-sm inline-block">
                    View All Events
                </a>
            @else
                <a href="{{ route('event') }}" class="px-6 py-2 border-2 border-gray-400 text-gray-400 hover:border-black hover:text-black transition duration-300 uppercase tracking-widest text-sm inline-block">
                    Show Less
                </a>
            @endif
        </div>

    </div>

</body>
</html>