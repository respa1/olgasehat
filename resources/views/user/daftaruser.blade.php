<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OlgaSehat regis</title>
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
    <a href="/" class="flex items-center space-x-2">
      <img src="{{ asset('assets/olgasehat-icon.png') }}" alt="Olga Sehat Logo" class="h-10 w-auto" />
    </a>

    <!-- Navigation (desktop) -->
    <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
      <a href="/venue" class="hover:text-blue-700">Sewa Lapangan</a>
      <a href="#" class="hover:text-blue-700">Tempat Sehat</a>
      <a href="/community" class="hover:text-blue-700">Komunitas</a>
      <a href="/club" class="hover:text-blue-700">Klub</a>
      <a href="/blog-news" class="hover:text-blue-700">Blog & News</a>
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
    <a href="/venue" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Sewa Lapangan</a>
    <a href="#" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Tempat Sehat</a>
    <a href="/community" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Komunitas</a>
    <a href="/club" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Klub</a>
    <a href="/blog-news" class="block px-6 py-3 border-b hover:bg-blue-50 hover:text-blue-700">Blog & News</a>
    
    <!-- Register & Login di mobile -->
<div class="border-t border-gray-200 px-6 py-4 space-y-3">
  <!-- Register Dropdown -->
  <div class="relative">
    <button id="mobileRegisterBtn" class="w-full text-center border border-blue-600 text-blue-600 rounded-lg py-2 hover:bg-blue-50 flex justify-between items-center">
      Register
      <i class="fas fa-chevron-down ml-2 text-sm"></i>
    </button>
    <div id="mobileRegisterMenu" class="hidden mt-2 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
      <a href="/daftaruser" class="block px-4 py-2 text-sm hover:bg-blue-50 hover:text-blue-700">Register User</a>
      
    </div>
  </div>

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
        src="{{ asset('assets/sports-tools.jpg') }}"
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

      @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('user.register.submit') }}" method="POST" class="space-y-6">
        @csrf
        <div>
          <label for="name" class="block mb-2 font-semibold">Nama</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3" />
        </div>
        <div>
          <label for="email" class="block mb-2 font-semibold">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3" />
        </div>
        <div>
          <label for="password" class="block mb-2 font-semibold">Password</label>
          <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-3" />
        </div>
        <div>
          <label for="password_confirmation" class="block mb-2 font-semibold">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full border border-gray-300 rounded-lg px-4 py-3" />
        </div>
        <button type="submit" class="w-full bg-indigo-900 hover:bg-indigo-800 text-white font-medium py-3 rounded-lg">Register</button>
      </form>

      <!-- Link Login -->
      <p class="text-center text-gray-500 mt-6">
        Sudah punya akun? 
        <a href="/loginuser" class="text-blue-600 hover:underline font-medium">Login di sini</a>
      </p>

      <!-- Footer -->
      <p class="text-xs text-gray-500 text-center leading-tight mt-10">
        Dengan melanjutkan, berarti kamu menyetujui
        <a href="#" class="text-indigo-900 font-semibold hover:underline">Privacy Policy</a> dan
        <a href="#" class="text-indigo-900 font-semibold hover:underline">Community Guidelines</a> OlgaSehat.id
      </p>
    </div>
  </main>
</body>
</html>
