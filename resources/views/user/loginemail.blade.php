<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OlgaSehat regis email</title>
  <script src="https://cdn.tailwindcss.com"></script>
   <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
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
          class="bg-blue-800 text-white px-4 py-2 rounded-md hover:bg-blue-800 transition focus:outline-none">
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



  <main class="bg-white rounded-lg shadow-md max-w-4xl w-full grid grid-cols-1 md:grid-cols-2">
    <!-- Left image -->
    <div class="hidden md:block">
      <img 
        src="assets/sports-tools.jpg" 
        alt="Peralatan olahraga di atas rumput" 
        class="object-cover w-full h-full rounded-l-lg"
        onerror="this.onerror=null;this.src='https://placehold.co/400x600?text=Image+Unavailable';"
      />
    </div>

 <!-- Right content -->
<div class="p-10 flex flex-col justify-center max-w-md mx-auto">
  <!-- Judul -->
  <h1 class="text-4xl font-bold mb-4 text-gray-900">Time to Move!</h1>
  
  <!-- Subjudul -->
  <p class="text-gray-600 mb-8 leading-relaxed">
    Ribuan orang sudah memulai gaya hidup sehat.<br />
    Sekarang giliranmu bersama 
    <span class="font-bold text-blue-600">OlgaSehat</span> – olahraga jadi lebih seru!
  </p>

  <form action="{{ route('loginproses') }}" method="POST" class="space-y-4">
    @csrf
    <!-- Input Email -->
    <input
      type="email"
      name="email"
      placeholder="Email"
      class="w-full mb-4 border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
      required
    />

    <!-- Input Password -->
    <input
      type="password"
      name="password"
      placeholder="Password"
      class="w-full mb-2 border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
      required
    />

    <!-- Link Lupa Password -->
    <p class="text-right text-sm text-gray-500 mb-6">
      Lupa Password?
      <a href="/resetpassword" class="text-blue-600 hover:underline font-medium">Klik di sini</a>
    </p>

    <!-- Tombol Login -->
    <button
      type="submit"
      class="w-full mb-6 bg-indigo-900 hover:bg-indigo-800 text-white font-semibold py-3 rounded-lg shadow-md transition"
      aria-label="Login Dengan Email"
    >
      Login
    </button>
  </form>

  <!-- Footer -->
  <p class="text-xs text-gray-500 text-center leading-tight">
    Dengan melanjutkan, berarti kamu menyetujui
    <a href="#" class="text-indigo-900 font-semibold hover:underline">Privacy Policy</a> dan
    <a href="#" class="text-indigo-900 font-semibold hover:underline">Community Guidelines</a> OlgaSehat.id
  </p>
</div>



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

    // HOME JS //
    @if(session('success'))
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
      });
    @endif
  </script>
</body>
</html>
