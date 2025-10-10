<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Olga Sehat - Platform Gaya Hidup Sehat')</title>
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
      <!-- Tombol Cart (Desktop) -->
      <button id="cartBtn" aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
      </button>

      <!-- Register Dropdown -->
      <div class="relative">
        <button id="registerBtn" class="text-gray-700 hover:text-blue-700 focus:outline-none">Daftar</button>
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
          Masuk
        </button>
        <div id="loginDropdown"
          class="hidden absolute right-0 mt-2 w-56 bg-white border rounded-md shadow-lg z-50
                 transform scale-95 opacity-0 transition-all duration-200 ease-out">
          <a href="/loginuser" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Masuk User</a>
          <a href="/loginpengelolavenue" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Masuk Pengelola Venue</a>
        </div>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="flex md:hidden items-center space-x-4 ml-auto">
      <!-- Tombol Cart (Mobile) -->
      <button id="cartBtnMobile" aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
      </button>

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
          Daftar
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
          Masuk
          <i class="fas fa-chevron-down ml-2"></i>
        </button>
        <div id="mobileLoginDropdown" class="hidden flex-col bg-white shadow-md rounded-b-md">
          <a href="/loginuser" class="block px-6 py-3 border-t text-gray-700 hover:bg-gray-100">Masuk User</a>
          <a href="/loginpengelolavenue" class="block px-6 py-3 border-t text-gray-700 hover:bg-gray-100">Masuk Pengelola Venue</a>
        </div>
      </div>
    </nav>
</header>

  <main class="pt-20">
    @yield('content')
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

  <!-- Overlay for Cart -->
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

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Dropdown helper - updated to ensure only one dropdown shows at a time
      function toggleDropdown(dropdownToToggle, dropdownToClose) {
        // Close the other dropdown if open
        if (dropdownToClose && !dropdownToClose.classList.contains("hidden")) {
          dropdownToClose.classList.remove("opacity-100", "scale-100");
          dropdownToClose.classList.add("opacity-0", "scale-95");
          setTimeout(() => dropdownToClose.classList.add("hidden"), 200);
        }

        // Toggle the target dropdown
        if (dropdownToToggle.classList.contains("hidden")) {
          dropdownToToggle.classList.remove("hidden");
          setTimeout(() => {
            dropdownToToggle.classList.remove("opacity-0", "scale-95");
            dropdownToToggle.classList.add("opacity-100", "scale-100");
          }, 10);
        } else {
          dropdownToToggle.classList.remove("opacity-100", "scale-100");
          dropdownToToggle.classList.add("opacity-0", "scale-95");
          setTimeout(() => dropdownToToggle.classList.add("hidden"), 200);
        }
      }

      // Desktop Dropdowns
      const registerBtn = document.getElementById("registerBtn");
      const registerDropdown = document.getElementById("registerDropdown");
      const loginBtn = document.getElementById("loginBtn");
      const loginDropdown = document.getElementById("loginDropdown");

      registerBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleDropdown(registerDropdown, loginDropdown);
      });

      loginBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleDropdown(loginDropdown, registerDropdown);
      });

      // Mobile Dropdowns
      const mobileRegisterBtn = document.getElementById("mobileRegisterBtn");
      const mobileRegisterDropdown = document.getElementById("mobileRegisterDropdown");
      const mobileLoginBtn = document.getElementById("mobileLoginBtn");
      const mobileLoginDropdown = document.getElementById("mobileLoginDropdown");

      mobileRegisterBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        mobileRegisterDropdown.classList.toggle("hidden");
        if (!mobileLoginDropdown.classList.contains("hidden")) {
          mobileLoginDropdown.classList.add("hidden");
        }
      });

      mobileLoginBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        mobileLoginDropdown.classList.toggle("hidden");
        if (!mobileRegisterDropdown.classList.contains("hidden")) {
          mobileRegisterDropdown.classList.add("hidden");
        }
      });

      // Mobile Menu Toggle
      const mobileMenuBtn = document.getElementById("mobileMenuBtn");
      const mobileMenu = document.getElementById("mobileMenu");
      mobileMenuBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        mobileMenu.classList.toggle("hidden");
      });

      // Close mobile menu and dropdowns on outside click
      window.addEventListener("click", (e) => {
        // Desktop
        if (!registerBtn?.contains(e.target) && !registerDropdown?.contains(e.target)) {
          registerDropdown?.classList.add("hidden", "opacity-0", "scale-95");
        }
        if (!loginBtn?.contains(e.target) && !loginDropdown?.contains(e.target)) {
          loginDropdown?.classList.add("hidden", "opacity-0", "scale-95");
        }
        // Mobile
        if (!mobileMenu.contains(e.target) && !mobileMenuBtn?.contains(e.target)) {
          mobileMenu.classList.add("hidden");
        }
        if (!mobileRegisterBtn?.contains(e.target) && !mobileRegisterDropdown?.contains(e.target)) {
          mobileRegisterDropdown.classList.add("hidden");
        }
        if (!mobileLoginBtn?.contains(e.target) && !mobileLoginDropdown?.contains(e.target)) {
          mobileLoginDropdown.classList.add("hidden");
        }
      });

      // Cart Functionality
      const cartBtns = document.querySelectorAll('#cartBtn, #cartBtnMobile');
      const cartSidebar = document.getElementById("cartSidebar");
      const cartOverlay = document.getElementById("cartOverlay");
      const closeCart = document.getElementById("closeCart");

      cartBtns.forEach(btn => {
        btn?.addEventListener("click", () => {
          cartSidebar.classList.remove("translate-x-full");
          cartOverlay.classList.remove("hidden");
        });
      });

      closeCart?.addEventListener("click", () => {
        cartSidebar.classList.add("translate-x-full");
        cartOverlay.classList.add("hidden");
      });

      cartOverlay?.addEventListener("click", () => {
        cartSidebar.classList.add("translate-x-full");
        cartOverlay.classList.add("hidden");
      });
    });
  </script>
</body>
</html>
