
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile Olgasehat</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
  <style>
    /* Custom scroll for file drop box */
    ::-webkit-scrollbar {
      width: 4px;
      height: 4px;
    }
    ::-webkit-scrollbar-thumb {
      background-color: rgba(156, 163, 175, 0.5);
      border-radius: 6px;
    }
    .input-date {
      max-width: 4rem;
    }
    .img-sport {
      width: 48px;
      height: 48px;
      border-radius: 0.5rem;
      object-fit: cover;
      background: #f3f4f6; /* light gray fallback */
      box-shadow: 0 1px 3px rgb(0 0 0 / 0.1);
    }
    .btn-save {
      background-color: #f97316;
      color: white;
      font-weight: 700;
      transition: background-color 0.3s ease;
    }
    .btn-save:hover {
      background-color: #ea580c;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen font-sans text-gray-700">
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
    <a href="tempat_sehat.html" class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700">Komunitas</a>
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
  <main class="max-w-6xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-10">

    <!-- Left Side: Profile Image and Username -->
    <section class="flex flex-col items-center space-y-4">
      <div class="w-32 h-32 rounded-full border-2 border-gray-400 flex justify-center items-center bg-gray-100 overflow-hidden">
        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="7" r="4" /><path d="M5.5 21a6.5 6.5 0 0113 0" /></svg>
      </div>
      <div class="text-center">
        <p class="font-semibold text-gray-800 select-text">rsteam</p>
        <p class="text-gray-500 select-text">@rteam166</p>
      </div>
      <div class="w-full max-w-xs bg-white border border-gray-300 rounded-md p-4 text-center">
        <p class="font-medium mb-2 text-sm">Update Profile Picture</p>
        <label for="file-upload" class="cursor-pointer inline-block w-full h-28 border-2 border-dashed border-gray-400 rounded-md text-gray-500 text-center pt-6 hover:border-blue-500 transition">
          <span class="block select-none">Drop file here to upload</span>
          <input id="file-upload" type="file" class="hidden" accept="image/*" />
        </label>
      </div>
    </section>

    <!-- Right Side: Profile Form -->
    <section class="md:col-span-2 bg-white rounded-md p-8 shadow-md">
      <form>
        <div>
          <h2 class="text-lg font-semibold mb-1">Profile</h2>
          <p class="text-sm text-gray-400 mb-4 select-none">Lengkapi profil anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
          <div>
            <label for="nama-lengkap" class="block text-sm mb-1 text-gray-500 select-none">Nama Lengkap</label>
            <input id="nama-lengkap" type="text" placeholder="" class="w-full rounded border border-gray-300 h-10 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div>
            <label for="username" class="block text-sm mb-1 text-gray-500 select-none">Username</label>
            <input id="username" type="text" placeholder="" class="w-full rounded border border-gray-300 h-10 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
        </div>

        <div class="flex flex-wrap gap-6 mb-4">
          <div class="flex-1 min-w-[6rem]">
            <label for="bulan-lahir" class="block text-sm mb-1 text-gray-400 select-none">Bulan Lahir</label>
            <input id="bulan-lahir" type="text" placeholder="" class="w-full rounded border border-gray-300 h-10 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="flex-grow-0" style="min-width:4.5rem;">
            <label for="tahun-lahir" class="block text-sm mb-1 text-gray-400 select-none">Tahun Lahir</label>
            <input id="tahun-lahir" maxlength="4" type="text" placeholder="" class="input-date w-full rounded border border-gray-300 h-10 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
          <div class="flex-grow-0" style="min-width:4.5rem;">
            <label for="tgl-lahir" class="block text-sm mb-1 text-gray-400 select-none">Tgl. Lahir</label>
            <input id="tgl-lahir" maxlength="2" type="text" placeholder="" class="input-date w-full rounded border border-gray-300 h-10 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          </div>
        </div>

        <div class="mb-6">
          <label for="no-hp" class="block text-sm mb-1 text-gray-400 select-none">No. Handphone</label>
          <input id="no-hp" type="text" placeholder="" class="w-full rounded border border-gray-300 h-10 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
          <h3 class="font-semibold mb-4 select-none">Olahraga Favorit</h3>
          <div class="grid grid-cols-5 sm:grid-cols-10 gap-4">
            <div class="text-center text-xs select-none">
              <img src="assets/minsok.jpg" alt="Mini Soccer sport scene with a player kicking a small soccer ball on a miniature field" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Mini Soccer</p>
            </div>
            <div class="text-center text-xs select-none">
              <img src="assets/sepakbola.webp" alt="Sepak Bola soccer ball on a grassy field with feet approaching the ball preparing to kick" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Sepak Bola</p>
            </div>
            <div class="text-center text-xs select-none">
              <img src="assets/tennis.jpg" alt="Tenis tennis racket and ball on a clay tennis court with white lines and shadow" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Tenis</p>
            </div>
            <div class="text-center text-xs select-none">
              <img src="assets/futsal.jpg" alt="Futsal indoor futsal court with players and ball in action" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Futsal</p>
            </div>
            <div class="text-center text-xs select-none">
              <img src="assets/bulutangkis.jpg" alt="Bulu Tangkis badminton rackets and shuttlecock on a wooden floor court" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Bulu Tangkis</p>
            </div>

            <div class="text-center text-xs select-none">
              <img src="assets/padel.webp" alt="Padel player swinging racket with ball mid air on padel court" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Padel</p>
            </div>
            <div class="text-center text-xs select-none">
              <img src="assets/volly.jpg" alt="Bola Voli volleyball player jumping to spike the ball during an outdoor match" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Bola Volly</p>
            </div>
            <div class="text-center text-xs select-none">
              <img src="assets/bola tangan.jpg" alt="Bola Tangan handball player holding ball preparing to throw" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Bola Tangan</p>
            </div>
            <div class="text-center text-xs select-none">
              <img src="assets/baseball.jpeg" alt="Baseball glove catching baseball ball during outdoor game" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Baseball</p>
            </div>
            <div class="text-center text-xs select-none">
              <img src="assets/running.avif" alt="Running athlete sprinting on a track in outdoor stadium" class="img-sport mb-1" onerror="this.style.display='none'"/>
              <p>Running</p>
            </div>
          </div>
        </div>

<button type="submit" class="btn-save bg-blue-600 text-white rounded-md px-6 py-2 mt-6 select-none hover:bg-blue-700">
  SIMPAN PROFIL
</button>

      </form>
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


