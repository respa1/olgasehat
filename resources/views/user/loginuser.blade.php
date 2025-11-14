@extends('FRONTEND.layout.frontend')

@section('title', 'Olga Sehat - Login User')

@section('content')
<main class="mt-30 flex items-center justify-center min-h-screen p-6 bg-gray-50">
  <div class="bg-white rounded-lg shadow-md max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 overflow-hidden">
    <!-- Left image -->
    <div class="w-full h-64 md:h-auto">
      <img
        src="{{ asset('assets/sports-tools.jpg') }}"
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
@endsection
