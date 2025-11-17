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
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <style>
    /* Owner Avatar Styles - seperti di pemilik lapangan */
    .owner-topbar .owner-avatar-sm,
    .owner-topbar .owner-avatar-lg {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f1f5ff;
      color: #1c2a56;
      font-weight: 700;
      border-radius: 50%;
      overflow: hidden;
    }
    .owner-topbar .owner-avatar-sm {
      width: 36px;
      height: 36px;
      font-size: 0.9rem;
    }
    .owner-topbar .owner-avatar-lg {
      width: 64px;
      height: 64px;
      font-size: 1.25rem;
    }
    .owner-topbar .owner-avatar-sm img,
    .owner-topbar .owner-avatar-lg img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .owner-avatar-toggle {
      color: #1c2a56;
      font-weight: 600;
      display: flex;
      align-items: center;
    }
    .owner-avatar-toggle i {
      font-size: 0.7rem;
      margin-left: 0.5rem;
    }
    .owner-dropdown {
      width: 240px;
      border-radius: 18px;
      padding: 20px 20px 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .owner-profile-card h6 {
      font-weight: 700;
      color: #1c2a56;
    }
    .badge-role {
      background: rgba(40, 200, 120, 0.15);
      color: #1f9d67;
      border-radius: 999px;
      font-weight: 600;
      font-size: 0.75rem;
      padding: 0.25rem 0.75rem;
    }
    .owner-dropdown .dropdown-item {
      border-radius: 12px;
      padding: 0.55rem 0.75rem;
      font-weight: 600;
      color: #1c2a56;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .owner-dropdown .dropdown-item:hover {
      background: #f1f5ff;
      color: #1c2a56;
    }
    .owner-dropdown .dropdown-item i {
      color: #9ca3af;
      font-size: 0.875rem;
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
      <a href="/venueuser" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200" data-translate>Fasilitas Olahraga</a>
      <a href="/healthyuser" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200" data-translate>Layanan Kesehatan</a>
      <a href="/communityuser" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200" data-translate>Komunitas & Aktivitas</a>
      <a href="/bloguser_news" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200" data-translate>Info Sehat</a>
    </nav>

    <!-- Aksi Desktop -->
    <div class="hidden md:flex items-center space-x-4 relative">
      <!-- Language Selector -->
      <div class="relative">
        <button id="languageBtnUser" class="text-gray-700 hover:text-blue-700 focus:outline-none flex items-center space-x-2">
          <i class="fas fa-globe fa-lg"></i>
          <span id="currentLanguageUser">ID</span>
          <i class="fas fa-chevron-down text-sm"></i>
        </button>
        <div id="languageDropdownUser" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50 max-h-60 overflow-y-auto">
          <!-- Daftar bahasa akan diisi oleh JavaScript -->
        </div>
      </div>

      <!-- Dropdown User -->
      <div class="relative owner-topbar">
        <button id="userMenuBtn" class="owner-avatar-toggle focus:outline-none" data-toggle="dropdown">
          <div class="owner-avatar-sm mr-2">
            @if(Auth::user()->image ?? false)
              <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
            @else
              <span>{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
            @endif
          </div>
          <span class="owner-name hidden md:inline">{{ Auth::user()->name ?? 'User' }}</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <!-- Dropdown menu -->
        <div id="userMenu" class="hidden absolute right-0 mt-2 owner-dropdown bg-white shadow-lg border-0 z-50">
          <div class="owner-profile-card text-center mb-3">
            <div class="owner-avatar-lg mx-auto mb-2">
              @if(Auth::user()->image ?? false)
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
              @else
                <span>{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
              @endif
            </div>
            <h6 class="mb-0">{{ Auth::user()->name ?? 'User' }}</h6>
            <span class="badge badge-role mt-1">User</span>
          </div>
          <a href="/dashboarduser" class="dropdown-item">
            <span data-translate>Profil</span>
            <i class="fas fa-user"></i>
          </a>
          <a href="/riwayatpayment" class="dropdown-item">
            <span data-translate>Riwayat Pemesanan</span>
            <i class="fas fa-history"></i>
          </a>
          <a href="/riwayatkontrol" class="dropdown-item">
            <span data-translate>Riwayat Kontrol</span>
            <i class="fas fa-clipboard-list"></i>
          </a>
          <a href="/riwayat-komunitas" class="dropdown-item">
            <span data-translate>Komunitas</span>
            <i class="fas fa-users"></i>
          </a>
          <a href="/riwayatmembership" class="dropdown-item">
            <span data-translate>Membership</span>
            <i class="fas fa-crown"></i>
          </a>
          <a href="/settings" class="dropdown-item">
            <span data-translate>Pengaturan</span>
            <i class="fas fa-cog"></i>
          </a>
          <div class="dropdown-divider my-2" style="border-top: 1px solid #e5e7eb;"></div>
          <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item w-full text-left text-red-600 hover:bg-red-50" style="border: none; background: none; cursor: pointer;">
              <span data-translate>Logout</span>
              <i class="fas fa-sign-out-alt"></i>
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Header Mobile & Tablet -->
    <div class="flex lg:hidden items-center space-x-2 sm:space-x-3 md:space-x-4 ml-auto">
      <!-- Language Selector Mobile -->
      <div class="relative">
        <button id="languageBtnUserMobile" class="text-gray-700 hover:text-blue-700 focus:outline-none flex items-center space-x-1 sm:space-x-2">
          <i class="fas fa-globe text-base sm:text-lg"></i>
          <span id="currentLanguageUserMobile" class="text-xs sm:text-sm font-medium">ID</span>
          <i class="fas fa-chevron-down text-xs"></i>
        </button>
        <div id="languageDropdownUserMobile" class="hidden absolute right-0 mt-2 w-40 sm:w-48 bg-white border rounded-md shadow-lg z-50 max-h-60 overflow-y-auto">
          <!-- Daftar bahasa akan diisi oleh JavaScript -->
        </div>
      </div>

      <!-- Dropdown User Mobile -->
      <div class="relative owner-topbar">
        <button id="mobileUserBtn" class="owner-avatar-toggle focus:outline-none">
          <div class="owner-avatar-sm mr-1 sm:mr-2" style="width: 28px; height: 28px; font-size: 0.75rem;">
            @if(Auth::user()->image ?? false)
              <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
            @else
              <span>{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
            @endif
          </div>
          <i class="fas fa-chevron-down text-xs sm:text-sm"></i>
        </button>
        <!-- Dropdown menu -->
        <div id="mobileUserMenu" class="hidden absolute right-0 mt-2 owner-dropdown bg-white shadow-lg border-0 z-50" style="width: 200px; padding: 16px 16px 8px;">
          <div class="owner-profile-card text-center mb-3">
            <div class="owner-avatar-lg mx-auto mb-2" style="width: 56px; height: 56px; font-size: 1.1rem;">
              @if(Auth::user()->image ?? false)
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
              @else
                <span>{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
              @endif
            </div>
            <h6 class="mb-0" style="font-size: 0.875rem;">{{ Auth::user()->name ?? 'User' }}</h6>
            <span class="badge badge-role mt-1">User</span>
          </div>
          <a href="/dashboarduser" class="dropdown-item" style="font-size: 0.875rem;">
            <span data-translate>Profil</span>
            <i class="fas fa-user"></i>
          </a>
          <a href="/riwayatpayment" class="dropdown-item" style="font-size: 0.875rem;">
            <span data-translate>Riwayat Pemesanan</span>
            <i class="fas fa-history"></i>
          </a>
          <a href="/riwayatkontrol" class="dropdown-item" style="font-size: 0.875rem;">
            <span data-translate>Riwayat Kontrol</span>
            <i class="fas fa-clipboard-list"></i>
          </a>
          <a href="/riwayat-komunitas" class="dropdown-item" style="font-size: 0.875rem;">
            <span data-translate>Komunitas</span>
            <i class="fas fa-users"></i>
          </a>
          <a href="/riwayatmembership" class="dropdown-item" style="font-size: 0.875rem;">
            <span data-translate>Membership</span>
            <i class="fas fa-crown"></i>
          </a>
          <a href="/settings" class="dropdown-item" style="font-size: 0.875rem;">
            <span data-translate>Pengaturan</span>
            <i class="fas fa-cog"></i>
          </a>
          <div class="dropdown-divider my-2" style="border-top: 1px solid #e5e7eb;"></div>
          <form id="mobile-logout-form" action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item w-full text-left text-red-600 hover:bg-red-50" style="border: none; background: none; cursor: pointer; font-size: 0.875rem;">
              <span data-translate>Logout</span>
              <i class="fas fa-sign-out-alt"></i>
            </button>
          </form>
        </div>
      </div>

      <!-- Tombol Hamburger -->
      <button id="mobileMenuBtn"
              class="text-gray-700 hover:text-blue-700 focus:outline-none p-1 sm:p-2"
              aria-label="Open menu">
        <i class="fas fa-bars text-lg sm:text-xl"></i>
      </button>
    </div>

    <!-- Menu Navigasi Mobile -->
    <nav id="mobileMenu"
         class="hidden flex-col lg:hidden bg-white border-t border-gray-200 shadow-md
                transition-all duration-300 ease-in-out absolute top-full left-0 w-full z-[50] max-h-[calc(100vh-4rem)] overflow-y-auto">

      <!-- Link Navigasi -->
      <a href="/venueuser" class="block px-4 sm:px-6 py-3 sm:py-4 border-b text-center font-medium text-sm sm:text-base text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Fasilitas Olahraga</a>
      <a href="/healthyuser" class="block px-4 sm:px-6 py-3 sm:py-4 border-b text-center font-medium text-sm sm:text-base text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Layanan Kesehatan</a>
      <a href="/communityuser" class="block px-4 sm:px-6 py-3 sm:py-4 border-b text-center font-medium text-sm sm:text-base text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Komunitas & Aktivitas</a>
      <a href="/bloguser_news" class="block px-4 sm:px-6 py-3 sm:py-4 border-b text-center font-medium text-sm sm:text-base text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Info Sehat</a>

      <!-- User Links -->
      <div class="border-t pt-3 sm:pt-4 px-4 sm:px-6 pb-4">
        <a href="/logout" class="block w-full px-4 sm:px-6 py-3 sm:py-4 text-center text-sm sm:text-base bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Logout</a>
      </div>
    </nav>
</header>

  <main class="pt-2 sm:pt-3 md:pt-4">
    @yield('content')
  </main>

  <footer class="bg-white text-gray-700 py-16">
  <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
    <div>
      {{-- Ganti teks H3 ini dengan gambar logo --}}
      <img src="{{ asset('assets/olgasehat-icon.png') }}" alt="Olga Sehat Logo" class="h-10 w-auto mb-4" /> 
      
      <p class="text-base text-gray-600 max-w-xs">
        Making sports easy to book, fun to play, and safe for everyone.
      </p>
    </div>
    <div>
      <h3 class="font-semibold text-lg mb-4 text-gray-800" data-translate>Perusahaan</h3>
      <ul class="space-y-3 text-base">
        <li><a href="tentang_user" class="hover:text-blue-700" data-translate>Tentang</a></li>
        <li><a href="#" class="hover:text-blue-700" data-translate>Kebijakan &amp; Privasi</a></li>
        <li><a href="#" class="hover:text-blue-700" data-translate>Syarat &amp; Ketentuan</a></li>
      </ul>
    </div>
    <div>
      <h3 class="font-semibold text-lg mb-4 text-gray-800" data-translate>Ekosistem</h3>
      <ul class="space-y-3 text-base">
        <li><a href="/venueuser" class="hover:text-blue-700" data-translate>Fasilitas Olahraga</a></li>
        <li><a href="/healthyuser" class="hover:text-blue-700" data-translate>Layanan Kesehatan</a></li>
        <li><a href="/communityuser" class="hover:text-blue-700" data-translate>Komunitas & Aktivitas</a></li>
        <li><a href="/bloguser_news" class="hover:text-blue-700" data-translate>Info Sehat</a></li>
      </ul>
    </div>
    <div>
      <h3 class="font-semibold text-lg mb-4 text-gray-800" data-translate>Support</h3>
      <ul class="space-y-3 text-base">
        <li><a href="#" class="hover:text-blue-700" data-translate>FAQs</a></li>
        <li><a href="#" class="hover:text-blue-700" data-translate>Support Center</a></li>
        <li><a href="#" class="hover:text-blue-700" data-translate>Contact Us</a></li>
      </ul>
      <div class="flex space-x-4 mt-6">
        <a
          href="#"
          class="w-10 h-10 flex items-center justify-center bg-blue-700 text-white rounded-full hover:bg-blue-800 transition text-lg"
          ><i class="fab fa-facebook-f"></i
        ></a>
        <a
          href="#"
          class="w-10 h-10 flex items-center justify-center bg-blue-700 text-white rounded-full hover:bg-blue-800 transition text-lg"
          ><i class="fab fa-youtube"></i
        ></a>
        <a
          href="#"
          class="w-10 h-10 flex items-center justify-center bg-blue-700 text-white rounded-full hover:bg-blue-800 transition text-lg"
          ><i class="fab fa-instagram"></i
        ></a>
      </div>
    </div>
  </div>
  <div class="container mx-auto px-6 text-center mt-10 pt-6 border-t border-gray-300 text-base text-gray-500">
    &copy; 2024 Olga Sehat. All rights reserved.
  </div>
</footer>

  <!-- Overlay for Cart -->
  <div id="cartOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

  <!-- Cart Sidebar -->
  <div id="cartSidebar" 
       class="fixed top-0 right-0 w-80 max-w-full h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50 flex flex-col">
    <!-- Header -->
    <div class="flex justify-between items-center px-4 py-3 border-b flex-shrink-0">
      <h2 class="font-semibold text-lg">JADWAL DIPILIH</h2>
      <button id="closeCart" class="text-gray-500 hover:text-gray-700">
        <i class="fas fa-times"></i>
      </button>
    </div>

    <!-- Isi Cart -->
    <div class="cart-content flex-grow overflow-y-auto p-4 space-y-4">
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

      // Language Dropdown Functionality
      const languageBtnUser = document.getElementById("languageBtnUser");
      const languageDropdownUser = document.getElementById("languageDropdownUser");
      const currentLanguageUser = document.getElementById("currentLanguageUser");
      const languageBtnUserMobile = document.getElementById("languageBtnUserMobile");
      const languageDropdownUserMobile = document.getElementById("languageDropdownUserMobile");
      const currentLanguageUserMobile = document.getElementById("currentLanguageUserMobile");

      // Language list dengan bahasa Bali, Jawa, dan internasional
      const languages = [
        {code: 'id', name: 'Bahasa Indonesia', flag: '🇮🇩'},
        {code: 'ban', name: 'Basa Bali', flag: '🏝️'},
        {code: 'jw', name: 'Basa Jawa', flag: '☕'}, // Google Translate pakai 'jw' bukan 'jv'
        {code: 'en', name: 'English', flag: '🇬🇧'},
        {code: 'es', name: 'Español', flag: '🇪🇸'},
        {code: 'fr', name: 'Français', flag: '🇫🇷'},
        {code: 'de', name: 'Deutsch', flag: '🇩🇪'},
        {code: 'it', name: 'Italiano', flag: '🇮🇹'},
        {code: 'pt', name: 'Português', flag: '🇵🇹'},
        {code: 'ru', name: 'Русский', flag: '🇷🇺'},
        {code: 'ja', name: '日本語', flag: '🇯🇵'},
        {code: 'ko', name: '한국어', flag: '🇰🇷'},
        {code: 'zh', name: '中文', flag: '🇨🇳'},
        {code: 'ar', name: 'العربية', flag: '🇸🇦'},
        {code: 'hi', name: 'हिन्दी', flag: '🇮🇳'},
        {code: 'th', name: 'ไทย', flag: '🇹🇭'},
        {code: 'vi', name: 'Tiếng Việt', flag: '🇻🇳'},
        {code: 'nl', name: 'Nederlands', flag: '🇳🇱'},
        {code: 'pl', name: 'Polski', flag: '🇵🇱'},
        {code: 'tr', name: 'Türkçe', flag: '🇹🇷'}
      ];

      // Observer untuk auto-translate saat navigasi
      let pageObserverUser = null;
      let isTranslatingUser = false;
      
      function setupAutoTranslateObserverUser(langCode) {
        if (langCode === 'id') {
          if (pageObserverUser) {
            pageObserverUser.disconnect();
            pageObserverUser = null;
          }
          return;
        }
        
        if (pageObserverUser) {
          pageObserverUser.disconnect();
        }
        
        pageObserverUser = new MutationObserver((mutations) => {
          let hasNewText = false;
          mutations.forEach((mutation) => {
            if (mutation.addedNodes.length > 0) {
              mutation.addedNodes.forEach((node) => {
                if (node.nodeType === Node.ELEMENT_NODE && 
                    !node.hasAttribute('data-translated') &&
                    node.textContent && 
                    node.textContent.trim().length > 2) {
                  hasNewText = true;
                }
              });
            }
          });
          
          if (hasNewText) {
            clearTimeout(window.translateTimeoutUser);
            window.translateTimeoutUser = setTimeout(() => {
              translatePageUser(langCode, true);
            }, 1000);
          }
        });
        
        pageObserverUser.observe(document.body, {
          childList: true,
          subtree: true,
          characterData: true
        });
      }

      function fetchLanguagesUser() {
        populateLanguageDropdownUser(languages);
        populateLanguageDropdownUserMobile(languages);
        
        // Load saved language from localStorage dan auto-translate
        const savedLang = localStorage.getItem('selectedLanguage') || 'id';
        const savedLangObj = languages.find(l => l.code === savedLang);
        if (savedLangObj) {
          currentLanguageUser.textContent = savedLangObj.code.toUpperCase();
          currentLanguageUserMobile.textContent = savedLangObj.code.toUpperCase();
          
          // Auto-translate saat page load jika bukan bahasa Indonesia
          if (savedLang !== 'id') {
            // Setup observer untuk auto-translate saat navigasi
            setupAutoTranslateObserverUser(savedLang);
            
            // Translate segera setelah DOM ready
            if (document.readyState === 'complete' || document.readyState === 'interactive') {
              translatePageUser(savedLang);
            } else {
              document.addEventListener('DOMContentLoaded', () => {
                translatePageUser(savedLang);
              });
            }
          }
        }
        
        // Listen untuk navigation events
        window.addEventListener('popstate', () => {
          const lang = localStorage.getItem('selectedLanguage') || 'id';
          if (lang !== 'id') {
            setTimeout(() => translatePageUser(lang, true), 300);
          }
        });
        
        // Intercept link clicks untuk auto-translate setelah navigation
        document.addEventListener('click', (e) => {
          const link = e.target.closest('a[href]');
          if (link && link.href && !link.href.startsWith('javascript:') && !link.href.startsWith('#')) {
            const lang = localStorage.getItem('selectedLanguage') || 'id';
            if (lang !== 'id') {
              setTimeout(() => {
                if (document.readyState === 'complete') {
                  translatePageUser(lang, true);
                } else {
                  window.addEventListener('load', () => {
                    translatePageUser(lang, true);
                  }, { once: true });
                }
              }, 500);
            }
          }
        });
      }

      function populateLanguageDropdownUser(languages) {
        languageDropdownUser.innerHTML = '';
        languages.forEach(lang => {
          const li = document.createElement('li');
          li.className = 'px-3 xl:px-4 py-2 text-sm xl:text-base hover:bg-gray-100 cursor-pointer flex items-center space-x-2';
          li.innerHTML = `<span>${lang.flag || '🌐'}</span><span>${lang.name} (${lang.code.toUpperCase()})</span>`;
          li.addEventListener('click', () => {
            currentLanguageUser.textContent = lang.code.toUpperCase();
            languageDropdownUser.classList.add('hidden');
            changeLanguageUser(lang.code);
          });
          languageDropdownUser.appendChild(li);
        });
      }

      function populateLanguageDropdownUserMobile(languages) {
        languageDropdownUserMobile.innerHTML = '';
        languages.forEach(lang => {
          const li = document.createElement('li');
          li.className = 'px-3 sm:px-4 py-2 text-sm sm:text-base hover:bg-gray-100 cursor-pointer flex items-center space-x-2';
          li.innerHTML = `<span>${lang.flag || '🌐'}</span><span>${lang.name} (${lang.code.toUpperCase()})</span>`;
          li.addEventListener('click', () => {
            currentLanguageUserMobile.textContent = lang.code.toUpperCase();
            languageDropdownUserMobile.classList.add('hidden');
            changeLanguageUser(lang.code);
          });
          languageDropdownUserMobile.appendChild(li);
        });
      }

      // Translation cache untuk menghindari translate ulang
      const translationCache = new Map();
      
      // Mapping bahasa untuk Google Translate (beberapa code berbeda)
      const langCodeMap = {
        'ban': 'ban', // Bali
        'jw': 'jw',   // Jawa - Google Translate pakai 'jw'
        'jv': 'jw',   // Fallback untuk 'jv' ke 'jw'
        'id': 'id',
        'en': 'en',
        'es': 'es',
        'fr': 'fr',
        'de': 'de',
        'it': 'it',
        'pt': 'pt',
        'ru': 'ru',
        'ja': 'ja',
        'ko': 'ko',
        'zh': 'zh',
        'ar': 'ar',
        'hi': 'hi',
        'th': 'th',
        'vi': 'vi',
        'nl': 'nl',
        'pl': 'pl',
        'tr': 'tr'
      };

      // Translate text menggunakan multiple API dengan cache
      async function translateText(text, targetLang) {
        if (targetLang === 'id') return text;
        if (!text || text.trim().length === 0) return text;
        
        // Cek cache dulu
        const cacheKey = `${text}|${targetLang}`;
        if (translationCache.has(cacheKey)) {
          return translationCache.get(cacheKey);
        }

        // Skip jika hanya angka, symbol, atau terlalu pendek
        if (/^[\d\s\W]+$/.test(text) || text.trim().length < 2) {
          return text;
        }

        // Map language code untuk Google Translate
        const googleLangCode = langCodeMap[targetLang] || targetLang;

        try {
          const response = await fetch(`https://translate.googleapis.com/translate_a/single?client=gtx&sl=id&tl=${googleLangCode}&dt=t&q=${encodeURIComponent(text)}`);
          const data = await response.json();
          if (data && data[0] && data[0][0] && data[0][0][0]) {
            const translated = data[0][0][0];
            translationCache.set(cacheKey, translated);
            return translated;
          }
        } catch (error) {
          console.log('Google Translate failed, trying MyMemory API');
        }
        try {
          const response = await fetch(`https://api.mymemory.translated.net/get?q=${encodeURIComponent(text)}&langpair=id|${targetLang}`);
          const data = await response.json();
          if (data.responseData && data.responseData.translatedText) {
            const translated = data.responseData.translatedText;
            translationCache.set(cacheKey, translated);
            return translated;
          }
        } catch (error) {
          console.error('Translation API error:', error);
        }
        
        // Untuk bahasa Bali dan Jawa
        if (targetLang === 'ban' || targetLang === 'jw' || targetLang === 'jv') {
          console.warn(`Translation untuk ${targetLang} tidak tersedia untuk: "${text}"`);
          return text;
        }
        
        return text;
      }

      // Parallel translate untuk lebih cepat (5 requests sekaligus)
      async function translateBatch(texts, targetLang) {
        const promises = texts.map(text => translateText(text, targetLang));
        return Promise.all(promises);
      }

      // Batch translate multiple texts sekaligus dengan parallel processing (LEBIH CEPAT)
      async function batchTranslateTexts(texts, targetLang) {
        const uniqueTexts = [...new Set(texts.filter(t => t && t.trim().length >= 2))];
        const translatedMap = new Map();
        
        // Translate dalam batch parallel (5 teks sekaligus untuk lebih cepat)
        const batchSize = 5;
        for (let i = 0; i < uniqueTexts.length; i += batchSize) {
          const batch = uniqueTexts.slice(i, i + batchSize);
          const translatedBatch = await translateBatch(batch, targetLang);
          
          batch.forEach((text, index) => {
            translatedMap.set(text, translatedBatch[index]);
          });
          
          // Delay minimal hanya di akhir setiap batch
          if (i + batchSize < uniqueTexts.length) {
            await new Promise(resolve => setTimeout(resolve, 10)); // Delay minimal
          }
        }
        
        return translatedMap;
      }

      // Get all text nodes di halaman (otomatis, tanpa perlu data-translate)
      function getAllTextNodes(element = document.body) {
        const textNodes = [];
        const walker = document.createTreeWalker(
          element,
          NodeFilter.SHOW_TEXT,
          {
            acceptNode: function(node) {
              const parent = node.parentElement;
              if (!parent) return NodeFilter.FILTER_REJECT;
              
              const tagName = parent.tagName.toLowerCase();
              if (['script', 'style', 'noscript', 'meta', 'link'].includes(tagName)) {
                return NodeFilter.FILTER_REJECT;
              }
              
              const style = window.getComputedStyle(parent);
              if (style.display === 'none' || style.visibility === 'hidden') {
                return NodeFilter.FILTER_REJECT;
              }
              
              if (parent.classList.contains('no-translate') || parent.hasAttribute('data-no-translate')) {
                return NodeFilter.FILTER_REJECT;
              }
              
              const text = node.textContent.trim();
              if (!text || text.length < 2 || /^[\d\s\W]+$/.test(text)) {
                return NodeFilter.FILTER_REJECT;
              }
              
              if (/^[\d.]+$/.test(text) || /^(https?|www\.)/i.test(text)) {
                return NodeFilter.FILTER_REJECT;
              }
              
              return NodeFilter.FILTER_ACCEPT;
            }
          }
        );
        
        let node;
        while (node = walker.nextNode()) {
          const text = node.textContent.trim();
          if (text && text.length >= 2) {
            textNodes.push({
              node: node,
              text: text,
              original: text
            });
          }
        }
        
        return textNodes;
      }

      async function changeLanguageUser(langCode) {
        localStorage.setItem('selectedLanguage', langCode);
        const langObj = languages.find(l => l.code === langCode);
        if (langObj) {
          currentLanguageUser.textContent = langObj.code.toUpperCase();
          currentLanguageUserMobile.textContent = langObj.code.toUpperCase();
        }
        if (langCode === 'id') {
          document.querySelectorAll('[data-translated]').forEach(el => {
            el.removeAttribute('data-translated');
            el.removeAttribute('data-original-text');
          });
          if (pageObserverUser) {
            pageObserverUser.disconnect();
            pageObserverUser = null;
          }
          location.reload();
          return;
        }
        
        // Setup observer untuk bahasa baru
        setupAutoTranslateObserverUser(langCode);
        Swal.fire({
          title: 'Mengubah Bahasa...',
          text: 'Mohon tunggu sebentar',
          allowOutsideClick: false,
          showConfirmButton: false,
          willOpen: () => { Swal.showLoading(); }
        });
        try {
          // Get all text nodes automatically
          const textNodes = getAllTextNodes();
          if (textNodes.length === 0) {
            Swal.close();
            return;
          }

          textNodes.forEach(item => {
            if (!item.node.parentElement.hasAttribute('data-translated')) {
              item.node.parentElement.setAttribute('data-original-text', item.text);
              item.node.parentElement.setAttribute('data-translated', 'true');
            }
          });

          const uniqueTexts = [...new Set(textNodes.map(item => item.text))];
          let translatedCount = 0;
          const totalTexts = uniqueTexts.length;
          
          const updateProgress = () => {
            const progress = Math.round((translatedCount / totalTexts) * 100);
            Swal.update({ text: `Menerjemahkan ${translatedCount}/${totalTexts} teks... ${progress}%` });
          };

          // Batch translate dengan parallel processing (lebih cepat)
          const uniqueTextsList = uniqueTexts.filter(t => t && t.trim().length >= 2);
          const translatedMap = await batchTranslateTexts(uniqueTextsList, langCode);
          
          // Update progress setelah selesai
          translatedCount = uniqueTextsList.length;
          updateProgress();

          textNodes.forEach(item => {
            const translated = translatedMap.get(item.text);
            if (translated && translated !== item.text) {
              item.node.textContent = item.node.textContent.replace(item.text, translated);
            }
          });

          Swal.close();
          Swal.fire({
            icon: 'success',
            title: 'Bahasa Berhasil Diubah',
            text: `Semua halaman telah diterjemahkan ke ${langObj ? langObj.name : langCode.toUpperCase()}`,
            confirmButtonText: 'OK',
            timer: 2000,
            timerProgressBar: true
          });
        } catch (error) {
          console.error('Language change error:', error);
          Swal.close();
          Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: 'Gagal mengubah bahasa. Silakan coba lagi.',
            confirmButtonText: 'OK'
          });
        }
      }

      async function translatePageUser(langCode, force = false) {
        if (langCode === 'id') {
          document.querySelectorAll('[data-translated]').forEach(el => {
            const original = el.getAttribute('data-original-text');
            if (original) {
              const textNode = Array.from(el.childNodes).find(n => n.nodeType === Node.TEXT_NODE);
              if (textNode) {
                textNode.textContent = original;
              }
              el.removeAttribute('data-translated');
              el.removeAttribute('data-original-text');
            }
          });
          return;
        }
        
        if (isTranslatingUser && !force) {
          console.log('Translation already in progress, skipping...');
          return;
        }
        isTranslatingUser = true;
        
        try {
          if (document.readyState === 'loading') {
            await new Promise(resolve => {
              if (document.readyState === 'complete') {
                resolve();
              } else {
                document.addEventListener('DOMContentLoaded', resolve);
              }
            });
          }
          
          await new Promise(resolve => setTimeout(resolve, 500));
          
          if (force) {
            document.querySelectorAll('[data-translated]').forEach(el => {
              el.removeAttribute('data-translated');
            });
          }
          
          const textNodes = getAllTextNodes();
          if (textNodes.length === 0) {
            isTranslatingUser = false;
            return;
          }

          const nodesToTranslate = textNodes.filter(item => {
            return !item.node.parentElement.hasAttribute('data-translated');
          });

          if (nodesToTranslate.length === 0) {
            isTranslatingUser = false;
            return;
          }

          nodesToTranslate.forEach(item => {
            if (!item.node.parentElement.hasAttribute('data-translated')) {
              const originalText = item.node.textContent.trim();
              item.node.parentElement.setAttribute('data-original-text', originalText);
              item.node.parentElement.setAttribute('data-translated', 'true');
            }
          });

          const uniqueTexts = [...new Set(nodesToTranslate.map(item => item.text))];
          const uniqueTextsList = uniqueTexts.filter(t => t && t.trim().length >= 2);
          
          if (uniqueTextsList.length === 0) {
            isTranslatingUser = false;
            return;
          }
          
          const translatedMap = await batchTranslateTexts(uniqueTextsList, langCode);

          nodesToTranslate.forEach(item => {
            const translated = translatedMap.get(item.text);
            if (translated && translated !== item.text) {
              item.node.textContent = item.node.textContent.replace(item.text, translated);
            }
          });
          
          console.log(`Auto-translated ${uniqueTextsList.length} unique texts to ${langCode}`);
        } catch (error) {
          console.error('Auto translate error:', error);
        } finally {
          isTranslatingUser = false;
        }
      }

      // Toggle desktop language dropdown
      languageBtnUser?.addEventListener("click", (e) => {
        e.stopPropagation();
        languageDropdownUser.classList.toggle("hidden");
      });

      // Toggle mobile language dropdown
      languageBtnUserMobile?.addEventListener("click", (e) => {
        e.stopPropagation();
        languageDropdownUserMobile.classList.toggle("hidden");
      });

      // Close dropdowns on outside click
      window.addEventListener("click", (e) => {
        if (!languageBtnUser?.contains(e.target) && !languageDropdownUser?.contains(e.target)) {
          languageDropdownUser?.classList.add("hidden");
        }
        if (!languageBtnUserMobile?.contains(e.target) && !languageDropdownUserMobile?.contains(e.target)) {
          languageDropdownUserMobile?.classList.add("hidden");
        }
      });

      // Fetch languages on page load
      fetchLanguagesUser();

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

    // Initialize AOS
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      offset: 100
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

    // VENUE JS //
    if (document.getElementById('unifiedSearch')) {
      document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('unifiedSearch');
        const dropdown = document.getElementById('suggestionsDropdown');
        const dummyVenues = [
          {name: "MU Sport Center", address: "Jl. Sunset Road No. 123, Kuta, Denpasar, Bali", distance: 1.2},
          {name: "Imbo Sport Center", address: "Jl. Bypass Ngurah Rai No. 45, Jimbaran, Denpasar Selatan", distance: 3.5},
          {name: "DC Arena Bali", address: "Jl. Raya Kuta No. 78, Kuta, Badung, Bali", distance: 5.1},
          {name: "Arena Sport", address: "Jl. Teuku Umar Barat No. 200, Denpasar Utara", distance: 7.8},
          {name: "Bali Futsal Center", address: "Jl. Gunung Agung No. 15, Renon, Denpasar Timur", distance: 10.2},
          {name: "Sport Hub Denpasar", address: "Jl. Diponegoro No. 300, Denpasar Pusat", distance: 15.4}
        ];

        function showSuggestions(query) {
          if (!query.trim()) {
            dropdown.innerHTML = '';
            dropdown.classList.add('hidden');
            return;
          }

          const filtered = dummyVenues
            .filter(venue => venue.name.toLowerCase().includes(query.toLowerCase()) || venue.address.toLowerCase().includes(query.toLowerCase()))
            .sort((a, b) => a.distance - b.distance)
            .slice(0, 5);

          if (filtered.length === 0) {
            dropdown.innerHTML = '<li class="px-4 py-2 text-gray-500">Tidak ada hasil</li>';
          } else {
            dropdown.innerHTML = filtered.map(venue => `
              <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer border-b last:border-b-0" onclick="selectVenue('${venue.name} - ${venue.address} (${venue.distance} km)')">
                <div class="font-semibold">${venue.name}</div>
                <div class="text-sm text-gray-600">${venue.address}</div>
                <div class="text-xs text-gray-400">${venue.distance} km</div>
              </li>
            `).join('');
          }

          dropdown.classList.remove('hidden');
        }

        window.selectVenue = function(value) {
          searchInput.value = value;
          dropdown.classList.add('hidden');
        };

        searchInput.addEventListener('input', (e) => {
          showSuggestions(e.target.value);
        });

        searchInput.addEventListener('focus', () => {
          if (searchInput.value.trim()) {
            showSuggestions(searchInput.value);
          }
        });

        document.addEventListener('click', (e) => {
          if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
          }
        });

        // Form submit handler (placeholder)
        const form = searchInput.closest('form');
        form.addEventListener('submit', (e) => {
          e.preventDefault();
          const searchTerm = searchInput.value;
          if (searchTerm) {
            alert(`Searching for: ${searchTerm}`); // Replace with actual search logic later
          }
        });
      });
    }
  </script>
</body>
</html>