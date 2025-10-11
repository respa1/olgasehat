@extends('FRONTEND.layout.frontend')

@section('content')

  <!-- Blog & News Header Section -->
  <section class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white relative overflow-hidden h-[300px] flex items-center justify-center" style="background-size: 1910px 300px;">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-3xl md:text-4xl font-bold tracking-wide mt-10">
        ARTIKEL & TIPS SEPUTAR OLAHRAGA
      </h1>
      <div class="mt-6 max-w-xl mx-auto">
        <input
          type="text"
          placeholder="Cari artikel..."
          class="w-full rounded-md py-3 px-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-900"
        />
      </div>
    </div>
  </section>

  <!-- Blog & News Content -->
  <section class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- Trending Posts -->
    <aside class="md:col-span-1 space-y-6">
      <h2 class="text-sm font-semibold text-gray-700 uppercase border-b border-gray-300 pb-2">
        TRENDING POST
      </h2>
      <ol class="list-decimal list-inside space-y-4 text-sm text-gray-800 font-semibold">
        <li>
          <a href="#" class="hover:underline">
            3 Hal Penting agar Main Bola Tetap Lancar di Bulan Puasa
          </a>
          <p class="text-xs text-gray-500">SEPAK BOLA - April 14, 2022</p>
        </li>
        <li>
          <a href="#" class="hover:underline">
            Cara Meningkatkan Stamina saat Bermain Badminton: Tips dan Latihan yang Efektif
          </a>
          <p class="text-xs text-gray-500">BADMINTON - May 18, 2023</p>
        </li>
        <li>
          <a href="#" class="hover:underline">
            Kenapa Sparring Tennis Penting? Ini Manfaat yang Bisa Didapat!
          </a>
          <p class="text-xs text-gray-500">TENNIS - March 28, 2025</p>
        </li>
        <li>
          <a href="#" class="hover:underline">
            Memahami Standar Keselamatan dan Keamanan Lapangan Mini Soccer
          </a>
          <p class="text-xs text-gray-500">MINI SOCCER - July 29, 2024</p>
        </li>
        <li>
          <a href="#" class="hover:underline">
            Inilah Ukuran Standar Lapangan Mini Soccer yang Harus Diketahui
          </a>
          <p class="text-xs text-gray-500">MINI SOCCER - July 29, 2024</p>
        </li>
      </ol>
    </aside>

    <!-- Blog Cards -->
    <main class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-6">
      <!-- Blog Card 1 -->
       <a href="blog&news_detail.html">
        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <img
          src="assets/tenis.jpg"
          alt="Tennis Player"
          class="w-full h-48 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-blue-700 font-semibold uppercase mb-2">Tennis</p>
          <h3 class="font-bold text-lg mb-2">
            Kenapa Sparring Tennis Penting? Ini Manfaat yang Bisa Didapat!
          </h3>
          <p class="text-gray-600 text-sm mb-4">
            Bukan hanya soal menang atau kalah, ada manfaat sparring tenis yang bisa membuat...
          </p>
          <div class="flex items-center justify-between text-xs text-gray-500">
            <span>oleh Eren</span>
            <time datetime="2025-03-28">28 March 2025</time>
          </div>
        </div>
      </article>`
       </a>

      <!-- Blog Card 2 -->
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <img
          src="assets/tenis.jpg"
          alt="Indoor Court"
          class="w-full h-48 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-blue-700 font-semibold uppercase mb-2">Badminton</p>
          <h3 class="font-bold text-lg mb-2">
            Cara Meningkatkan Stamina saat Bermain Badminton: Tips dan Latihan yang Efektif
          </h3>
          <p class="text-gray-600 text-sm mb-4">
            Tips dan latihan yang efektif untuk meningkatkan stamina saat bermain badminton...
          </p>
          <div class="flex items-center justify-between text-xs text-gray-500">
            <span>oleh Rina</span>
            <time datetime="2023-05-18">18 May 2023</time>
          </div>
        </div>
      </article>

      <!-- Blog Card 3 -->
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <img
          src="assets/tenis.jpg"
          alt="Mini Soccer Field"
          class="w-full h-48 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-blue-700 font-semibold uppercase mb-2">Mini Soccer</p>
          <h3 class="font-bold text-lg mb-2">
            Memahami Standar Keselamatan dan Keamanan Lapangan Mini Soccer
          </h3>
          <p class="text-gray-600 text-sm mb-4">
            Standar keselamatan dan keamanan yang harus diperhatikan di lapangan mini soccer...
          </p>
          <div class="flex items-center justify-between text-xs text-gray-500">
            <span>oleh Dedi</span>
            <time datetime="2024-07-29">29 July 2024</time>
          </div>
        </div>
      </article>

      <!-- Blog Card 4 -->
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <img
          src="assets/tenis.jpg"
          alt="Arena Sport"
          class="w-full h-48 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-blue-700 font-semibold uppercase mb-2">Mini Soccer</p>
          <h3 class="font-bold text-lg mb-2">
            Inilah Ukuran Standar Lapangan Mini Soccer yang Harus Diketahui
          </h3>
          <p class="text-gray-600 text-sm mb-4">
            Ukuran standar lapangan mini soccer yang wajib diketahui oleh para pemain dan pelatih...
          </p>
          <div class="flex items-center justify-between text-xs text-gray-500">
            <span>oleh Dedi</span>
            <time datetime="2024-07-29">29 July 2024</time>
          </div>
        </div>
      </article>
    </main>
  </section>

  <!-- Pagination -->
    <nav aria-label="Pagination" class="flex justify-center mt-8 space-x-2">
      <button class="w-8 h-8 rounded-md bg-blue-700 text-white font-semibold">1</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">2</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">3</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">4</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">5</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">6</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">7</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">8</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">9</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">10</button>
      <span class="inline-flex items-center px-2 text-gray-700 select-none">...</span>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">62</button>
      <button class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200">63</button>
      <button aria-label="Next page" class="w-8 h-8 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-200 flex items-center justify-center">
        <i class="fas fa-arrow-right"></i>
      </button>
    </nav>

    @endsection
