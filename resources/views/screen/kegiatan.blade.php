<x-app-layout>
    <div class="bg-gray-50 pt-8 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
                        {{ isset($event) ? 'Edit Kegiatan' : 'Buat Kegiatan Baru' }}
                    </h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Isi formulir di bawah ini untuk {{ isset($event) ? 'memperbarui data' : 'menambahkan' }} agenda kegiatan komunitas.
                    </p>
                </div>
                <div class="hidden sm:block">
                   <a href="{{ route('documentations') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition">
                        &larr; Kembali ke Dokumentasi
                   </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-12">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" class="mb-6 flex items-center justify-between bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <span class="material-symbols-rounded mr-2">check_circle</span>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="text-green-500 hover:text-green-700">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
        @endif

        <form action="{{ isset($event) ? route('kegiatan.update', $event->id) : route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($event))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-symbols-rounded text-blue-500">edit_document</span>
                            Detail Kegiatan
                        </h2>
                        
                        <div class="space-y-5">
                            <div>
                                <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700 mb-1">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" id="nama_kegiatan"
                                       value="{{ old('nama_kegiatan', $event->nama_kegiatan ?? '') }}"
                                       class="w-full bg-gray-50 text-gray-900 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition duration-200 px-4 py-2.5 placeholder-gray-400"
                                       placeholder="Contoh: Bakti Sosial Jogja 2025" required>
                                @error('nama_kegiatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="lokasi_kegiatan" class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kegiatan</label>
                                <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan"
                                       value="{{ old('lokasi_kegiatan', $event->lokasi_kegiatan ?? '') }}"
                                       class="w-full bg-gray-50 text-gray-900 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition duration-200 px-4 py-2.5 placeholder-gray-400"
                                       placeholder="Contoh: Jogja, Zoom/Teams/Google Meet" required>
                                @error('lokasi_kegiatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="tanggal_pelaksanaan" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pelaksanaan</label>
                                <input type="date" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan"
                                       value="{{ old('tanggal_pelaksanaan', isset($event) ? $event->tanggal_pelaksanaan->format('Y-m-d') : '') }}"
                                       class="w-full bg-gray-50 text-gray-900 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition duration-200 px-4 py-2.5" required>
                                @error('tanggal_pelaksanaan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Lengkap</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                          class="w-full bg-gray-50 text-gray-900 rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition duration-200 px-4 py-2.5 placeholder-gray-400"
                                          placeholder="Jelaskan tujuan dan detail kegiatan..." required>{{ old('deskripsi', $event->deskripsi ?? '') }}</textarea>
                                @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                <span class="material-symbols-rounded text-indigo-500">groups</span>
                                Tim & Panitia
                            </h2>
                            <button type="button" id="add-anggota"
                                    class="text-sm px-3 py-1.5 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-100 font-medium transition flex items-center gap-1">
                                <span class="material-symbols-rounded text-base">add</span>
                                Tambah
                            </button>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 border border-dashed border-gray-200">
                            <div id="anggota-container" class="space-y-3">
                                </div>
                            <p id="empty-state-anggota" class="text-center text-gray-400 text-sm py-2 hidden">
                                Belum ada anggota yang ditambahkan.
                            </p>
                        </div>
                        @error('nama_anggota') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <span class="material-symbols-rounded text-pink-500">image</span>
                            Foto Poster/Dokumentasi
                        </h2>

                        <div class="relative group">
                            <input type="file" name="foto" id="foto" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:bg-gray-50 hover:border-blue-400 transition duration-200" id="drop-zone">
                                <div class="mb-3">
                                    <span class="material-symbols-rounded text-4xl text-gray-300 group-hover:text-blue-400 transition">cloud_upload</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700">Klik atau Drag foto ke sini</p>
                                <p class="text-xs text-gray-500 mt-1">JPG, PNG, max 2MB</p>
                            </div>
                        </div>
                        @error('foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror

                        <div id="foto-preview-container" class="mt-4 {{ isset($event) && $event->foto ? '' : 'hidden' }}">
                            <div class="relative rounded-xl overflow-hidden shadow-md group">
                                <img id="foto-preview" src="{{ isset($event) && $event->foto ? asset('storage/' . $event->foto) : '' }}" class="w-full h-auto object-cover">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200">
                                    <p class="text-white text-xs font-medium" id="foto-preview-text">Ganti Foto</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Aksi</h3>
                        <div class="space-y-3">
                            <button type="submit" 
                                    class="w-full flex justify-center items-center gap-2 px-4 py-3 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/30 transition duration-200 transform hover:-translate-y-0.5">
                                <span class="material-symbols-rounded">save</span>
                                {{ isset($event) ? 'Update Kegiatan' : 'Simpan Kegiatan' }}
                            </button>
                            
                            <a href="{{ route('documentations') }}" 
                               class="w-full flex justify-center items-center gap-2 px-4 py-3 bg-white text-gray-700 border border-gray-200 rounded-xl font-medium hover:bg-gray-50 hover:text-gray-900 transition duration-200">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script>
        const jabatanConfig = {
            'Ketua Pelaksana': { max: 1, count: 0 },
            'Wakil': { max: 1, count: 0 },
            'Bendahara': { max: 5, count: 0 },
            'Acara': { max: 10, count: 0 },
            'Sekretaris': { max: 5, count: 0 },
            'Dokumentasi': { max: 10, count: 0 },
            'Humas': { max: 10, count: 0 },
            'Sponsorship': { max: 10, count: 0 }
        };

        // Improved Image Preview Logic
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const previewContainer = document.getElementById('foto-preview-container');
            const preview = document.getElementById('foto-preview');
            const dropZone = document.getElementById('drop-zone');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    // Optional: Visual feedback on dropzone
                    dropZone.classList.add('border-blue-500', 'bg-blue-50');
                }
                reader.readAsDataURL(file);
            }
        });

        function generateJabatanOptions() {
            let options = '<option value="">Pilih Jabatan</option>';
            for (let jabatan in jabatanConfig) {
                const config = jabatanConfig[jabatan];
                const remaining = config.max - config.count;
                const disabled = remaining <= 0 ? 'disabled' : '';
                const labelText = remaining <= 0 ? `${jabatan} (Penuh)` : `${jabatan}`;
                options += `<option value="${jabatan}" ${disabled}>${labelText}</option>`;
            }
            return options;
        }

        function updateAllDropdowns() {
            const selects = document.querySelectorAll('.jabatan-select');
            selects.forEach(select => {
                const currentValue = select.value;
                select.innerHTML = generateJabatanOptions();
                if (currentValue) select.value = currentValue;
            });
        }

        // Modernized Member Item HTML
        function addAnggotaItem(nama = '', jabatan = '') {
            const container = document.getElementById('anggota-container');
            const newItem = document.createElement('div');
            
            // Animation classes
            newItem.className = 'anggota-item bg-white p-3 rounded-xl border border-gray-200 shadow-sm flex flex-col sm:flex-row gap-3 items-start sm:items-center transition-all duration-300 ease-out transform translate-y-2 opacity-0';
            
            newItem.innerHTML = `
                <div class="flex-1 w-full sm:w-auto">
                    <select name="jabatan[]" 
                            class="jabatan-select w-full bg-gray-50 border-gray-200 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 transition px-3 py-2"
                            onchange="handleJabatanChange(this)" required>
                        ${generateJabatanOptions()}
                    </select>
                </div>
                <div class="flex-1 w-full sm:w-auto relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="material-symbols-rounded text-gray-400 text-sm">person</span>
                    </span>
                    <input type="text" 
                           name="nama_anggota[]" 
                           value="${nama}"
                           class="w-full pl-9 pr-3 py-2 bg-gray-50 border-gray-200 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 transition"
                           placeholder="Nama Lengkap" required>
                </div>
                <button type="button" 
                        class="remove-anggota text-gray-400 hover:text-red-500 transition p-1 rounded-full hover:bg-red-50 self-end sm:self-center"
                        onclick="removeAnggota(this)">
                    <span class="material-symbols-rounded">delete</span>
                </button>
            `;
            container.appendChild(newItem);

            // Trigger animation
            requestAnimationFrame(() => {
                newItem.classList.remove('translate-y-2', 'opacity-0');
            });

            if (jabatan) {
                const select = newItem.querySelector('.jabatan-select');
                select.value = jabatan;
                select.dataset.previousValue = jabatan;
                if (jabatanConfig[jabatan]) jabatanConfig[jabatan].count++;
                updateAllDropdowns();
            }
            
            checkEmptyState();
        }

        document.getElementById('add-anggota').addEventListener('click', function() {
            addAnggotaItem();
        });

        function handleJabatanChange(select) {
            const oldJabatan = select.dataset.previousValue;
            const newJabatan = select.value;

            if (oldJabatan && jabatanConfig[oldJabatan]) jabatanConfig[oldJabatan].count--;

            if (newJabatan && jabatanConfig[newJabatan]) {
                if (jabatanConfig[newJabatan].count < jabatanConfig[newJabatan].max) {
                    jabatanConfig[newJabatan].count++;
                    select.dataset.previousValue = newJabatan;
                } else {
                    alert(`Jabatan ${newJabatan} sudah penuh (Max ${jabatanConfig[newJabatan].max})`);
                    select.value = oldJabatan || '';
                    if (oldJabatan) jabatanConfig[oldJabatan].count++; // Revert count
                    return;
                }
            } else {
                select.dataset.previousValue = '';
            }

            updateAllDropdowns();
        }

        function removeAnggota(button) {
            const item = button.closest('.anggota-item');
            const select = item.querySelector('.jabatan-select');
            const jabatan = select.dataset.previousValue;

            if (jabatan && jabatanConfig[jabatan]) jabatanConfig[jabatan].count--;

            // Fade out animation
            item.style.opacity = '0';
            item.style.transform = 'scale(0.95)';
            setTimeout(() => {
                item.remove();
                updateAllDropdowns();
                checkEmptyState();
            }, 200);
        }

        function checkEmptyState() {
            const container = document.getElementById('anggota-container');
            const emptyState = document.getElementById('empty-state-anggota');
            if(container.children.length === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        window.addEventListener('DOMContentLoaded', function() {
            const existingAnggota = @json($event->anggota ?? []);
            
            if (existingAnggota && existingAnggota.length > 0) {
                existingAnggota.forEach(anggota => {
                    addAnggotaItem(anggota.nama, anggota.jabatan);
                });
            } else {
                addAnggotaItem();
            }
        });
    </script>
</x-app-layout>