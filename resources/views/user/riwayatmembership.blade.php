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

<main class="pt-20 min-h-screen pb-8 px-4 md:px-8 lg:px-10 bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-6">
            
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
        </div>

            {{-- Kolom Kanan (1/3) - Sidebar Unified --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl p-6 space-y-6 border border-gray-200 shadow-lg">
                
                {{-- Greeting Section --}}
                <div class="flex items-start justify-between pb-4 border-b border-gray-200">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Hello. {{ Auth::user()->name ?? 'Rendra' }}!</h2>
                        <p class="text-sm text-gray-600 leading-relaxed">Siap bergerak aktif hari ini? Yuk, cek progresmu!</p>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        @if(Auth::user()->image ?? null)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                 alt="Profile Picture"
                                 class="w-20 h-20 rounded-full object-cover shadow-lg border-2 border-gray-200">
                        @else
                            @php
                                $userName = Auth::user()->name ?? 'Rendra';
                                $initial = strtolower(substr($userName, 0, 1));
                            @endphp
                            <div class="w-20 h-20 rounded-full bg-blue-300 flex items-center justify-center text-blue-800 text-3xl font-bold shadow-lg">
                                {{ $initial }}
                            </div>
                        @endif
                    </div>
                </div>
                
                {{-- Action Buttons --}}
                <div class="flex gap-2 pb-4 border-b border-gray-200">
                    <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2.5 px-4 rounded-lg font-semibold transition duration-200 text-sm shadow-md hover:shadow-lg">
                        <i class="fas fa-phone mr-1"></i>Hubungi Kami
                    </a>
                    <a href="/edit-profile-user" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-center py-2.5 px-4 rounded-lg font-semibold transition duration-200 text-sm shadow-md hover:shadow-lg">
                        <i class="fas fa-user-edit mr-1"></i>Edit Profile
                    </a>
                </div>

                {{-- Blue Banner Card: Nikmati Akses User --}}
                <a href="#" class="rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md block relative overflow-hidden transition-all duration-300 hover:translate-x-1">
                    <div class="absolute inset-0 opacity-20" style="background-image: url('{{ asset('assets/blue-banner.png') }}'); background-size: cover; background-position: center;"></div>
                    <div class="relative z-10 flex items-start space-x-3">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                            <i class="fas fa-star text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 mb-1">Nikmati Akses User</h3>
                            <p class="text-xs text-gray-500">Akses penuh ke semua fitur premium dan layanan eksklusif untuk pengalaman terbaik Anda</p>
                        </div>
                    </div>
                </a>

                {{-- Quick Actions Section --}}
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                        Aksi Cepat
                    </h2>
                    <div class="space-y-3">
                        <!-- Fasilitas Olahraga -->
                        <a href="/venueuser" class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md block transition-all duration-300 hover:translate-x-1">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-futbol text-blue-600 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 mb-1">Fasilitas Olahraga</h3>
                                    <p class="text-xs text-gray-500">Booking lapangan olahraga favorit Anda dengan mudah</p>
                                </div>
                            </div>
                        </a>

                        <!-- Layanan Kesehatan -->
                        <a href="/healthyuser" class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md block transition-all duration-300 hover:translate-x-1">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-heartbeat text-green-600 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 mb-1">Layanan Kesehatan</h3>
                                    <p class="text-xs text-gray-500">Cek kesehatan dan layanan medis terdekat</p>
                                </div>
                            </div>
                        </a>

                        <!-- Buat & Temukan Komunitas -->
                        <a href="/communityuser" class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md block transition-all duration-300 hover:translate-x-1">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-users text-orange-600 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 mb-1">Buat & Temukan Komunitas</h3>
                                    <p class="text-xs text-gray-500">Bergabung atau buat komunitas olahraga baru</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
</main>

@endsection