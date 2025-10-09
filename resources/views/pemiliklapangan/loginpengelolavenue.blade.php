<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OLGA SEHAT - Login Pengelola Venue</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    body {
      font-family: 'Poppins', sans-serif;
      background: #f9fafb;
    }
  </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen p-4 bg-gray-100">
<!-- Logo -->
<div class="mb-6 text-center">
  <img src="assets/logo.png" 
       alt="Logo" 
       class="mx-auto max-h-20 w-auto" />
</div>

  <!-- Card -->
<div class="max-w-sm w-full bg-white rounded-xl shadow-lg p-8">
  <!-- Welcome -->
  <h2 class="text-lg font-semibold text-gray-800">Selamat datang</h2>
  <h3 class="text-xl font-bold text-[#1a3a7f] mt-1">Pengelola Venue !</h3>

  <!-- Deskripsi -->
  <p class="text-gray-500 text-sm mt-4">
    Software Fasilitas Olahraga No <span class="font-bold">#1</span> di Indonesia
  </p>
  <p class="text-gray-700 text-sm mt-2 mb-6">
    Rasakan pengalaman mengelola Fasilitas Olahraga dengan mudah dan optimal
  </p>


   <!-- Form -->
<form class="space-y-4">
  <input type="email" 
         placeholder="Alamat Email" 
         class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a3a7f] outline-none" />
  <a href="/isidata"><button type="submit" 
          class="w-full bg-[#1a3a7f] hover:bg-[#142b5c] text-white font-semibold py-3 rounded-lg transition">
    Submit
  </button>
</a>

  <!-- Teks tambahan -->
  <p class="text-sm text-gray-600 text-center">
    Sudah punya akun? <a href="/regispengelola" class="text-[#1a3a7f] font-semibold hover:underline">Klik di sini</a>
  </p>
</form>

  </div>

</body>
</html>
