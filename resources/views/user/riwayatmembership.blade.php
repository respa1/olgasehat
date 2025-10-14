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

        <aside class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-2xl p-6">
                
                {{-- Detail Profil --}}
                <div class="flex flex-col items-center space-y-3 mb-6">
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
                    <a href="/riwayat komunitas" class="profile-nav-link">
                        <i class="fas fa-users"></i> Komunitas
                    </a>
                    {{-- Ganti tautan "Aktifitas" menjadi "Membership" --}}
                    <a href="/riwayatclub" class="profile-nav-link active">
                        <i class="fas fa-medal"></i> Membership Aktif
                    </a>
                    <a href="#" class="profile-nav-link text-red-500 hover:bg-red-50 hover:text-red-700 mt-4 border-t pt-3">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </nav>
            </div>
        </aside>

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

    </div>
</main>

@endsection