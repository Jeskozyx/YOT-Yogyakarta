<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->nama_kegiatan }} - YOT Jogja</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/app.css'])
    
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-white text-gray-900">

    @include('layouts.navbar_users')

    <div class="pt-32 pb-20 container mx-auto px-4 max-w-4xl">
        
        <a href="{{ route('event') }}" class="inline-flex items-center text-gray-600 hover:text-yellow-500 mb-8 font-semibold transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Event
        </a>

        <h1 class="text-3xl md:text-5xl font-extrabold mb-6 leading-tight text-gray-900">
            {{ $event->nama_kegiatan }}
        </h1>

        <div class="flex items-center space-x-4 mb-8 text-gray-500 font-medium">
            <span class="bg-yellow-400 text-black px-3 py-1 font-bold text-sm uppercase tracking-wider rounded-sm">{{ $event->divisi }}</span>
            <span><i class="far fa-calendar ml-2 mr-1"></i> {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d F Y') }}</span>
            @if($event->lokasi_kegiatan)
            <span class="hidden md:inline"><i class="fas fa-map-marker-alt ml-2 mr-1"></i> {{ $event->lokasi_kegiatan }}</span>
            @endif
        </div>

        <img src="{{ asset('storage/' . $event->foto) }}" 
             onerror="this.src='https://via.placeholder.com/1200x600?text=Event+YOT'"
             alt="{{ $event->nama_kegiatan }}" 
             class="w-full h-auto object-cover rounded-xl shadow-2xl mb-10 border border-gray-100">

        <div class="prose prose-lg text-gray-700 leading-relaxed max-w-none">
            <p class="font-semibold text-xl mb-4 text-gray-800">Deskripsi Kegiatan:</p>
            <div class="whitespace-pre-line">
                {{ $event->deskripsi }}
            </div>

            <!-- Additional content can be dynamic or static as per request -->
            <h3 class="text-2xl font-bold mt-10 mb-4 text-gray-900">Detail Kegiatan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                    <p class="font-bold text-gray-900">Lokasi</p>
                    <p>{{ $event->lokasi_kegiatan ?? 'TBA' }}</p>
                </div>
                <!-- Add more details if available in DB -->
            </div>

            <div class="mt-10 p-8 bg-yellow-50 rounded-2xl border-2 border-yellow-200 text-center md:text-left md:flex items-center justify-between">
                <div>
                    <h4 class="font-bold text-xl mb-2 text-gray-900">Tertarik bergabung?</h4>
                    <p class="text-gray-700">Ikuti instagram kami untuk update terbaru.</p>
                </div>
                <a href="https://instagram.com/yotyogyakarta" target="_blank" class="mt-4 md:mt-0 inline-block bg-black text-white px-8 py-3 font-bold rounded-full hover:bg-yellow-400 hover:text-black hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    Kunjungi Instagram
                </a>
            </div>
        </div>

    </div>

    @include('layouts.footer')

</body>
</html>