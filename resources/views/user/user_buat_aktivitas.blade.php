<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>OLGA SEHAT — Buat Aktivitas Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Small custom */
        .glass { background: rgba(255,255,255,0.9); backdrop-filter: blur(8px); }
        .select-card {
            /* Styling dasar */
            border: 2px solid transparent;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        .select-card.selected {
            border-color: #0ea5e9; /* sky-500 */
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.2);
            position: relative;
        }
        .select-card.selected::after {
            content: "\f058"; /* check-circle icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 1rem;
            right: 1rem;
            color: #16a34a; /* green-600 */
            font-size: 1.25rem;
        }
        .select-card:not(.selected):hover {
            border-color: #bae6fd; /* sky-200 */
        }
        /* Style untuk status tidak berizin */
        .card-disabled {
            filter: grayscale(100%);
            opacity: 0.6;
            cursor: not-allowed;
        }
        .card-disabled:hover {
            border-color: transparent !important;
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen font-sans">
    
    @php
        // Ganti ini dengan pengecekan autentikasi sesungguhnya di Laravel
        $is_venue_owner = false; // User biasa tidak bisa buat membership
        $venue_owner_message = "Hanya Pemilik Lapangan yang terdaftar yang dapat membuat paket Membership.";
    @endphp

    <div class="bg-sky-700 py-4 shadow-md">
        <header class="max-w-5xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">OLGA SEHAT</h1>
            <a href="/homeuser" class="text-white/80 hover:text-white transition">Kembali ke Dashboard</a>
        </header>
    </div>

    <main class="max-w-5xl mx-auto px-6 pt-10 pb-24">

        <h2 class="text-3xl md:text-4xl font-bold text-slate-800">Buat Aktivitas Baru</h2>
        <p class="text-lg text-slate-600 mt-2 border-b pb-4">Pilih jenis aktivitas yang ingin kamu publikasikan. Aktifkan fitur Olahraga Anda sekarang!</p>

        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            
            {{-- Kartu 1: Komunitas --}}
            <button data-type="komunitas" class="select-card group rounded-2xl p-6 text-left bg-white transition focus:outline-none">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-2xl mb-2 text-green-600"><i class="fas fa-users"></i></div>
                        <h3 class="text-xl font-semibold text-slate-800">Komunitas</h3>
                        <p class="text-sm text-slate-500 mt-1">Buat grup olahraga rutin (Futsal, Basket, Lari, dll.).</p>
                        <p class="text-xs text-green-600 font-medium mt-3">GRATIS UNTUK SEMUA USER</p>
                    </div>
                </div>
            </button>

            {{-- Kartu 2: Membership (Khusus Pemilik Lapangan) --}}
            <button 
                data-type="membership" 
                @if(!$is_venue_owner) disabled @endif
                class="select-card group rounded-2xl p-6 text-left bg-white transition focus:outline-none @if(!$is_venue_owner) card-disabled @endif"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-2xl mb-2 text-amber-600"><i class="fas fa-credit-card"></i></div>
                        <h3 class="text-xl font-semibold text-slate-800">Membership</h3>
                        <p class="text-sm text-slate-500 mt-1">Buat paket keanggotaan/langganan untuk Lapangan Anda.</p>
                        <p class="text-xs text-amber-600 font-medium mt-3">KHUSUS PEMILIK LAPANGAN</p>
                    </div>
                    @if(!$is_venue_owner)
                        <div class="text-red-500 font-semibold absolute top-4 right-4 text-xs">Akses Ditolak</div>
                    @endif
                </div>
            </button>

            {{-- Kartu 3: Event Olahraga --}}
            <button data-type="event" class="select-card group rounded-2xl p-6 text-left bg-white transition focus:outline-none">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="text-2xl mb-2 text-red-600"><i class="fas fa-calendar-alt"></i></div>
                        <h3 class="text-xl font-semibold text-slate-800">Event Olahraga</h3>
                        <p class="text-sm text-slate-500 mt-1">Buat turnamen, fun run, atau latihan bersama berbayar/gratis.</p>
                        <p class="text-xs text-red-600 font-medium mt-3">TERBUKA UNTUK SEMUA USER</p>
                    </div>
                </div>
            </button>
        </section>

        @if(!$is_venue_owner)
            <div class="mt-8 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-md shadow-inner" role="alert">
                <p class="font-bold">Perhatian!</p>
                <p>{{ $venue_owner_message }}</p>
            </div>
        @endif

        <section id="forms" class="mt-12">

            <form id="form-komunitas" class="hidden bg-white p-8 rounded-2xl shadow-xl glass border border-slate-100" action="{{ route('activities.store.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="jenis" value="komunitas">
                <h2 class="text-2xl font-bold text-sky-800 border-b pb-3 mb-4">Detail Komunitas Baru</h2>
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                {{-- Form fields: Nama, Kategori, Lokasi, Biaya --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Komunitas <span class="text-red-500">*</span></label>
                        <input name="nama" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Contoh: Kumpulan Pemuda Futsal" required value="{{ old('nama') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori Olahraga <span class="text-red-500">*</span></label>
                        <select name="kategori" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Futsal" {{ old('kategori') == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                            <option value="Basket" {{ old('kategori') == 'Basket' ? 'selected' : '' }}>Basket</option>
                            <option value="Yoga" {{ old('kategori') == 'Yoga' ? 'selected' : '' }}>Yoga</option>
                            <option value="Gym" {{ old('kategori') == 'Gym' ? 'selected' : '' }}>Gym</option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Lokasi Kegiatan</label>
                        <input name="lokasi" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Kota Denpasar, Bali" value="{{ old('lokasi') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Biaya Bergabung</label>
                        <div class="flex items-center gap-4 mt-2 h-[48px]">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="biaya" value="gratis" class="form-radio text-sky-600 biaya-radio" {{ old('biaya', 'gratis') == 'gratis' ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600">Gratis</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="biaya" value="berbayar" class="form-radio text-sky-600 biaya-radio" {{ old('biaya') == 'berbayar' ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600">Berbayar (misal: iuran)</span>
                            </label>
                        </div>
                    </div>
                    <div id="harga-komunitas-container" class="{{ old('biaya') == 'berbayar' ? '' : 'hidden' }}">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="harga" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Contoh: 50000" min="0" value="{{ old('harga') }}" {{ old('biaya') == 'berbayar' ? 'required' : '' }}>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" rows="4" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Tulis ringkasan komunitas, jadwal, dan manfaatnya" required>{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Link Grup / Kontak (WhatsApp / IG)</label>
                        <input name="link" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="https://wa.me/.. atau @akuninstagram" value="{{ old('link') }}">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Upload Banner Komunitas (Max 2MB)</label>
                        <input type="file" name="banner" id="komunitas-image" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100" accept="image/*">
                        <img id="komunitas-image-preview" class="mt-4 rounded-lg max-h-40 object-cover hidden shadow-md" alt="Preview Banner">
                    </div>

                    <div class="md:col-span-2 flex items-center gap-4 pt-4">
                        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-bold px-6 py-3 rounded-xl transition duration-200">
                            <i class="fas fa-check-circle mr-2"></i> Simpan Komunitas
                        </button>
                        <button type="button" class="border border-slate-300 text-slate-600 hover:bg-slate-100 px-6 py-3 rounded-xl transition duration-200" onclick="resetForms()">Batal</button>
                    </div>
                </div>
            </form>

            <form id="form-membership" class="hidden bg-white p-8 rounded-2xl shadow-xl glass border border-slate-100" action="{{ route('activities.store.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="jenis" value="membership">
                <h2 class="text-2xl font-bold text-sky-800 border-b pb-3 mb-4">Detail Paket Membership</h2>
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                {{-- Form fields: Nama, Lokasi, Harga, Durasi --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Paket Membership <span class="text-red-500">*</span></label>
                        <input name="nama" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Contoh: GOLD PASS Bulanan" required value="{{ old('nama') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori Olahraga <span class="text-red-500">*</span></label>
                        <select name="kategori" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Futsal" {{ old('kategori') == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                            <option value="Basket" {{ old('kategori') == 'Basket' ? 'selected' : '' }}>Basket</option>
                            <option value="Yoga" {{ old('kategori') == 'Yoga' ? 'selected' : '' }}>Yoga</option>
                            <option value="Gym" {{ old('kategori') == 'Gym' ? 'selected' : '' }}>Gym</option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Lokasi <span class="text-red-500">*</span></label>
                        <input name="lokasi" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Lapangan A - Denpasar" required value="{{ old('lokasi') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Biaya Bergabung</label>
                        <div class="flex items-center gap-4 mt-2 h-[48px]">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="biaya" value="gratis" class="form-radio text-sky-600" {{ old('biaya', 'berbayar') == 'gratis' ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600">Gratis</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="biaya" value="berbayar" class="form-radio text-sky-600" {{ old('biaya', 'berbayar') == 'berbayar' ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600">Berbayar</span>
                            </label>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" rows="4" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Tuliskan semua keuntungan yang didapat member, cth: akses malam, diskon sewa lapangan, free sparing" required>{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Link Grup / Kontak (WhatsApp / IG)</label>
                        <input name="link" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="https://wa.me/.. atau @akuninstagram" value="{{ old('link') }}">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Upload Banner Kartu (Max 2MB)</label>
                        <input type="file" name="banner" id="membership-image" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100" accept="image/*">
                        <img id="membership-image-preview" class="mt-4 rounded-lg max-h-40 object-cover hidden shadow-md" alt="Preview Banner">
                    </div>
                    
                    <div class="md:col-span-2 flex items-center gap-4 pt-4">
                        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-bold px-6 py-3 rounded-xl transition duration-200">
                            <i class="fas fa-check-circle mr-2"></i> Simpan Membership
                        </button>
                        <button type="button" class="border border-slate-300 text-slate-600 hover:bg-slate-100 px-6 py-3 rounded-xl transition duration-200" onclick="resetForms()">Batal</button>
                    </div>
                </div>
            </form>

            <form id="form-event" class="hidden bg-white p-8 rounded-2xl shadow-xl glass border border-slate-100" action="{{ route('activities.store.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="jenis" value="event">
                <h2 class="text-2xl font-bold text-sky-800 border-b pb-3 mb-4">Detail Event Olahraga</h2>
                
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                {{-- Form fields: Nama, Jenis, Waktu, Lokasi, Kapasitas, Biaya --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Event <span class="text-red-500">*</span></label>
                        <input name="nama" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Contoh: Turnamen Futsal Bali 2025" required value="{{ old('nama') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori Olahraga <span class="text-red-500">*</span></label>
                        <select name="kategori" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Futsal" {{ old('kategori') == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                            <option value="Basket" {{ old('kategori') == 'Basket' ? 'selected' : '' }}>Basket</option>
                            <option value="Run / Fun Run" {{ old('kategori') == 'Run / Fun Run' ? 'selected' : '' }}>Run / Fun Run</option>
                            <option value="Gym Challenge" {{ old('kategori') == 'Gym Challenge' ? 'selected' : '' }}>Gym Challenge</option>
                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Lokasi Event <span class="text-red-500">*</span></label>
                        <input name="lokasi" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Lapangan GOR Ngurah Rai" required value="{{ old('lokasi') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Biaya Bergabung</label>
                        <div class="flex items-center gap-4 mt-2 h-[48px]">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="biaya" value="gratis" class="form-radio text-sky-600 biaya-radio-event" {{ old('biaya', 'gratis') == 'gratis' ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600">Gratis</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="biaya" value="berbayar" class="form-radio text-sky-600 biaya-radio-event" {{ old('biaya') == 'berbayar' ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600">Berbayar</span>
                            </label>
                        </div>
                    </div>
                    <div id="harga-event-container" class="{{ old('biaya') == 'berbayar' ? '' : 'hidden' }}">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="harga" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Contoh: 100000" min="0" value="{{ old('harga') }}" {{ old('biaya') == 'berbayar' ? 'required' : '' }}>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi & Aturan Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" rows="4" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="Detail event, hadiah, aturan pendaftaran" required>{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Link Grup / Kontak (WhatsApp / IG)</label>
                        <input name="link" class="w-full rounded-lg border border-slate-300 p-3 focus:border-sky-500 focus:ring-sky-500" placeholder="https://wa.me/.. atau @akuninstagram" value="{{ old('link') }}">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Upload Poster Event (Max 2MB)</label>
                        <input type="file" name="banner" id="event-image" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100" accept="image/*">
                        <img id="event-image-preview" class="mt-4 rounded-lg max-h-40 object-cover hidden shadow-md" alt="Preview Poster">
                    </div>

                    <div class="md:col-span-2 flex items-center gap-4 pt-4">
                        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-bold px-6 py-3 rounded-xl transition duration-200">
                            <i class="fas fa-check-circle mr-2"></i> Simpan Event
                        </button>
                        <button type="button" class="border border-slate-300 text-slate-600 hover:bg-slate-100 px-6 py-3 rounded-xl transition duration-200" onclick="resetForms()">Batal</button>
                    </div>
                </div>
            </form>

        </section>

    </main>

    <script>
        // Simple JS to toggle forms and preview
        const cards = document.querySelectorAll('.select-card');
        const formKom = document.getElementById('form-komunitas');
        const formMem = document.getElementById('form-membership');
        const formEvt = document.getElementById('form-event');
        const formsSection = document.getElementById('forms');

        function hideAll() {
            formKom.classList.add('hidden');
            formMem.classList.add('hidden');
            formEvt.classList.add('hidden');
        }

        cards.forEach(c => c.addEventListener('click', () => {
            // Cek jika disabled (khusus Membership)
            if (c.disabled) {
                alert("Anda tidak memiliki izin Pemilik Lapangan untuk membuat Membership.");
                return;
            }

            // Atur status selected
            cards.forEach(x => x.classList.remove('selected'));
            c.classList.add('selected');
            
            const t = c.getAttribute('data-type');
            hideAll();
            
            // Tampilkan form yang sesuai
            if (t === 'komunitas') {
                formKom.classList.remove('hidden');
                // Initialize harga toggle setelah form ditampilkan
                setTimeout(() => {
                    initializeHargaToggle('komunitas');
                }, 100);
            }
            if (t === 'membership') formMem.classList.remove('hidden');
            if (t === 'event') {
                formEvt.classList.remove('hidden');
                // Initialize harga toggle setelah form ditampilkan
                setTimeout(() => {
                    initializeHargaToggle('event');
                }, 100);
            }
            
            // Scroll ke form
            if (!formsSection.classList.contains('hidden')) {
                window.scrollTo({ top: formsSection.offsetTop - 40, behavior: 'smooth' });
            }
        }));

        // --- Membership Preview Bindings ---
        const mNama = document.querySelector('#form-membership [name="m_nama"]');
        const mLokasi = document.querySelector('#form-membership [name="m_lokasi"]');
        const mHarga = document.querySelector('#form-membership [name="m_harga"]');
        const mDurasi = document.querySelector('#form-membership [name="m_durasi"]');
        const mFasilitas = document.querySelector('#form-membership [name="m_fasilitas"]');

        function updatePreview() {
            // Nilai default dan formatting
            const nama = mNama.value || 'GOLD PASS Bulanan';
            const lokasi = mLokasi.value || 'Lapangan A - Denpasar';
            const harga = mHarga.value ? Number(mHarga.value).toLocaleString('id-ID') : '0';
            const durasi = mDurasi.value || 'Bulan';
            
            // Format Fasilitas
            let fasilitasText = mFasilitas.value.split('\n').join(' · ').replace(/[^\w\s\·]/g, '');
            if(fasilitasText.length > 50) fasilitasText = fasilitasText.substring(0, 50) + '...';
            fasilitasText = fasilitasText || 'akses malam · diskon sewa · free sparing';


            document.getElementById('preview-title').textContent = nama;
            document.getElementById('preview-lokasi').textContent = lokasi;
            document.getElementById('preview-harga').textContent = `Rp ${harga} / ${durasi.replace('1 ', '')}`;
            document.getElementById('preview-fasilitas').textContent = 'Fasilitas: ' + fasilitasText;
        }

        [mNama, mLokasi, mHarga, mDurasi, mFasilitas].forEach(i => i && i.addEventListener('input', updatePreview));
        [mNama, mLokasi, mHarga, mDurasi, mFasilitas].forEach(i => i && i.addEventListener('change', updatePreview)); // Untuk select

        // --- Image Preview Helpers ---
        function previewImage(input, targetSelector) {
            const file = input.files && input.files[0];
            const target = document.querySelector(targetSelector);
            
            if (!target) return;

            if (!file) {
                target.classList.add('hidden');
                return;
            }

            const reader = new FileReader();
            reader.onload = e => {
                target.src = e.target.result;
                target.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }

        document.getElementById('komunitas-image').addEventListener('change', e => previewImage(e.target, '#komunitas-image-preview'));
        document.getElementById('membership-image').addEventListener('change', e => previewImage(e.target, '#membership-image-preview'));
        document.getElementById('event-image').addEventListener('change', e => previewImage(e.target, '#event-image-preview'));

        // --- Fake Submit Handlers ---
        function submitKomunitas() {
            alert('Komunitas berhasil dibuat! (Demo). Redirecting...');
            resetForms();
        }
        function submitMembership() {
            alert('Membership disimpan! (Demo). Redirecting...');
            resetForms();
        }
        function submitEvent() {
            alert('Event tersimpan! (Demo). Redirecting...');
            resetForms();
        }

        // --- Reset Function ---
        function resetForms() {
            hideAll();
            cards.forEach(x => x.classList.remove('selected'));
            document.querySelectorAll('form').forEach(f => f.reset());
            document.querySelectorAll('img[id$="-preview"]').forEach(img => img.classList.add('hidden'));
            updatePreview();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // --- Toggle Harga Input Based on Biaya Selection ---
        function initializeHargaToggle(formType) {
            if (formType === 'komunitas') {
                const hargaKomunitasContainer = document.getElementById('harga-komunitas-container');
                const hargaKomunitasInput = hargaKomunitasContainer?.querySelector('input[name="harga"]');
                
                // Add listeners to all radio buttons
                document.querySelectorAll('#form-komunitas .biaya-radio').forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === 'berbayar') {
                            hargaKomunitasContainer?.classList.remove('hidden');
                            if (hargaKomunitasInput) {
                                hargaKomunitasInput.required = true;
                                hargaKomunitasInput.setAttribute('required', 'required');
                            }
                        } else {
                            hargaKomunitasContainer?.classList.add('hidden');
                            if (hargaKomunitasInput) {
                                hargaKomunitasInput.required = false;
                                hargaKomunitasInput.removeAttribute('required');
                                hargaKomunitasInput.value = '';
                            }
                        }
                    });
                    
                    // Check initial state immediately
                    if (radio.checked && radio.value === 'berbayar') {
                        hargaKomunitasContainer?.classList.remove('hidden');
                        if (hargaKomunitasInput) {
                            hargaKomunitasInput.required = true;
                            hargaKomunitasInput.setAttribute('required', 'required');
                        }
                    }
                });
            } else if (formType === 'event') {
                const hargaEventContainer = document.getElementById('harga-event-container');
                const hargaEventInput = hargaEventContainer?.querySelector('input[name="harga"]');
                
                // Add listeners to all radio buttons
                document.querySelectorAll('#form-event .biaya-radio-event').forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === 'berbayar') {
                            hargaEventContainer?.classList.remove('hidden');
                            if (hargaEventInput) {
                                hargaEventInput.required = true;
                                hargaEventInput.setAttribute('required', 'required');
                            }
                        } else {
                            hargaEventContainer?.classList.add('hidden');
                            if (hargaEventInput) {
                                hargaEventInput.required = false;
                                hargaEventInput.removeAttribute('required');
                                hargaEventInput.value = '';
                            }
                        }
                    });
                    
                    // Check initial state immediately
                    if (radio.checked && radio.value === 'berbayar') {
                        hargaEventContainer?.classList.remove('hidden');
                        if (hargaEventInput) {
                            hargaEventInput.required = true;
                            hargaEventInput.setAttribute('required', 'required');
                        }
                    }
                });
            }
        }

        function toggleHargaInput() {
            // Initialize for all forms on page load
            initializeHargaToggle('komunitas');
            initializeHargaToggle('event');
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updatePreview();
            toggleHargaInput();
            
            // Also check if form is already visible (e.g., after validation error)
            if (!formKom.classList.contains('hidden')) {
                initializeHargaToggle('komunitas');
            }
            if (!formEvt.classList.contains('hidden')) {
                initializeHargaToggle('event');
            }
        });
        
        // Also initialize immediately (for cases where DOMContentLoaded already fired)
        updatePreview();
        toggleHargaInput();
    </script>
</body>
</html>