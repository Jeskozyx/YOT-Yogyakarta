<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-blue-900 tracking-tight">DOKUMENTASI</h1>
                    <nav class="flex text-sm text-gray-500 mt-1">
                        <span class="hover:text-blue-600 cursor-pointer">Dashboard</span>
                        <span class="mx-2">/</span>
                        <span class="font-semibold text-blue-600">Dokumentasi</span>
                    </nav>
                </div>

                @auth
                <div>
                    <a href="{{ route('kegiatan') }}" class="inline-flex items-center px-6 py-3 bg-blue-900 border border-transparent rounded-xl font-semibold text-sm text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-cloud-upload-alt mr-2"></i> Upload Dokumentasi
                    </a>
                </div>
                @endauth
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8">
                <form action="{{ route('documentations') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    
                    <div class="relative group">
                        <label class="block text-xs font-medium text-gray-400 mb-1 ml-1">Nama Kegiatan</label>
                        <select name="kegiatan" class="w-full bg-gray-50 border-gray-200 rounded-xl text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors py-2.5">
                            <option value="">Semua Kegiatan</option>
                            @foreach($filterOptions as $opt)
                                <option value="{{ $opt->id }}" {{ request('kegiatan') == $opt->id ? 'selected' : '' }}>
                                    {{ Str::limit($opt->nama_kegiatan, 30) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative">
                        <label class="block text-xs font-medium text-gray-400 mb-1 ml-1">Bulan</label>
                        <select name="bulan" class="w-full bg-gray-50 border-gray-200 rounded-xl text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors py-2.5">
                            <option value="">Semua Bulan</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ sprintf('%02d', $m) }}" {{ request('bulan') == sprintf('%02d', $m) ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative">
                        <label class="block text-xs font-medium text-gray-400 mb-1 ml-1">Tahun</label>
                        <select name="tahun" class="w-full bg-gray-50 border-gray-200 rounded-xl text-sm focus:border-blue-500 focus:ring-blue-500 transition-colors py-2.5">
                            <option value="">Semua Tahun</option>
                            @php $currentYear = date('Y'); @endphp
                            @foreach(range($currentYear, $currentYear - 2) as $y)
                                <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-gray-900 text-white font-semibold py-2.5 px-4 rounded-xl hover:bg-black transition-colors shadow-md flex items-center justify-center gap-2">
                            <i class="fas fa-filter text-xs"></i> Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($events as $event)
                    <div class="group relative aspect-[4/3] bg-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 cursor-pointer">
                        
                        @if($event->foto && file_exists(public_path('storage/' . $event->foto)))
                            <img src="{{ asset('storage/' . $event->foto) }}" 
                                 alt="{{ $event->nama_kegiatan }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gray-100 text-gray-400">
                                <i class="fas fa-image text-5xl mb-2 opacity-50"></i>
                                <span class="text-xs">Gambar tidak tersedia</span>
                            </div>
                        @endif

                        @auth
                        <div class="absolute top-3 right-3 flex gap-2 z-20">
                            <a href="{{ route('kegiatan.edit', $event->id) }}" class="bg-white/90 p-2 rounded-full text-blue-600 hover:text-blue-800 shadow-sm backdrop-blur-sm hover:scale-110 transition-transform" title="Edit Kegiatan">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('kegiatan.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumentasi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-white/90 p-2 rounded-full text-red-600 hover:text-red-800 shadow-sm backdrop-blur-sm hover:scale-110 transition-transform" title="Hapus Kegiatan">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </form>
                        </div>
                        @endauth

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300"></div>

                        <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                            <span class="inline-block px-2.5 py-0.5 bg-blue-600/90 backdrop-blur-sm text-white text-[10px] font-bold uppercase tracking-wider rounded mb-2 shadow-sm">
                                {{ $event->divisi ?? 'YOT JOGJA' }}
                            </span>
                            
                            <h3 class="text-white text-lg font-bold leading-snug mb-1 line-clamp-2 drop-shadow-md group-hover:text-blue-200 transition-colors">
                                {{ $event->nama_kegiatan }}
                            </h3>
                            
                            <div class="flex items-center gap-2 text-gray-300 text-xs mt-2 font-medium">
                                <span class="bg-white/20 px-2 py-1 rounded backdrop-blur-md">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d M Y') }}
                                </span>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                        <div class="flex flex-col items-center justify-center py-16 bg-white rounded-2xl border-2 border-dashed border-gray-200">
                            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-search text-2xl text-gray-400"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Tidak ada dokumentasi ditemukan</h3>
                            <p class="text-gray-500 text-sm mt-1">Coba ubah filter pencarian Anda atau upload kegiatan baru.</p>
                            
                            <a href="{{ route('documentations') }}" class="mt-4 text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                Reset Filter
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $events->appends(request()->query())->links() }}
            </div>

        </div>
    </div>
</x-app-layout>