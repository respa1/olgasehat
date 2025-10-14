<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Olga Sehat - Profile')</title>
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
<body class="bg-white text-gray-800 font-sans">
<!-- HEADER -->
<header id="mainHeader" class="fixed top-0 left-0 right-0 z-50 shadow-md bg-white transition-transform duration-300 ease-in-out">
  <div class="container mx-auto flex items-center justify-between py-4 px-6">

    <!-- Logo -->
    <a href="/homeuser" class="flex items-center space-x-2">
      <img src="{{ asset('assets/olgasehat-icon.png') }}" alt="Olga Sehat Logo" class="h-10 w-auto" />
    </a>

    <!-- Menu Desktop -->
    <nav class="hidden md:flex space-x-6 text-gray-700 font-medium">
      <a href="/venueuser" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="#" class="hover:text-blue-700">Tempat Sehat</a>
      <a href="/communityuser" class="hover:text-blue-700">Komunitas & Aktivitas</a>
      <a href="/bloguser_news" class="hover:text-blue-700">Blog & News</a>
    </nav>

    <!-- Aksi Desktop -->
    <div class="hidden md:flex items-center space-x-4 relative">
      <!-- Tombol Cart (Desktop) -->
      <button id="cartBtn" aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
      </button>

      <!-- Dropdown User -->
      <div class="relative">
        <button id="userMenuBtn" class="flex items-center space-x-2 focus:outline-none">
          <img src="{{ asset('assets/guru.png') }}" alt="User Avatar" class="w-8 h-8 rounded-full border" />
          <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
        </button>
        <!-- Dropdown menu -->
        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
          <a href="/editprofile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
          <a href="/riwayatpayment" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Riwayat Pemesanan</a>
          <a href="/riwayat-komunitas" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Komunitas</a>
          <a href="/riwayatmembership" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Membership</a>
          <a href="/settings" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pengaturan</a>
          
          <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="block border-t border-gray-200 mt-1">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 font-medium transition-colors">Logout</button>
          </form>
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

      <!-- Dropdown User Mobile -->
      <div class="relative">
        <button id="mobileUserBtn" class="flex items-center space-x-2 focus:outline-none">
          <img src="{{ asset('assets/guru.png') }}" alt="User Avatar" class="w-8 h-8 rounded-full border" />
          <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
        </button>
        <!-- Dropdown menu -->
        <div id="mobileUserMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
          <a href="/editprofile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
          <a href="/riwayatpayment" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Riwayat Pemesanan</a>
          <a href="/komunitas" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Komunitas</a>
          <a href="/klub" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Klub</a>
          <a href="/settings" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Pengaturan</a>
          
          <form id="mobile-logout-form" action="{{ route('user.logout') }}" method="POST" class="block border-t border-gray-200 mt-1">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 font-medium transition-colors">Logout</button>
          </form>
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
      <a href="/venueuser" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Sewa Lapangan</a>
      <a href="#" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Tempat Sehat</a>
      <a href="/communityuser" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Komunitas % Aktifitas</a>
      <a href="/bloguser_news" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Blog & News</a>

      <!-- User Links -->
      <div class="border-t pt-4">
        <a href="/logout" class="block w-full px-6 py-4 text-center bg-red-600 text-white font-semibold rounded-md hover:bg-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Logout</a>
      </div>
    </nav>
</header>
  <!-- Main Content -->
  <main class="pt-18 flex items-center justify-center min-h-screen p-6">
    <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-3 gap-10">

    <!-- Left Side: Profile Image and Username -->
    <section class="flex flex-col items-center space-y-4">
      <div class="w-32 h-32 rounded-full border-2 border-gray-400 flex justify-center items-center bg-gray-100 overflow-hidden">
        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="7" r="4" /><path d="M5.5 21a6.5 6.5 0 0113 0" /></svg>
      </div>
      <div class="text-center">
        <p class="font-semibold text-gray-800 select-text">{{ Auth::user()->name }}</p>
        <p class="text-gray-500 select-text">{{Auth::user()->email }}</p>
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

  <script src="{{ asset('assets/olgasehat.js') }}"></script>
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
      const userBtn = document.getElementById("userMenuBtn");
      const userMenu = document.getElementById("userMenu");

      userBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleDropdown(userMenu, null);
      });

      // Mobile User Dropdown
      const mobileUserBtn = document.getElementById("mobileUserBtn");
      const mobileUserMenu = document.getElementById("mobileUserMenu");

      mobileUserBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleDropdown(mobileUserMenu, userMenu);
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
        if (!userBtn?.contains(e.target) && !userMenu?.contains(e.target)) {
          userMenu?.classList.add("hidden", "opacity-0", "scale-95");
        }
        // Mobile User
        if (!mobileUserBtn?.contains(e.target) && !mobileUserMenu?.contains(e.target)) {
          mobileUserMenu?.classList.add("hidden", "opacity-0", "scale-95");
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


