@extends('user.layout.user')

@push('css')
<style>
    .stat-card {
        @apply bg-white p-6 rounded-xl shadow-md border-t-4 transition duration-300 ease-in-out hover:shadow-lg;
    }
    .quick-action {
        @apply bg-blue-500 hover:bg-blue-600 text-white p-5 rounded-xl text-center shadow-md transition duration-300 ease-in-out;
    }
    .profile-card {
        @apply bg-white p-6 rounded-xl shadow-md;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<main class="pt-20 min-h-screen p-4 md:p-8 lg:p-10 bg-gray-50">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Kolom Kiri (2/3) --}}
        <div class="lg:col-span-2 space-y-8">
            
            {{-- Header --}}
            <header class="bg-white p-6 rounded-xl shadow-md">
                <h1 class="text-3xl font-bold text-gray-800">
                    Selamat Datang, <span class="text-blue-600">{{ Auth::user()->name ?? 'Rendra' }}</span> 👋
                </h1>
                <p class="text-gray-500 mt-2 text-lg">Siap bergerak aktif hari ini? Yuk, cek progresmu!</p>
            </header>

            {{-- Progres Mingguan --}}
<section>
    <h2 class="text-xl font-semibold text-gray-700 mb-5">Progres Mingguan Anda 💪</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white shadow-md rounded-2xl p-4 border-t-4 border-blue-500 hover:-translate-y-1 transition transform duration-200">
            <div class="flex flex-col items-start">
                <i class="fas fa-clock text-blue-500 text-2xl mb-2"></i>
                <p class="text-sm text-gray-500">Waktu Aktif</p>
                <p class="text-2xl font-bold text-gray-900">
                    4.5 <span class="text-base">Jam</span>
                </p>
                <p class="text-sm text-green-500 mt-1">+1.2 jam minggu ini</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white shadow-md rounded-2xl p-4 border-t-4 border-yellow-400 hover:-translate-y-1 transition transform duration-200">
            <div class="flex flex-col items-start">
                <i class="fas fa-calendar-check text-yellow-500 text-2xl mb-2"></i>
                <p class="text-sm text-gray-500">Sesi Pemesanan</p>
                <p class="text-2xl font-bold text-gray-900">3</p>
                <p class="text-sm text-yellow-500 mt-1">Terakhir: Futsal</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white shadow-md rounded-2xl p-4 border-t-4 border-indigo-500 hover:-translate-y-1 transition transform duration-200">
            <div class="flex flex-col items-start">
                <i class="fas fa-users text-indigo-500 text-2xl mb-2"></i>
                <p class="text-sm text-gray-500">Komunitas Aktif</p>
                <p class="text-2xl font-bold text-gray-900">2</p>
                <p class="text-sm text-indigo-500 mt-1">Volley & Running</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white shadow-md rounded-2xl p-4 border-t-4 border-red-500 hover:-translate-y-1 transition transform duration-200">
            <div class="flex flex-col items-start">
                <i class="fas fa-medal text-red-500 text-2xl mb-2"></i>
                <p class="text-sm text-gray-500">Membership</p>
                <p class="text-2xl font-bold text-gray-900">Gold</p>
                <p class="text-sm text-red-500 mt-1">120 poin ke Platinum</p>
            </div>
        </div>
    </div>
</section>


            {{-- Riwayat Pemesanan --}}
            <section class="bg-white p-6 rounded-xl shadow-md">
                <div class="flex justify-between items-center mb-5 border-b pb-3">
                    <h2 class="text-xl font-semibold text-gray-700">Riwayat Pemesanan Terakhir 📝</h2>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat Semua <i class="fas fa-chevron-right ml-1 text-xs"></i></a>
                </div>
                
                <ul class="space-y-4">
                    <li class="p-3 border rounded-lg hover:bg-gray-50 flex justify-between items-center">
                        <div>
                            <p class="font-medium text-gray-900">Lapangan Futsal Tirtayasa - A</p>
                            <p class="text-sm text-gray-500">14 Okt 2025 | 19:00 - 21:00</p>
                        </div>
                        <span class="text-xs font-semibold px-2 py-1 rounded-full bg-green-100 text-green-700">Selesai</span>
                    </li>
                    <li class="p-3 border rounded-lg hover:bg-gray-50 flex justify-between items-center">
                        <div>
                            <p class="font-medium text-gray-900">GOR Bulu Tangkis Sentosa - 2</p>
                            <p class="text-sm text-gray-500">15 Okt 2025 | 16:00 - 18:00</p>
                        </div>
                        <span class="text-xs font-semibold px-2 py-1 rounded-full bg-blue-100 text-blue-700">Akan Datang</span>
                    </li>
                </ul>
            </section>

            {{-- Aksi Cepat --}}
        <section>
            <h2 class="text-xl font-semibold text-gray-700 mb-5">Aksi Cepat 🚀</h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Card: Sewa Lapangan -->
                <a href="#" 
                class="flex flex-col items-center justify-center bg-white shadow-md rounded-2xl p-6 border-t-4 border-blue-500 hover:-translate-y-1 transition transform duration-200">
                    <i class="fas fa-futbol text-blue-500 text-3xl mb-3"></i>
                    <p class="font-bold text-gray-800 text-lg">Sewa Lapangan</p>
                </a>

                <!-- Card: Cari Komunitas -->
                <a href="#"
                class="flex flex-col items-center justify-center bg-white shadow-md rounded-2xl p-6 border-t-4 border-yellow-500 hover:-translate-y-1 transition transform duration-200">
                    <i class="fas fa-handshake text-yellow-500 text-3xl mb-3"></i>
                    <p class="font-bold text-gray-800 text-lg">Cari Komunitas</p>
                </a>

                <!-- Card: Tempat Sehat -->
                <a href="#"
                class="flex flex-col items-center justify-center bg-white shadow-md rounded-2xl p-6 border-t-4 border-green-500 hover:-translate-y-1 transition transform duration-200">
                    <i class="fas fa-heartbeat text-green-500 text-3xl mb-3"></i>
                    <p class="font-bold text-gray-800 text-lg">Tempat Sehat</p>
                </a>
            </div>
        </section>
        </div>

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
