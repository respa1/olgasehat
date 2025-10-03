<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Komunitas Olahraga</title>
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
      <a href="home.html" class="flex items-center space-x-2">
        <img src="assets/olgasehat-icon.png" alt="Olga Sehat Logo" class="w-100 h-10" />
      </a>
      <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
        <a href="venue.html" class="hover:text-blue-700">Sewa Lapangan</a>
        <a href="tempat_sehat.html" class="hover:text-blue-700">Tempat Sehat</a>
        <a href="community.html" class="hover:text-blue-700">Komunitas</a>
        <a href="club.html" class="hover:text-blue-700">Klub</a>
        <a href="blog&news.html" class="hover:text-blue-700">Blog & News</a>
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

  <!-- Blue Banner -->
  <section class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white py-12 relative overflow-hidden h-[225px] flex items-center" style="background-size: 1910px 225px;">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-3xl md:text-4xl font-bold tracking-wide">
        TEMUKAN KOMUNITAS 
      </h1>
    </div>
    <!-- Decorative lines or shapes can be added here if needed -->
  </section>

  <!-- Search Filters -->
  <section class="container mx-auto px-6 py-8">
    <form class="flex flex-wrap gap-4 justify-center md:justify-start items-center">
      <input
        type="text"
        placeholder="Cari nama Komunitas"
        class="flex-grow min-w-[180px] border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
      />
      <select
        class="border border-gray-300 rounded-md px-4 py-2 min-w-[140px] focus:outline-none focus:ring-2 focus:ring-blue-600"
      >
        <option disabled selected>Pilih Kota</option>
        <option>Denpasar</option>
        <option>Jakarta</option>
        <option>Surabaya</option>
        <option>Bandung</option>
      </select>
      <select
        class="border border-gray-300 rounded-md px-4 py-2 min-w-[180px] focus:outline-none focus:ring-2 focus:ring-blue-600"
      >
        <option disabled selected>Pilih Cabang Olahraga</option>
        <option>Futsal</option>
        <option>Basketball</option>
        <option>Mini Soccer</option>
        <option>Badminton</option>
      </select>
      <input
        type="date"
        class="border border-gray-300 rounded-md px-4 py-2 min-w-[160px] focus:outline-none focus:ring-2 focus:ring-blue-600"
      />
      <button
        type="submit"
        class="bg-blue-700 text-white px-6 py-2 rounded-md hover:bg-blue-800 transition min-w-[120px]"
      >
        Cari Komunitas
      </button>
    </form>
  </section>

  <!-- Community Cards Grid -->
  <section class="container mx-auto px-6 pb-12">
    <h2 class="font-semibold text-lg mb-4">
      Semua <a href="#" class="text-blue-700 font-semibold">Komunitas</a>
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      <!-- Community Card 1 -->
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition relative">
        <img
          src="assets/Imbo Sport Center.webp"
          alt="Community Image"
          class="w-full h-40 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-gray-400 mb-1">Komunitas</p>
          <h3 class="font-bold text-sm mb-1">Open Class Coach Bagus</h3>
          <p class="text-xs text-gray-500 mb-1">
            Bli Bagus - di <a href="#" class="text-blue-700">Denpasar</a>
          </p>
          <p class="text-xs text-gray-500 mb-1">26 Juli 2025 08:00 - 09:00</p>
          <p class="text-xs text-gray-500">Mulai <span class="font-bold">Rp250,000</span> /sesi</p>
        </div>
        <div class="absolute top-2 right-2 bg-blue-700 text-white text-xs rounded-full px-2 py-0.5">
          1/5
        </div>
      </article>

      <!-- Community Card 2 -->
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition relative">
        <img
          src="assets/Imbo Sport Center.webp"
          alt="Community Image"
          class="w-full h-40 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-gray-400 mb-1">Komunitas</p>
          <h3 class="font-bold text-sm mb-1">Open Class Coach Bagus</h3>
          <p class="text-xs text-gray-500 mb-1">
            Bli Bagus - di <a href="#" class="text-blue-700">Denpasar</a>
          </p>
          <p class="text-xs text-gray-500 mb-1">26 Juli 2025 08:00 - 09:00</p>
          <p class="text-xs text-gray-500">Mulai <span class="font-bold">Rp250,000</span> /sesi</p>
        </div>
        <div class="absolute top-2 right-2 bg-blue-700 text-white text-xs rounded-full px-2 py-0.5">
          1/5
        </div>
      </article>

      <!-- Community Card 3 -->
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition relative">
        <img
          src="assets/Imbo Sport Center.webp"
          alt="Community Image"
          class="w-full h-40 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-gray-400 mb-1">Komunitas</p>
          <h3 class="font-bold text-sm mb-1">Open Class Coach Bagus</h3>
          <p class="text-xs text-gray-500 mb-1">
            Bli Bagus - di <a href="#" class="text-blue-700">Denpasar</a>
          </p>
          <p class="text-xs text-gray-500 mb-1">26 Juli 2025 08:00 - 09:00</p>
          <p class="text-xs text-gray-500">Mulai <span class="font-bold">Rp250,000</span> /sesi</p>
        </div>
        <div class="absolute top-2 right-2 bg-blue-700 text-white text-xs rounded-full px-2 py-0.5">
          1/5
        </div>
      </article>

      <!-- Community Card 4 -->
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition relative">
        <img
          src="assets/Imbo Sport Center.webp"
          alt="Community Image"
          class="w-full h-40 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-gray-400 mb-1">Komunitas</p>
          <h3 class="font-bold text-sm mb-1">Open Class Coach Bagus</h3>
          <p class="text-xs text-gray-500 mb-1">
            Bli Bagus - di <a href="#" class="text-blue-700">Denpasar</a>
          </p>
          <p class="text-xs text-gray-500 mb-1">26 Juli 2025 08:00 - 09:00</p>
          <p class="text-xs text-gray-500">Mulai <span class="font-bold">Rp250,000</span> /sesi</p>
        </div>
        <div class="absolute top-2 right-2 bg-blue-700 text-white text-xs rounded-full px-2 py-0.5">
          1/5
        </div>
      </article>
    </div>
  </section>

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

  <script src="assets/olgasehat.js"></script>
</body>
</html>
