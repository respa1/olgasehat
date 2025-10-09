<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OLGA SEHAT - Regis Pengelola Venue</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    body {
      font-family: 'Poppins', sans-serif;
      background: #ffffff;
    }
  </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen p-4">

  <!-- Logo -->
  <div class="mb-6 text-center">
    <img src="assets/logo.png" 
         alt="Logo" 
         class="mx-auto max-h-20 w-auto" />
  </div>

  <!-- Card -->
  <div class="max-w-sm w-full bg-white border-2 rounded-md p-6">
    <!-- Header -->
    <h2 class="text-lg font-bold text-gray-800 text-center">Login Pengelola</h2>
    <p class="text-sm text-gray-600 text-center mt-1">
      Belum Punya Akun? 
      <a href="/loginpengelolavenue" class="text-[#1a3a7f] font-semibold hover:underline">Buat di sini</a>
    </p>

    <!-- Form -->
    <form class="mt-6 space-y-4">
      <!-- Email -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" 
               placeholder="Email" 
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#1a3a7f] outline-none" />
      </div>

      <!-- Password -->
      <div>
        <div class="flex justify-between items-center mb-1">
          <label class="block text-sm font-semibold text-gray-700">Password</label>
          <a href="#" class="text-sm text-[#1a3a7f] hover:underline">Lupa Password?</a>
        </div>
        <input type="password" 
               placeholder="Password" 
               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#1a3a7f] outline-none" />
      </div>

      <!-- Button -->
      <button type="submit" 
              class="w-full bg-[#1a3a7f] hover:bg-[#142b5c] text-white font-semibold py-2 rounded-md transition">
        Login
      </button>
    </form>

    <!-- Footer text -->
    <p class="text-xs text-gray-600 text-center mt-4">
      Ingin login sebagai user di web utama OlgaSehat? 
      <a href="/regispengelolavenue" class="text-[#1a3a7f] hover:underline">Klik di sini</a>
    </p>
  </div>

</body>
</html>
