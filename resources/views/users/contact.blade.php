<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - YOT Jogja</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900">

    @include('layouts.navbar_users')

    <div class="pt-32 pb-20 container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 mb-16 items-start">
            
            <div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-black mb-6 tracking-tight">
                    Get In Touch
                    <span class="text-yellow-400">.</span>
                </h1>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    Kami senang mendengar dari Anda! Apakah Anda memiliki pertanyaan, tawaran kolaborasi, atau ingin tahu lebih banyak tentang program kami, tim kami siap membantu.
                </p>
                
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-yellow-400 hover:text-black transition-all">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-yellow-400 hover:text-black transition-all">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-yellow-400 hover:text-black transition-all">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                
                <div class="space-y-3">
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 mb-2">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                    </div>
                    <h3 class="font-bold text-xl text-black">Our Address</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Jl. Babarsari, Tambak Bayan No.2, Janti, Caturtunggal, Depok, Sleman, Yogyakarta 55281
                    </p>
                </div>

                <div class="space-y-3">
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 mb-2">
                        <i class="fas fa-phone-alt text-xl"></i>
                    </div>
                    <h3 class="font-bold text-xl text-black">Contact Info</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        0877-3843-8643 (WhatsApp)<br>
                        info@yotinspirasi.com<br>
                        brand@yotinspirasi.com
                    </p>
                </div>

            </div>
        </div>

        <div class="w-full h-[400px] md:h-[500px] rounded-[2.5rem] overflow-hidden shadow-xl border border-gray-100 mb-20 relative z-0">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.088329699664!2d110.41372577455365!3d-7.780456277196328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59f1fb2f2b45%3A0x2ae13541e29e5968!2sUniversitas%20Pembangunan%20Nasional%20%22Veteran%22%20Yogyakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-black">Send Us a Message</h2>
                <p class="text-gray-500 mt-2">Tertarik untuk berkolaborasi? Isi formulir di bawah ini.</p>
            </div>

            <form id="contactFormPage" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" id="namaPage" placeholder="Masukkan nama Anda" 
                               class="w-full px-6 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-yellow-400 focus:bg-white focus:ring-4 focus:ring-yellow-100 transition-all duration-300" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">No. WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" id="nowaPage" placeholder="Contoh: 08123456789" 
                               class="w-full px-6 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-yellow-400 focus:bg-white focus:ring-4 focus:ring-yellow-100 transition-all duration-300" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 ml-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" id="emailPage" placeholder="nama@email.com" 
                           class="w-full px-6 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-yellow-400 focus:bg-white focus:ring-4 focus:ring-yellow-100 transition-all duration-300" required>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700 ml-1">Pesan <span class="text-red-500">*</span></label>
                    <textarea id="pesanPage" rows="5" placeholder="Tulis pesan atau tawaran kolaborasi Anda di sini..." 
                              class="w-full px-6 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-yellow-400 focus:bg-white focus:ring-4 focus:ring-yellow-100 transition-all duration-300 resize-none" required></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full md:w-auto px-10 py-4 bg-yellow-400 text-black font-extrabold rounded-full hover:bg-black hover:text-white hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                        KIRIM PESAN
                    </button>
                </div>
            </form>
        </div>

    </div>

    <script>
        document.getElementById('contactFormPage').addEventListener('submit', function(event) {
            event.preventDefault(); 

            var nama = document.getElementById('namaPage').value;
            var nowaUser = document.getElementById('nowaPage').value;
            var email = document.getElementById('emailPage').value;
            var pesan = document.getElementById('pesanPage').value;

            // Nomor tujuan 
            var nomorTujuan = "6287738438643"; 

            var text = "Halo Admin YOT Inspirasi,%0a%0a" +
                       "Saya ingin mendiskusikan kolaborasi.%0a" +
                       "--------------------------------%0a" +
                       "*Nama:* " + nama + "%0a" +
                       "*No WA:* " + nowaUser + "%0a" +
                       "*Email:* " + email + "%0a" +
                       "--------------------------------%0a" +
                       "*Pesan:*%0a" + pesan;

            var waUrl = "https://wa.me/" + nomorTujuan + "?text=" + text;

            window.open(waUrl, '_blank');
        });
    </script>

</body>
</html>