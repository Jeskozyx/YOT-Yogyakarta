<div class="max-w-7xl mx-auto animate-fade-in-up animation-delay-1000">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">
        <div class="bg-[#FFF000] rounded-[2.5rem] p-8 md:p-10 shadow-xl relative overflow-hidden">
            <h2 class="text-4xl font-extrabold text-black mb-2">Contact Us</h2>
            <p class="text-black font-medium mb-1">Tertarik untuk berkolaborasi?</p>
            <p class="text-black text-sm mb-6 leading-relaxed">
                Hubungi kami melalui form di bawah ini. Kami siap mendiskusikan peluang kerja sama lebih lanjut.
            </p>

            <form id="contactForm" class="space-y-4">
                <div>
                    <input type="text" id="nama" placeholder="Nama Lengkap" class="w-full px-4 py-3 rounded-xl border border-yellow-500 bg-[#FFF000]/50 placeholder-gray-700 text-black focus:outline-none focus:ring-2 focus:ring-black focus:bg-yellow-200 transition-all" required>
                </div>
                <div>
                    <input type="text" id="nowa" placeholder="No Whatsapp" class="w-full px-4 py-3 rounded-xl border border-yellow-500 bg-[#FFF000]/50 placeholder-gray-700 text-black focus:outline-none focus:ring-2 focus:ring-black focus:bg-yellow-200 transition-all" required>
                </div>
                <div>
                    <input type="email" id="email" placeholder="Email" class="w-full px-4 py-3 rounded-xl border border-yellow-500 bg-[#FFF000]/50 placeholder-gray-700 text-black focus:outline-none focus:ring-2 focus:ring-black focus:bg-yellow-200 transition-all" required>
                </div>
                <div>
                    <textarea id="pesan" placeholder="Pesan ...." rows="4" class="w-full px-4 py-3 rounded-xl border border-yellow-500 bg-[#FFF000]/50 placeholder-gray-700 text-black focus:outline-none focus:ring-2 focus:ring-black focus:bg-yellow-200 transition-all resize-none" required></textarea>
                </div>
                <button type="submit" class="bg-black text-white font-bold py-3 px-8 rounded-full hover:bg-gray-800 transition-colors shadow-lg mt-2">
                    Submit
                </button>
            </form>
        </div>
        
        <div class="flex flex-col h-full space-y-8">
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
                    <p class="text-gray-700">0877-3843-8643</p>
                </div>       
                <div class="flex items-center gap-4">
                    <div class="bg-gray-100 p-2 rounded-full">
                        <i class="fab fa-whatsapp text-gray-900"></i>
                    </div>
                    <p class="text-gray-700">0877-3843-8643 (WhatsApp)</p>
                </div>
            </div>
            
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

<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        var nama = document.getElementById('nama').value;
        var nowaUser = document.getElementById('nowa').value;
        var email = document.getElementById('email').value;
        var pesan = document.getElementById('pesan').value;

        // Nomor tujuan diupdate (tanpa +, spasi, atau -)
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