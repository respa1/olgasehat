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
        BOOKING VENUE OLAHRAGA TERBAIK
      </h1>
    </div>
    <!-- Decorative lines or shapes can be added here if needed -->
  </section>

  <!-- Search Filters -->
  <section class="container mx-auto px-6 py-8">
    <form class="flex flex-wrap gap-4 justify-center md:justify-start items-center">
      <input
        type="text"
        placeholder="Cari nama venue"
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

  <!-- Venue Cards Grid -->
  <section class="container mx-auto px-6 pb-12">
    <h2 class="font-semibold text-lg mb-4">
      Nikmati <span class="text-blue-700">4 Venue</span> yang tersedia
    </h2>
    <div
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6"
      aria-label="Daftar venue olahraga"
    >
      <!-- Venue Card 1 -->
      <a href="venue_detail.html" class="block">
        <article
          class="border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition"
        >
          <img
            src="assets/MU Sport Center.jpeg"
            alt="MU Sport Center"
            class="w-full h-40 object-cover"
          />
          <div class="p-4">
            <p class="text-xs text-gray-500 mb-1">Venue</p>
            <h3 class="font-semibold text-lg mb-1">MU Sport Center</h3>
            <p class="text-sm text-gray-500 mb-1">Kota Denpasar</p>
            <p class="text-xs text-gray-400 mb-2">Futsal</p>
            <p class="font-semibold mb-2">
              Mulai <span class="text-blue-700">Rp250,000</span> /Sesi
            </p>
            <div class="flex flex-wrap gap-2">
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                06.00
              </button>
              <button
                class="bg-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                18.00
              </button>
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                20.00
              </button>
              <button
                class="bg-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                22.00
              </button>
            </div>
          </div>
        </article>
      </a>

      <!-- Venue Card 2 -->
      <a href="venue_detail.html" class="block">
        <article
          class="border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition"
        >
          <img
            src="assets/Imbo Sport Center.webp"
            alt="Imbo Sport Center"
            class="w-full h-40 object-cover"
          />
          <div class="p-4">
            <p class="text-xs text-gray-500 mb-1">Venue</p>
            <h3 class="font-semibold text-lg mb-1">Imbo Sport Center</h3>
            <p class="text-sm text-gray-500 mb-1">Kota Denpasar</p>
            <p class="text-xs text-gray-400 mb-2">Futsal</p>
            <p class="font-semibold mb-2">
              Mulai <span class="text-blue-700">Rp230,000</span> /Sesi
            </p>
            <div class="flex flex-wrap gap-2">
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                08.00
              </button>
              <button
                class="bg-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                18.00
              </button>
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                20.00
              </button>
              <button
                class="bg-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                22.00
              </button>
            </div>
          </div>
        </article>
      </a>

      <!-- Venue Card 3 -->
      <a href="venue_detail.html" class="block">
        <article
          class="border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition"
        >
          <img
            src="assets/DC Arena Bali.jpeg"
            alt="DC Arena Bali"
            class="w-full h-40 object-cover"
          />
          <div class="p-4">
            <p class="text-xs text-gray-500 mb-1">Venue</p>
            <h3 class="font-semibold text-lg mb-1">DC Arena Bali</h3>
            <p class="text-sm text-gray-500 mb-1">Kota Denpasar</p>
            <p class="text-xs text-gray-400 mb-2">Basketball</p>
            <p class="font-semibold mb-2">
              Mulai <span class="text-blue-700">Rp180,000</span> /Sesi
            </p>
            <div class="flex flex-wrap gap-2">
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                06.00
              </button>
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                08.00
              </button>
              <button
                class="bg-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                18.00
              </button>
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                22.00
              </button>
            </div>
          </div>
        </article>
      </a>

      <!-- Venue Card 4 -->
      <a href="venue_detail.html" class="block">
        <article
          class="border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition"
        >
          <img
            src="assets/Arena Sport.jpg"
            alt="Arena Sport"
            class="w-full h-40 object-cover"
          />
          <div class="p-4">
            <p class="text-xs text-gray-500 mb-1">Venue</p>
            <h3 class="font-semibold text-lg mb-1">Arena Sport</h3>
            <p class="text-sm text-gray-500 mb-1">Kota Denpasar</p>
            <p class="text-xs text-gray-400 mb-2">Mini Soccer</p>
            <p class="font-semibold mb-2">
              Mulai <span class="text-blue-700">Rp350,000</span> /Sesi
            </p>
            <div class="flex flex-wrap gap-2">
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                08.00
              </button>
              <button
                class="bg-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                18.00
              </button>
              <button
                class="bg-white border border-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                20.00
              </button>
              <button
                class="bg-gray-300 text-gray-700 text-xs rounded px-2 py-1 hover:bg-green-600 hover:text-white transition"
              >
                22.00
              </button>
            </div>
          </div>
        </article>
      </a>
    </div>

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

<!-- Carousel -->
  <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 relative">
    <div class="overflow-hidden rounded-lg">
      <div class="flex transition-transform duration-500 ease-in-out" id="carousel" style="transform: translateX(0%)">
        <img alt="Mahakarya Udaya Sport Club & Lifestyle banner with green grass and sport equipment" class="w-full flex-shrink-0 object-cover rounded-lg" height="300" src="assets/OIP (1).webp" style="max-height: 300px" width="900"/>
        <img alt="Second carousel image placeholder" class="w-full flex-shrink-0 object-cover rounded-lg" height="300" src="assets/OIP (1).webp" style="max-height: 300px" width="900"/>
        <img alt="Third carousel image placeholder" class="w-full flex-shrink-0 object-cover rounded-lg" height="300" src="assets/OIP (1).webp" style="max-height: 300px" width="900"/>
        <img alt="Fourth carousel image placeholder" class="w-full flex-shrink-0 object-cover rounded-lg" height="300" src="assets/OIP (1).webp" style="max-height: 300px" width="900"/>
        <img alt="Fifth carousel image placeholder" class="w-full flex-shrink-0 object-cover rounded-lg" height="300" src="assets/OIP (1).webp" style="max-height: 300px" width="900"/>
      </div>
    </div>
    <!-- Carousel controls -->
    <button aria-label="Previous slide" class="absolute top-1/2 left-2 -translate-y-1/2 bg-gray-500 bg-opacity-50 hover:bg-opacity-70 text-white p-2 rounded-full" id="prev" style="user-select:none">
      <i class="fas fa-chevron-left"></i>
    </button>
    <button aria-label="Next slide" class="absolute top-1/2 right-2 -translate-y-1/2 bg-gray-500 bg-opacity-50 hover:bg-opacity-70 text-white p-2 rounded-full" id="next" style="user-select:none">
      <i class="fas fa-chevron-right"></i>
    </button>
    <!-- Dots -->
    <div class="flex justify-center space-x-2 mt-3 text-gray-600 text-xs select-none" id="dots">
      <button aria-label="Slide 1" class="w-2 h-2 rounded-full bg-gray-600" data-index="0"></button>
      <button aria-label="Slide 2" class="w-2 h-2 rounded-full bg-gray-300" data-index="1"></button>
      <button aria-label="Slide 3" class="w-2 h-2 rounded-full bg-gray-300" data-index="2"></button>
      <button aria-label="Slide 4" class="w-2 h-2 rounded-full bg-gray-300" data-index="3"></button>
      <button aria-label="Slide 5" class="w-2 h-2 rounded-full bg-gray-300" data-index="4"></button>
    </div>
  </section>

  <!-- Promo Venue Section -->
  <section class="container mx-auto px-6 mb-12">
    <div class="flex flex-col md:flex-row md:items-start md:space-x-8">
      <div class="md:w-1/4 mb-6 md:mb-0">
        <h2 class="text-2xl font-bold text-blue-700 mb-2">Promo Venue</h2>
        <p class="text-gray-600 mb-4">
          Booking sekarang, dapatkan penawaran terbaik.
        </p>
        <a href="#" class="text-blue-700 hover:underline text-sm font-semibold"
          >Lihat Lebih banyak</a
        >
      </div>
      <div
        class="md:w-3/4 flex space-x-6 overflow-x-auto scrollbar-thin scrollbar-thumb-blue-700 scrollbar-track-gray-200"
      >
        <!-- Promo 1 -->
         <a href="venue_detail.html">
          <article class="min-w-[280px] border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="relative">
              <img alt="Promo Special DNA Arena Cinere image with red roof and colorful wall paintings" class="w-full h-40 object-cover" height="160" src="assets/MU Sport Center.jpeg" width="280"/>
              <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-2 py-1">PROMO</span>
            </div>
            <div class="p-4">
              <h4 class="font-semibold text-sm mb-1">Promo Special MU Sport Center</h4>
              <p class="text-xs text-gray-500 mb-1">MU Sport Center</p>
              <p class="text-xs text-gray-400">Periode 01 Jul - 31 Aug</p>
            </div>
          </article>
         </a>
          
          <!-- Promo 2 -->
          <article class="min-w-[280px] border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="relative">
              <img alt="Basketball court with players playing promo image" class="w-full h-40 object-cover" height="160" src="/assets/Imbo Sport Center.webp" width="280"/>
              <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-2 py-1">PROMO</span>
            </div>
            <div class="p-4">
              <h4 class="font-semibold text-sm mb-1">PRICELIST 2025</h4>
              <p class="text-xs text-gray-500 mb-1">Arena Sport</p>
              <p class="text-xs text-gray-400">Periode 01 Apr - 31 Dec</p>
            </div>
          </article>
          
          <!-- Promo 3 -->
          <article class="min-w-[280px] border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="relative">
              <img alt="Outdoor field with lights promo image" class="w-full h-40 object-cover" height="160" src="assets/DC Arena Bali.jpeg" width="280"/>
              <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-2 py-1">PROMO</span>
            </div>
            <div class="p-4">
              <h4 class="font-semibold text-sm mb-1">PRICELIST 20</h4>
              <p class="text-xs text-gray-500 mb-1">111 Stadion Arena</p>
              <p class="text-xs text-gray-400">Periode 01 Apr - 31</p>
            </div>
          </article>
          
          <!-- Promo 4 -->
          <article class="min-w-[280px] border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="relative">
              <img alt="Sports field promo image" class="w-full h-40 object-cover" height="160" src="assets/Arena Sport.jpg" width="280"/>
              <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-2 py-1">PROMO</span>
            </div>
            <div class="p-4">
              <h4 class="font-semibold text-sm mb-1">Special Weekend Offer</h4>
              <p class="text-xs text-gray-500 mb-1">Weekend Sports Arena</p>
              <p class="text-xs text-gray-400">Periode 01 Sep - 30 Sep</p>
            </div>
          </article>
          
          <!-- Promo 5 -->
          <article class="min-w-[280px] border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="relative">
              <img alt="Basketball court promo image" class="w-full h-40 object-cover" height="160" src="https://storage.googleapis.com/a1aa/image/2dc016db-2391-4056-8156-041f6d284417.jpg" width="280"/>
              <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-2 py-1">PROMO</span>
            </div>
            <div class="p-4">
              <h4 class="font-semibold text-sm mb-1">Early Bird Discount</h4>
              <p class="text-xs text-gray-500 mb-1">Morning Sports Complex</p>
              <p class="text-xs text-gray-400">Periode 01 Oct - 31 Oct</p>
            </div>
          </article>
      </div>
    </div>
  </section>

  
  <!-- FAQ Section -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
    <h2 class="text-center font-bold text-2xl mb-8">FAQ</h2>
    <div class="space-y-4 max-w-full mx-auto">
      <details class="border-b border-gray-300 pb-4 group">
        <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-3 group-open:text-blue-700 group-open:font-bold">
          Apa kelebihan sewa lapangan yang tersedia di Olga Sehat?
          <i class="fas fa-plus text-gray-700 group-open:text-blue-700"></i>
        </summary>
        <p class="text-base text-gray-700 mt-3">Olga Sehat menawarkan berbagai kelebihan seperti sistem booking yang mudah, harga transparan, fasilitas terjamin kualitasnya, dan banyak pilihan venue sesuai kebutuhan Anda.</p>
      </details>
      <details class="border-b border-gray-300 pb-4 group">
        <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-3 group-open:text-blue-700 group-open:font-bold">
          Bagaimana cara memesan lapangan di Olga Sehat?
          <i class="fas fa-plus text-gray-700 group-open:text-blue-700"></i>
        </summary>
        <p class="text-base text-gray-700 mt-3">Anda dapat memesan lapangan dengan mudah melalui website atau aplikasi Olga Sehat. Cukup pilih venue, tanggal, dan jam yang diinginkan, lalu lakukan pembayaran.</p>
      </details>
      <details class="border-b border-gray-300 pb-4 group">
        <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-3 group-open:text-blue-700 group-open:font-bold">
          Berapa biaya sewa lapangan yang tersedia di Olga Sehat?
          <i class="fas fa-plus text-gray-700 group-open:text-blue-700"></i>
        </summary>
        <p class="text-base text-gray-700 mt-3">Biaya sewa bervariasi tergantung venue, jenis olahraga, dan waktu booking. Harga mulai dari Rp180.000 per sesi. Anda dapat melihat detail harga di halaman venue.</p>
      </details>
      <details class="border-b border-gray-300 pb-4 group">
        <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-3 group-open:text-blue-700 group-open:font-bold">
          Apakah ada diskon atau promo khusus untuk penyewaan lapangan di Olga Sehat?
          <i class="fas fa-plus text-gray-700 group-open:text-blue-700"></i>
        </summary>
        <p class="text-base text-gray-700 mt-3">Ya, Olga Sehat secara rutin menawarkan berbagai promo dan diskon khusus. Anda dapat memeriksa halaman promo untuk melihat penawaran terbaru.</p>
      </details>
      <details class="border-b border-gray-300 pb-4 group">
        <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-3 group-open:text-blue-700 group-open:font-bold">
          Bagaimana cara menemukan lapangan yang sesuai dengan kebutuhan saya?
          <i class="fas fa-plus text-gray-700 group-open:text-blue-700"></i>
        </summary>
        <p class="text-base text-gray-700 mt-3">Gunakan filter pencarian di halaman utama untuk menemukan lapangan berdasarkan lokasi, jenis olahraga, tanggal, dan preferensi lainnya. Anda juga dapat melihat ulasan dari pengguna lain.</p>
      </details>
    </div>
  </section>
  <!-- Business Solution Section -->
  <section class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
    <div class="bg-gray-900 text-white rounded-xl p-8 max-w-4xl mx-auto space-y-4">
      <p class="text-xs font-normal opacity-70">Khusus Pemilik Bisnis</p>
      <h2 class="text-3xl font-bold leading-tight">
        Solusi Kelola<br/>
        Fasilitas Olahraga<br/>
        Anda
      </h2>
      <p class="text-sm font-normal max-w-md leading-relaxed">
        Tingkatkan Potensi Pendapatan Lapangan & Nikmati
        <span class="font-semibold">#BisnisMakinMudah</span>
        dalam mengelola venue olahraga
      </p>
      <a class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3 rounded-md mt-4" href="/loginpengelolavenue">Daftar Sekarang</a>
    </div>
  </section>

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

    <script src="assets/olgasehat.js"></script>
</body>
</html>
