<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Login User</title>
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
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-white text-gray-800 font-sans">
<!-- HEADER -->
<header id="mainHeader" class="fixed top-0 left-0 right-0 z-50 shadow-md bg-white transition-transform duration-300 ease-in-out">
  <div class="container mx-auto flex items-center justify-between py-4 px-6">
    
    <!-- Logo -->
    <a href="/" class="flex items-center space-x-2">
      <img src="{{ asset('assets/olgasehat-icon.png') }}" alt="Olga Sehat Logo" class="h-10 w-auto" />
    </a>

    <!-- Menu Desktop -->
    <nav class="hidden md:flex space-x-6 text-gray-700 font-medium">
      <a href="/venue" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="#" class="hover:text-blue-700">Tempat Sehat</a>
      <a href="/community" class="hover:text-blue-700">Komunitas & Aktivitas</a>
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
          class="hidden absolute right-0 mt-2 w-64 bg-white border rounded-md shadow-lg z-50
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
      <a href="/venue" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Sewa Lapangan</a>
      <a href="#" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Tempat Sehat</a>
      <a href="/community" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Komunitas & Aktivitas</a>
      <a href="/blog-news" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Blog & News</a>

      <!-- Masuk and Daftar Buttons -->
      <div class="border-t pt-4">
        <a href="/loginuser" class="block w-full px-6 py-4 text-center text-blue-700 font-semibold border border-blue-700 rounded-md hover:bg-blue-50 mb-2 menu-item opacity-0 translate-y-1 transition-all duration-200">Masuk</a>
        <a href="/daftaruser" class="block w-full px-6 py-4 text-center bg-blue-700 text-white font-semibold rounded-md hover:bg-blue-800 menu-item opacity-0 translate-y-1 transition-all duration-200">Daftar</a>
      </div>
    </nav>
</header>



  <main class="mt-30 flex items-center justify-center min-h-screen p-6 bg-gray-50">
  <div class="bg-white rounded-lg shadow-md max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 overflow-hidden">
    <!-- Left image -->
    <div class="w-full h-64 md:h-auto">
      <img
        src="assets/sports-tools.jpg"
        alt="Peralatan olahraga di atas rumput"
        class="object-cover w-full h-full rounded-t-lg md:rounded-none md:rounded-l-lg"
        onerror="this.onerror=null;this.src='https://placehold.co/400x600?text=Image+Unavailable';"
      />
    </div>

    <!-- Right content -->
    <div class="p-10 flex flex-col justify-center">
      <!-- Judul -->
      <h1 class="text-4xl font-bold mb-4">Time to Move!</h1>
      
      <!-- Subjudul -->
      <p class="text-gray-600 mb-8 leading-relaxed">
        Ribuan orang sudah memulai gaya hidup sehat.<br />
        Sekarang giliranmu bersama <span class="font-bold text-blue-600">OlgaSehat</span> – olahraga jadi lebih seru!
      </p>

      <!-- Tombol Masuk dengan Google -->
      <button 
        class="w-full mb-4 bg-indigo-900 hover:bg-indigo-800 text-white font-medium py-3 rounded-lg flex items-center justify-center space-x-2 shadow-sm"
        aria-label="Masuk Dengan Google"
      >
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" focusable="false" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M21.805 10.023h-9.784v3.954h5.611a4.786 4.786 0 01-2.068 3.141v2.594h3.34c1.953-1.8 3.077-4.442 3.077-7.69 0-.676-.065-1.324-.176-1.999z" fill="#4285F4"/>
          <path d="M12.021 21c2.646 0 4.867-.875 6.489-2.38l-3.34-2.593c-.925.62-2.11.99-3.15.99a5.202 5.202 0 01-4.898-3.6H4.527v2.264A9 9 0 0012.02 21z" fill="#34A853"/>
          <path d="M7.123 13.417a5.155 5.155 0 010-3.252V7.9H4.527a9 9 0 000 8.198l2.596-2.68z" fill="#FBBC05"/>
          <path d="M12.02 6.375c1.44 0 2.73.495 3.75 1.467l2.81-2.814A8.932 8.932 0 0012.02 3a9 9 0 00-7.493 4.9l2.596 2.68a5.202 5.202 0 014.898-3.204z" fill="#EA4335"/>
        </svg>
        <span>Masuk Dengan Google</span>
      </button>

      <a href="/loginemail" 
        class="w-full mb-6 border border-gray-300 hover:bg-gray-100 font-medium py-3 rounded-lg text-black text-center block">
        Login Dengan Email
      </a>

      <!-- Link Login -->
      <p class="text-center text-gray-500 mb-10">
        Belum punya akun? 
        <a href="/daftaruser" class="text-blue-500 hover:underline font-medium">Klik di sini</a>
      </p>

      <!-- Footer -->
      <p class="text-xs text-gray-500 text-center leading-tight">
        Dengan melanjutkan, berarti kamu menyetujui
        <a href="#" class="text-indigo-900 font-semibold hover:underline">Privacy Policy</a> dan
        <a href="#" class="text-indigo-900 font-semibold hover:underline">Community Guidelines</a> OlgaSehat.id
      </p>
    </div>
  </div>
</main>


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
    // Header Layout //
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

      // Mobile Menu Toggle with Animation
      const mobileMenuBtn = document.getElementById("mobileMenuBtn");
      const mobileMenu = document.getElementById("mobileMenu");
      mobileMenuBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        if (mobileMenu.classList.contains("hidden")) {
          // Open menu with stagger animation
          mobileMenu.classList.remove("hidden");
          const menuItems = mobileMenu.querySelectorAll(".menu-item");
          menuItems.forEach((item, index) => {
            item.style.opacity = "0";
            item.style.transform = "translateY(4px)";
            setTimeout(() => {
              item.style.transition = "all 0.2s ease-out";
              item.style.opacity = "1";
              item.style.transform = "translateY(0)";
            }, index * 50);
          });
        } else {
          // Close menu with fade out
          const menuItems = mobileMenu.querySelectorAll(".menu-item");
          menuItems.forEach((item) => {
            item.style.opacity = "0";
            item.style.transform = "translateY(-4px)";
          });
          setTimeout(() => {
            mobileMenu.classList.add("hidden");
            // Reset styles after close
            menuItems.forEach((item) => {
              item.style.transition = "";
              item.style.opacity = "";
              item.style.transform = "";
            });
          }, 200);
        }
      });

      // Close mobile menu on outside click
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

      // Header hide/show on scroll
      let lastScrollTop = 0;
      window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const header = document.getElementById('mainHeader');
        if (scrollTop > lastScrollTop && scrollTop > 100) {
          // Scroll down and past 100px
          header.style.transform = 'translateY(-100%)';
        } else {
          // Scroll up
          header.style.transform = 'translateY(0)';
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
      });
    });
  </script>
