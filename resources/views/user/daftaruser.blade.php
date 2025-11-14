@extends('FRONTEND.layout.frontend')

@section('title', 'Olga Sehat - Daftar User')

@section('content')
<main class="mt-30 flex items-center justify-center min-h-screen p-6 bg-gray-50">
  <div class="flex flex-col md:flex-row rounded-lg overflow-hidden shadow-lg max-w-5xl w-full">
    <!-- Left image -->
    <div class="w-full md:w-1/2 md:h-auto flex-shrink-0">
      <img
        src="{{ asset('assets/sports-tools.jpg') }}"
        alt="Peralatan olahraga di atas rumput"
        class="object-cover w-full h-64 md:h-full rounded-t-lg md:rounded-l-lg md:rounded-tr-none"
        onerror="this.onerror=null;this.src='https://placehold.co/400x600?text=Image+Unavailable';"
      />
    </div>

    <!-- Right content -->
    <div class="p-8 md:p-10 flex flex-col justify-center w-full md:w-1/2 bg-white">
      <!-- Judul -->
      <h1 class="text-3xl font-bold mb-4">Time to Move!</h1>

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

      <form action="{{ route('user.register.submit') }}" method="POST" class="space-y-5">
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
  </div>
</main>
@endsection
