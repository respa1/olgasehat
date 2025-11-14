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
      <a href="/venue" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200" data-translate>Fasilitas Olahraga</a>
      <a href="/healthy" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200" data-translate>Layanan Kesehatan</a>
      <a href="/community" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200" data-translate>Komunitas & Aktivitas</a>
      <a href="/blog-news" class="hover:text-blue-700 border-b-2 border-transparent hover:border-blue-700 pb-1 transition-colors duration-200" data-translate>News</a>
    </nav>

    <!-- Aksi Desktop -->
    <div class="hidden md:flex items-center space-x-4 relative">
      <!-- Language Selector -->
      <div class="relative">
        <button id="languageBtn" class="text-gray-700 hover:text-blue-700 focus:outline-none flex items-center space-x-2">
          <i class="fas fa-globe fa-lg"></i>
          <span id="currentLanguage">ID</span>
          <i class="fas fa-chevron-down text-sm"></i>
        </button>
        <div id="languageDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50 max-h-60 overflow-y-auto">
          <!-- Daftar bahasa akan diisi oleh JavaScript -->
        </div>
      </div>

      <!-- Register Dropdown -->
      <div class="relative">
        <button id="registerBtn" class="text-gray-700 hover:text-blue-700 focus:outline-none" data-translate>Daftar</button>
        <div id="registerDropdown"
          class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50
                 transform scale-95 opacity-0 transition-all duration-200 ease-out">
          <a href="/daftaruser" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" data-translate>Akun User</a>
          <a href="/regispengelola" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" data-translate>Akun Pengelola Venue</a>
        </div>
      </div>

      <!-- Login Dropdown -->
      <div class="relative">
        <button id="loginBtn"
          class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-800 transition focus:outline-none" data-translate>
          Masuk
        </button>
        <div id="loginDropdown"
          class="hidden absolute right-0 mt-2 w-56 bg-white border rounded-md shadow-lg z-50
                 transform scale-95 opacity-0 transition-all duration-200 ease-out">
          <a href="/loginuser" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" data-translate>Masuk User</a>
          <a href="/loginpengelolavenue" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" data-translate>Masuk Pengelola Venue</a>
        </div>
      </div>
    </div>

    <!-- Header Mobile -->
    <div class="flex md:hidden items-center space-x-4 ml-auto">
      <!-- Language Selector Mobile -->
      <div class="relative">
        <button id="languageBtnMobile" class="text-gray-700 hover:text-blue-700 focus:outline-none flex items-center space-x-2">
          <i class="fas fa-globe fa-lg"></i>
          <span id="currentLanguageMobile">ID</span>
          <i class="fas fa-chevron-down text-sm"></i>
        </button>
        <div id="languageDropdownMobile" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50 max-h-60 overflow-y-auto">
          <!-- Daftar bahasa akan diisi oleh JavaScript -->
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
      <a href="/venue" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Fasilitas Olahraga</a>
      <a href="#" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Layanan Kesehatan</a>
      <a href="/community" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Komunitas & Aktivitas</a>
      <a href="/blog-news" class="block px-6 py-4 border-b text-center font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>News</a>

      <!-- Masuk and Daftar Buttons -->
      <div class="border-t pt-4">
        <a href="/loginuser" class="block w-full px-6 py-4 text-center text-blue-700 font-semibold border border-blue-700 rounded-md hover:bg-blue-50 mb-2 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Masuk</a>
        <a href="/daftaruser" class="block w-full px-6 py-4 text-center bg-blue-700 text-white font-semibold rounded-md hover:bg-blue-800 menu-item opacity-0 translate-y-1 transition-all duration-200" data-translate>Daftar</a>
      </div>
    </nav>
</header>

  <main class="pt-18">
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
        <li><a href="{{ route('tentang') }}" class="hover:text-blue-700" data-translate>Tentang</a></li>
        <li><a href="#" class="hover:text-blue-700" data-translate>Kebijakan &amp; Privasi</a></li>
        <li><a href="#" class="hover:text-blue-700" data-translate>Syarat &amp; Ketentuan</a></li>
      </ul>
    </div>
    <div>
      <h3 class="font-semibold text-lg mb-4 text-gray-800" data-translate>Ekosistem</h3>
      <ul class="space-y-3 text-base">
        <li><a href="/venue" class="hover:text-blue-700" data-translate>Fasilitas Olahraga</a></li>
        <li><a href="/healthy" class="hover:text-blue-700" data-translate>Layanan Kesehatan</a></li>
        <li><a href="/community" class="hover:text-blue-700" data-translate>Komunitas & Aktivitas</a></li>
        <li><a href="/blog-news" class="hover:text-blue-700" data-translate>News</a></li>
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
  <div class="container mx-auto px-6 text-center mt-10 pt-6 border-t border-gray-300 text-base text-gray-500" data-translate>
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

      // Language Dropdown Functionality
      const languageBtn = document.getElementById("languageBtn");
      const languageDropdown = document.getElementById("languageDropdown");
      const currentLanguage = document.getElementById("currentLanguage");
      const languageBtnMobile = document.getElementById("languageBtnMobile");
      const languageDropdownMobile = document.getElementById("languageDropdownMobile");
      const currentLanguageMobile = document.getElementById("currentLanguageMobile");

      // Fetch languages from LibreTranslate API
      async function fetchLanguages() {
        try {
          const response = await fetch('https://libretranslate.com/languages');
          const languages = await response.json();
          populateLanguageDropdown(languages);
          populateLanguageDropdownMobile(languages);
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
          populateLanguageDropdown(fallbackLanguages);
          populateLanguageDropdownMobile(fallbackLanguages);
        }
      }

      function populateLanguageDropdown(languages) {
        languageDropdown.innerHTML = '';
        languages.forEach(lang => {
          const li = document.createElement('li');
          li.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
          li.textContent = `${lang.name} (${lang.code.toUpperCase()})`;
          li.addEventListener('click', () => {
            currentLanguage.textContent = lang.code.toUpperCase();
            languageDropdown.classList.add('hidden');
            // Here you can add logic to change the page language
            changeLanguage(lang.code);
          });
          languageDropdown.appendChild(li);
        });
      }

      function populateLanguageDropdownMobile(languages) {
        languageDropdownMobile.innerHTML = '';
        languages.forEach(lang => {
          const li = document.createElement('li');
          li.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
          li.textContent = `${lang.name} (${lang.code.toUpperCase()})`;
          li.addEventListener('click', () => {
            currentLanguageMobile.textContent = lang.code.toUpperCase();
            languageDropdownMobile.classList.add('hidden');
            // Here you can add logic to change the page language
            changeLanguage(lang.code);
          });
          languageDropdownMobile.appendChild(li);
        });
      }

      async function changeLanguage(langCode) {
        console.log('Changing language to:', langCode);

        // Show loading
        Swal.fire({
          title: 'Mengubah Bahasa...',
          text: 'Mohon tunggu sebentar',
          allowOutsideClick: false,
          showConfirmButton: false,
          willOpen: () => {
            Swal.showLoading();
          }
        });

        try {
          // Get all translatable text elements
          const elements = document.querySelectorAll('[data-translate]');
          const textsToTranslate = Array.from(elements).map(el => el.textContent.trim()).filter(text => text);

          if (textsToTranslate.length === 0) {
            Swal.close();
            Swal.fire({
              icon: 'info',
              title: 'Informasi',
              text: 'Fitur terjemahan sedang dalam pengembangan',
              confirmButtonText: 'OK'
            });
            return;
          }

          // Translate texts using Google Translate API
          const translatedTexts = await Promise.all(
            textsToTranslate.map(async (text) => {
              try {
                const response = await fetch(`https://translate.googleapis.com/translate_a/single?client=gtx&sl=id&tl=${langCode}&dt=t&q=${encodeURIComponent(text)}`);
                const data = await response.json();
                return data[0][0][0];
              } catch (error) {
                console.error('Translation error:', error);
                return text; // Return original text if translation fails
              }
            })
          );

          // Apply translations
          elements.forEach((el, index) => {
            if (translatedTexts[index]) {
              el.textContent = translatedTexts[index];
            }
          });

          Swal.close();
          Swal.fire({
            icon: 'success',
            title: 'Bahasa Berhasil Diubah',
            text: `Bahasa telah diubah ke ${langCode.toUpperCase()}`,
            confirmButtonText: 'OK'
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

      // Toggle desktop language dropdown
      languageBtn?.addEventListener("click", (e) => {
        e.stopPropagation();
        languageDropdown.classList.toggle("hidden");
      });

      // Toggle mobile language dropdown
      languageBtnMobile?.addEventListener("click", (e) => {
        e.stopPropagation();
        languageDropdownMobile.classList.toggle("hidden");
      });

      // Close dropdowns on outside click
      window.addEventListener("click", (e) => {
        if (!languageBtn?.contains(e.target) && !languageDropdown?.contains(e.target)) {
          languageDropdown?.classList.add("hidden");
        }
        if (!languageBtnMobile?.contains(e.target) && !languageDropdownMobile?.contains(e.target)) {
          languageDropdownMobile?.classList.add("hidden");
        }
      });

      // Fetch languages on page load
      fetchLanguages();

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

    // Initialize AOS
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      offset: 100
    });

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