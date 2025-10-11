<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Konfirmasi Pemesanan</title>
  <link rel="icon" href="assets/olgasehat-icon.png" type="image/png" />
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
      <a href="#" class="flex items-center space-x-2">
        <img src="assets/olgasehat-icon.png" alt="Olga Sehat Logo" class="w-100 h-10" />
      </a>
      <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
        <a href="/" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="/tempatsehat" class="hover:text-blue-700">Tempat Sehat</a>
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
        href="#"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Sewa Lapangan</a
      >
      <a
        href="#"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Tempat Sehat</a
      >
      <a
        href="#"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Community</a
      >
      <a
        href="#"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Club</a
      >
      <a
        href="#"
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

  <!-- Progress Bar -->
  <section class="container mx-auto px-6 py-8 max-w-4xl">
    <div class="flex items-center justify-between mb-6">
      <div class="flex items-center space-x-2">
        <div class="w-5 h-5 rounded-full bg-blue-700"></div>
        <span class="font-semibold text-gray-800">Validasi Item</span>
      </div>
      <div class="flex items-center space-x-2">
        <div class="w-5 h-5 rounded-full bg-gray-300"></div>
        <span class="font-semibold text-gray-800">Data dan Pembayaran</span>
      </div>
    </div>
    <div class="h-1 bg-gray-300 rounded-full relative">
      <div class="h-1 bg-blue-700 rounded-full absolute top-0 left-0 w-1/2"></div>
    </div>
  </section>

  <!-- Confirmation Content -->
  <main class="container mx-auto px-6 max-w-4xl">
    <div class="bg-white rounded-lg shadow p-8">
      <h1 class="text-xl font-bold mb-2 text-center">Periksa Pemesanan Anda</h1>
      <p class="text-center text-gray-600 mb-6">Pastikan detail pemesanan sudah sesuai dan benar.</p>

      <div class="border border-gray-200 rounded-lg p-6 flex justify-between items-center mb-6">
        <div>
          <h2 class="font-bold text-lg">MU Sport Center</h2>
          <p class="text-sm text-gray-600">Lapangan Futsal A</p>
          <p class="text-sm font-semibold mt-1">03-Sep-2025 &bull; 14:00 - 16:00</p>
        </div>
        <div class="text-right">
          <p class="text-lg font-bold">Rp100,000</p>
          <button class="flex items-center text-gray-600 hover:text-red-600 text-sm mt-1">
            <i class="fas fa-trash-alt mr-1"></i> Hapus
          </button>
        </div>
      </div>
      
      <a href="/payment">
        <button class="w-full bg-blue-700 text-white py-3 rounded-md font-semibold hover:bg-blue-800 transition">
        KONFIRMASI PEMESANAN
      </button>
      </a>
    </div>
    
  </main>

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

  <script src="assets/olgasehat.js"></script>
</body>
</html>
