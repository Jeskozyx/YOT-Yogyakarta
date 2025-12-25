    @push('styles')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .tab-active { border-bottom: 2px solid #4f46e5; color: #4f46e5; background-color: #eef2ff; }
        .tab-inactive { border-bottom: 2px solid transparent; color: #64748b; }
        .tab-inactive:hover { color: #334155; background-color: #f8fafc; }
        
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
    </style>
    @endpush
<x-app-layout>
    <div class="bg-gray-50 pt-8 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
                        {{ isset($event) ? 'Edit Kegiatan' : 'Buat Kegiatan Baru' }}
                    </h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Isi formulir di bawah ini untuk {{ isset($event) ? 'memperbarui' : 'menambahkan' }} agenda kegiatan komunitas.
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

        <form id="kegiatan-form"
              action="{{ isset($event) ? route('kegiatan.update',$event->id) : route('kegiatan.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($event))
                @method("PUT")
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-800">
                            <span class="material-symbols-rounded text-blue-500 bg-blue-50 p-1 rounded-lg">edit_document</span>
                            Detail Kegiatan
                        </h2>

                        <div class="space-y-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="text-sm font-semibold text-gray-700 mb-1 block">Nama Kegiatan</label>
                                    <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                           value="{{ old('nama_kegiatan',$event->nama_kegiatan ?? '') }}"
                                           class="w-full bg-white rounded-xl border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400"
                                           placeholder="Contoh: Gathering Akbar 2024"
                                           required>
                                </div>

                                <div>
                                    <label class="text-sm font-semibold text-gray-700 mb-1 block">Lokasi Kegiatan</label>
                                    <input type="text" id="lokasi_kegiatan" name="lokasi_kegiatan"
                                           value="{{ old('lokasi_kegiatan',$event->lokasi_kegiatan ?? '') }}"
                                           class="w-full bg-white rounded-xl border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400"
                                           placeholder="Contoh: Aula Utama"
                                           required>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-1 block">Tanggal Pelaksanaan</label>
                                <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                                       value="{{ old('tanggal_pelaksanaan', isset($event) ? $event->tanggal_pelaksanaan->format('Y-m-d') : '') }}"
                                       class="w-full bg-white rounded-xl border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm"
                                       required>
                            </div>

                            <div>
                                <label class="text-sm font-semibold text-gray-700 mb-1 block">Deskripsi Lengkap</label>
                                <textarea id="deskripsi" name="deskripsi" rows="4"
                                          class="w-full bg-white rounded-xl border-gray-200 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400"
                                          placeholder="Tuliskan detail rundown atau deskripsi acara..."
                                          required>{{ old('deskripsi',$event->deskripsi ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        
                        <div class="border-b border-gray-100 bg-white p-4 pb-0">
                            <h2 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-800">
                                <span class="material-symbols-rounded text-indigo-500 bg-indigo-50 p-1 rounded-lg">groups</span>
                                Tim & Panitia
                            </h2>

                            <div class="flex gap-4">
                                <button type="button" id="tab-manual" onclick="switchTab('manual')" 
                                    class="tab-active px-4 py-2 text-sm font-medium rounded-t-lg transition-colors flex items-center gap-2">
                                    <span class="material-symbols-rounded text-lg">list</span> Input Manual
                                </button>
                                <button type="button" id="tab-bulk" onclick="switchTab('bulk')" 
                                    class="tab-inactive px-4 py-2 text-sm font-medium rounded-t-lg transition-colors flex items-center gap-2">
                                    <span class="material-symbols-rounded text-lg">playlist_add</span> Input Cepat (Bulk)
                                </button>
                            </div>
                        </div>

                        <div class="p-6 bg-gray-50/50">
                            
                            <div id="content-manual" class="block">
                                <p class="text-sm text-gray-500 mb-4">Tambahkan anggota satu per satu dengan menekan tombol di bawah.</p>
                                <button type="button" onclick="addAnggotaItem()"
                                        class="w-full py-2.5 border-2 border-dashed border-indigo-300 rounded-xl text-indigo-600 font-medium hover:bg-indigo-50 hover:border-indigo-400 transition flex justify-center items-center gap-2">
                                    <span class="material-symbols-rounded">add_circle</span> Tambah Baris Kosong
                                </button>
                            </div>

                            <div id="content-bulk" class="hidden">
                                <div class="bg-white p-4 rounded-xl border border-indigo-100 shadow-sm">
                                    <div class="mb-3">
                                        <label class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1 block">1. Pilih Jabatan untuk Kelompok Ini</label>
                                        <select id="bulk-role" class="custom-select w-full bg-gray-50 border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-indigo-500">
                                            <option value="">-- Pilih Jabatan --</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1 block">2. Paste Daftar Nama (Enter/Excel)</label>
                                        <textarea id="bulk-names" rows="3" 
                                            class="w-full bg-gray-50 rounded-lg border-gray-200 px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:bg-white transition"
                                            placeholder="Contoh:&#10;Budi Santoso&#10;Siti Aminah&#10;Joko Anwar"></textarea>
                                        <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                            <span class="material-symbols-rounded text-sm">info</span> Copy nama dari Excel dan paste di sini.
                                        </p>
                                    </div>
                                    <button type="button" onclick="processBulkInput()" 
                                        class="w-full bg-indigo-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition shadow-md flex justify-center items-center gap-2">
                                        <span class="material-symbols-rounded text-base">input</span> Masukkan ke Daftar Tim
                                    </button>
                                </div>
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between items-end mb-2">
                                    <label class="text-sm font-bold text-gray-700">Daftar Anggota Terinput</label>
                                    <span id="total-count" class="text-xs font-medium bg-gray-200 text-gray-600 px-2 py-1 rounded-md">0 Orang</span>
                                </div>
                                
                                <div id="anggota-container" class="space-y-3 min-h-[50px]"></div>
                                
                                <p id="empty-state-anggota" class="text-center text-gray-400 text-sm py-8 border-2 border-dashed border-gray-200 rounded-xl">
                                    Belum ada anggota yang ditambahkan.
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="space-y-6">

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-lg font-semibold mb-4 flex items-center gap-2 text-gray-800">
                            <span class="material-symbols-rounded text-pink-500 bg-pink-50 p-1 rounded-lg">image</span>
                            Foto Kegiatan
                        </h2>

                        <div class="relative group">
                            <input type="file" name="foto" id="foto" accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                            <div id="drop-zone"
                                 class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center transition bg-gray-50 group-hover:bg-white group-hover:border-blue-400">
                                <div class="mb-3">
                                    <span class="material-symbols-rounded text-5xl text-gray-300 group-hover:text-blue-400 transition">cloud_upload</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700">Klik atau Drag file ke sini</p>
                                <p class="text-xs text-gray-500 mt-1">Format JPG, PNG (Max 2MB)</p>
                            </div>
                        </div>

                        <div id="foto-preview-container"
                             class="mt-4 {{ isset($event) && $event->foto ? '' : 'hidden' }}">
                            <div class="rounded-xl overflow-hidden shadow-md border border-gray-100 relative">
                                <img id="foto-preview"
                                     src="{{ isset($event) ? asset('storage/'.$event->foto) : '' }}"
                                     class="w-full h-48 object-cover">
                                <button type="button" onclick="removeImage()" 
                                        class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full shadow hover:bg-red-600 transition">
                                    <span class="material-symbols-rounded text-sm">close</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-8 z-20 border border-gray-100">
                        <div class="flex items-center gap-2 mb-4 text-sm text-yellow-600 bg-yellow-50 p-3 rounded-lg">
                            <span class="material-symbols-rounded">warning</span>
                            <span>Pastikan data sudah benar sebelum menyimpan.</span>
                        </div>
                        <button type="submit"
                                class="w-full py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:scale-[1.02] transition transform active:scale-95">
                            {{ isset($event) ? 'Update Kegiatan' : 'Simpan Kegiatan' }}
                        </button>
                    </div>

                </div>

            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        const fileInput = document.getElementById("foto");
        const dropZone = document.getElementById("drop-zone");
        const previewContainer = document.getElementById("foto-preview-container");
        const previewImage = document.getElementById("foto-preview");

        ["dragenter", "dragover"].forEach(evt => {
            dropZone.addEventListener(evt, e => {
                e.preventDefault();
                dropZone.classList.add("border-blue-500", "bg-blue-50");
            });
        });

        ["dragleave", "drop"].forEach(evt => {
            dropZone.addEventListener(evt, e => {
                e.preventDefault();
                dropZone.classList.remove("border-blue-500", "bg-blue-50");
            });
        });

        dropZone.addEventListener("drop", e => {
            e.preventDefault();
            const file = e.dataTransfer.files[0];
            if (file) setFile(file);
        });

        fileInput.addEventListener("change", e => {
            const file = e.target.files[0];
            if (file) updatePreview(file);
        });

        function setFile(file) {
            const dt = new DataTransfer();
            dt.items.add(file);
            fileInput.files = dt.files;
            fileInput.dispatchEvent(new Event("change", { bubbles: true }));
            updatePreview(file);
        }

        function updatePreview(file) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImage.src = e.target.result;
                previewContainer.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }

        function removeImage() {
            fileInput.value = '';
            previewImage.src = '';
            previewContainer.classList.add("hidden");
        }
    </script>

    <script>
        const jabatanConfig = {
            "Ketua Pelaksana": { max:1, count:0 },
            "Wakil": { max:1, count:0 },
            "Sekretaris": { max:5, count:0 },
            "Bendahara": { max:5, count:0 },
            "Acara": { max:20, count:0 },
            "Dokumentasi": { max:20, count:0 },
            "Humas": { max:20, count:0 },
            "Sponsorship": { max:20, count:0 },
            "Logistik": { max:20, count:0 },
            "Anggota": { max:100, count:0 }
        };

        function switchTab(mode) {
            const manualBtn = document.getElementById('tab-manual');
            const bulkBtn = document.getElementById('tab-bulk');
            const manualContent = document.getElementById('content-manual');
            const bulkContent = document.getElementById('content-bulk');

            if(mode === 'manual') {
                manualBtn.className = "tab-active px-4 py-2 text-sm font-medium rounded-t-lg transition-colors flex items-center gap-2 cursor-pointer";
                bulkBtn.className = "tab-inactive px-4 py-2 text-sm font-medium rounded-t-lg transition-colors flex items-center gap-2 cursor-pointer";
                manualContent.classList.remove('hidden');
                bulkContent.classList.add('hidden');
            } else {
                manualBtn.className = "tab-inactive px-4 py-2 text-sm font-medium rounded-t-lg transition-colors flex items-center gap-2 cursor-pointer";
                bulkBtn.className = "tab-active px-4 py-2 text-sm font-medium rounded-t-lg transition-colors flex items-center gap-2 cursor-pointer";
                manualContent.classList.add('hidden');
                bulkContent.classList.remove('hidden');
            }
        }

        function generateJabatanOptions(selectedValue = "") {
            let options = `<option value="" disabled ${selectedValue === "" ? "selected" : ""}>Pilih Jabatan</option>`;
            for (let j in jabatanConfig) {
                const c = jabatanConfig[j];
                const isFull = c.count >= c.max;
                const isSelected = j === selectedValue;
                const disabled = (isFull && !isSelected) ? "disabled" : "";
                const label = (isFull && !isSelected) ? `${j} (Penuh)` : j;
                
                options += `<option value="${j}" ${isSelected ? "selected" : ""} ${disabled}>${label}</option>`;
            }
            return options;
        }

        function refreshAllDropdowns() {
            document.querySelectorAll('.jabatan-select').forEach(sel => {
                const currentVal = sel.value;
                sel.innerHTML = generateJabatanOptions(currentVal);
            });

            const bulkSelect = document.getElementById('bulk-role');
            if(bulkSelect) {
                const currentBulkVal = bulkSelect.value;
                bulkSelect.innerHTML = generateJabatanOptions(currentBulkVal);
                bulkSelect.value = currentBulkVal; 
            }

            updateTotalCount();
            checkEmptyState();
        }

        function updateTotalCount() {
            const count = document.querySelectorAll('.anggota-item').length;
            document.getElementById('total-count').innerText = count + " Orang";
        }

        function checkEmptyState() {
            const container = document.getElementById("anggota-container");
            const emptyState = document.getElementById("empty-state-anggota");
            if (container.children.length === 0) {
                emptyState.classList.remove("hidden");
            } else {
                emptyState.classList.add("hidden");
            }
        }

        function addAnggotaItem(nama='', jabatan='') {
            const container = document.getElementById("anggota-container");
            
            if (jabatan && jabatanConfig[jabatan]) {
                if(jabatanConfig[jabatan].count >= jabatanConfig[jabatan].max) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `Jabatan ${jabatan} sudah penuh!`,
                        confirmButtonColor: '#2563eb'
                    });
                    return false; 
                }
                jabatanConfig[jabatan].count++;
            }

            const div = document.createElement("div");
            div.className = "anggota-item bg-white p-3 rounded-xl border border-gray-200 shadow-sm flex flex-col sm:flex-row gap-3 items-center animate-fade-in-down";
            
            div.innerHTML = `
                <div class="relative w-full sm:w-1/3">
                    <select name="jabatan[]" class="jabatan-select custom-select w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded-lg leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            data-previous-value="${jabatan}"
                            onchange="handleJabatanChange(this)" required>
                        ${generateJabatanOptions(jabatan)}
                    </select>
                </div>

                <div class="relative w-full sm:flex-1">
                    <input type="text" name="nama_anggota[]" value="${nama}"
                           class="w-full bg-white border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition placeholder-gray-400"
                           placeholder="Nama Lengkap" required>
                </div>

                <button type="button" onclick="removeAnggota(this)"
                        class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus">
                    <span class="material-symbols-rounded">delete</span>
                </button>
            `;
            
            container.insertBefore(div, container.firstChild);
            
            refreshAllDropdowns();
            return true;
        }

        function processBulkInput() {
            const roleSelect = document.getElementById('bulk-role');
            const namesInput = document.getElementById('bulk-names');
            const role = roleSelect.value;
            const text = namesInput.value;

            if(!role) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Pilih Jabatan',
                    text: 'Silakan pilih jabatan terlebih dahulu!',
                    confirmButtonColor: '#2563eb'
                });
                return;
            }
            if(!text.trim()) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Kosong',
                    text: 'Daftar nama tidak boleh kosong!',
                    confirmButtonColor: '#2563eb'
                });
                return;
            }

            const names = text.split(/\r\n|\n/).map(n => n.trim()).filter(n => n !== '');
            let addedCount = 0;

            for (let name of names) {
                if(name.includes('\t')) {
                    const parts = name.split('\t');
                    name = parts[parts.length - 1]; 
                }

                const success = addAnggotaItem(name, role);
                if(success) addedCount++;
                else break; 
            }

            if(addedCount > 0) {
                namesInput.value = '';
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: `Berhasil menambahkan ${addedCount} orang sebagai ${role}.`,
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        }

        function handleJabatanChange(sel) {
            const oldVal = sel.dataset.previousValue;
            const newVal = sel.value;

            if (oldVal && jabatanConfig[oldVal]) {
                jabatanConfig[oldVal].count--;
            }
            
            if (newVal && jabatanConfig[newVal]) {
                 if (jabatanConfig[newVal].count >= jabatanConfig[newVal].max) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Penuh',
                        text: 'Jabatan ini sudah mencapai batas maksimal!',
                        confirmButtonColor: '#2563eb'
                    });
                    sel.value = oldVal; 
                    return;
                 }
                 jabatanConfig[newVal].count++;
            }

            sel.dataset.previousValue = newVal;
            refreshAllDropdowns();
        }

        function removeAnggota(btn) {
            const row = btn.closest(".anggota-item");
            const sel = row.querySelector(".jabatan-select");
            const jab = sel.dataset.previousValue;

            if (jab && jabatanConfig[jab]) {
                jabatanConfig[jab].count--;
            }
            
            row.remove();
            refreshAllDropdowns();
        }

        window.addEventListener("DOMContentLoaded", () => {
            const bulkSelect = document.getElementById('bulk-role');
            if(bulkSelect) bulkSelect.innerHTML = generateJabatanOptions();

            const existing = @json($event->anggota ?? []);
            
            if (existing.length > 0) {
                [...existing].reverse().forEach(a => addAnggotaItem(a.nama, a.jabatan));
            } else {
                checkEmptyState();
            }
        });

    </script>
    @endpush

</x-app-layout>