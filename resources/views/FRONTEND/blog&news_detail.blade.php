<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Booking Venue Olahraga</title>
  <link rel="icon" href="{{ asset('assets/olgasehat-icon.png') }}" type="image/png" />
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
      <a href="/" class="flex items-center space-x-2">
        <img src="{{ asset('assets/olgasehat-icon.png') }}" alt="Olga Sehat Logo" class="w-100 h-10" />
      </a>
      <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
         <a href="/venue" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="#" class="hover:text-blue-700">Tempat Sehat</a>
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
        href="/venue"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Sewa Lapangan</a
      >
      <a
        href="#"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Tempat Sehat</a
      >
      <a
        href="/community"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Komunitas</a
      >
      <a
        href="/club"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Klub</a
      >
      <a
        href="/blog-news"
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

  <!-- Blog Detail Section -->
  <section class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Main Content -->
    <main class="md:col-span-2">
      <h1 class="text-2xl md:text-3xl font-bold mb-2">
        Kenapa Sparring Tennis Penting? Ini Manfaat yang Bisa Didapat!
      </h1>
      <div class="flex items-center text-gray-600 text-sm mb-6 space-x-4">
        <span>oleh Eren</span>
        <span>28 March 2025</span>
        <div class="flex space-x-3 ml-auto">
          <a href="#" aria-label="Share on Facebook" class="text-blue-600 hover:text-blue-800">
            <i class="fab fa-facebook-f fa-lg"></i>
          </a>
          <a href="#" aria-label="Share on Twitter" class="text-blue-400 hover:text-blue-600">
            <i class="fab fa-twitter fa-lg"></i>
          </a>
          <a href="#" aria-label="Share on LinkedIn" class="text-blue-700 hover:text-blue-900">
            <i class="fab fa-linkedin-in fa-lg"></i>
          </a>
          <a href="#" aria-label="Share on WhatsApp" class="text-green-500 hover:text-green-700">
            <i class="fab fa-whatsapp fa-lg"></i>
          </a>
        </div>
      </div>
      <img
        src="{{ asset('assets/tenis.jpg') }}"
        alt="Tennis Player"
        class="w-full rounded-lg mb-6 object-cover max-h-[400px]"
      />
      <article class="prose prose-sm md:prose lg:prose-lg max-w-none text-justify">
        <p>
          Anda merasa stuck saat latihan tenis? <strong>Skill</strong> tidak berkembang, atau permainan terasa monoton? Nah, mungkin saatnya Anda coba <em>sparring</em>! Selain seru, <em>sparring</em> tenis punya segudang manfaat yang bisa membuat permainan Anda semakin pro. Dengan bertanding lawan pemain lain, Anda tak hanya belajar teknik baru, tapi juga mengasah strategi dan mental bertanding. Ini bukan hanya soal menang atau kalah, ada <strong>manfaat sparring tenis</strong> yang bisa membuat Anda terus berkembang.
        </p>
        <p>
          Benarkah itu? Yuk, simak kenapa <em>sparring</em> itu penting dan apa saja keuntungannya untuk Anda yang hobi atau ingin serius di dunia tenis!
        </p>
        <h2>Manfaat <em>Sparring</em> Tennis</h2>
        <p>
          <em>Sparring</em> punya segudang manfaat yang sayang sekali jika dilewatkan. Berikut kami bagikan banyaknya <strong>manfaat sparring tenis</strong> yang jadi alasan kenapa itu penting untuk meningkatkan <em>skill</em> dan performa di lapangan.
        </p>
        <h3>1. Melatih Kemampuan Strategis</h3>
        <p>
          <em>Sparring</em> jadi momen tepat untuk mengasah kemampuan strategi di lapangan. Saat bermain dengan lawan berbeda, Anda belajar membaca pola permainan mereka dan mencari cara terbaik untuk mengatasinya.
        </p>
        <p>
          Di sini, Anda akan tahu kapan harus menyerang, kapan bertahan, dan bagaimana memanfaatkan momen untuk memenangkan poin. Dengan terus berlatih, Anda tidak hanya jadi pemain yang lebih cerdas, tapi juga lebih luwes menghadapi berbagai situasi permainan.
        </p>
        <h3>2. Mengasah Keterampilan Teknikal</h3>
        <p>
          Servis, <em>forehand</em>, <em>backhand</em>, sampai <em>volley</em>, semua teknik tenis bisa Anda latih lebih maksimal saat <em>sparring</em>. Manfaatkan suasana permainan untuk mencoba berbagai variasi teknik untuk melihat mana yang paling efektif melawan lawan.
        </p>
        <p>
          Dengan latihan konsisten lewat <em>sparring</em>, kemampuan teknikal Anda akan semakin tajam dan siap untuk pertarungan sesungguhnya.
        </p>
        <h3>3. Meningkatkan Ketahanan Mental</h3>
        <p>
          Bertemu lawan yang tangguh? Jangan panik, <em>sparring</em> adalah ajang yang pas untuk melatih ketahanan mental. Jadi, <strong>manfaat sparring tenis</strong> itu bisa untuk belajar fokus, menjaga konsentrasi, dan mengelola emosi meski permainan terasa menekan. Hal ini penting, karena seringkali mental yang kuat adalah kunci untuk memenangkan pertandingan.
        </p>
        <h3>4. Membangun Kebugaran Fisik</h3>
        <p>
          <em>Sparring</em> juga membantu membangun kebugaran fisik Anda. Dengan bergerak aktif di lapangan, Anda meningkatkan stamina, kelincahan, dan kekuatan otot yang sangat dibutuhkan dalam tenis.
        </p>
      </article>
    </main>

    <!-- Sidebar -->
    <aside class="md:col-span-1 bg-white rounded-lg shadow p-6">
      <h2 class="text-lg font-semibold border-b-2 border-blue-700 pb-2 mb-4">Artikel Terbaru</h2>
      <ol class="list-decimal list-inside space-y-4 text-sm text-gray-800 font-semibold">
        <li>
          <a href="#" class="hover:underline">
            Kenapa Sparring Tennis Penting? Ini Manfaat yang Bisa Didapat!
          </a>
          <p class="text-xs text-gray-500">28 March 25</p>
        </li>
        <li>
          <a href="#" class="hover:underline">
            6 Manfaat Sparing Badminton yang Wajib Diketahui Pebulutangkis
          </a>
          <p class="text-xs text-gray-500">28 March 25</p>
        </li>
        <li>
          <a href="#" class="hover:underline">
            Panduan Lengkap untuk Memahami Peraturan Tenis Meja Tunggal
          </a>
          <p class="text-xs text-gray-500">28 March 25</p>
        </li>
        <li>
          <a href="#" class="hover:underline">
            Cara Mencari Lawan Bermain Tennis untuk Mengasah Skill
          </a>
          <p class="text-xs text-gray-500">28 March 25</p>
        </li>
        <li>
          <a href="#" class="hover:underline">
            Cara Bermain Bulu Tangkis 1 Lawan 1 untuk Pemula dan Pro
          </a>
          <p class="text-xs text-gray-500">28 March 25</p>
        </li>
      </ol>
    </aside>
  </section>

  <!-- Related Articles Section -->
  <section class="container mx-auto px-6 pb-12">
    <h2 class="text-xl font-semibold mb-6">Artikel Terkait</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <img
          src="{{ asset('assets/basketball-player.jpg') }}"
          alt="Basketball Player"
          class="w-full h-48 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-blue-700 font-semibold uppercase mb-2">Basketball</p>
          <h3 class="font-bold text-lg mb-2">
            3 Hal Penting agar Main Bola Tetap Lancar di Bulan Puasa
          </h3>
          <p class="text-gray-600 text-sm mb-4">
            Bagaimana cara tetap lancar main bola di bulan puasa? Yuk simak tiga tips berikut ini!
          </p>
          <div class="flex items-center justify-between text-xs text-gray-500">
            <span>oleh Yasin</span>
            <time datetime="2022-04-14">14 April 2022</time>
          </div>
        </div>
      </article>

      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <img
          src="{{ asset('assets/tennis-player.jpg') }}"
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
      </article>

      <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
        <img
          src="{{ asset('assets/mini-soccer.jpg') }}"
          alt="Mini Soccer Field"
          class="w-full h-48 object-cover"
        />
        <div class="p-4">
          <p class="text-xs text-blue-700 font-semibold uppercase mb-2">Mini Soccer</p>
          <h3 class="font-bold text-lg mb-2">
            Inilah Ukuran Standar Lapangan Mini Soccer yang Harus Diketahui
          </h3>
          <p class="text-gray-600 text-sm mb-4">
            Ukuran lapangan mini soccer yang wajib diketahui oleh para pemain dan pelatih...
          </p>
          <div class="flex items-center justify-between text-xs text-gray-500">
            <span>oleh Dite</span>
            <time datetime="2024-07-29">29 July 2024</time>
          </div>
        </div>
      </article>
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

    <!-- Swiper JS for slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      // Carousel functionality
    const carousel = document.getElementById('carousel');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    const dots = document.getElementById('dots').children;
    const totalSlides = carousel.children.length;
    let currentIndex = 0;

    function updateCarousel(index) {
      if (index < 0) index = totalSlides - 1;
      if (index >= totalSlides) index = 0;
      currentIndex = index;
      carousel.style.transform = `translateX(-${index * 100}%)`;
      for (let i = 0; i < dots.length; i++) {
        dots[i].classList.toggle('bg-gray-600', i === index);
        dots[i].classList.toggle('bg-gray-300', i !== index);
      }
    }

    prevBtn.addEventListener('click', () => {
      updateCarousel(currentIndex - 1);
    });

    nextBtn.addEventListener('click', () => {
      updateCarousel(currentIndex + 1);
    });

    for (let i = 0; i < dots.length; i++) {
      dots[i].addEventListener('click', () => {
        updateCarousel(i);
      });
    }

    // Auto slide carousel
    setInterval(() => {
      updateCarousel(currentIndex + 1);
    }, 5000);

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
