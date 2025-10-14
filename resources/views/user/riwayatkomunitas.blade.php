@extends('user.layout.user')

@push('css')
{{-- Memastikan ikon Font Awesome tersedia untuk visual --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    /* Styling untuk tautan navigasi profil yang aktif */
    .profile-nav-link {
        @apply flex items-center p-3 rounded-lg font-semibold transition duration-150;
    }
    .profile-nav-link.active {
        @apply bg-orange-500 text-white shadow-md shadow-orange-200;
    }
    .profile-nav-link:not(.active) {
        @apply text-gray-700 hover:bg-gray-100 hover:text-orange-500;
    }
    /* Styling untuk ikon navigasi */
    .profile-nav-link i {
        @apply w-5 h-5 mr-3;
    }
    /* Styling untuk kartu komunitas */
    .community-card {
        @apply bg-white p-5 rounded-xl shadow-lg border border-gray-100 transition duration-300 hover:shadow-xl hover:-translate-y-1;
    }
</style>
@endpush

@section('content')

<main class="bg-gray-100 min-h-[calc(100vh-64px)] py-8 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">

        <aside class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-2xl p-6">
                
                {{-- Detail Profil --}}
                <div class="flex flex-col items-center space-y-3 mb-6">
                    {{-- Avatar --}}
                    <div class="w-24 h-24 rounded-full border-4 border-blue-500 bg-gray-200 flex items-center justify-center text-blue-600 shadow-md">
                        <i class="fas fa-user text-4xl"></i>
                    </div>
                    <div class="text-center">
                        <p class="font-extrabold text-xl text-gray-900">rsteam</p>
                        <p class="text-gray-500 text-sm">@rteam166</p>
                    </div>
                </div>

                <hr class="w-full border-gray-200 mb-6" />

                {{-- Navigasi Profil --}}
                <nav class="w-full space-y-2">
                    <a href="/dashboarduser" class="profile-nav-link">
                        <i class="fas fa-user-circle"></i> Update Profile
                    </a>
                    <a href="/riwayat komunitas" class="profile-nav-link active">
                        <i class="fas fa-users"></i> Komunitas
                    </a>
                    <a href="/riwayatclub" class="profile-nav-link">
                        <i class="fas fa-calendar-alt"></i> Aktifitas
                    </a>
                    {{-- Tambahkan link Logout yang menonjol --}}
                    <a href="#" class="profile-nav-link text-red-500 hover:bg-red-50 hover:text-red-700 mt-4 border-t pt-3">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </nav>
            </div>
        </aside>

        <section class="lg:col-span-3 space-y-6">
            
            {{-- Header Konten (MODIFIKASI DI SINI) --}}
            <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-orange-500 flex justify-between items-center">
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900">Komunitas Kamu</h2>
                    <p class="text-gray-500 mt-1">Kumpulan komunitas yang kamu telah tergabung saat ini.</p>
                </div>
                {{-- Tombol Tambah Komunitas di Header --}}
                <a href="/cari-komunitas" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-150 flex items-center text-sm md:text-base whitespace-nowrap">
                    <i class="fas fa-plus mr-2"></i> Tambah Komunitas
                </a>
            </div>
            
            {{-- Daftar Komunitas --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Komunitas 1: Contoh Komunitas Aktif --}}
                <div class="community-card">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-running text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-gray-900">Running Club Jakarta</p>
                            <p class="text-sm text-gray-500">32 Anggota | Aktifitas Terakhir: 2 hari lalu</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mt-3 border-t pt-3">
                        Komunitas lari mingguan untuk semua level, dari pemula hingga maraton.
                    </p>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-sm font-semibold text-orange-500 hover:text-orange-700">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                {{-- Komunitas 2: Contoh Komunitas Aktif --}}
                <div class="community-card">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-volleyball-ball text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xl font-bold text-gray-900">Volly Ball Squad Banten</p>
                            <p class="text-sm text-gray-500">18 Anggota | Aktifitas Terakhir: Hari ini!</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mt-3 border-t pt-3">
                        Sesi main volly santai setiap Rabu dan Sabtu sore. Semua level diterima.
                    </p>
                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-sm font-semibold text-orange-500 hover:text-orange-700">Lihat Detail <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>

            {{-- Empty State yang Ditingkatkan (MODIFIKASI DI SINI) --}}
            <div class="bg-white rounded-xl shadow-xl p-10 flex flex-col items-center justify-center text-center border-2 border-dashed border-gray-300">
                <i class="fas fa-users-slash text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Tergabung Komunitas</h3>
                <p class="text-gray-500 max-w-lg mb-6">
                    Yuk, cari teman main baru! Bergabunglah dengan komunitas olahraga favoritmu untuk menambah semangat dan relasi.
                </p>
                {{-- Tombol Tambah Komunitas di Empty State --}}
                <a href="/cari-komunitas" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-150">
                    Cari Komunitas Sekarang <i class="fas fa-search ml-2"></i>
                </a>
            </div>
            
        </section>

    </div>
</main>

@endsection