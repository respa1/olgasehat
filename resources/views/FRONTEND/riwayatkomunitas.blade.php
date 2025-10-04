
<!DOCTYPE html>
<html lang="id" class="bg-gray-50">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat Komunitas</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
</head>
<body class="font-sans text-gray-800">

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
         <a href="venue.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Akun</a>
    <a href="tempat_sehat.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">komunitas</a>
    <a href="community.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Aktifitas</a>
    <a href="club.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Transaksi</a>
    <a href="blog&news.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Logout</a>
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
        <a href="/riwayat komunitas" class="block text-orange-500 cursor-pointer">Komunitas</a>
        <a href="/riwayatclub" class="block hover:text-orange-500 transition cursor-pointer">Aktifitas</a>
      </nav>
    </aside>

    <!-- Right Content -->
    <section class="md:col-span-2 space-y-6">
      <div class="bg-white rounded-md shadow p-6">
        <h2 class="font-bold text-xl text-gray-900">Komunitas Kamu</h2>
        <p class="text-gray-400 mt-1">Kumpulan komunitas yang kamu telah tergabung</p>
      </div>

      <div class="bg-white rounded-md shadow p-6 flex flex-col items-center space-y-5">

        <!-- Illustration with fallback styling -->
        <div class="max-w-md w-full">
          <img 
            src="assets/ai.png" 
            alt="Illustration of a small community park with orange trees, benches, and houses in the background with birds flying above under a clear sky" 
            class="w-full object-contain"
            onerror="this.onerror=null;this.src='https://placehold.co/600x300?text=Image+not+available';"
          />
        </div>

        <p class="text-gray-500 text-center select-text">Kamu belum tergabung dalam komunitas</p>
      </div>
    </section>

  </main>
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
  <!-- Script -->
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

