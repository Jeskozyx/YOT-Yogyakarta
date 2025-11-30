@include('layouts.navbar_users')

<html lang="en">
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
<body>
            <div class="max-w-4xl mx-auto mb-16 animate-fade-in-up animation-delay-200">
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

</body>
</html>