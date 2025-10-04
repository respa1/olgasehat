<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Booking Venue Olahraga</title>
  <link rel="icon" href="assets/olgasehat-icon.png" type="image/png" />
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            blue: {
              700: '#013D9D',
              800: '#002D7A',
              900: '#001F5C',
            }
          }
        }
      }
    }
  </script>
  <!-- Font Awesome CDN for icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
</head>
<body class="bg-white text-gray-800 font-sans">

  <!-- Header -->
  <header class="shadow-md">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
      <a href="#" class="flex items-center space-x-2">
        <img src="assets/olgasehat-icon.png" alt="Olga Sehat Logo" class="w-100 h-10" />
      </a>
      <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
         <a href="/" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="/tempatsehat" class="hover:text-blue-700">Tempat Sehat</a>
      <a href="/community" class="hover:text-blue-700">Komunitas</a>
      <a href="/club" class="hover:text-blue-700">Klub</a>
      <a href="/blog-news" class="hover:text-blue-700">Blog & News</a>
      </nav>
      <div class="hidden md:flex items-center space-x-4">
        <button aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
          <i class="fas fa-shopping-cart fa-lg"></i>
          <span
            class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5"
            >0</span
          >
        </button>
        <a href="#" class="text-gray-700 hover:text-blue-700">Masuk</a>
        <a
          href="#"
          class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-800 transition"
          >Daftar</a
        >
      </div>
      <div class="flex md:hidden items-center space-x-4">
        <button aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
          <i class="fas fa-shopping-cart fa-lg"></i>
          <span
            class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5"
            >0</span
          >
        </button>
        <!-- Mobile menu button -->
        <button
          id="mobileMenuBtn"
          class="text-gray-700 hover:text-blue-700 focus:outline-none"
          aria-label="Open menu"
        >
          <i class="fas fa-bars fa-lg"></i>
        </button>
      </div>
    </div>
    <!-- Mobile menu -->
    <nav
      id="mobileMenu"
      class="hidden md:hidden bg-white border-t border-gray-200 shadow-md"
    >
      <a
        href="venue.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Sewa Lapangan</a
      >
      <a
        href="tempat_sehat.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Tempat Sehat</a
      >
      <a
        href="community.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Komunitas</a
      >
      <a
        href="club.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Klub</a
      >
      <a
        href="blog&news.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Blog & News</a
      >
      <a
        href="#"
        class="block w-full text-center px-6 py-3 mb-2 border border-gray-300 rounded-md bg-white text-gray-700 font-semibold hover:bg-gray-100"
        >Masuk</a
      >
      <a
        href="#"
        class="block w-full text-center px-6 py-3 rounded-md bg-blue-700 text-white font-semibold hover:bg-red-900"
        >Daftar</a
      >
    </nav>
  </header>

  <!-- Blog & News Header Section -->
  <section class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white py-12 relative overflow-hidden h-[225px] flex items-center" style="background-size: 1910px 225px;">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-3xl md:text-4xl font-bold text-white tracking-wide">
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

  <!-- Cart Sidebar -->
  <aside id="cartSidebar" class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 overflow-y-auto">
    <div class="flex justify-between items-center p-4 border-b border-gray-200">
      <h2 class="font-bold text-lg">JADWAL DIPILIH</h2>
      <button id="closeCartSidebar" aria-label="Close sidebar" class="text-gray-700 hover:text-gray-900 focus:outline-none">
        <i class="fas fa-times fa-lg"></i>
      </button>
    </div>
    <div class="p-4 text-gray-600">
      Belum ada jadwal di keranjang.
    </div>
  </aside>

  <!-- Footer -->
  <footer class="bg-white text-gray-700 py-12">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
      <div>
        <h3 class="font-bold text-lg mb-4">Olga Sehat</h3>
        <p class="text-sm text-gray-600 max-w-xs">
          Making sports easy to book, fun to play, and safe for everyone.
        </p>
      </div>
      <div>
        <h3 class="font-semibold mb-4">Perusahaan</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-blue-700">Tentang</a></li>
          <li><a href="#" class="hover:text-blue-700">Kebijakan &amp; Privasi</a></li>
          <li><a href="#" class="hover:text-blue-700">Syarat &amp; Ketentuan</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-semibold mb-4">Ekosistem</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-blue-700">Sewa Lapangan</a></li>
          <li><a href="#" class="hover:text-blue-700">Tempat Sehat</a></li>
          <li><a href="#" class="hover:text-blue-700">Komunitas</a></li>
          <li><a href="#" class="hover:text-blue-700">Klub</a></li>
          <li><a href="#" class="hover:text-blue-700">Blog & News</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-semibold mb-4">Support</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-blue-700">FAQs</a></li>
          <li><a href="#" class="hover:text-blue-700">Support Center</a></li>
          <li><a href="#" class="hover:text-blue-700">Contact Us</a></li>
        </ul>
        <div class="flex space-x-4 mt-4">
          <a
            href="#"
            class="w-8 h-8 flex items-center justify-center bg-blue-700 text-white rounded-full hover:bg-blue-800 transition"
            ><i class="fab fa-facebook-f"></i
          ></a>
          <a
            href="#"
            class="w-8 h-8 flex items-center justify-center bg-blue-700 text-white rounded-full hover:bg-blue-800 transition"
            ><i class="fab fa-youtube"></i
          ></a>
          <a
            href="#"
            class="w-8 h-8 flex items-center justify-center bg-blue-700 text-white rounded-full hover:bg-blue-800 transition"
            ><i class="fab fa-instagram"></i
          ></a>
        </div>
      </div>
    </div>
    <div class="container mx-auto px-6 text-center mt-8 pt-4 border-t border-gray-300 text-sm text-gray-500">
      &copy; 2024 Olga Sehat. All rights reserved.
    </div>
  </footer>

  <!-- Cart Sidebar -->
  <aside id="cartSidebar" class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 overflow-y-auto">
    <div class="flex justify-between items-center p-4 border-b border-gray-200">
      <h2 class="font-bold text-lg">JADWAL DIPILIH</h2>
      <button id="closeCartSidebar" aria-label="Close sidebar" class="text-gray-700 hover:text-gray-900 focus:outline-none">
        <i class="fas fa-times fa-lg"></i>
      </button>
    </div>
    <div class="p-4 text-gray-600">
      Belum ada jadwal di keranjang.
    </div>
  </aside>

    <!-- Swiper JS for slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/olgasehat.js"></script>
</body>
</html>
