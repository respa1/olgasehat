    @extends('user.layout.user')

    @push('css')
    {{-- Asumsi Tailwind CSS dimuat di layout utama --}}
    <style>
        /* Styling khusus Card Statistik */
        .stat-card {
            @apply bg-white p-6 rounded-xl shadow-md border-t-4 border-blue-500 transition duration-300 ease-in-out hover:shadow-lg hover:border-blue-600;
        }
        /* Styling untuk tombol Aksi Cepat */
        .quick-action-btn {
            @apply flex flex-col items-center justify-center p-6 text-center rounded-xl transition duration-300 ease-in-out h-40;
        }
        /* Untuk ikon di Quick Actions */
        .icon-large {
            @apply w-12 h-12 mb-3;
        }
    </style>
    {{-- Memastikan ikon Font Awesome tersedia untuk visual --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @endpush

    @section('content')
    <main class="pt-18 min-h-screen p-4 md:p-8 lg:p-10 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            
            <header class="mb-8 p-6 bg-white rounded-xl shadow-md">
                <h1 class="text-3xl font-bold text-gray-800">
                    Selamat Datang Kembali, <span class="text-blue-600">{{ Auth::user()->name ?? 'Pengguna' }}</span>!
                </h1>
                <p class="text-gray-600 mt-2 text-lg">Siap bergerak aktif hari ini? Mari cek kemajuan Anda.</p>
            </header>

            <section class="mb-10">
                <h2 class="text-xl font-semibold text-gray-700 mb-5">Progres Mingguan Anda 💪</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    
                    {{-- Card 1: Waktu Aktif --}}
                    <div class="stat-card">
                        <i class="icon-large text-green-500 fas fa-clock"></i>
                        <p class="text-xs font-semibold uppercase text-gray-500 mt-2">Waktu Aktif</p>
                        <p class="text-2xl font-bold text-gray-900">4.5 <span class="text-base font-normal">Jam</span></p>
                        <p class="text-sm text-green-500">+1.2 jam dari minggu lalu</p>
                    </div>

                    {{-- Card 2: Sesi Pemesanan --}}
                    <div class="stat-card">
                        <i class="icon-large text-yellow-500 fas fa-calendar-check"></i>
                        <p class="text-xs font-semibold uppercase text-gray-500 mt-2">Sesi Pemesanan</p>
                        <p class="text-2xl font-bold text-gray-900">3 <span class="text-base font-normal">Sesi</span></p>
                        <p class="text-sm text-yellow-600">Terakhir: Futsal (2 hari lalu)</p>
                    </div>
                    
                    {{-- Card 3: Komunitas Aktif --}}
                    <div class="stat-card">
                        <i class="icon-large text-indigo-500 fas fa-users"></i>
                        <p class="text-xs font-semibold uppercase text-gray-500 mt-2">Komunitas Aktif</p>
                        <p class="text-2xl font-bold text-gray-900">2</p>
                        <p class="text-sm text-indigo-500">Volly Ball & Running Club</p>
                    </div>
                    
                    {{-- Card 4: Poin/Membership --}}
                    <div class="stat-card">
                        <i class="icon-large text-red-500 fas fa-medal"></i>
                        <p class="text-xs font-semibold uppercase text-gray-500 mt-2">Status Membership</p>
                        <p class="text-2xl font-bold text-gray-900">Gold</p>
                        <p class="text-sm text-red-500">Level Berikut: Platinum (120 Poin)</p>
                    </div>

                </div>
            </section>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Kolom Kiri: Riwayat Pemesanan (2/3 Lebar) --}}
                <section class="lg:col-span-2 bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex justify-between items-center mb-5 border-b pb-3">
                        <h2 class="text-xl font-semibold text-gray-700">Riwayat Pemesanan Terakhir 📝</h2>
                        <a href="" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat Semua <i class="fas fa-chevron-right ml-1 text-xs"></i></a>
                    </div>
                    
                    {{-- Data Dummy Riwayat --}}
                    <ul class="space-y-4">
                        <li class="p-3 border rounded-lg hover:bg-gray-50 flex justify-between items-center">
                            <div>
                                <p class="font-medium text-gray-900">Lapangan Futsal Tirtayasa - Lapangan A</p>
                                <p class="text-sm text-gray-500">Senin, 14 Okt 2025 | 19:00 - 21:00 WITA</p>
                            </div>
                            <span class="text-xs font-semibold px-2 py-1 rounded-full bg-green-100 text-green-700">Selesai</span>
                        </li>
                        <li class="p-3 border rounded-lg hover:bg-gray-50 flex justify-between items-center">
                            <div>
                                <p class="font-medium text-gray-900">GOR Bulu Tangkis Sentosa - Court 2</p>
                                <p class="text-sm text-gray-500">Besok, 15 Okt 2025 | 16:00 - 18:00 WITA</p>
                            </div>
                            <span class="text-xs font-semibold px-2 py-1 rounded-full bg-blue-100 text-blue-700">Akan Datang</span>
                        </li>
                        @empty($history)
                            <li class="text-center py-4 text-gray-500">Belum ada riwayat pemesanan. Mulai booking sekarang!</li>
                        @endempty
                    </ul>

                </section>

                {{-- Kolom Kanan: Aksi Cepat (1/3 Lebar) --}}
                <section class="lg:col-span-1 space-y-5">
                    <h2 class="text-xl font-semibold text-gray-700 mb-5">Aksi Cepat 🚀</h2>
                    
                    {{-- Card Aksi 1: Sewa Lapangan --}}
                    <a href="" class="quick-action-btn bg-blue-500 text-white shadow-xl hover:bg-blue-600">
                        <i class="icon-large fas fa-futbol"></i>
                        <p class="text-lg font-bold">Sewa Lapangan Sekarang</p>
                        <p class="text-sm mt-1">Booking tempat olahraga terdekat.</p>
                    </a>
                    
                    {{-- Card Aksi 2: Cari Komunitas --}}
                    <a href="" class="quick-action-btn bg-yellow-500 text-white shadow-xl hover:bg-yellow-600">
                        <i class="icon-large fas fa-handshake"></i>
                        <p class="text-lg font-bold">Cari Komunitas Baru</p>
                        <p class="text-sm mt-1">Temukan teman main di sekitar Anda.</p>
                    </a>
                    
                </section>
            </div>
            
        </div>
    </main>
    @endsection