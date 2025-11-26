<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kegiatan Baru') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form Tambah Kegiatan -->
                    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Kegiatan -->
                        <div class="mb-6">
                            <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Kegiatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nama_kegiatan" 
                                   id="nama_kegiatan"
                                   value="{{ old('nama_kegiatan') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                   placeholder="Masukkan nama kegiatan"
                                   required>
                            @error('nama_kegiatan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Pelaksanaan -->
                        <div class="mb-6">
                            <label for="tanggal_pelaksanaan" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Pelaksanaan <span class="text-red-500">*</span>
                            </label>
                            <input type="date" 
                                   name="tanggal_pelaksanaan" 
                                   id="tanggal_pelaksanaan"
                                   value="{{ old('tanggal_pelaksanaan') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                   required>
                            @error('tanggal_pelaksanaan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi Kegiatan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="deskripsi" 
                                      id="deskripsi"
                                      rows="4"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                      placeholder="Deskripsikan kegiatan yang akan dilakukan"
                                      required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Foto -->
                        <div class="mb-6">
                            <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Kegiatan
                            </label>
                            <input type="file" 
                                   name="foto" 
                                   id="foto"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                            <p class="text-gray-500 text-xs mt-1">Format: JPEG, PNG, JPG, GIF | Maksimal: 2MB</p>
                            @error('foto')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Preview Foto -->
                        <div class="mb-6 hidden" id="foto-preview-container">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview Foto</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                                <img id="foto-preview" class="mx-auto max-h-48 rounded-lg hidden">
                                <p id="foto-preview-text" class="text-gray-500 text-sm mt-2"></p>
                            </div>
                        </div>

                        <!-- Anggota yang Terlibat -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Anggota yang Terlibat
                            </label>
                            <p class="text-gray-500 text-xs mb-3">Pilih jabatan dan masukkan nama anggota</p>
                            
                            <div id="anggota-container" class="space-y-3">
                                <!-- Anggota items akan ditambahkan di sini -->
                            </div>

                            <button type="button" 
                                    id="add-anggota"
                                    class="mt-3 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Anggota
                            </button>

                            @error('nama_anggota')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" 
                                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                Simpan Kegiatan
                            </button>
                            <a href="{{ route('dashboard') }}" 
                               class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Konfigurasi jabatan dan maksimal anggota
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

        // Preview foto
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const previewContainer = document.getElementById('foto-preview-container');
            const preview = document.getElementById('foto-preview');
            const previewText = document.getElementById('foto-preview-text');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    previewText.textContent = file.name;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
                preview.classList.add('hidden');
                previewText.textContent = '';
            }
        });

        // Generate dropdown options
        function generateJabatanOptions() {
            let options = '<option value="">-- Pilih Jabatan --</option>';
            for (let jabatan in jabatanConfig) {
                const config = jabatanConfig[jabatan];
                const remaining = config.max - config.count;
                const disabled = remaining <= 0 ? 'disabled' : '';
                options += `<option value="${jabatan}" ${disabled}>${jabatan} (${remaining}/${config.max} tersisa)</option>`;
            }
            return options;
        }

        // Update semua dropdown
        function updateAllDropdowns() {
            const selects = document.querySelectorAll('.jabatan-select');
            selects.forEach(select => {
                const currentValue = select.value;
                select.innerHTML = generateJabatanOptions();
                
                // Kembalikan nilai yang sudah dipilih
                if (currentValue) {
                    select.value = currentValue;
                }
            });
        }

        // Tambah anggota baru
        document.getElementById('add-anggota').addEventListener('click', function() {
            const container = document.getElementById('anggota-container');
            const newItem = document.createElement('div');
            newItem.className = 'anggota-item flex gap-2 items-start';
            newItem.innerHTML = `
                <div class="flex-1">
                    <select name="jabatan[]" 
                            class="jabatan-select w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            onchange="handleJabatanChange(this)" required>
                        ${generateJabatanOptions()}
                    </select>
                </div>
                <div class="flex-1">
                    <input type="text" 
                           name="nama_anggota[]" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Nama Anggota" required>
                </div>
                <button type="button" 
                        class="remove-anggota px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition duration-200"
                        onclick="removeAnggota(this)">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            `;
            container.appendChild(newItem);
        });

        // Handle perubahan jabatan
        function handleJabatanChange(select) {
            const oldJabatan = select.dataset.previousValue;
            const newJabatan = select.value;

            // Kurangi count jabatan lama
            if (oldJabatan && jabatanConfig[oldJabatan]) {
                jabatanConfig[oldJabatan].count--;
            }

            // Tambah count jabatan baru
            if (newJabatan && jabatanConfig[newJabatan]) {
                if (jabatanConfig[newJabatan].count < jabatanConfig[newJabatan].max) {
                    jabatanConfig[newJabatan].count++;
                    select.dataset.previousValue = newJabatan;
                } else {
                    alert(`Maksimal ${jabatanConfig[newJabatan].max} orang untuk jabatan ${newJabatan}`);
                    select.value = oldJabatan || '';
                    return;
                }
            } else {
                select.dataset.previousValue = '';
            }

            updateAllDropdowns();
        }

        // Hapus anggota
        function removeAnggota(button) {
            const item = button.closest('.anggota-item');
            const select = item.querySelector('.jabatan-select');
            const jabatan = select.dataset.previousValue;

            // Kurangi count jabatan
            if (jabatan && jabatanConfig[jabatan]) {
                jabatanConfig[jabatan].count--;
            }

            item.remove();
            updateAllDropdowns();
        }

        // Tambah 1 anggota default saat load
        window.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-anggota').click();
        });
    </script>
</x-app-layout>