<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Olga Sehat
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body >
 
<!-- Header -->
<header class="shadow-md">
  <div class="container mx-auto flex items-center justify-between py-4 px-6">
    <!-- Logo -->
    <a href="#" class="flex items-center space-x-2">
      <img src="assets/logo.png" alt="Olga Sehat Logo" class="w-100 h-10" />
    </a>

    <!-- Navigation (desktop) -->
    <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
      <a href="/" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="/tempatsehat" class="hover:text-blue-700">Tempat Sehat</a>
      <a href="/community" class="hover:text-blue-700">Komunitas</a>
      <a href="/club" class="hover:text-blue-700">Klub</a>
      <a href="/blog-news" class="hover:text-blue-700">Blog & News</a>
    </nav>

    <!-- Actions (desktop) -->
    <div class="hidden md:flex items-center space-x-4">
      <!-- Cart -->
      <button aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
      </button>

      <!-- Dropdown User (sudah login) -->
      <div class="relative">
        <button id="userMenuBtn" class="flex items-center space-x-2 focus:outline-none">
          <img src="assets/guru.png" alt="User Avatar" class="w-8 h-8 rounded-full border" />
          <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
        </button>
        <!-- Dropdown menu -->
        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50">
         <a href="venue.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Sewa Lapangan</a>
    <a href="tempat_sehat.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Tempat Sehat</a>
    <a href="community.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Komunitas</a>
    <a href="club.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Klub</a>
    <a href="blog&news.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Blog & News</a>
        </div>
      </div>
    </div>

    <!-- Mobile buttons -->
    <div class="flex md:hidden items-center space-x-4">
      <!-- Cart -->
      <button aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
      </button>
      <!-- Mobile menu button -->
      <button id="mobileMenuBtn" class="text-gray-700 hover:text-blue-700 focus:outline-none" aria-label="Open menu">
        <i class="fas fa-bars fa-lg"></i>
      </button>
    </div>
  </div>

  <!-- Mobile menu -->
  <nav id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200 shadow-md">
    <a href="venue.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Sewa Lapangan</a>
    <a href="tempat_sehat.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Tempat Sehat</a>
    <a href="community.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Komunitas</a>
    <a href="club.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Klub</a>
    <a href="blog&news.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Blog & News</a>
    
    <!-- Dropdown user di mobile -->
    <div class="border-t border-gray-200">
      <a href="profile.html" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-700">Profil</a>
      <a href="settings.html" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-700">Pengaturan</a>
      <a href="logout.html" class="block px-6 py-3 text-red-600 hover:bg-red-50">Keluar</a>
    </div>
  </nav>
</header>


  <main class="bg-gray-100 min-h-[calc(100vh-64px)]">
   <section class="max-w-4xl mx-auto px-4 py-8">
    <label class="block mb-2 font-semibold text-black text-sm" for="cutoff-date">
     Pilih Tanggal Cut Off
    </label>
    <input class="w-48 rounded border border-gray-300 px-3 py-2 mb-1 text-black text-sm" id="cutoff-date" readonly="" type="text" value="4-Aug-2025"/>
    <p class="text-xs text-gray-500 mb-3">
     *Menampilkan transaksi
     <span class="text-orange-500 font-semibold">
      6 bulan ke belakang
     </span>
     dari tanggal pilihan mu
    </p>
    <div class="flex space-x-2 mb-8">
     <button class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded" type="button">
      Semua Transaksi
     </button>
     <button class="text-blue-600 border border-blue-500 text-xs font-semibold px-3 py-1 rounded" type="button">
      Down Payment
     </button>
    </div>
    <div class="bg-white rounded-md p-6 flex flex-col items-center">
     <img alt="Illustration of a park with orange trees and benches in front of gray houses with birds flying" class="mb-4" height="150" src="assets/ai.png" width="400"/>
     <p class="text-gray-500 text-sm text-center">
      Tidak ditemukan Transaksi pada rentang waktu tanggal pilihan
     </p>
    </div>
   </section>
  </main>
  <script>
  // Dropdown user
  const userBtn = document.getElementById("userMenuBtn");
  const userMenu = document.getElementById("userMenu");
  if (userBtn) {
    userBtn.addEventListener("click", () => {
      userMenu.classList.toggle("hidden");
    });
  }
</script>
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
    <script>

      // Mobile menu toggle
      const mobileMenuBtn = document.getElementById("mobileMenuBtn");
      const mobileMenu = document.getElementById("mobileMenu");
      mobileMenuBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
      });

      // Cart sidebar toggle
      const cartBtns = document.querySelectorAll('button[aria-label="Cart"]');
      const cartSidebar = document.getElementById('cartSidebar');
      const closeCartSidebarBtn = document.getElementById('closeCartSidebar');

      cartBtns.forEach(cartBtn => {
        cartBtn.addEventListener('click', () => {
          cartSidebar.classList.toggle('translate-x-full');
        });
      });

      closeCartSidebarBtn.addEventListener('click', () => {
        cartSidebar.classList.add('translate-x-full');
      });
    </script>

 </body>
</html>
