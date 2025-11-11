@include('layout.navbar_users')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>YOT Yogya</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-[Inter]">
    {{-- Padding top supaya tidak tertutup navbar --}}
    <main class="px-10 pt-[100px] pb-20">
        <h1 class="text-3xl md:text-4xl font-bold text-center tracking-widest mb-8">ABOUT US</h1>

        <div class="max-w-4xl mx-auto text-center text-gray-800 space-y-4 leading-relaxed">
            <p>
                Komunitas anak muda Indonesia yang hadir untuk menginspirasi dan membentuk generasi penerus bangsa yang strong,
                smart, dan positive.
            </p>
            <p>
                Didirikan oleh Billy Boen, YOT fokus pada pengembangan skill, knowledge, dan attitude anak muda agar mampu
                mencapai kesuksesan di usia muda sekaligus memberi dampak positif bagi sekitarnya.
            </p>
            <p>
                Dengan semangat <span class="italic font-medium">“Learn and Share”</span>, YOT percaya bahwa setiap anak muda punya potensi besar untuk tumbuh dan berkontribusi.
            </p>
            <p>
                Melalui berbagai program inspiratif, pelatihan, dan kegiatan sosial di bawah 6 pilar utama
            </p>
        </div>

        {{-- Grid 2 baris x 3 kolom, semua sejajar --}}
        <div class="mt-20 max-w-4xl mx-auto">
            <div class="grid grid-cols-3 sm:grid-cols-3 gap-x-5 gap-y-4 place-items-center">
                <!-- Baris 1 (kolom 1,2,3) -->
                <div class="w-full flex justify-center">
                    <button
                        class="w-[210px] h-[56px] flex items-center justify-center text-black font-bold text-lg rounded-[24px] transition-transform"
                        style="background: #FFF000; box-shadow: 1px 8px 12px rgba(0,0,0,0.18);">
                        Pendidikan
                    </button>
                </div>

                <div class="w-full flex justify-center">
                    <button
                        class="w-[218px] h-[60px] flex items-center justify-center text-white font-bold text-lg rounded-[24px] transition-transform"
                        style="background: #262626; box-shadow: 1px 8px 12px rgba(0,0,0,0.18);">
                        Kesehatan
                    </button>
                </div>

                <div class="w-full flex justify-center">
                    <button
                        class="w-[210px] h-[56px] flex items-center justify-center text-black font-bold text-lg rounded-[24px] transition-transform"
                        style="background: #FFF000; box-shadow: 1px 8px 12px rgba(0,0,0,0.18);">
                        Lingkungan
                    </button>
                </div>

                <!-- Baris 2 (kolom 1,2,3) -->
                <div class="w-full flex justify-center">
                    <button
                        class="w-[210px] h-[56px] flex items-center justify-center text-black font-bold text-lg rounded-[24px] transition-transform hover:bg-opacity/50 hover:text-black"
                        style="background: #FFF000; box-shadow: 1px 8px 12px rgba(0,0,0,0.18);">
                        Sosial
                    </button>
                </div>

                <div class="w-full flex justify-center">
                    <button
                        class="w-[218px] h-[58px] flex items-center justify-center text-white font-bold text-lg rounded-[24px] transition-transform hover:bg-opacity/50 hover:text-white"
                        style="background: #262626; box-shadow: 1px 8px 12px rgba(0,0,0,0.18);">
                        UKM
                    </button>
                </div>

                <div class="w-full flex justify-center">
                    <button
                        class="w-[210px] h-[56px] flex items-center justify-center text-black font-bold text-lg rounded-[24px] transition-transform hover:bg-opacity/50 hover:text-black"
                        style="background: #FFF000; box-shadow: 1px 8px 12px rgba(0,0,0,0.18);">
                        Teknologi
                    </button>
                </div>
            </div>
        </div>
    </main>

    {{-- Opsional: efek hover sedikit naik --}}
    <style>
        button.transition-transform:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 18px rgba(0,0,0,0.12) !important;
        }
    </style>
</body>
</html>
