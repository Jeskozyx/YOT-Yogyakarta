<x-app-layout>
    <div class="min-h-screen bg-gray-50/50 flex flex-col justify-center items-center p-4">
        
        <div class="bg-white p-8 md:p-12 rounded-3xl shadow-xl text-center max-w-lg w-full border border-gray-100 relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-400 to-red-600"></div>

            <div class="w-24 h-24 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                <span class="material-symbols-rounded text-5xl text-red-500">lock_clock</span>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-2">Akun Ditangguhkan</h1>
            <p class="text-gray-500 text-lg mb-6">
                Maaf, akun Anda sedang di-ban sementara oleh Admin Terhormat, silakan hubungi Admin tampan.
            </p>

            <div class="bg-red-50 border border-red-100 rounded-2xl p-6 mb-8">
                <p class="text-red-600 text-sm font-semibold uppercase tracking-wider mb-2">Sisa Waktu Ban</p>
                <div class="text-4xl font-black text-gray-900 tracking-tight" id="countdown">
                    Calculating...
                </div>
                <p class="text-xs text-gray-400 mt-2">
                    Berakhir pada: {{ Auth::user()->banned_until->timezone('Asia/Jakarta')->format('H:i:s') }} WIB
                </p>
            </div>

            <p class="text-sm text-gray-400">
                Silakan tunggu hingga waktu habis untuk mengakses kembali dashboard Anda.
            </p>

            <form method="POST" action="{{ route('logout') }}" class="mt-8">
                @csrf
                <button type="submit" class="text-sm font-medium text-gray-600 hover:text-red-600 transition underline">
                    Keluar dari Akun
                </button>
            </form>
        </div>

    </div>
<script>
    // SOLUSI FIX: Gunakan Timestamp (Detik) dikali 1000 untuk jadi Milidetik
    // Ini menghindari kebingungan timezone antara Server dan Browser
    const bannedUntilTime = {{ Auth::user()->banned_until->timestamp * 1000 }};

    const timer = setInterval(function() {
        const now = new Date().getTime(); // Waktu browser user saat ini
        const distance = bannedUntilTime - now;

        if (distance < 0) {
            clearInterval(timer);
            const countdownEl = document.getElementById("countdown");
            
            // Ubah teks jadi akses dibuka
            countdownEl.innerHTML = "AKSES DIBUKA";
            countdownEl.classList.remove("text-gray-900");
            countdownEl.classList.add("text-green-600"); // Ubah warna jadi hijau
            
            // Reload halaman otomatis agar user bisa masuk
            setTimeout(() => window.location.href = "{{ route('dashboard') }}", 1000);
            return;
        }

        // Hitung menit dan detik
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Format tampilan agar selalu 2 digit (05:01)
        document.getElementById("countdown").innerHTML = 
            (minutes < 10 ? "0" + minutes : minutes) + ":" + 
            (seconds < 10 ? "0" + seconds : seconds);

    }, 1000);
</script>
</x-app-layout>