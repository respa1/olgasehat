<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Landing Page</title>
  <link rel="icon" href="{{ asset('frontend/assets/olgasehat-icon.png') }}" type="image/png" />
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
  <header class="fixed top-0 left-0 right-0 z-50 shadow-md bg-white">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
      <a href="home.html" class="flex items-center space-x-2">
        <img src="{{ asset('frontend/assets/olgasehat-icon.png') }}" alt="Olga Sehat Logo" class="w-100 h-10" />
      </a>
      <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
        <a href="venue.html" class="hover:text-blue-700">Sewa Lapangan</a>
        <a href="tempat_sehat.html" class="hover:text-blue-700">Tempat Sehat</a>
        <a href="community.html" class="hover:text-blue-700">Community</a>
        <a href="club.html" class="hover:text-blue-700">Club</a>
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

  <!-- Hero Section -->
  <section class="relative bg-cover bg-center h-[400px]" style="background-image: url('{{ asset('frontend/assets/ten-indonesia-august-02-2022-600nw-2455954305.webp') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center">
      <div class="container mx-auto px-6 text-white max-w-3xl">
        <h1 class="text-3xl md:text-4xl font-bold mb-4">
          Kini <span class="font-extrabold">Olga Sehat</span> Hadir<br />
          Untuk Gaya Hidup Sehat
        </h1>
        <p class="mb-4">
          Selamat datang di OLGA SEHAT<br />
          Satu platform untuk booking lapangan, klinik, komunitas olahraga, dan cek kesehatan.
        </p>
        <p class="font-semibold italic">#HidupLebihAktif kini lebih mudah!</p>
      </div>
    </div>
  </section>

  <!-- Kelola Fasilitas Section -->
  <section class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center md:items-start md:space-x-12">
    <div class="md:w-1/2 mb-8 md:mb-0">
      <div class="inline-flex space-x-2 mb-6" role="tablist" aria-label="Toggle Kelola Fasilitas">
        <button id="btnPemilik" role="tab" aria-selected="true" aria-controls="contentPemilik" tabindex="0" class="bg-blue-700 text-white text-sm font-semibold rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
          PEMILIK FASILITAS
        </button>
        <button id="btnPenyewa" role="tab" aria-selected="false" aria-controls="contentPenyewa" tabindex="-1" class="bg-gray-300 text-gray-600 text-sm font-semibold rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400">
          PENYEWA
        </button>
      </div>
      <div id="contentPemilik" role="tabpanel" aria-labelledby="btnPemilik" tabindex="0">
        <h2 class="text-4xl font-bold mb-6 text-gray-800">Kelola fasilitas lebih praktis dan menguntungkan.</h2>
        <p class="text-gray-700 mb-6 max-w-md text-lg leading-relaxed">
          Waktunya buat venue anda lebih dari sekadar venue. Semuanya dimulai dengan pengelolaan yang simpel, fleksibel, dan profitable lewat OLGA SEHAT Venue Management.
        </p>
        <a href="#" class="text-blue-700 font-semibold hover:underline text-lg">Lihat Selengkapnya</a>
      </div>
      <div id="contentPenyewa" role="tabpanel" aria-labelledby="btnPenyewa" tabindex="0" class="hidden">
        <h2 class="text-4xl font-bold mb-6 text-gray-800">Sewa lapangan dengan mudah dan cepat.</h2>
        <p class="text-gray-700 mb-6 max-w-md text-lg leading-relaxed">
          Ada rencana berolahraga minggu ini tapi belum tahu mau main di mana? Atau tidak sempat jauh-jauh datang ke venue hanya untuk booking lapangan?
        </p>
        <a href="#" class="text-blue-700 font-semibold hover:underline text-lg">Lihat Selengkapnya</a>
      </div>
    </div>
    <div class="md:w-1/2 grid grid-cols-2 gap-6" id="imageContainerPemilik">
      <img src="{{ asset('frontend/assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('frontend/assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('frontend/assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('frontend/assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-lg object-cover h-52 w-full" />
    </div>
    <div class="md:w-1/2 grid grid-cols-2 gap-6 hidden" id="imageContainerPenyewa">
      <img src="{{ asset('frontend/assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('frontend/assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('frontend/assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('frontend/assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-lg object-cover h-52 w-full" />
    </div>
  </section>

  <script>
    const btnPemilik = document.getElementById('btnPemilik');
    const btnPenyewa = document.getElementById('btnPenyewa');
    const contentPemilik = document.getElementById('contentPemilik');
    const contentPenyewa = document.getElementById('contentPenyewa');
    const imageContainerPemilik = document.getElementById('imageContainerPemilik');
    const imageContainerPenyewa = document.getElementById('imageContainerPenyewa');

    btnPemilik.addEventListener('click', () => {
      btnPemilik.classList.add('bg-blue-700', 'text-white');
      btnPemilik.classList.remove('bg-gray-300', 'text-gray-600');
      btnPemilik.setAttribute('aria-selected', 'true');
      btnPemilik.setAttribute('tabindex', '0');

      btnPenyewa.classList.remove('bg-blue-700', 'text-white');
      btnPenyewa.classList.add('bg-gray-300', 'text-gray-600');
      btnPenyewa.setAttribute('aria-selected', 'false');
      btnPenyewa.setAttribute('tabindex', '-1');

      contentPemilik.classList.remove('hidden');
      contentPenyewa.classList.add('hidden');

      imageContainerPemilik.classList.remove('hidden');
      imageContainerPenyewa.classList.add('hidden');
    });

    btnPenyewa.addEventListener('click', () => {
      btnPenyewa.classList.add('bg-blue-700', 'text-white');
      btnPenyewa.classList.remove('bg-gray-300', 'text-gray-600');
      btnPenyewa.setAttribute('aria-selected', 'true');
      btnPenyewa.setAttribute('tabindex', '0');

      btnPemilik.classList.remove('bg-blue-700', 'text-white');
      btnPemilik.classList.add('bg-gray-300', 'text-gray-600');
      btnPemilik.setAttribute('aria-selected', 'false');
      btnPemilik.setAttribute('tabindex', '-1');

      contentPenyewa.classList.remove('hidden');
      contentPemilik.classList.add('hidden');

      imageContainerPenyewa.classList.remove('hidden');
      imageContainerPemilik.classList.add('hidden');
    });
  </script>

  <!-- Cari Komunitas Section -->
  <section class="bg-gray-50 py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold mb-4 text-gray-800">Cari Komunitas terbaik untuk tim Anda!</h2>
      <p class="text-gray-700 mb-8 max-w-3xl mx-auto text-lg leading-relaxed">
        Ikuti berbagai pilihan kompetisi dari AYO Indonesia dan operator kompetisi lainnya. Rasakan keseruan silaturahmi di lapangan bersama ribuan tim amatir lainnya sekarang juga!
      </p>
      <div class="inline-flex space-x-4 mb-8">
        <button class="bg-blue-700 text-white text-sm font-semibold rounded-full px-4 py-2">PESERTA</button>
        <button class="bg-gray-300 text-gray-600 text-sm font-semibold rounded-full px-4 py-2">OPERATOR KOMPETISI</button>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-5xl mx-auto">
        <img src="{{ asset('frontend/assets/komunitas.png') }}" alt="Komunitas 1" class="rounded-lg object-cover h-56 w-full" />
        <img src="{{ asset('frontend/assets/komunitas1.png') }}" alt="Komunitas 2" class="rounded-lg object-cover h-56 w-full" />
        <img src="{{ asset('frontend/assets/komunitas2.png') }}" alt="Komunitas 3" class="rounded-lg object-cover h-56 w-full" />
      </div>
      <a href="#" class="text-blue-700 font-semibold mt-8 inline-block hover:underline text-lg">Lihat Komunitas</a>
    </div>
  </section>

  <!-- Mengapa Memilih Olga Sehat Section -->
  <section class="relative bg-cover bg-center h-[450px] mt-16" style="background-image: url('{{ asset('frontend/assets/banten-indonesia-august-02-2022-600nw-2455954305.webp') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center items-center text-white px-6">
      <h2 class="text-4xl font-bold mb-12 text-center max-w-3xl text-white">
        Mengapa Memilih Olga Sehat?
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 max-w-5xl w-full">
        <div class="bg-white bg-opacity-20 rounded-lg p-8 flex flex-col items-center space-y-6">
          <div class="w-16 h-16 bg-blue-700 rounded-full"></div>
          <p class="text-center font-semibold text-lg">Arena olahraga terbaik</p>
        </div>
        <div class="bg-white bg-opacity-20 rounded-lg p-8 flex flex-col items-center space-y-6">
          <div class="w-16 h-16 bg-blue-700 rounded-full"></div>
          <p class="text-center font-semibold text-lg">Dipilih khusus berdasarkan lokasi dan popularitas</p>
        </div>
        <div class="bg-white bg-opacity-20 rounded-lg p-8 flex flex-col items-center space-y-6">
          <div class="w-16 h-16 bg-blue-700 rounded-full"></div>
          <p class="text-center font-semibold text-lg">Booking sekarang jadi makin praktis</p>
        </div>
        <div class="bg-white bg-opacity-20 rounded-lg p-8 flex flex-col items-center space-y-6">
          <div class="w-16 h-16 bg-blue-700 rounded-full"></div>
          <p class="text-center font-semibold text-lg">Pelayanan terbaik dan terpercaya</p>
        </div>
      </div>
    </div>
  </section>

<!-- Testimonial Section -->
  <section class="container mx-auto px-6 py-12">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row rounded-lg overflow-hidden shadow-lg">
      <!-- Left side with blue background and heading -->
      <div class="md:w-1/2 bg-[url('{{ asset('frontend/assets/blue-banner.png') }}')] bg-cover bg-center flex items-center justify-center p-12">
        <h2 class="text-white text-3xl font-bold text-center">Apa Kata Mereka?</h2>
      </div>
      <!-- Right side with testimonial content -->
      <div class="md:w-1/2 bg-white p-12 flex flex-col justify-between relative">
        <div id="testimonial-container" class="relative min-h-[200px]">
          <div class="testimonial-item absolute inset-0 transition-opacity duration-500 opacity-100">
            <div class="flex items-center space-x-6 mb-6">
              <img src="{{ asset('frontend/assets/Goes Natha bos .jpg') }}" alt="Ir. Bagus Nathaniel Mahendra" class="w-20 h-20 rounded-full object-cover" />
              <div>
                <p class="font-semibold text-lg text-gray-900">Ir. Bagus Nathaniel Mahendra, M.Eng.</p>
                <p class="text-sm text-gray-500">Backbone Indonesia</p>
              </div>
              <div class="text-blue-700 text-4xl font-bold select-none ml-auto">“</div>
            </div>
            <p class="text-gray-700 text-base leading-relaxed">
              Olga Sehat membawa revolusi di kalangan penggemar olahraga. Aplikasi ini memudahkan pencarian aktivitas olahraga, mengembangkan komunitas olahraga, dan memesan tempat olahraga. Ini adalah ekosistem olahraga yang menyeluruh.
            </p>
          </div>
          <div class="testimonial-item absolute inset-0 transition-opacity duration-500 opacity-0 pointer-events-none">
            <div class="flex items-center space-x-6 mb-6">
              <img src="{{ asset('frontend/assets/ir_bagus.jpg') }}" alt="Testimonial 2" class="w-20 h-20 rounded-full object-cover" />
              <div>
                <p class="font-semibold text-lg text-gray-900">Testimonial User 2</p>
                <p class="text-sm text-gray-500">Company 2</p>
              </div>
              <div class="text-blue-700 text-4xl font-bold select-none ml-auto">“</div>
            </div>
            <p class="text-gray-700 text-base leading-relaxed">
              Testimonial content for user 2 goes here. This is a sample testimonial text.
            </p>
          </div>
          <div class="testimonial-item absolute inset-0 transition-opacity duration-500 opacity-0 pointer-events-none">
            <div class="flex items-center space-x-6 mb-6">
              <img src="{{ asset('frontend/assets/ir_bagus.jpg') }}" alt="Testimonial 3" class="w-20 h-20 rounded-full object-cover" />
              <div>
                <p class="font-semibold text-lg text-gray-900">Testimonial User 3</p>
                <p class="text-sm text-gray-500">Company 3</p>
              </div>
              <div class="text-blue-700 text-4xl font-bold select-none ml-auto">“</div>
            </div>
            <p class="text-gray-700 text-base leading-relaxed">
              Testimonial content for user 3 goes here. This is a sample testimonial text.
            </p>
          </div>
        </div>
        <!-- Slider controls -->
        <div class="flex items-center justify-start space-x-4 mt-8 text-sm font-semibold text-blue-700 select-none">
          <span id="testimonial-counter">01/03</span>
          <button id="prev-btn" aria-label="Previous" class="text-blue-700 hover:text-blue-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button id="next-btn" aria-label="Next" class="text-blue-700 hover:text-blue-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        </div>
      </div>
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

  <script src="{{ asset('frontend/assets/olgasehat.js') }}"></script>
</body>
</html>
