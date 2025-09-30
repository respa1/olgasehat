<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OlgaSehat Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
   <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
<!-- Header -->
<header class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
  <div class="container mx-auto flex items-center justify-between py-3 px-6">
    
    <!-- Logo -->
    <a href="#" class="flex items-center space-x-2">
      <img src="assets/logo.png" alt="Olga Sehat Logo" class="h-10 w-auto" />
    </a>

    <!-- Navigation (desktop) -->
    <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
      <a href="venue.html" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="tempat_sehat.html" class="hover:text-blue-700">Tempat Sehat</a>
      <a href="community.html" class="hover:text-blue-700">Komunitas</a>
      <a href="club.html" class="hover:text-blue-700">Klub</a>
      <a href="blog&news.html" class="hover:text-blue-700">Blog & News</a>
    </nav>

    <!-- Actions (desktop) -->
    <div class="hidden md:flex items-center space-x-4">
      <!-- Cart -->
      <button aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
      </button>
      <!-- Register -->
      <a href="/daftaruser" class="px-5 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">
        Register
      </a>
      <!-- Login -->
      <a href="/loginuser" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        Login
      </a>
    </div>

    <!-- Mobile buttons -->
    <div class="flex md:hidden items-center space-x-4">
      <!-- Cart (mobile) -->
      <button aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5">0</span>
      </button>
      <!-- Mobile menu button -->
      <button id="mobileMenuBtn" class="text-gray-700 hover:text-blue-700 focus:outline-none" aria-label="Open menu">
        <i class="fas fa-bars fa-lg"></i>
      </button>
    </div>
  </div>

  <!-- Mobile menu -->
  <nav id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200 shadow-md">
    <a href="venue.html" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Sewa Lapangan</a>
    <a href="tempat_sehat.html" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Tempat Sehat</a>
    <a href="community.html" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Komunitas</a>
    <a href="club.html" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Klub</a>
    <a href="blog&news.html" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Blog & News</a>
    
    <!-- Register & Login di mobile -->
    <div class="border-t border-gray-200 px-6 py-4 flex space-x-3">
      <a href="/daftaruser" class="flex-1 text-center border border-blue-600 text-blue-600 rounded-lg py-2 hover:bg-blue-50">
        Register
      </a>
      <a href="/loginuser" class="flex-1 text-center bg-blue-600 text-white rounded-lg py-2 hover:bg-blue-700">
        Login
      </a>
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
  </main>
  <script>
  // Dropdown user
  const userBtn = document.getElementById("userMenuBtn");
  const userMenu = document.getElementById("userMenu"); 
  if (userBtn) {
    userBtn.addEventListener("click", () => {
      userMenu.classList.toggle("hidden");
    });
  }
</script>
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
