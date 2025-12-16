<head>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx']) 
    <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">
</head>
<x-app-layout>
    <div class="min-h-screen bg-gray-50/50 pb-8">
        
        <div class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 id="react-split-text" 
                            class="text-2xl font-bold text-gray-900"
                            data-text="Selamat Datang, {{ Auth::user()->name }}! 👋">
                            Selamat Datang, {{ Auth::user()->name }}! 👋
                        </h1>
                        
                        <p class="mt-1 text-sm text-gray-500">
                            Berikut adalah ringkasan aktivitas dan jadwal kegiatan komunitas.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 -mt-0 pt-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-blue-300 transition-all duration-300">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Kegiatan</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $events->count() }}</h3>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <span class="material-symbols-rounded text-2xl">event_note</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-purple-300 transition-all duration-300">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Bulan Ini</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">
                            {{ $events->whereBetween('tanggal_pelaksanaan', [now()->startOfMonth(), now()->endOfMonth()])->count() }}
                        </h3>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <span class="material-symbols-rounded text-2xl">calendar_month</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center justify-between group hover:border-emerald-300 transition-all duration-300">
                    <div>
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Akan Datang</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-1">
                            {{ $events->where('tanggal_pelaksanaan', '>=', now())->count() }}
                        </h3>
                    </div>
                    <div class="h-12 w-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <span class="material-symbols-rounded text-2xl">upcoming</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                
                <div class="p-5 border-b border-gray-100 bg-white">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        
                        <div class="relative w-full md:w-96">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="material-symbols-rounded text-gray-400 text-lg">search</span>
                            </span>
                            <input type="text" 
                                   id="searchInput"
                                   class="block w-full pl-10 pr-3 py-2.5 border-gray-200 rounded-xl bg-gray-50 text-sm focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-400" 
                                   placeholder="Cari nama kegiatan...">
                        </div>

                        <div class="flex flex-wrap gap-3">
                            <select id="filterDivisi" class="pl-3 pr-8 py-2.5 text-sm border-gray-200 bg-gray-50 focus:outline-none focus:ring-blue-500 focus:border-transparent rounded-xl text-gray-600 cursor-pointer hover:bg-white transition">
                                <option value="">Semua Divisi</option>
                                <option value="Catalyst">Catalyst (Pendidikan)</option>
                                <option value="Energy">Energy (Kesehatan)</option>
                                <option value="Green">Green (Lingkungan)</option>
                                <option value="Entrepreneurship">Entrepreneurship</option>
                                <option value="Social">Social</option>
                                <option value="Technology">Technology</option>
                                <option value="Marcomm">Marcomm</option>
                            </select>

                            <a href="{{ route('kegiatan') }}" class="inline-flex items-center px-4 py-2.5 border border-transparent shadow-md text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/30 transition transform hover:-translate-y-0.5 gap-2">
                                <span class="material-symbols-rounded text-lg">add</span>
                                Tambah Kegiatan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100" id="eventsTable">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Kegiatan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Divisi</th>
                                <th scope="col" class="relative px-6 py-4">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($events as $index => $event)
                            <tr class="hover:bg-blue-50/30 transition-colors duration-200 group event-row">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium row-number">
                                    {{ $index + 1 }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors event-name">
                                            {{ $event->nama_kegiatan }}
                                        </span>
                                        <span class="text-xs text-gray-400 truncate max-w-xs">
                                            {{ Str::limit($event->deskripsi, 40) }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2 text-sm text-gray-600 bg-gray-50 px-3 py-1.5 rounded-lg w-fit border border-gray-100">
                                        <span class="material-symbols-rounded text-gray-400 text-base">calendar_today</span>
                                        {{ \Carbon\Carbon::parse($event->tanggal_pelaksanaan)->format('d M Y') }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $div = $event->divisi ?? '';
                                        // Warna Badge sesuai Divisi
                                        $badgeClass = match($div) {
                                            'Technology' => 'bg-blue-50 text-blue-700 border-blue-100',
                                            'Marcomm' => 'bg-purple-50 text-purple-700 border-purple-100',
                                            'Entrepreneurship' => 'bg-orange-50 text-orange-700 border-orange-100',
                                            'Green' => 'bg-green-50 text-green-700 border-green-100',
                                            'Energy' => 'bg-red-50 text-red-700 border-red-100',
                                            'Catalyst' => 'bg-yellow-50 text-yellow-700 border-yellow-100',
                                            'Social' => 'bg-pink-50 text-pink-700 border-pink-100',
                                            default => 'bg-gray-100 text-gray-600 border-gray-200',
                                        };
                                    @endphp
                                    
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium border {{ $badgeClass }}">
                                        <span class="event-divisi-text">{{ $div }}</span>
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2 opacity-60 group-hover:opacity-100 transition-all">
                                        <a href="{{ route('kegiatan.edit', $event->id) }}" class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                            <span class="material-symbols-rounded text-xl">edit_square</span>
                                        </a>
                                        
                                        <form id="delete-form-{{ $event->id }}" action="{{ route('kegiatan.destroy', $event->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $event->id }}', '{{ $event->nama_kegiatan }}')" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                                <span class="material-symbols-rounded text-xl">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr id="emptyState">
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <span class="material-symbols-rounded text-3xl text-gray-300">event_busy</span>
                                        </div>
                                        <p class="text-gray-500 text-sm font-medium">Belum ada kegiatan yang ditemukan.</p>
                                        <p class="text-gray-400 text-xs mt-1">Mulai dengan menambahkan kegiatan baru.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                            
                            <tr id="noSearchResult" class="hidden">
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <span class="material-symbols-rounded text-3xl text-gray-300">search_off</span>
                                        </div>
                                        <p class="text-gray-500 text-sm font-medium">Tidak ada hasil yang cocok.</p>
                                        <p class="text-gray-400 text-xs mt-1">Coba kata kunci atau filter lain.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-xs text-gray-500">
                        Menampilkan <span id="visibleCount">{{ $events->count() }}</span> dari {{ $events->count() }} data kegiatan.
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // --- 1. SEARCH & FILTER LOGIC (Real-time) ---
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const filterDivisi = document.getElementById('filterDivisi');
            const tableRows = document.querySelectorAll('.event-row');
            const noSearchResult = document.getElementById('noSearchResult');
            const emptyState = document.getElementById('emptyState');
            const visibleCountSpan = document.getElementById('visibleCount');

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedDivisi = filterDivisi.value.toLowerCase();
                let visibleRows = 0;

                tableRows.forEach(row => {
                    const name = row.querySelector('.event-name').innerText.toLowerCase();
                    const divisiElement = row.querySelector('.event-divisi-text');
                    const divisi = divisiElement ? divisiElement.innerText.toLowerCase() : '';

                    // Cek apakah Nama mengandung kata kunci Search
                    const matchesSearch = name.includes(searchTerm);
                    
                    // Cek apakah Divisi cocok dengan dropdown (atau dropdown "Semua")
                    const matchesDivisi = selectedDivisi === '' || divisi === selectedDivisi;

                    if (matchesSearch && matchesDivisi) {
                        row.style.display = '';
                        visibleRows++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update teks jumlah data
                visibleCountSpan.textContent = visibleRows;

                // Tampilkan pesan jika tidak ada hasil
                if (visibleRows === 0 && tableRows.length > 0) {
                    noSearchResult.classList.remove('hidden');
                } else {
                    noSearchResult.classList.add('hidden');
                }

                // Handle jika tabel benar-benar kosong dari awal (DB kosong)
                if(emptyState) {
                    if(tableRows.length === 0) {
                        emptyState.style.display = '';
                    } else {
                        emptyState.style.display = 'none';
                    }
                }
            }

            // Event Listeners
            searchInput.addEventListener('input', filterTable);
            filterDivisi.addEventListener('change', filterTable);
        });

        // --- 2. DELETE CONFIRMATION ---
        function confirmDelete(id, nama) {
            Swal.fire({
                title: 'Hapus Kegiatan?',
                text: "Anda akan menghapus data \"" + nama + "\". Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                background: '#ffffff',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl px-4 py-2',
                    cancelButton: 'rounded-xl px-4 py-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }

        // --- 3. TOAST NOTIFICATIONS ---
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

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                customClass: {
                    popup: 'rounded-2xl'
                }
            })
        @endif
    </script>
</x-app-layout>