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
        /* Menggunakan warna orange untuk status aktif */
        @apply bg-orange-500 text-white shadow-md shadow-orange-200;
    }
    .profile-nav-link:not(.active) {
        @apply text-gray-700 hover:bg-gray-100 hover:text-orange-500;
    }
    /* Styling untuk ikon navigasi */
    .profile-nav-link i {
        @apply w-5 h-5 mr-3;
    }
    /* Styling khusus untuk Card Membership */
    .membership-card {
        /* Gradien biru yang menarik untuk card utama */
        @apply bg-gradient-to-br from-blue-600 to-blue-800 text-white p-6 rounded-xl shadow-2xl;
    }
    .membership-feature {
        @apply flex items-start text-sm mb-2;
    }
</style>
@endpush

@section('content')

<main class="bg-gray-100 min-h-[calc(100vh-64px)] py-8 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">

        <section class="lg:col-span-3 space-y-6">
            
            {{-- Header Konten --}}
            <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-orange-500 flex justify-between items-center">
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900">Membership Aktif Kamu</h2>
                    <p class="text-gray-500 mt-1">Kelola dan cek manfaat keanggotaanmu di berbagai venue.</p>
                </div>
                {{-- Tombol CTA --}}
                <a href="/beli-membership" class="bg-orange-500 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-orange-600 transition duration-150 flex items-center text-sm md:text-base whitespace-nowrap">
                    <i class="fas fa-shopping-cart mr-2"></i> Beli Baru
                </a>
            </div>
            
            {{-- Daftar Membership (Bisa lebih dari satu) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Kartu Membership Aktif (Contoh 1: Futsal) --}}
                <div class="membership-card">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-extrabold flex items-center">
                            <i class="fas fa-award mr-3 text-yellow-300"></i> GOLD PASS
                        </h3>
                        <span class="text-sm font-semibold px-3 py-1 rounded-full bg-white bg-opacity-20">Venue A</span>
                    </div>

                    <p class="text-3xl font-bold mt-4">Futsal Tirtayasa Club</p>
                    
                    <div class="mt-4 pt-4 border-t border-white border-opacity-30">
                        <p class="text-xs font-semibold uppercase opacity-80">Masa Aktif</p>
                        <p class="text-lg font-bold">14 Okt 2025 - 14 Nov 2025</p>
                        <p class="text-yellow-300 text-sm mt-1">Sisa 31 Hari</p>
                    </div>

                    {{-- Manfaat Membership --}}
                    <div class="mt-5 space-y-2">
                        <p class="font-semibold mb-2">Manfaat Keanggotaan:</p>
                        <div class="membership-feature">
                            <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i> Diskon Booking 30% setiap hari.
                        </div>
                        <div class="membership-feature">
                            <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i> 4 Sesi Gratis (Sudah terpakai: 1).
                        </div>
                        <div class="membership-feature">
                            <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i> Akses prioritas lapangan A & B.
                        </div>
                    </div>

                    {{-- Aksi --}}
                    <div class="mt-6 flex justify-between items-center pt-4 border-t border-white border-opacity-30">
                        <a href="/perpanjang-membership" class="text-sm font-semibold text-white hover:text-yellow-300">
                            Perpanjang Sekarang <i class="fas fa-chevron-right ml-1"></i>
                        </a>
                        <button class="bg-white text-blue-700 font-semibold text-sm px-4 py-2 rounded-full hover:bg-gray-100 transition">
                            <i class="fas fa-book-open mr-1"></i> Booking
                        </button>
                    </div>
                </div>
                
                {{-- Kartu Membership Lain (Contoh 2: Gym/Fitness) --}}
                <div class="membership-card bg-gradient-to-br from-purple-600 to-indigo-800">
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-extrabold flex items-center">
                            <i class="fas fa-dumbbell mr-3 text-pink-300"></i> PLATINUM
                        </h3>
                        <span class="text-sm font-semibold px-3 py-1 rounded-full bg-white bg-opacity-20">Venue B</span>
                    </div>

                    <p class="text-3xl font-bold mt-4">Fitness Center Sehat</p>
                    
                    <div class="mt-4 pt-4 border-t border-white border-opacity-30">
                        <p class="text-xs font-semibold uppercase opacity-80">Masa Aktif</p>
                        <p class="text-lg font-bold">5 Okt 2025 - 5 Des 2025</p>
                        <p class="text-yellow-300 text-sm mt-1">Sisa 52 Hari</p>
                    </div>

                    {{-- Manfaat Membership --}}
                    <div class="mt-5 space-y-2">
                        <p class="font-semibold mb-2">Manfaat Keanggotaan:</p>
                        <div class="membership-feature">
                            <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i> Akses tak terbatas 24/7.
                        </div>
                        <div class="membership-feature">
                            <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i> Gratis 2 Sesi Konsultasi PT.
                        </div>
                        <div class="membership-feature">
                            <i class="fas fa-check-circle mr-2 mt-0.5 text-green-300"></i> Kelas Aerobik dan Yoga Gratis.
                        </div>
                    </div>

                    {{-- Aksi --}}
                    <div class="mt-6 flex justify-between items-center pt-4 border-t border-white border-opacity-30">
                        <a href="/perpanjang-membership" class="text-sm font-semibold text-white hover:text-yellow-300">
                            Perpanjang Sekarang <i class="fas fa-chevron-right ml-1"></i>
                        </a>
                        <button class="bg-white text-purple-700 font-semibold text-sm px-4 py-2 rounded-full hover:bg-gray-100 transition">
                            <i class="fas fa-calendar-plus mr-1"></i> Reservasi
                        </button>
                    </div>
                </div>

            </div>

            {{-- Empty State (Gunakan jika tidak ada data) --}}
            </section>

            {{-- Kolom Kanan (Profil) --}}
<div class="lg:col-span-1 space-y-6">

    {{-- Card: Profil Utama --}}
    <div class="bg-white shadow-md rounded-2xl p-6 text-center border-t-4 border-blue-500">
        <img src="https://via.placeholder.com/120/2563EB/FFFFFF?text=R" 
             alt="Foto Profil" 
             class="w-24 h-24 mx-auto rounded-full shadow-md mb-4 object-cover">
        <h2 class="text-xl font-bold text-gray-900">
            {{ Auth::user()->name ?? 'Rendra Pratama' }}
        </h2>
        <p class="text-sm text-gray-500 mb-2">Anggota Sejak 2024</p>

        <span class="inline-block bg-yellow-100 text-yellow-700 text-sm font-semibold px-3 py-1 rounded-full mb-3">
            Gold Member
        </span>

        <div class="flex justify-center">
            <a href="#" 
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