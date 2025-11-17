@extends('FRONTEND.layout.frontend')

@section('title', 'Olga Sehat - Daftar User')

@section('content')
<main class="mt-30 flex items-center justify-center min-h-screen p-4 md:py-8 md:px-6 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
  <div class="flex flex-col md:flex-row rounded-2xl overflow-hidden shadow-2xl max-w-6xl w-full bg-white md:max-h-[90vh]">
    <!-- Left image -->
    <div class="w-full md:w-1/2 md:h-auto flex-shrink-0 relative overflow-hidden">
      <img
        src="{{ asset('assets/sports-tools.jpg') }}"
        alt="Peralatan olahraga di atas rumput"
        class="object-cover w-full h-64 md:h-full rounded-t-2xl md:rounded-l-2xl md:rounded-tr-none transform hover:scale-105 transition-transform duration-500"
        onerror="this.onerror=null;this.src='https://placehold.co/400x600?text=Image+Unavailable';"
      />
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent md:block hidden"></div>
      <div class="absolute bottom-8 left-8 right-8 text-white md:block hidden">
        <h2 class="text-3xl font-bold mb-2">Bergabung dengan Kami</h2>
        <p class="text-white/90">Mulai perjalanan sehatmu hari ini</p>
      </div>
    </div>

    <!-- Right content -->
    <div class="p-6 md:p-8 lg:p-10 flex flex-col justify-center w-full md:w-1/2 bg-white overflow-y-auto">
      <!-- Logo/Brand -->
      <div class="mb-4 md:mb-5">
        <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
          Time to Move!
        </h1>
        <p class="text-gray-600 leading-relaxed">
          Ribuan orang sudah memulai gaya hidup sehat.<br />
          Sekarang giliranmu bersama <span class="font-bold text-blue-600">OlgaSehat</span> – olahraga jadi lebih seru!
        </p>
      </div>

      @if ($errors->any())
        <div class="mb-4 md:mb-5 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg shadow-sm animate-fade-in">
          <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <div>
              <p class="font-semibold mb-1">Terjadi kesalahan:</p>
              <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      @endif

      <form action="{{ route('user.register.submit') }}" method="POST" class="space-y-4">
        @csrf
        
        <!-- Nama -->
        <div class="space-y-2">
          <label for="name" class="block text-sm font-semibold text-gray-700">
            <i class="fas fa-user text-blue-600 mr-2"></i>Nama Lengkap
          </label>
          <input 
            type="text" 
            id="name" 
            name="name" 
            value="{{ old('name') }}" 
            required 
            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 outline-none"
            placeholder="Masukkan nama lengkap"
          />
        </div>

        <!-- Email -->
        <div class="space-y-2">
          <label for="email" class="block text-sm font-semibold text-gray-700">
            <i class="fas fa-envelope text-blue-600 mr-2"></i>Email
          </label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 outline-none"
            placeholder="contoh@email.com"
          />
        </div>

        <!-- Password -->
        <div class="space-y-2">
          <label for="password" class="block text-sm font-semibold text-gray-700">
            <i class="fas fa-lock text-blue-600 mr-2"></i>Password
          </label>
          <div class="relative">
            <input 
              type="password" 
              id="password" 
              name="password" 
              required 
              class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 outline-none"
              placeholder="Minimal 8 karakter"
            />
            <button 
              type="button" 
              onclick="togglePassword('password')"
              class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
            >
              <i class="fas fa-eye" id="togglePassword"></i>
            </button>
          </div>
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
          <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">
            <i class="fas fa-lock text-blue-600 mr-2"></i>Konfirmasi Password
          </label>
          <div class="relative">
            <input 
              type="password" 
              id="password_confirmation" 
              name="password_confirmation" 
              required 
              class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-200 outline-none"
              placeholder="Ulangi password"
            />
            <button 
              type="button" 
              onclick="togglePassword('password_confirmation')"
              class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
            >
              <i class="fas fa-eye" id="togglePasswordConfirmation"></i>
            </button>
          </div>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit" 
          class="w-full bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-semibold py-3.5 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-200 flex items-center justify-center space-x-2"
        >
          <i class="fas fa-user-plus"></i>
          <span>Daftar Sekarang</span>
        </button>
      </form>

      <!-- Divider -->
      <div class="flex items-center my-4 md:my-5">
        <div class="flex-1 border-t border-gray-300"></div>
        <span class="px-4 text-sm text-gray-500">atau</span>
        <div class="flex-1 border-t border-gray-300"></div>
      </div>

      <!-- Link Login -->
      <p class="text-center text-gray-600 mb-4 md:mb-5">
        Sudah punya akun?
        <a href="/loginuser" class="text-blue-600 hover:text-blue-700 font-semibold hover:underline transition-colors">
          Login di sini
        </a>
      </p>

      <!-- Footer -->
      <p class="text-xs text-gray-500 text-center leading-relaxed mt-4 md:mt-5 pt-4 md:pt-5 border-t border-gray-200">
        Dengan melanjutkan, berarti kamu menyetujui
        <a href="#" class="text-indigo-600 font-semibold hover:underline">Privacy Policy</a> dan
        <a href="#" class="text-indigo-600 font-semibold hover:underline">Community Guidelines</a> OlgaSehat.id
      </p>
    </div>
  </div>
</main>

<script>
function togglePassword(fieldId) {
  const field = document.getElementById(fieldId);
  const toggleIcon = fieldId === 'password' ? document.getElementById('togglePassword') : document.getElementById('togglePasswordConfirmation');
  
  if (field.type === 'password') {
    field.type = 'text';
    toggleIcon.classList.remove('fa-eye');
    toggleIcon.classList.add('fa-eye-slash');
  } else {
    field.type = 'password';
    toggleIcon.classList.remove('fa-eye-slash');
    toggleIcon.classList.add('fa-eye');
  }
}
</script>

<style>
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fade-in 0.3s ease-out;
}
</style>
@endsection
