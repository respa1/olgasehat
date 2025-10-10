 <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Olga Sehat Free Trial</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50">
  <div class="min-h-screen flex flex-col md:flex-row justify-center items-start md:items-center p-6 md:p-12 gap-8 md:gap-16">
   <!-- Left side -->
<div class="max-w-md w-full">
  <div class="flex items-center md:justify-start justify-center gap-3 mb-6 text-center">
    <div class="w-52 h-52 rounded-lg flex items-center justify-center">
      <img src="assets/logo.png" alt="Olga Sehat Logo" class="mx-auto">
    </div>
  </div>
 
  <h2 class="font-bold text-xl mb-2 text-gray-800 text-center md:text-left">
    Welcome, Guest!
  </h2>
  <p class="text-gray-600 text-sm mb-4 leading-relaxed text-center md:text-left">
    Nikmati akses free trial dan jelajahi semua fitur unggulan kami<br/>
    Software Fasilitas Olahraga Di Indonesia
  </p>

  <div class="bg-blue-50 p-4 rounded-lg mb-6 text-center md:text-left">
    <div class="text-xs">
      <p class="mb-1">
        Email yang anda daftarkan salah? 
        <a class="text-blue-600 font-medium hover:underline" href="#">Klik disini</a>
      </p>
      <p>
        Sudah mempunyai akun? 
        <a class="text-blue-600 font-medium hover:underline" href="#">Login di sini</a>
      </p>
    </div>
  </div>

  <div class="hidden md:block mt-8">
    <img alt="Illustration of a person walking in a city with wifi and location icons around" 
         class="w-full max-w-xs mx-auto md:mx-0" 
         src="assets/ilus.png"/>
  </div>
</div>

    
    <!-- Right side form -->
<div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-sm"> <!-- ubah dari max-w-md ke max-w-sm -->
  <div class="text-center mb-6">
    <h3 class="font-bold text-lg text-gray-800">Mitra yang disediakan PT. indo Apps Solusindo</h3>
    <p class="text-sm text-gray-500">Olga Sehat Smart Venue</p>
  </div>
      <form action="{{ route('mitra.store') }}" method="POST" autocomplete="off" novalidate="">
        @csrf
        
        <div class="mb-4">
          <label class="text-xs font-semibold text-gray-700 mb-1 block" for="nama-anda">Nama Anda</label>
          <input name="nama_anda" class="w-full text-sm rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                 id="nama-anda" 
                 placeholder="Masukkan nama lengkap" 
                 type="text"/>
        </div>
        
        <div class="mb-4">
          <label class="text-xs font-semibold text-gray-700 mb-1 block" for="nama-bisnis">Nama Bisnis</label>
          <input name="nama_bisnis" class="w-full text-sm rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                 id="nama-bisnis" 
                 placeholder="Masukkan nama bisnis" 
                 type="text"/>
        </div>
        
        <div class="mb-4">
          <label class="text-xs font-semibold text-gray-700 mb-1 block" for="tipe-venue">Tipe Venue</label>
          <select name="tipe_venue" class="w-full text-sm rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                  id="tipe-venue">
            <option value="">Pilih tipe venue</option>
            <option>Sports Complex</option>
            <option>Fitness Center</option>
            <option>Stadium</option>
            <option>Swimming Pool</option>
            <option>Sports Hall</option>
          </select>
        </div>
        
        <div class="mb-4">
          <label class="text-xs font-semibold text-gray-700 mb-1 block" for="kontak-bisnis">Kontak Bisnis</label>
          <input name="kontak_bisnis" class="w-full text-sm rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                 id="kontak-bisnis" 
                 placeholder="Masukkan nomor telepon" 
                 type="tel"/>
        </div>
        
        <div class="mb-4">
          <label class="text-xs font-semibold text-gray-700 mb-1 block" for="email-bisnis">Email Bisnis</label>
          <input name="email_bisnis" class="w-full text-sm rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                 id="email-bisnis" 
                 placeholder="Masukkan email bisnis" 
                 type="email"/>
        </div>
        
        <div class="mb-4">
          <label class="text-xs font-semibold text-gray-700 mb-1 block" for="password">Password</label>
          <div class="relative">
            <input name="password" class="w-full text-sm rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 pr-10" 
                   id="password" 
                   placeholder="Buat password" 
                   type="password"/>
            <span class="absolute right-3 top-3.5 text-gray-400 cursor-pointer hover:text-gray-600">
            </span>
          </div>
        </div>
        
        <div class="mb-6">
          <label class="text-xs font-semibold text-gray-700 mb-1 block" for="konfirmasi-password">Konfirmasi Password</label>
          <div class="relative">
            <input name="password_confirmation" class="w-full text-sm rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 pr-10" 
                   id="konfirmasi-password" 
                   placeholder="Konfirmasi password" 
                   type="password"/>
            <span class="absolute right-3 top-3.5 text-gray-400 cursor-pointer hover:text-gray-600">
            </span>
          </div>
        </div>
        
        <div class="flex items-start mb-6">
          <input class="mt-1 mr-2 rounded focus:ring-blue-500"
                 id="terms"
                 type="checkbox"
                 name="terms"
                 required/>
          <label class="text-xs text-gray-600" for="terms">
            Saya menyetujui
            <a class="text-blue-600 hover:underline font-medium" href="#">
              Syarat & Ketentuan
            </a>
          </label>
        </div>
        
        <button class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" 
                type="submit">
          Submit
        </button>
      </form>
    </div>
  </div>
  
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        html: `
            <ul style="text-align: left;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        `,
        confirmButtonText: 'OK'
    });
</script>
@endif

</body>
</html>
