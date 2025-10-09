<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Landing Page</title>
  <link rel="icon" href="{{ asset('assets/olgasehat-icon.png') }}" type="image/png" />
  <!-- Tailwind CSS -->
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
</head>
<body class="bg-white text-gray-800 font-sans">
<!-- HEADER -->
<header class="fixed top-0 left-0 right-0 z-50 shadow-md bg-white relative">
  <div class="container mx-auto flex items-center justify-between py-4 px-6">
    
    <!-- Logo -->
    <a href="/" class="flex items-center space-x-2">
      <img src="{{ asset('assets/olgasehat-icon.png') }}" alt="Olga Sehat Logo" class="h-10 w-auto" />
    </a>

    <!-- Menu Desktop -->
    <nav class="hidden md:flex space-x-6 text-gray-700 font-medium">
      <a href="/venue" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="#" class="hover:text-blue-700">Tempat Sehat</a>
      <a href="/community" class="hover:text-blue-700">Komunitas</a>
      <a href="/club" class="hover:text-blue-700">Klub</a>
      <a href="/blog-news" class="hover:text-blue-700">Blog & News</a>
    </nav>

    <!-- Aksi Desktop -->
    <div class="hidden md:flex items-center space-x-4 relative">
     <!-- Tombol Cart (Desktop & Mobile) -->
<button id="cartBtn" aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
  <i class="fas fa-shopping-cart fa-lg"></i>
  <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
</button>

<!-- Overlay -->
<div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<!-- Cart Sidebar -->
<div id="cartSidebar" 
     class="fixed top-0 right-0 w-80 max-w-full h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
  <!-- Header -->
  <div class="flex justify-between items-center px-4 py-3 border-b">
    <h2 class="font-semibold text-lg">JADWAL DIPILIH</h2>
    <button id="closeCart" class="text-gray-500 hover:text-gray-700">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <!-- Isi Cart -->
  <div class="p-4 text-gray-600">
    Belum ada jadwal di keranjang.
  </div>
</div>
      <!-- Register Dropdown -->
      <div class="relative">
        <button id="registerBtn" class="text-gray-700 hover:text-blue-700 focus:outline-none">Register</button>
        <div id="registerDropdown"
          class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50
                 transform scale-95 opacity-0 transition-all duration-200 ease-out">
          <a href="/daftaruser" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Akun User</a>
          <a href="/regispengelola" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Akun Pengelola Venue</a>
        </div>
      </div>

      <!-- Login Dropdown -->
      <div class="relative">
        <button id="loginBtn"
          class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-800 transition focus:outline-none">
          Login
        </button>
        <div id="loginDropdown"
          class="hidden absolute right-0 mt-2 w-56 bg-white border rounded-md shadow-lg z-50
                 transform scale-95 opacity-0 transition-all duration-200 ease-out">
          <a href="/loginuser" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login User</a>
          <a href="/loginpengelolavenue" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login Pengelola Venue</a>
        </div>
      </div>
    </div>

   

<!-- Header Mobile (Cart + Hamburger dalam satu flex) -->
<div class="flex md:hidden items-center space-x-4 ml-auto">
  <!-- Tombol Cart (Desktop & Mobile) -->
<button id="cartBtn" aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
  <i class="fas fa-shopping-cart fa-lg"></i>
  <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
</button>

<!-- Overlay -->
<div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<!-- Cart Sidebar -->
<div id="cartSidebar" 
     class="fixed top-0 right-0 w-80 max-w-full h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
  <!-- Header -->
  <div class="flex justify-between items-center px-4 py-3 border-b">
    <h2 class="font-semibold text-lg">JADWAL DIPILIH</h2>
    <button id="closeCart" class="text-gray-500 hover:text-gray-700">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <!-- Isi Cart -->
  <div class="p-4 text-gray-600">
    Belum ada jadwal di keranjang.
  </div>
</div>

  <!-- Tombol Hamburger -->
  <button id="mobileMenuBtn"
          class="text-gray-700 hover:text-blue-700 focus:outline-none"
          aria-label="Open menu">
    <i class="fas fa-bars fa-lg"></i>
  </button>
</div>


<!-- Menu Navigasi Mobile -->
<nav id="mobileMenu"
     class="hidden flex-col md:hidden bg-white border-t border-gray-200 shadow-md 
            transition-all duration-300 ease-in-out absolute top-full left-0 w-full z-[50]">

  <!-- Link Navigasi -->
  <a href="/venue" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Sewa Lapangan</a>
  <a href="#" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Tempat Sehat</a>
  <a href="/community" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Komunitas</a>
  <a href="/club" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Klub</a>
  <a href="/blog-news" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Blog & News</a>

  <!-- Register Dropdown (Mobile) -->
  <div class="border-t">
    <button id="mobileRegisterBtn" 
            class="w-full text-left px-6 py-3 font-semibold text-gray-700 
                   hover:bg-blue-50 hover:text-blue-700 focus:outline-none 
                   flex justify-between items-center">
      Register
      <i class="fas fa-chevron-down ml-2"></i>
    </button>
    <div id="mobileRegisterDropdown" class="hidden flex-col bg-gray-50">
      <a href="/daftaruser" class="block px-6 py-3 border-t text-gray-700 hover:bg-gray-100">Akun User</a>
      <a href="/regispengelola" class="block px-6 py-3 border-t text-gray-700 hover:bg-gray-100">Akun Pengelola Venue</a>
    </div>
  </div>

  <!-- Login Dropdown (Mobile) -->
  <div class="border-t">
    <button id="mobileLoginBtn" 
            class="w-full text-left px-6 py-3 font-semibold bg-blue-700 text-white rounded-md 
                   hover:bg-blue-800 focus:outline-none flex justify-between items-center">
      Login
      <i class="fas fa-chevron-down ml-2"></i>
    </button>
    <div id="mobileLoginDropdown" class="hidden flex-col bg-white shadow-md rounded-b-md">
      <a href="/loginuser" class="block px-6 py-3 border-t text-gray-700 hover:bg-gray-100">Login User</a>
      <a href="/loginpengelolavenue" class="block px-6 py-3 border-t text-gray-700 hover:bg-gray-100">Login Pengelola Venue</a>
    </div>
  </div>
</nav>



</header>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Dropdown helper
    function toggleDropdown(dropdown) {
      if (dropdown.classList.contains("hidden")) {
        dropdown.classList.remove("hidden");
        setTimeout(() => {
          dropdown.classList.remove("opacity-0", "scale-95");
          dropdown.classList.add("opacity-100", "scale-100");
        }, 10);
      } else {
        dropdown.classList.remove("opacity-100", "scale-100");
        dropdown.classList.add("opacity-0", "scale-95");
        setTimeout(() => dropdown.classList.add("hidden"), 200);
      }
    }

    const registerBtn = document.getElementById("registerBtn");
    const registerDropdown = document.getElementById("registerDropdown");
    const loginBtn = document.getElementById("loginBtn");
    const loginDropdown = document.getElementById("loginDropdown");
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const mobileMenu = document.getElementById("mobileMenu");

    // Register Dropdown
    registerBtn?.addEventListener("click", (e) => {
      e.stopPropagation();
      toggleDropdown(registerDropdown);
    });

    // Login Dropdown
    loginBtn?.addEventListener("click", (e) => {
      e.stopPropagation();
      toggleDropdown(loginDropdown);
    });

    // Mobile Menu Toggle
    mobileMenuBtn?.addEventListener("click", (e) => {
      e.stopPropagation();
      mobileMenu.classList.toggle("hidden");
    });

    // Klik di luar menutup dropdown/menu
    window.addEventListener("click", (e) => {
      if (!registerBtn.contains(e.target) && !registerDropdown.contains(e.target)) {
        registerDropdown.classList.add("hidden", "opacity-0", "scale-95");
      }
      if (!loginBtn.contains(e.target) && !loginDropdown.contains(e.target)) {
        loginDropdown.classList.add("hidden", "opacity-0", "scale-95");
      }
      if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
        mobileMenu.classList.add("hidden");
      }
    });
  });
</script>
  <!-- Hero Section -->
  <section class="relative bg-cover bg-center h-[400px]" style="background-image: url('{{ asset('assets/banten-indonesia-august-02-2022-600nw-2455954305.webp') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center">
      <div class="container mx-auto px-6 text-white text-left">
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
          PEMILIK LAPANGAN
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
      <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-lg object-cover h-52 w-full" />
    </div>
    <div class="md:w-1/2 grid grid-cols-2 gap-6 hidden" id="imageContainerPenyewa">
      <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-lg object-cover h-52 w-full" />
    </div>
  </section>

  <!-- Kelola Fasilitas Section -->
  <section class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center md:items-start md:space-x-12">
    <div class="md:w-1/2 grid grid-cols-2 gap-6" id="imageContainerPemilik">
      <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-lg object-cover h-52 w-full" />
    </div>
    <div class="md:w-1/2 grid grid-cols-2 gap-6 hidden" id="imageContainerPenyewa">
      <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-lg object-cover h-52 w-full" />
    </div>
    <div class="md:w-1/2 mb-8 md:mb-0">
      <div class="inline-flex space-x-2 mb-6" role="tablist" aria-label="Toggle Kelola Fasilitas">
        <button id="btnPemilik" role="tab" aria-selected="true" aria-controls="contentPemilik" tabindex="0" class="bg-blue-700 text-white text-sm font-semibold rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
          PEMILIK KESEHATAN
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
    <div class="md:w-1/2 grid grid-cols-2 gap-6 hidden" id="imageContainerPenyewa">
      <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-lg object-cover h-52 w-full" />
      <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-lg object-cover h-52 w-full" />
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
        Ikuti berbagai pilihan kompetisi dari Olga Sehat dan operator kompetisi lainnya. Rasakan keseruan silaturahmi di lapangan bersama ribuan tim amatir lainnya sekarang juga!
      </p>
      <div class="inline-flex space-x-4 mb-8">
        <button class="bg-blue-700 text-white text-sm font-semibold rounded-full px-4 py-2">KOMUNITAS</button>
        <button class="bg-gray-300 text-gray-600 text-sm font-semibold rounded-full px-4 py-2">KLUB</button>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-5xl mx-auto">
        <img src="{{ asset('assets/komunitas.png') }}" alt="Komunitas 1" class="rounded-lg object-cover h-56 w-full" />
        <img src="{{ asset('assets/komunitas1.png') }}" alt="Komunitas 2" class="rounded-lg object-cover h-56 w-full" />
        <img src="{{ asset('assets/komunitas2.png') }}" alt="Komunitas 3" class="rounded-lg object-cover h-56 w-full" />
      </div>
      <a href="#" class="text-blue-700 font-semibold mt-8 inline-block hover:underline text-lg">Lihat Komunitas</a>
    </div>
  </section>

  <!-- Mengapa Memilih Olga Sehat Section -->
  <section class="relative bg-cover bg-center h-[450px] mt-16" style="background-image: url('{{ asset('assets/banten-indonesia-august-02-2022-600nw-2455954305.webp') }}');">
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
      <div class="md:w-1/2 bg-[url('{{ asset('assets/blue-banner.png') }}')] bg-cover bg-center flex items-center justify-center p-12">
        <h2 class="text-white text-3xl font-bold text-center">Apa Kata Mereka?</h2>
      </div>
      <!-- Right side with testimonial content -->
      <div class="md:w-1/2 bg-white p-12 flex flex-col justify-between relative">
        <div id="testimonial-container" class="relative min-h-[200px]">
          <div class="testimonial-item absolute inset-0 transition-opacity duration-500 opacity-100">
            <div class="flex items-center space-x-6 mb-6">
              <img src="{{ asset('assets/Goes Natha bos .jpg') }}" alt="Ir. Bagus Nathaniel Mahendra" class="w-20 h-20 rounded-full object-cover" />
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
              <img src="{{ asset('assets/ir_bagus.jpg') }}" alt="Testimonial 2" class="w-20 h-20 rounded-full object-cover" />
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
              <img src="{{ asset('assets/ir_bagus.jpg') }}" alt="Testimonial 3" class="w-20 h-20 rounded-full object-cover" />
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

  <script>
  const mobileRegisterBtn = document.getElementById("mobileRegisterBtn");
  const mobileRegisterDropdown = document.getElementById("mobileRegisterDropdown");
  const mobileLoginBtn = document.getElementById("mobileLoginBtn");
  const mobileLoginDropdown = document.getElementById("mobileLoginDropdown");

  // Register toggle
  mobileRegisterBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    mobileRegisterDropdown.classList.toggle("hidden");
  });

  // Login toggle
  mobileLoginBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    mobileLoginDropdown.classList.toggle("hidden");
  });

  // Tutup dropdown ketika klik di luar
  window.addEventListener("click", (e) => {
    if (!mobileRegisterBtn.contains(e.target) && !mobileRegisterDropdown.contains(e.target)) {
      mobileRegisterDropdown.classList.add("hidden");
    }
    if (!mobileLoginBtn.contains(e.target) && !mobileLoginDropdown.contains(e.target)) {
      mobileLoginDropdown.classList.add("hidden");
    }
  });
</script>
<script>
  const cartBtn = document.getElementById("cartBtn");
  const cartSidebar = document.getElementById("cartSidebar");
  const cartOverlay = document.getElementById("cartOverlay");
  const closeCart = document.getElementById("closeCart");

  // buka cart
  cartBtn.addEventListener("click", () => {
    cartSidebar.classList.remove("translate-x-full");
    cartOverlay.classList.remove("hidden");
  });

  // tutup cart
  closeCart.addEventListener("click", () => {
    cartSidebar.classList.add("translate-x-full");
    cartOverlay.classList.add("hidden");
  });

  // tutup cart saat klik overlay
  cartOverlay.addEventListener("click", () => {
    cartSidebar.classList.add("translate-x-full");
    cartOverlay.classList.add("hidden");
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
      });
    @endif
  });
</script>
</body>
</html>
