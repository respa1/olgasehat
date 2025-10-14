@extends('user.layout.user')

@section('content')

<!-- Main Content -->
  <main class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

    <!-- Left Profile Panel -->
    <aside class="bg-white rounded-md shadow p-6 flex flex-col items-center space-y-4">
      <div class="w-24 h-24 rounded-full border-2 border-gray-300 flex items-center justify-center text-gray-400">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <circle cx="12" cy="7" r="4"></circle>
          <path d="M5.5 21a7.5 7.5 0 0113 0"></path>
        </svg>
      </div>
      <div class="text-center">
        <p class="font-semibold text-lg text-gray-900">rsteam</p>
        <p class="text-gray-500 text-sm select-text">@rteam166</p>
      </div>

      <hr class="w-full border-gray-200" />

      <nav class="w-full space-y-3 text-sm text-gray-600 font-semibold">
        <a href="/editprofile" class="block hover:text-orange-500 transition cursor-pointer">Update Profile</a>
        <a href="/riwayat komunitas" class="block hover:text-orange-500 cursor-pointer">Komunitas</a>
        <a href="/riwayatclub" class="block text-orange-500 transition cursor-pointer">Aktifitas</a>
      </nav>
    </aside>

 <!-- Right Content -->
<section class="md:col-span-2 space-y-6">
  <!-- Card Judul + Button -->
  <div class="bg-white rounded-md border border-gray-200 p-5">
    <div class="flex items-center justify-between">
      <!-- Judul + underline -->
      <h2 class="font-bold text-xl text-gray-900 relative inline-block">
        Aktifitas Kamu
        
      </h2>

      <!-- Tombol kecil oranye -->
      <button class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded hover:bg-orange-600 transition">
        Buat Aktifitas
      </button>
    </div>

    <!-- Deskripsi -->
    <p class="text-gray-500 mt-1 text-sm">Kumpulan aktifitas yang kamu telah tergabung</p>
  </div>

  <!-- Card kosong -->
  <div class="bg-white rounded-md border border-gray-200 p-8 flex flex-col items-center space-y-5">
    <!-- Illustration -->
    <div class="max-w-md w-full">
      <img 
        src="assets/ai.png" 
        alt="Illustration of a community park with orange trees, benches, and houses" 
        class="w-full object-contain"
        onerror="this.onerror=null;this.src='https://placehold.co/600x300?text=Image+not+available';"
      />
    </div>

    <p class="text-gray-500 text-center text-sm">Kamu belum tergabung dalam aktiftas</p>
  </div>
</section>


  </main>
 
  @endsection