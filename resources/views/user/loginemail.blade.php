@extends('FRONTEND.layout.frontend')

@section('title', 'Olga Sehat - Login dengan Email')

@section('content')
<main class="mt-30 flex items-center justify-center min-h-screen p-6 bg-gray-50">
  <div class="bg-white rounded-lg shadow-md max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 overflow-hidden">
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

      <!-- Link Register -->
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
