<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Detail Club Olahraga</title>
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
        >Community</a
      >
      <a
        href="club.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Club</a
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

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-8">
    <div class="flex flex-col md:flex-row md:space-x-12">
      <!-- Left Column -->
      <div class="md:flex-1">
        <div class="flex items-center space-x-4 mb-6">
          <img src="assets/foerda-icon.png" alt="Umbu Fc Logo" class="w-20 h-20 rounded-full object-cover" />
          <div>
            <h1 class="text-2xl font-bold">Open Class Coach Bagus</h1>
            <div class="flex items-center space-x-4 text-gray-600 text-sm mt-1">
              <div class="flex items-center space-x-1">
                <i class="fas fa-trophy"></i>
                <span>Komunitas</span>
              </div>
            </div>
          </div>
        </div>

        <div class="mb-6">
          <h2 class="font-semibold mb-2">Deskripsi Komunitas</h2>
          <p class="text-gray-700 text-sm leading-relaxed">
            have fun : varian sparing 1. miring Rp. 150.000 / Rp. 95.000 2. Lapangan Rp. 245.000 3. Lapangan + Air Rp. 300.000
          </p>
        </div>

        <div>
          <h2 class="font-semibold mb-2">Lokasi Venue</h2>
          <p class="text-gray-700 text-sm leading-relaxed">
            Jl. Nuansa Indah Selatan Utara I No.1, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80118
          </p>
        </div>
      </div>

      <!-- Right Column -->
      <div class="md:w-72 mt-8 md:mt-0">
        <div class="border border-gray-200 rounded-lg p-6 shadow-sm">
          <p class="text-2xl font-bold mb-1">Rp. 245,000</p>
          <p class="text-xs text-gray-500 mb-4">Wajib DP · Rp. 150,000</p>
          <button class="w-full bg-blue-700 text-white py-2 rounded-md font-semibold hover:bg-blue-800 transition mb-6">JOIN</button>
          <div class="space-y-4 text-gray-700 text-sm">
            <div class="flex items-center space-x-2">
              <i class="far fa-calendar-alt"></i>
              <span>Thursday, 28 Aug 2025 · 21:00 - 22:00</span>
            </div>
            <div class="flex items-center space-x-2">
              <i class="fas fa-map-marker-alt"></i>
              <span>Jl. Nuansa Indah Selatan Utara I No.1, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80118</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sparring Lainnya Section -->
    <section class="mt-12">
      <h2 class="text-xl font-bold mb-6">main.Sparring Lainnya</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Sparring Card 1 -->
        <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
          <div class="flex items-center space-x-4 mb-3">
            <img src="assets/YOUNG_BOYS.png" alt="Young Boys Logo" class="w-12 h-12 rounded-full object-cover" />
            <div>
              <p class="text-xs text-gray-500">Futsal</p>
              <h3 class="font-semibold text-lg">Young Boys</h3>
              <p class="text-xs text-gray-600 flex items-center space-x-1">
                <i class="fas fa-shield-alt text-gray-400"></i>
                <span>Level Putih I</span>
              </p>
            </div>
          </div>
          <div class="text-xs text-gray-500 space-y-1">
            <p class="flex items-center space-x-2">
              <i class="far fa-calendar-alt"></i>
              <span>29 August 2025 · 21:00</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-map-marker-alt"></i>
              <span>Nirwana Futsal, Nirwana Futsal, Kota Jakarta Barat</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-wallet"></i>
              <span>Biaya · 120,000</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-hand-holding-dollar"></i>
              <span>Dp · 0</span>
            </p>
          </div>
        </article>

        <!-- Sparring Card 2 -->
        <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
          <div class="flex items-center space-x-4 mb-3">
            <img src="assets/ABC_FUTSAL_CLUB.png" alt="ABC Futsal Club Logo" class="w-12 h-12 rounded-full object-cover" />
            <div>
              <p class="text-xs text-gray-500">Futsal</p>
              <h3 class="font-semibold text-lg">ABC FUTSAL CLUB</h3>
              <p class="text-xs text-gray-600 flex items-center space-x-1">
                <i class="fas fa-shield-alt text-gray-400"></i>
                <span>Level Putih I</span>
              </p>
            </div>
          </div>
          <div class="text-xs text-gray-500 space-y-1">
            <p class="flex items-center space-x-2">
              <i class="far fa-calendar-alt"></i>
              <span>07 September 2025 · 20:00</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-map-marker-alt"></i>
              <span>W A 0 8 1 2 1 3 0 5 9 3 3 8, Tifosi Sport Center, Kota Jakarta Barat</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-wallet"></i>
              <span>Biaya · 150,000</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-hand-holding-dollar"></i>
              <span>Dp · 0</span>
            </p>
          </div>
        </article>

        <!-- Sparring Card 3 -->
        <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
          <div class="flex items-center space-x-4 mb-3">
            <img src="assets/ABC_FUTSAL_CLUB.png" alt="ABC Futsal Club Logo" class="w-12 h-12 rounded-full object-cover" />
            <div>
              <p class="text-xs text-gray-500">Futsal</p>
              <h3 class="font-semibold text-lg">ABC FUTSAL CLUB</h3>
              <p class="text-xs text-gray-600 flex items-center space-x-1">
                <i class="fas fa-shield-alt text-gray-400"></i>
                <span>Level Putih I</span>
              </p>
            </div>
          </div>
          <div class="text-xs text-gray-500 space-y-1">
            <p class="flex items-center space-x-2">
              <i class="far fa-calendar-alt"></i>
              <span>31 August 2025 · 20:00</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-map-marker-alt"></i>
              <span>W A 0 8 1 2 1 3 0 5 9 3 3 8, Tifosi Sport Center, Kota Jakarta Barat</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-wallet"></i>
              <span>Biaya · 150,000</span>
            </p>
            <p class="flex items-center space-x-2">
              <i class="fas fa-hand-holding-dollar"></i>
              <span>Dp · 0</span>
            </p>
          </div>
        </article>
      </div>
      <div class="text-center mt-6">
        <a href="#" class="text-red-700 font-semibold inline-flex items-center space-x-1 hover:underline">
          <span>Tampilkan Lebih Banyak</span>
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </section>
  </main>

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

  <script>
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    mobileMenuBtn.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
  </script>
</body>
</html>
