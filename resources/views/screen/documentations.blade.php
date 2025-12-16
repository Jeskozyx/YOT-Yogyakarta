<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">
</head>
<x-app-layout>
    <div class="min-h-screen bg-gray-50 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-4xl font-black text-gray-900 tracking-tight">Galeri Kegiatan</h1>
                    <p class="mt-2 text-gray-500 text-lg">Dokumentasi momen seru dan kegiatan komunitas.</p>
                </div>

                @if(auth()->user()->role === 'coordinator')
                <a href="{{ route('kegiatan') }}" 
                   class="inline-flex items-center px-5 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/30 transition-all transform hover:-translate-y-0.5 gap-2">
                    <span class="material-symbols-rounded">add_a_photo</span>
                    <span>Upload Dokumentasi</span>
                </a>
                @endif
            </div>

            <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-8 sticky top-20 z-30">
                <form action="{{ route('documentations') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                    
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider ml-1">Kegiatan</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="material-symbols-rounded text-gray-400 text-lg">search</span>
                            </span>
                            <select name="kegiatan" class="w-full pl-10 bg-gray-50 border-gray-200 rounded-xl text-sm focus:border-blue-500 focus:ring-blue-500 transition py-2.5">
                                <option value="">Semua Kegiatan</option>
                                @foreach($filterOptions as $opt)
                                    <option value="{{ $opt->id }}" {{ request('kegiatan') == $opt->id ? 'selected' : '' }}>
                                        {{ Str::limit($opt->nama_kegiatan, 25) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider ml-1">Bulan</label>
                        <select name="bulan" class="w-full bg-gray-50 border-gray-200 rounded-xl text-sm focus:border-blue-500 focus:ring-blue-500 transition py-2.5">
                            <option value="">Semua Bulan</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ sprintf('%02d', $m) }}" {{ request('bulan') == sprintf('%02d', $m) ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider ml-1">Tahun</label>
                        <select name="tahun" class="w-full bg-gray-50 border-gray-200 rounded-xl text-sm focus:border-blue-500 focus:ring-blue-500 transition py-2.5">
                            <option value="">Semua Tahun</option>
                            @php $currentYear = date('Y'); @endphp
                            @foreach(range($currentYear, $currentYear - 2) as $y)
                                <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-gray-900 text-white font-medium py-2.5 px-4 rounded-xl hover:bg-black transition-colors shadow-md flex items-center justify-center gap-2">
                        <span class="material-symbols-rounded text-lg">filter_alt</span>
                        Terapkan
                    </button>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($events as $event)
                    <div class="group relative aspect-square bg-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">
                        
                        @if($event->foto && file_exists(public_path('storage/' . $event->foto)))
                            <img src="{{ asset('storage/' . $event->foto) }}" 
                                 alt="{{ $event->nama_kegiatan }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gray-100 text-gray-400">
                                <span class="material-symbols-rounded text-5xl opacity-30 mb-2">image_not_supported</span>
                                <span class="text-xs font-medium">No Image</span>
                            </div>
                        @endif

                        @auth
                        <div class="absolute top-3 right-3 flex gap-2 z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 translate-y-[-10px] group-hover:translate-y-0">
                            <a href="{{ route('kegiatan.edit', $event->id) }}" class="bg-white/90 p-2 rounded-full text-blue-600 hover:text-blue-700 shadow-sm backdrop-blur hover:scale-110 transition" title="Edit">
                                <span class="material-symbols-rounded text-lg">edit</span>
                            </a>
                            
                            <form id="delete-doc-{{ $event->id }}" action="{{ route('kegiatan.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDeleteDoc('{{ $event->id }}')" class="bg-white/90 p-2 rounded-full text-red-600 hover:text-red-700 shadow-sm backdrop-blur hover:scale-110 transition" title="Hapus">
                                    <span class="material-symbols-rounded text-lg">delete</span>
                                </button>
                            </form>
                        </div>
                        @endauth

                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>

                        <div class="absolute bottom-0 left-0 right-0 p-5 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide bg-blue-600/90 text-white backdrop-blur-sm">
                                    {{ $event->divisi ?? 'EVENT' }}
                                </span>
                            </div>
                            
                            <h3 class="text-white text-lg font-bold leading-tight line-clamp-2 drop-shadow-sm group-hover:text-blue-100 transition-colors">
                                {{ $event->nama_kegiatan }}
                            </h3>
                            
                            <div class="flex items-center gap-2 text-gray-300 text-xs mt-3 font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-75">
                                <span class="flex items-center gap-1 bg-white/10 px-2 py-1 rounded-md backdrop-blur-md">
                                    <span class="material-symbols-rounded text-sm">calendar_today</span>
                                    {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d M Y') }}
                                </span>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full py-16 flex flex-col items-center justify-center text-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <span class="material-symbols-rounded text-4xl text-gray-300">image_search</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Belum ada dokumentasi</h3>
                        <p class="text-gray-500 max-w-sm mt-1 mb-6">Dokumentasi kegiatan belum tersedia dengan filter yang Anda pilih.</p>
                        <a href="{{ route('documentations') }}" class="text-blue-600 font-medium hover:underline text-sm">
                            Reset Semua Filter
                        </a>
                    </div>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $events->appends(request()->query())->links() }}
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Fungsi Konfirmasi Hapus Dokumen
        function confirmDeleteDoc(id) {
            Swal.fire({
                title: 'Hapus Dokumentasi?',
                text: "Foto ini akan dihapus permanen dari galeri.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                background: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl px-4 py-2',
                    cancelButton: 'rounded-xl px-4 py-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-doc-' + id).submit();
                }
            })
        }

        // Tampilkan Toast Success
        @if(session('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            })
        @endif
    </script>
</x-app-layout>