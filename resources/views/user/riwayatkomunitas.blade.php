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

<main class="bg-gray-100 min-h-[calc(100vh-64px)] pt-20 pb-8 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">

        <section class="lg:col-span-3 space-y-6">
            
            {{-- Header Konten (MODIFIKASI DI SINI) --}}
            <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-orange-500 flex justify-between items-center">
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900">Komunitas Kamu</h2>
                    <p class="text-gray-500 mt-1">Kumpulan komunitas yang kamu telah tergabung saat ini.</p>
                </div>
                {{-- Tombol Tambah Komunitas di Header --}}
                <a href="/buat-aktivitas" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-150 flex items-center text-sm md:text-base whitespace-nowrap">
                    <i class="fas fa-plus mr-2"></i> Tambah Komunitas
                </a>
            </div>
            
            {{-- Daftar Komunitas --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="community-card bg-white p-6 rounded-lg shadow-md mb-6">
                <div class="flex items-center mb-4">
                    {{-- Ikon Lari --}}
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-running text-blue-600 text-xl"></i>
                    </div>
                    {{-- Info Dasar --}}
                    <div>
                        <p class="text-xl font-bold text-gray-900">Running Club Jakarta</p>
                        <p class="text-sm text-gray-500">32 Anggota | Aktifitas Terakhir: 2 hari lalu</p>
                    </div>
                </div>
                
                {{-- Deskripsi Komunitas --}}
                <p class="text-sm text-gray-600 mt-4 pt-3 border-t border-gray-100">
                    Komunitas lari mingguan untuk semua level, dari pemula hingga maraton.
                </p>
                
                {{-- Tombol Detail --}}
                <div class="flex justify-end mt-4">
                    <a href="#" class="text-sm font-semibold text-orange-500 hover:text-orange-700 transition duration-150 ease-in-out">
                        Lihat Detail 
                        <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            <div class="community-card bg-white p-6 rounded-lg shadow-md mb-6">
                <div class="flex items-center mb-4">
                    {{-- Ikon Voli --}}
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-volleyball-ball text-green-600 text-xl"></i>
                    </div>
                    {{-- Info Dasar --}}
                    <div>
                        <p class="text-xl font-bold text-gray-900">Volly Ball Squad Banten</p>
                        <p class="text-sm text-gray-500">18 Anggota | Aktifitas Terakhir: Hari ini!</p>
                    </div>
                </div>
                
                {{-- Deskripsi Komunitas --}}
                <p class="text-sm text-gray-600 mt-4 pt-3 border-t border-gray-100">
                    Sesi main volly santai setiap Rabu dan Sabtu sore. Semua level diterima.
                </p>
                
                {{-- Tombol Detail --}}
                <div class="flex justify-end mt-4">
                    <a href="#" class="text-sm font-semibold text-orange-500 hover:text-orange-700 transition duration-150 ease-in-out">
                        Lihat Detail 
                        <i class="fas fa-arrow-right ml-1"></i>
                    </a>
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
                <a href="/communityuser" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-150">
                    Cari Komunitas Sekarang <i class="fas fa-search ml-2"></i>
                </a>
            </div>
            
        </section>
        
        {{-- Kolom Kanan (Profil) --}}
<div class="lg:col-span-1 space-y-6">

    {{-- Card: Profil Utama --}}
    <div class="bg-white shadow-md rounded-2xl p-6 text-center border-t-4 border-blue-500">
        @if(Auth::user()->image)
            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                 alt="Foto Profil"
                 class="w-24 h-24 mx-auto rounded-full shadow-md mb-4 object-cover">
        @else
            <img src="https://via.placeholder.com/120/2563EB/FFFFFF?text={{ substr(Auth::user()->name ?? 'U', 0, 1) }}"
                 alt="Foto Profil"
                 class="w-24 h-24 mx-auto rounded-full shadow-md mb-4 object-cover">
        @endif
        <h2 class="text-xl font-bold text-gray-900">
            {{ Auth::user()->name ?? 'Rendra Pratama' }}
        </h2>
        <p class="text-sm text-gray-500 mb-2">Anggota Sejak 2024</p>

        <span class="inline-block bg-yellow-100 text-yellow-700 text-sm font-semibold px-3 py-1 rounded-full mb-3">
            Gold Member
        </span>

        <div class="flex justify-center">
            <a href="/edit-profile-user" 
               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold transition duration-200">
                <i class="fas fa-user-edit mr-2"></i> Edit Profil
            </a>
        </div>
    </div>

    {{-- Card: Statistik Akun --}}
    <div class="bg-white shadow-md rounded-2xl p-6 border-t-4 border-indigo-500">
        <h3 class="text-lg font-semibold text-gray-700 mb-3">Statistik Akun</h3>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex justify-between">
                <span>Total Pemesanan</span>
                <span class="font-semibold text-gray-800">12</span>
            </li>
            <li class="flex justify-between">
                <span>Komunitas Aktif</span>
                <span class="font-semibold text-gray-800">2</span>
            </li>
        </ul>
    </div>

    </div>
</main>

@endsection