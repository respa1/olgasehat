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

<main class="bg-gray-100 min-h-[calc(100vh-64px)] pt-20 pb-8 px-4">
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
            
            <!-- Membership Section -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

  <!-- GOLD PASS Card -->
  <div class="rounded-2xl shadow-lg bg-white border border-gray-200 p-6 flex flex-col justify-between transition hover:shadow-xl">
    <div>
      <div class="flex justify-between items-center">
        <h3 class="text-xl font-extrabold flex items-center text-yellow-500">
          <i class="fas fa-award mr-2"></i> GOLD PASS
        </h3>
        <span class="text-xs font-semibold px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full">Venue A</span>
      </div>

      <h2 class="text-2xl font-bold mt-3 text-gray-800">Futsal Tirtayasa Club</h2>

      <div class="mt-4 pt-3 border-t border-gray-200">
        <p class="text-xs uppercase text-gray-500 font-semibold">Masa Aktif</p>
        <p class="text-base font-bold text-gray-800">14 Okt 2025 - 14 Nov 2025</p>
        <p class="text-sm text-yellow-600 mt-1">Sisa 31 Hari</p>
      </div>

      <div class="mt-5 space-y-2">
        <p class="font-semibold text-gray-700 mb-2">Manfaat Keanggotaan:</p>
        <div class="flex items-start text-sm text-gray-700"><i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i> Diskon Booking 30% setiap hari.</div>
        <div class="flex items-start text-sm text-gray-700"><i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i> 4 Sesi Gratis (Sudah terpakai: 1).</div>
        <div class="flex items-start text-sm text-gray-700"><i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i> Akses prioritas lapangan A & B.</div>
      </div>
    </div>

    <div class="mt-6 pt-4 border-t border-gray-200 flex justify-between items-center">
      <a href="/perpanjang-membership" class="text-sm font-semibold text-yellow-600 hover:text-yellow-700 flex items-center">
        Perpanjang Sekarang <i class="fas fa-chevron-right ml-1 text-xs"></i>
      </a>
      <button class="flex items-center bg-blue-600 text-white font-semibold text-sm px-4 py-2 rounded-full hover:bg-blue-700 transition">
        <i class="fas fa-book-open mr-2"></i> Booking
      </button>
    </div>
  </div>

  <!-- PLATINUM Card -->
  <div class="rounded-2xl shadow-lg bg-gradient-to-br from-purple-600 to-indigo-800 text-white p-6 flex flex-col justify-between transition hover:shadow-xl">
    <div>
      <div class="flex justify-between items-center">
        <h3 class="text-xl font-extrabold flex items-center">
          <i class="fas fa-dumbbell mr-2 text-pink-300"></i> PLATINUM
        </h3>
        <span class="text-xs font-semibold px-3 py-1 bg-white bg-opacity-20 rounded-full">Venue B</span>
      </div>

      <h2 class="text-2xl font-bold mt-3">Fitness Center Sehat</h2>

      <div class="mt-4 pt-3 border-t border-white border-opacity-30">
        <p class="text-xs uppercase font-semibold opacity-80">Masa Aktif</p>
        <p class="text-base font-bold">5 Okt 2025 - 5 Des 2025</p>
        <p class="text-yellow-300 text-sm mt-1">Sisa 52 Hari</p>
      </div>

      <div class="mt-5 space-y-2">
        <p class="font-semibold mb-2">Manfaat Keanggotaan:</p>
        <div class="flex items-start text-sm"><i class="fas fa-check-circle text-green-300 mr-2 mt-0.5"></i> Akses tak terbatas 24/7.</div>
        <div class="flex items-start text-sm"><i class="fas fa-check-circle text-green-300 mr-2 mt-0.5"></i> Gratis 2 Sesi Konsultasi PT.</div>
        <div class="flex items-start text-sm"><i class="fas fa-check-circle text-green-300 mr-2 mt-0.5"></i> Kelas Aerobik dan Yoga Gratis.</div>
      </div>
    </div>

    <div class="mt-6 pt-4 border-t border-white border-opacity-30 flex justify-between items-center">
      <a href="/perpanjang-membership" class="text-sm font-semibold text-white hover:text-yellow-300 flex items-center">
        Perpanjang Sekarang <i class="fas fa-chevron-right ml-1 text-xs"></i>
      </a>
      <button class="flex items-center bg-white text-purple-700 font-semibold text-sm px-4 py-2 rounded-full hover:bg-gray-100 transition">
        <i class="fas fa-calendar-plus mr-2"></i> Reservasi
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