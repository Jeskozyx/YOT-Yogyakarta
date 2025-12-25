<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event - YOT Jogja</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css'])

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
        
        <div class="text-center mb-16 animate-fade-in-up">
            <h1 class="text-4xl md:text-5xl font-extrabold italic uppercase tracking-wider mb-2">
                <span class="text-yellow-400 text-6xl mr-2">/</span> NEWS & EVENT
            </h1>
            <p class="text-xl font-semibold text-gray-500 italic">YOT Yogyakarta / Events</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
            @forelse($events as $event)
                @if($loop->index < 6)
                <a href="{{ route('event.detail', $event->id) }}" class="group block">
                    <div class="overflow-hidden w-full h-64 mb-4 relative rounded-xl shadow-md group-hover:shadow-xl transition-shadow">
                        <img src="{{ asset('storage/' . $event->foto) }}" 
                             onerror="this.src='https://via.placeholder.com/800x600?text=Event+YOT'"
                             alt="{{ $event->nama_kegiatan }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="mb-3">
                        <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                            <span>{{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d M Y') }}</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300 line-clamp-2">
                        {{ $event->nama_kegiatan }}
                    </h3>
                </a>
                @endif
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500">Belum ada event terbaru.</p>
                </div>
            @endforelse
        </div>

        @if(request('all') && $events->count() > 6)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12 mt-12 animate-fade-in-up">
                @foreach($events->skip(6) as $event)
                <a href="{{ route('event.detail', $event->id) }}" class="group block">
                    <div class="overflow-hidden w-full h-64 mb-4 relative rounded-xl shadow-md group-hover:shadow-xl transition-shadow">
                        <img src="{{ asset('storage/' . $event->foto) }}" 
                             onerror="this.src='https://via.placeholder.com/800x600?text=Event+YOT'"
                             alt="{{ $event->nama_kegiatan }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="mb-3">
                        <div class="bg-black text-white text-sm font-bold px-4 py-1 inline-block date-badge">
                            <span>{{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d M Y') }}</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold leading-snug group-hover:text-yellow-500 transition-colors duration-300 line-clamp-2">
                        {{ $event->nama_kegiatan }}
                    </h3>
                </a>
                @endforeach
            </div>
        @endif


        <div class="mt-20 flex justify-center">
            @if(!request('all') && \App\Models\Event::count() > 6)
                <a href="{{ route('event', ['all' => 'true']) }}" class="px-6 py-2 border-2 border-black font-bold text-black hover:bg-black hover:text-white transition duration-300 uppercase tracking-widest text-sm inline-block rounded-full">
                    View All Events
                </a>
            @elseif(request('all'))
                <a href="{{ route('event') }}" class="px-6 py-2 border-2 border-gray-400 text-gray-400 hover:border-black hover:text-black transition duration-300 uppercase tracking-widest text-sm inline-block rounded-full">
                    Show Less
                </a>
            @endif
        </div>

    </div>

    @include('layouts.footer')

</body>
</html>