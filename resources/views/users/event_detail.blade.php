<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Event - YOT Jogja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-white text-gray-900">

    @include('layouts.navbar_users')

    {{-- 
        =======================================================
        SIMULASI DATABASE (DATA DUMMY)
        Karena belum ada database, kita taruh datanya di sini.
        =======================================================
    --}}
    @php
        $events = [
            1 => [
                'title' => 'YOT National Conference 2025: Menginspirasi Generasi Muda',
                'date' => '19 Nov 2025',
                'image' => 'https://images.unsplash.com/photo-1544531586-fde5298cdd40?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Young On Top National Conference (YOTNC) kembali hadir di tahun 2025! Ajang pertemuan pemuda terbesar ini akan menghadirkan pembicara-pembicara inspiratif dari berbagai industri. Temukan insight baru tentang karir, bisnis, dan pengembangan diri.',
            ],
            2 => [
                'title' => 'Muda Sukses Roadshow: Kunjungan ke Kampus UGM dan UNY',
                'date' => '13 Nov 2025',
                'image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Tim YOT Yogyakarta melakukan roadshow ke kampus-kampus ternama. Kami berbagi pengalaman tentang bagaimana membangun networking sejak kuliah dan mempersiapkan diri menghadapi dunia kerja.',
            ],
            3 => [
                'title' => 'Workshop Public Speaking bersama Mentor Profesional YOT',
                'date' => '12 Nov 2025',
                'image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Ingin tampil percaya diri di depan umum? Ikuti workshop intensif ini dimana kamu akan belajar teknik vokal, bahasa tubuh, dan cara menyusun materi presentasi yang memukau.',
            ],
            4 => [
                'title' => 'Social Campaign: Aksi Bersih Pantai Parangtritis',
                'date' => '10 Okt 2025',
                'image' => 'https://images.unsplash.com/photo-1531058020387-3be344556be6?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Bentuk kepedulian YOTers terhadap lingkungan. Kami mengajak 100 relawan untuk membersihkan sampah plastik di sepanjang pantai Parangtritis. Mari jaga bumi kita!',
            ],
            5 => [
                'title' => 'Love Donation: Donor Darah Serentak Bersama PMI',
                'date' => '05 Okt 2025',
                'image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Setetes darahmu nyawa bagi sesama. Bekerjasama dengan PMI Yogyakarta, kami mengadakan aksi donor darah rutin yang terbuka untuk umum.',
            ],
            6 => [
                'title' => 'Gathering Member Baru Batch 15 YOT Yogyakarta',
                'date' => '01 Okt 2025',
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b955?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Selamat datang keluarga baru! Gathering ini bertujuan untuk mempererat tali persaudaraan antar member baru Batch 15 dengan pengurus YOT Yogyakarta.',
            ],
            7 => [
                'title' => 'Company Visit: Belajar Budaya Kerja di Startup Unicorn',
                'date' => '28 Sep 2025',
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Kunjungan eksklusif ke kantor startup teknologi terkemuka. Peserta diajak melihat langsung suasana kerja yang dinamis dan berdiskusi dengan tim HRD.',
            ],
            8 => [
                'title' => 'Webinar Series: Mental Health Awareness untuk Mahasiswa',
                'date' => '15 Sep 2025',
                'image' => 'https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Kesehatan mental sama pentingnya dengan kesehatan fisik. Webinar ini membahas cara mengelola stres akademik dan burnout di kalangan mahasiswa.',
            ],
            9 => [
                'title' => 'YOT Green Campaign: Penanaman 1000 Bakau',
                'date' => '10 Sep 2025',
                'image' => 'https://images.unsplash.com/photo-1560439514-e960a3ef5019?q=80&w=1200&auto=format&fit=crop',
                'desc' => 'Aksi nyata untuk mencegah abrasi. Kami menanam 1000 bibit bakau di pesisir pantai Kulon Progo sebagai wujud komitmen menjaga kelestarian alam.',
            ],
        ];

        // Ambil data berdasarkan ID yang dikirim dari URL
        // Jika ID tidak ada di list, tampilkan data default/kosong
        $data = $events[$id] ?? null;
    @endphp


    <div class="pt-32 pb-20 container mx-auto px-4 max-w-4xl">
        
        <a href="{{ route('event') }}" class="inline-flex items-center text-gray-600 hover:text-yellow-500 mb-8 font-semibold transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Event
        </a>

        @if($data)
            <h1 class="text-3xl md:text-5xl font-extrabold mb-6 leading-tight text-gray-900">
                {{ $data['title'] }}
            </h1>

            <div class="flex items-center space-x-4 mb-8 text-gray-500 font-medium">
                <span class="bg-yellow-400 text-black px-3 py-1 font-bold text-sm uppercase tracking-wider">EVENT</span>
                <span><i class="far fa-calendar ml-2 mr-1"></i> {{ $data['date'] }}</span>
            </div>

            <img src="{{ $data['image'] }}" 
                 alt="{{ $data['title'] }}" 
                 class="w-full h-auto object-cover rounded-xl shadow-2xl mb-10 border border-gray-100">

            <div class="prose prose-lg text-gray-700 leading-relaxed max-w-none">
                <p class="font-semibold text-xl mb-4 text-gray-800">Deskripsi Kegiatan:</p>
                <p>{{ $data['desc'] }}</p>
                
                <p class="mt-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>

                <h3 class="text-2xl font-bold mt-8 mb-4 text-gray-900">Apa yang akan kamu dapatkan?</h3>
                <ul class="list-disc pl-5 space-y-2">
                    <li>E-Sertifikat Nasional</li>
                    <li>Networking dengan mahasiswa se-Yogyakarta</li>
                    <li>Ilmu praktis dari narasumber ahli</li>
                    <li>Snack dan Merchandise eksklusif YOT</li>
                </ul>

                <div class="mt-10 p-6 bg-yellow-50 rounded-xl border border-yellow-200">
                    <h4 class="font-bold text-lg mb-2">Tertarik bergabung?</h4>
                    <p class="mb-4">Segera daftarkan dirimu sebelum kuota habis!</p>
                    <button class="bg-black text-white px-6 py-3 font-bold rounded hover:bg-yellow-500 hover:text-black transition-all duration-300">
                        Daftar Sekarang
                    </button>
                </div>
            </div>

        @else
            <div class="text-center py-20">
                <h2 class="text-4xl font-bold text-gray-300 mb-4">404</h2>
                <p class="text-xl text-gray-500">Maaf, Event tidak ditemukan.</p>
            </div>
        @endif

    </div>

</body>
</html>