<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logos/Logo-MS-kuning.png') }}">
</head>
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

                {{-- ======================================================
                     BAGIAN KIRI (FORM)
                ====================================================== --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- DETAIL --}}
                    <div class="bg-white rounded-2xl shadow-sm border p-6">
                        <h2 class="text-lg font-semibold flex items-center gap-2 mb-4">
                            <span class="material-symbols-rounded text-blue-500">edit_document</span>
                            Detail Kegiatan
                        </h2>

                        <div class="space-y-5">
                            <div>
                                <label class="text-sm font-medium">Nama Kegiatan</label>
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                       value="{{ old('nama_kegiatan',$event->nama_kegiatan ?? '') }}"
                                       class="w-full bg-gray-50 rounded-xl border-gray-200 px-4 py-2.5"
                                       required>
                            </div>

                            <div>
                                <label class="text-sm font-medium">Lokasi Kegiatan</label>
                                <input type="text" id="lokasi_kegiatan" name="lokasi_kegiatan"
                                       value="{{ old('lokasi_kegiatan',$event->lokasi_kegiatan ?? '') }}"
                                       class="w-full bg-gray-50 rounded-xl border-gray-200 px-4 py-2.5"
                                       required>
                            </div>

                            <div>
                                <label class="text-sm font-medium">Tanggal</label>
                                <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                                       value="{{ old('tanggal_pelaksanaan', isset($event) ? $event->tanggal_pelaksanaan->format('Y-m-d') : '') }}"
                                       class="w-full bg-gray-50 rounded-xl border-gray-200 px-4 py-2.5"
                                       required>
                            </div>

                            <div>
                                <label class="text-sm font-medium">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="4"
                                          class="w-full bg-gray-50 rounded-xl border-gray-200 px-4 py-2.5"
                                          required>{{ old('deskripsi',$event->deskripsi ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- PANITIA --}}
                    <div class="bg-white rounded-2xl shadow-sm border p-6">
                        <div class="flex justify-between mb-4">
                            <h2 class="text-lg font-semibold flex items-center gap-2">
                                <span class="material-symbols-rounded text-indigo-500">groups</span>
                                Tim & Panitia
                            </h2>
                            <button id="add-anggota" type="button"
                                    class="px-3 py-1.5 bg-indigo-50 text-indigo-600 rounded-lg flex items-center gap-1">
                                <span class="material-symbols-rounded text-base">add</span> Tambah
                            </button>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 border border-dashed">
                            <div id="anggota-container" class="space-y-3"></div>
                            <p id="empty-state-anggota" class="text-center text-gray-400 text-sm py-2 hidden">
                                Belum ada anggota.
                            </p>
                        </div>
                    </div>

                </div>

                {{-- ======================================================
                     BAGIAN KANAN (FOTO)
                ====================================================== --}}
                <div class="space-y-6">

                    {{-- FOTO --}}
                    <div class="bg-white rounded-2xl shadow-sm border p-6">
                        <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                            <span class="material-symbols-rounded text-pink-500">image</span>
                            Foto Poster / Dokumentasi
                        </h2>

                        <div class="relative group">
                            <input type="file" name="foto" id="foto" accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                            <div id="drop-zone"
                                 class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center transition">
                                <span class="material-symbols-rounded text-4xl text-gray-300">cloud_upload</span>
                                <p class="text-sm font-medium text-gray-700 mt-2">Klik atau Drag ke sini</p>
                                <p class="text-xs text-gray-500">JPG, PNG Max 2MB</p>
                            </div>
                        </div>

                        <div id="foto-preview-container"
                             class="mt-4 {{ isset($event) && $event->foto ? '' : 'hidden' }}">
                            <div class="rounded-xl overflow-hidden shadow">
                                <img id="foto-preview"
                                     src="{{ isset($event) ? asset('storage/'.$event->foto) : '' }}"
                                     class="w-full object-cover">
                            </div>
                        </div>
                    </div>

                    {{-- SUBMIT --}}
                    <div class="bg-white rounded-2xl shadow p-6 sticky top-24">
                        <button type="submit"
                                class="w-full py-3 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700">
                            {{ isset($event) ? 'Update Kegiatan' : 'Simpan Kegiatan' }}
                        </button>
                    </div>

                </div>

            </div>
        </form>
    </div>

    {{-- ==========================================================
         FINAL DROPZONE SCRIPT (CYPRESS READY)
    ========================================================== --}}
    <script>
        const fileInput = document.getElementById("foto");
        const dropZone = document.getElementById("drop-zone");
        const previewContainer = document.getElementById("foto-preview-container");
        const previewImage = document.getElementById("foto-preview");

        /* Highlight */
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

        fileInput.addEventListener("drop", e => {
            e.preventDefault();
            const file = e.dataTransfer.files[0];
            if (file) setFile(file);
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
    </script>


    {{-- ==========================================================
         PANITIA SCRIPT (Tidak diubah)
    ========================================================== --}}
    <script>
        const jabatanConfig = {
            "Ketua Pelaksana": { max:1, count:0 },
            "Wakil": { max:1, count:0 },
            "Bendahara": { max:5, count:0 },
            "Acara": { max:10, count:0 },
            "Sekretaris": { max:5, count:0 },
            "Dokumentasi": { max:10, count:0 },
            "Humas": { max:10, count:0 },
            "Sponsorship": { max:10, count:0 }
        };

        function generateJabatanOptions() {
            let options = `<option value="">Pilih Jabatan</option>`;
            for (let j in jabatanConfig) {
                const c = jabatanConfig[j];
                const disabled = c.count >= c.max ? "disabled" : "";
                const label = c.count >= c.max ? `${j} (Penuh)` : j;
                options += `<option value="${j}" ${disabled}>${label}</option>`;
            }
            return options;
        }

        function updateAllDropdowns() {
            document.querySelectorAll('.jabatan-select').forEach(sel => {
                const old = sel.value;
                sel.innerHTML = generateJabatanOptions();
                sel.value = old;
            });
        }

        function addAnggotaItem(nama='', jabatan='') {
            const wrap = document.getElementById("anggota-container");
            const div = document.createElement("div");
            div.className = "anggota-item bg-white p-3 rounded-xl border flex flex-col sm:flex-row gap-3";
            div.innerHTML = `
                <select name="jabatan[]" class="jabatan-select bg-gray-50 border-gray-200 rounded-lg px-3 py-2"
                        onchange="handleJabatanChange(this)" required>
                    ${generateJabatanOptions()}
                </select>

                <input type="text" name="nama_anggota[]" value="${nama}"
                       class="flex-1 bg-gray-50 border-gray-200 rounded-lg px-3 py-2"
                       placeholder="Nama Lengkap" required>

                <button type="button" onclick="removeAnggota(this)"
                        class="text-red-500 hover:text-red-700">
                    <span class="material-symbols-rounded">delete</span>
                </button>
            `;
            wrap.appendChild(div);

            const sel = div.querySelector(".jabatan-select");
            sel.value = jabatan;
            sel.dataset.previousValue = jabatan;

            if (jabatan && jabatanConfig[jabatan]) jabatanConfig[jabatan].count++;
            updateAllDropdowns();
        }

        document.getElementById("add-anggota").onclick = () => addAnggotaItem();

        function handleJabatanChange(sel) {
            const old = sel.dataset.previousValue;
            const now = sel.value;

            if (old && jabatanConfig[old]) jabatanConfig[old].count--;
            if (now && jabatanConfig[now]) jabatanConfig[now].count++;

            sel.dataset.previousValue = now;
            updateAllDropdowns();
        }

        function removeAnggota(btn) {
            const row = btn.closest(".anggota-item");
            const sel = row.querySelector(".jabatan-select");
            const jab = sel.dataset.previousValue;

            if (jab && jabatanConfig[jab]) jabatanConfig[jab].count--;
            row.remove();
            updateAllDropdowns();
        }

        // Load existing anggota
        window.addEventListener("DOMContentLoaded", () => {
            const existing = @json($event->anggota ?? []);
            if (existing.length > 0) {
                existing.forEach(a => addAnggotaItem(a.nama, a.jabatan));
            } else {
                addAnggotaItem();
            }
        });
        document.getElementById('kegiatan-form').addEventListener('submit', function(e) {
            console.log('📤 Form submitted!');
            console.log('📷 Foto files:', document.getElementById('foto').files);
            console.log('👥 Anggota count:', document.querySelectorAll('[name="jabatan[]"]').length);
        });
    </script>

</x-app-layout>
