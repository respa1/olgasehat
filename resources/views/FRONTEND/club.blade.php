<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Club Olahraga</title>
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

  <!-- Blue Banner -->
  <section class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white py-12 relative overflow-hidden h-[225px] flex items-center" style="background-size: 1910px 225px;">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-3xl md:text-4xl font-bold tracking-wide">
        TEMUKAN KLUB
      </h1>
    </div>
    <!-- Decorative lines or shapes can be added here if needed -->
  </section>

  <!-- Search Filters -->
  <section class="container mx-auto px-6 py-8">
    <form class="flex flex-wrap gap-4 justify-center md:justify-start items-center">
      <input
        type="text"
        placeholder="Cari nama klub"
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
        Cari Venue
      </button>
    </form>
  </section>

  <!-- Club Cards Grid -->
  <section class="container mx-auto px-6 pb-12">
    <h2 class="font-semibold text-lg mb-4">
      Semua <span class="text-blue-700">Club</span>
    </h2>
    <div
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6"
      aria-label="Daftar club olahraga"
    >
      <!-- Club Card 1 -->
       <a href="club_detail.html">
        <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/foerda-icon.png" alt="BLESSCON Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Mini Soccer</p>
            <h3 class="font-semibold text-lg">FOERDA 61</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih I</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>12 Aug 2025 · 18:30</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Mini Soccer · Morley Soccer Arena</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 245.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-hand-holding-dollar"></i>
            <span>Dp · 0</span>
          </p>
        </div>
      </article>
       </a>

      <!-- Club Card 2 -->
      <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/CREWCALL_FC.png" alt="CREWCALL FC Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Mini Soccer</p>
            <h3 class="font-semibold text-lg">CREWCALL FC</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih I · <i class="fas fa-star text-yellow-400"></i> 4.90</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>14 Aug 2025 · 19:30</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>A, Fuerza Arena</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 1.650.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-hand-holding-dollar"></i>
            <span>Dp · 0</span>
          </p>
        </div>
      </article>

      <!-- Club Card 3 -->
      <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/CIMKID_FC.png" alt="CIMKID FC Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Mini Soccer</p>
            <h3 class="font-semibold text-lg">CiMKID FC</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih I</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>15 Aug 2025 · 20:00</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>ZSC mini soccer, ZSC Mini Soccer</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 2.100.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-hand-holding-dollar"></i>
            <span>Dp · 400.000</span>
          </p>
        </div>
      </article>

      <!-- Club Card 4 -->
      <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/PB_SUKA_SUKA.png" alt="PB.Suka Suka Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Badminton</p>
            <h3 class="font-semibold text-lg">PB.Suka Suka</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih I</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>15 Aug 2025 · 21:00</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Lapangan A, GOR IBNU MANDIRI</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 230.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-hand-holding-dollar"></i>
            <span>Dp · 130.000</span>
          </p>
        </div>
      </article>

      <!-- Club Card 5 -->
      <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/GARUDA_MUDA_FC.png" alt="GARUDA MUDA FC Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Sepak Bola</p>
            <h3 class="font-semibold text-lg">GARUDA MUDA FC</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih II · <i class="fas fa-star text-yellow-400"></i> 4.98</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>16 Aug 2025 · 15:30</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Stadion Viyata Jales Yudha, Stadion Militer Viyata Jales Yudha</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 1.150.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-hand-holding-dollar"></i>
            <span>Dp · 0</span>
          </p>
        </div>
      </article>

      <!-- Club Card 6 -->
      <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/GOLLONZO_FOOTBALL_CLUB.png" alt="Gollonzo Football Club Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Sepak Bola</p>
            <h3 class="font-semibold text-lg">Gollonzo Football Club</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih I · <i class="fas fa-star text-yellow-400"></i> 5.00</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>16 Aug 2025 · 16:00</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Ex Arcici, ASIOP Stadium (ASTA)</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 3.300.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-hand-holding-dollar"></i>
            <span>Dp · 0</span>
          </p>
        </div>
      </article>

      <!-- Club Card 7 -->
      <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/DRAKEN_MASTER.png" alt="Dranken Master Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Mini Soccer</p>
            <h3 class="font-semibold text-lg">Dranken Master</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih I · <i class="fas fa-star text-yellow-400"></i> 5.00</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>16 Aug 2025 · 16:00</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Lapangan A, Koci Soccer Field</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 1.100.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <span>Dp · 0</span>
          </p>
        </div>
      </article>

      <!-- Club Card 8 -->
      <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/YMMI_FC.png" alt="YMMI FC Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Mini Soccer</p>
            <h3 class="font-semibold text-lg">YMMI FC</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih I</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>16 Aug 2025 · 18:00</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Lapangan 1, Goedang mini soccer</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 950.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-hand-holding-dollar"></i>
            <span>Dp · 300.000</span>
          </p>
        </div>
      </article>

      <!-- Club Card 9 -->
      <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
        <div class="flex items-center space-x-4 mb-3">
          <img src="assets/EX_PLAYBOY.png" alt="Ex-Playboy Logo" class="w-12 h-12 rounded-full object-cover" />
          <div>
            <p class="text-xs text-gray-500">Futsal</p>
            <h3 class="font-semibold text-lg">Ex-Playboy</h3>
            <p class="text-xs text-gray-600 flex items-center space-x-1">
              <i class="fas fa-shield-alt text-gray-400"></i>
              <span>Level Putih I</span>
            </p>
          </div>
        </div>
        <div class="text-xs text-gray-500 space-y-1">
          <p class="flex items-center space-x-2">
            <i class="far fa-calendar-alt"></i>
            <span>16 Aug 2025 · 20:00</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>CGV SPORTS HALL, CGV Cinema and Sport Hall</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-wallet"></i>
            <span>Biaya · 550.000</span>
          </p>
          <p class="flex items-center space-x-2">
            <i class="fas fa-hand-holding-dollar"></i>
            <span>Dp · 350.000</span>
          </p>
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
