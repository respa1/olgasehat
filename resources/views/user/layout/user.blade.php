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
      <a href="/venueuser" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200">Fasilitas Olahraga</a>
      <a href="#" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200">Layanan Kesehatan</a>
      <a href="/communityuser" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200">Komunitas & Aktivitas</a>
      <a href="/bloguser_news" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200">News</a>
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
      <div class="relative">
        <button id="userMenuBtn" class="flex items-center space-x-2 focus:outline-none">
          @if(Auth::user()->image)
              <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="User Avatar" class="w-8 h-8 rounded-full border object-cover" />
          @else
              <img src="{{ asset('assets/guru.png') }}" alt="User Avatar" class="w-8 h-8 rounded-full border" />
          @endif
          <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
        </button>
        <!-- Dropdown menu -->
        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
          <a href="/dashboarduser" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
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
      <!-- Language Selector Mobile -->
      <div class="relative">
        <button id="languageBtnUserMobile" class="text-gray-700 hover:text-blue-700 focus:outline-none flex items-center space-x-2">
          <i class="fas fa-globe fa-lg"></i>
          <span id="currentLanguageUserMobile">ID</span>
          <i class="fas fa-chevron-down text-sm"></i>
        </button>
        <div id="languageDropdownUserMobile" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50 max-h-60 overflow-y-auto">
          <!-- Daftar bahasa akan diisi oleh JavaScript -->
        </div>
      </div>

      <!-- Dropdown User Mobile -->
      <div class="relative">
        <button id="mobileUserBtn" class="flex items-center space-x-2 focus:outline-none">
          @if(Auth::user()->image)
              <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="User Avatar" class="w-8 h-8 rounded-full border object-cover" />
          @else
              <img src="{{ asset('assets/guru.png') }}" alt="User Avatar" class="w-8 h-8 rounded-full border" />
          @endif
          <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
        </button>
        <!-- Dropdown menu -->
        <div id="mobileUserMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
          <a href="/dashboarduser" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</a>
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
      <a href="/venueuser" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Fasilitas Olahraga</a>
      <a href="#" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Layanan Kesehatan</a>
      <a href="/communityuser" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Komunitas & Aktivitas</a>
      <a href="/bloguser_news" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">News</a>

      <!-- User Links -->
      <div class="border-t pt-4">
        <a href="/logout" class="block w-full px-6 py-4 text-center bg-red-600 text-white font-semibold rounded-md hover:bg-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200">Logout</a>
      </div>
    </nav>
</header>
  <main class="pt-18">
    @yield('content')
  </main>



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

      // Fetch languages from LibreTranslate API
      async function fetchLanguagesUser() {
        try {
          const response = await fetch('https://libretranslate.com/languages');
          const languages = await response.json();
          populateLanguageDropdownUser(languages);
          populateLanguageDropdownUserMobile(languages);
        } catch (error) {
          console.error('Error fetching languages:', error);
          // Fallback to common languages
          const fallbackLanguages = [
            {code: 'en', name: 'English'},
            {code: 'id', name: 'Indonesian'},
            {code: 'es', name: 'Spanish'},
            {code: 'fr', name: 'French'},
            {code: 'de', name: 'German'},
            {code: 'it', name: 'Italian'},
            {code: 'pt', name: 'Portuguese'},
            {code: 'ru', name: 'Russian'},
            {code: 'ja', name: 'Japanese'},
            {code: 'ko', name: 'Korean'},
            {code: 'zh', name: 'Chinese'},
            {code: 'ar', name: 'Arabic'},
            {code: 'hi', name: 'Hindi'}
          ];
          populateLanguageDropdownUser(fallbackLanguages);
          populateLanguageDropdownUserMobile(fallbackLanguages);
        }
      }

      function populateLanguageDropdownUser(languages) {
        languageDropdownUser.innerHTML = '';
        languages.forEach(lang => {
          const li = document.createElement('li');
          li.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
          li.textContent = `${lang.name} (${lang.code.toUpperCase()})`;
          li.addEventListener('click', () => {
            currentLanguageUser.textContent = lang.code.toUpperCase();
            languageDropdownUser.classList.add('hidden');
            // Here you can add logic to change the page language
            changeLanguageUser(lang.code);
          });
          languageDropdownUser.appendChild(li);
        });
      }

      function populateLanguageDropdownUserMobile(languages) {
        languageDropdownUserMobile.innerHTML = '';
        languages.forEach(lang => {
          const li = document.createElement('li');
          li.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
          li.textContent = `${lang.name} (${lang.code.toUpperCase()})`;
          li.addEventListener('click', () => {
            currentLanguageUserMobile.textContent = lang.code.toUpperCase();
            languageDropdownUserMobile.classList.add('hidden');
            // Here you can add logic to change the page language
            changeLanguageUser(lang.code);
          });
          languageDropdownUserMobile.appendChild(li);
        });
      }

      function changeLanguageUser(langCode) {
        // Placeholder function for language change
        // You can implement translation logic here
        console.log('Changing language to:', langCode);
        // For now, just show an alert
        Swal.fire({
          icon: 'info',
          title: 'Language Changed',
          text: `Language changed to ${langCode.toUpperCase()}`,
          confirmButtonText: 'OK'
        });
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


