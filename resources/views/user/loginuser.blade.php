@extends('FRONTEND.layout.frontend')

@section('title', 'Olga Sehat - Login User')

@section('content')
<main class="mt-30 flex items-center justify-center min-h-screen p-4 md:p-6 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
  <div class="bg-white rounded-2xl shadow-2xl max-w-5xl w-full grid grid-cols-1 md:grid-cols-2 overflow-hidden">
    <!-- Left image -->
    <div class="w-full h-64 md:h-auto relative overflow-hidden">
      <img
        src="{{ asset('assets/sports-tools.jpg') }}"
        alt="Peralatan olahraga di atas rumput"
        class="object-cover w-full h-full rounded-t-2xl md:rounded-none md:rounded-l-2xl transform hover:scale-105 transition-transform duration-500"
        onerror="this.onerror=null;this.src='https://placehold.co/400x600?text=Image+Unavailable';"
      />
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent md:block hidden"></div>
      <div class="absolute bottom-8 left-8 right-8 text-white md:block hidden">
        <h2 class="text-3xl font-bold mb-2">Selamat Datang Kembali</h2>
        <p class="text-white/90">Lanjutkan perjalanan sehatmu</p>
      </div>
    </div>

    <!-- Right content -->
    <div class="p-6 md:p-10 lg:p-12 flex flex-col justify-center">
      <!-- Judul -->
      <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
          Time to Move!
        </h1>
        <p class="text-gray-600 leading-relaxed">
          Ribuan orang sudah memulai gaya hidup sehat.<br />
          Sekarang giliranmu bersama <span class="font-bold text-blue-600">OlgaSehat</span> – olahraga jadi lebih seru!
        </p>
      </div>

      <!-- Tombol Masuk dengan Google -->
      <button 
        class="w-full mb-4 bg-white hover:bg-gray-50 text-gray-700 font-semibold py-3.5 rounded-xl flex items-center justify-center space-x-3 shadow-md hover:shadow-lg border-2 border-gray-200 hover:border-gray-300 transform hover:scale-[1.02] transition-all duration-200"
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

      <!-- Divider -->
      <div class="flex items-center my-6">
        <div class="flex-1 border-t border-gray-300"></div>
        <span class="px-4 text-sm text-gray-500">atau</span>
        <div class="flex-1 border-t border-gray-300"></div>
      </div>

      <!-- Tombol Login dengan Email -->
      <a 
        href="/loginemail" 
        class="w-full mb-6 bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-semibold py-3.5 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 text-center flex items-center justify-center space-x-2"
      >
        <i class="fas fa-envelope"></i>
        <span>Login Dengan Email</span>
      </a>

      <!-- Link Register -->
      <p class="text-center text-gray-600 mb-8">
        Belum punya akun? 
        <a href="/daftaruser" class="text-blue-600 hover:text-blue-700 font-semibold hover:underline transition-colors">
          Daftar di sini
        </a>
      </p>

      <!-- Footer -->
      <p class="text-xs text-gray-500 text-center leading-relaxed pt-6 border-t border-gray-200">
        Dengan melanjutkan, berarti kamu menyetujui
        <a href="#" class="text-indigo-600 font-semibold hover:underline">Privacy Policy</a> dan
        <a href="#" class="text-indigo-600 font-semibold hover:underline">Community Guidelines</a> OlgaSehat.id
      </p>
    </div>
  </div>
</main>
@endsection
