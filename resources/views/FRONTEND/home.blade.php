@extends('FRONTEND.layout.frontend')

@section('content')

<section class="relative bg-cover bg-center h-[500px] md:h-[600px]" style="background-image: url('{{ asset('assets/banten-indonesia-august-02-2022-600nw-2455954305.webp') }}');">
  {{-- Tambahkan px-6 (padding horizontal) untuk responsif, dan flex-col justify-center items-center untuk menengahkan konten secara vertikal dan horizontal --}}
  <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center px-6">
    <div class="container mx-auto text-white text-center">
      {{-- Teks lebih besar di desktop, lebih kecil di mobile --}}
      <h1 class="text-4xl md:text-6xl font-bold mb-4">
        Kini <span class="font-extrabold">Olga Sehat</span> Hadir<br />
        Untuk Gaya Hidup Sehat
      </h1>
      {{-- Teks paragraf --}}
      <p class="text-base md:text-xl mb-4 max-w-3xl mx-auto">
        Selamat datang di OLGA SEHAT<br />
        Satu platform untuk booking lapangan, klinik, komunitas olahraga, dan cek kesehatan.
      </p>
      <p class="text-base md:text-xl font-semibold italic">#HidupLebihAktif kini lebih mudah!</p>
    </div>
  </div>
</section>

<section class="container mx-auto px-6 py-12 md:py-20 flex flex-col md:flex-row items-center md:items-start md:space-x-16">
  <div class="md:w-1/2 mb-10 md:mb-0 order-2 md:order-1">
    {{-- Tombol Tabs tetap --}}
    <div class="inline-flex space-x-3 mb-8" role="tablist" aria-label="Toggle Kelola Fasilitas">
      <button id="btnPemilikLapangan" role="tab" aria-selected="true" aria-controls="contentPemilikLapangan" tabindex="0" class="bg-blue-700 text-white text-base font-semibold rounded-full px-5 py-2.5 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-600">
        PEMILIK LAPANGAN
      </button>
      <button id="btnPenyewaLapangan" role="tab" aria-selected="false" aria-controls="contentPenyewaLapangan" tabindex="-1" class="bg-gray-200 text-gray-600 text-base font-semibold rounded-full px-5 py-2.5 transition-colors hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
        PENYEWA
      </button>
    </div>
    <div id="contentPemilikLapangan" role="tabpanel" aria-labelledby="btnPemilikLapangan" tabindex="0">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800 leading-tight">Kelola fasilitas lebih praktis dan menguntungkan.</h2>
      <p class="text-gray-700 mb-8 max-w-lg text-lg leading-relaxed">
        Waktunya buat venue anda lebih dari sekadar venue. Semuanya dimulai dengan pengelolaan yang simpel, fleksibel, dan profitable lewat OLGA SEHAT Venue Management.
      </p>
      <a href="#" class="text-blue-700 font-bold hover:underline text-lg transition-colors">Lihat Selengkapnya &rarr;</a>
    </div>
    <div id="contentPenyewaLapangan" role="tabpanel" aria-labelledby="btnPenyewaLapangan" tabindex="0" class="hidden">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800 leading-tight">Sewa lapangan dengan mudah dan cepat.</h2>
      <p class="text-gray-700 mb-8 max-w-lg text-lg leading-relaxed">
        Ada rencana berolahraga minggu ini tapi belum tahu mau main di mana? Atau tidak sempat jauh-jauh datang ke venue hanya untuk booking lapangan?
      </p>
      <a href="#" class="text-blue-700 font-bold hover:underline text-lg transition-colors">Lihat Selengkapnya &rarr;</a>
    </div>
  </div>
  
  {{-- PERBAIKAN: Gunakan grid-cols-1 di mobile, dan sm:grid-cols-2 (atau biarkan default-nya grid-cols-2 jika Anda ingin 2 kolom di mobile) --}}
  <div class="md:w-1/2 grid grid-cols-2 gap-5 order-1 md:order-2" id="imageContainerPemilikLapangan">
    <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
  </div>
  
  <div class="md:w-1/2 grid grid-cols-2 gap-5 hidden order-1 md:order-2" id="imageContainerPenyewaLapangan">
    <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="MU Sport Center" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Arena Sport" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
  </div>
</section>

<section class="container mx-auto px-6 py-12 md:py-20 flex flex-col md:flex-row items-center md:items-start md:space-x-16">
  {{-- PERBAIKAN: Gunakan grid-cols-1 di mobile, dan sm:grid-cols-2 (atau biarkan default-nya grid-cols-2) --}}
  <div class="md:w-1/2 grid grid-cols-2 gap-5 mb-10 md:mb-0 order-1 md:order-1" id="imageContainerPemilikKesehatan">
    <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="Klinik 1" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Fisio 2" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="Gym 3" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Checkup 4" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
  </div>
  <div class="md:w-1/2 order-2 md:order-2">
    {{-- Tombol Tabs (Tetap) --}}
    <div class="inline-flex space-x-3 mb-8" role="tablist" aria-label="Toggle Kelola Fasilitas Kesehatan">
      <button id="btnPemilikKesehatan" role="tab" aria-selected="true" aria-controls="contentPemilikKesehatan" tabindex="0" class="bg-blue-700 text-white text-base font-semibold rounded-full px-5 py-2.5 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-600">
        PEMILIK KESEHATAN
      </button>
      <button id="btnPenyewaKesehatan" role="tab" aria-selected="false" aria-controls="contentPenyewaKesehatan" tabindex="-1" class="bg-gray-200 text-gray-600 text-base font-semibold rounded-full px-5 py-2.5 transition-colors hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
        PENYEWA
      </button>
    </div>
    <div id="contentPemilikKesehatan" role="tabpanel" aria-labelledby="btnPemilikKesehatan" tabindex="0">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800 leading-tight">Kelola layanan kesehatan lebih mudah dan menguntungkan.</h2>
      <p class="text-gray-700 mb-8 max-w-lg text-lg leading-relaxed">
        Waktunya buat tempat sehat Anda jadi lebih dari sekadar fasilitas. Semuanya dimulai dengan pengelolaan yang simpel, fleksibel, dan profitable lewat OLGA SEHAT Health Management.
      </p>
      <a href="#" class="text-blue-700 font-bold hover:underline text-lg transition-colors">Lihat Selengkapnya &rarr;</a>
    </div>
    <div id="contentPenyewaKesehatan" role="tabpanel" aria-labelledby="btnPenyewaKesehatan" tabindex="0" class="hidden">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800 leading-tight">Booking cek kesehatan dan klinik lebih mudah.</h2>
      <p class="text-gray-700 mb-8 max-w-lg text-lg leading-relaxed">
        Cari fasilitas kesehatan terdekat, seperti klinik dan pusat kebugaran, dan jadwalkan sesi Anda tanpa ribet. Kesehatan Anda kini di ujung jari.
      </p>
      <a href="#" class="text-blue-700 font-bold hover:underline text-lg transition-colors">Lihat Selengkapnya &rarr;</a>
    </div>
  </div>
  <div class="md:w-1/2 grid grid-cols-2 gap-5 hidden order-1 md:order-1" id="imageContainerPenyewaKesehatan">
    <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="Klinik 1" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Fisio 2" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="Gym 3" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
    <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Checkup 4" class="rounded-xl shadow-lg object-cover h-48 md:h-52 w-full" />
  </div>
</section>

<section class="bg-gray-50 py-16 md:py-24">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-800">
      Temukan Komunitas & Aktivitas Favoritmu!
    </h2>
    <p class="text-gray-700 mb-10 max-w-4xl mx-auto text-lg leading-relaxed">
     Buat kegiatan seru bersama Olga Sehat! Komunitas, Membership, atau Event Seru dari berbagai kegiatan olahraga di sekitarmu. 
     Saatnya jalin silaturahmi dan tambah semangat di lapangan!
    </p>
    <div class="inline-flex space-x-4 mb-10">
      <button class="bg-blue-700 text-white text-base font-semibold rounded-full px-6 py-3 transition-colors hover:bg-blue-800">
        BUAT AKTIVITAS BARU
      </button>
      <button class="bg-gray-200 text-gray-700 text-base font-semibold rounded-full px-6 py-3 transition-colors hover:bg-gray-300">
        GABUNG AKTIVITAS
      </button>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-6xl mx-auto">
      <img src="{{ asset('assets/komunitas.png') }}" alt="Komunitas 1" class="rounded-xl shadow-lg object-cover h-64 w-full" />
      <img src="{{ asset('assets/komunitas1.png') }}" alt="Komunitas 2" class="rounded-xl shadow-lg object-cover h-64 w-full" />
      <img src="{{ asset('assets/komunitas2.png') }}" alt="Komunitas 3" class="rounded-xl shadow-lg object-cover h-64 w-full" />
    </div>
    <a href="#" class="text-blue-700 font-bold mt-10 inline-block hover:underline text-xl transition-colors">
      Lihat Semua Komunitas &rarr;
    </a>
  </div>
</section>


<section class="relative bg-cover bg-center h-auto py-16 md:py-24" style="background-image: url('{{ asset('assets/banten-indonesia-august-02-2022-600nw-2455954305.webp') }}');">
  <div class="absolute inset-0 bg-black bg-opacity-70"></div>

  <div class="relative flex flex-col justify-center items-center text-white px-6">
    <h2 class="text-3xl md:text-5xl font-bold mb-12 text-center max-w-4xl">
      Mengapa Memilih Olga Sehat?
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8 max-w-6xl w-full">
      
      <!-- Card 1 -->
      <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-xl p-6 md:p-8 flex flex-col items-center space-y-4 border border-white/20 hover:bg-opacity-25 transition">
        <div class="w-14 h-14 bg-blue-700 rounded-full flex items-center justify-center text-white text-2xl font-bold">✓</div>
        <p class="text-center font-semibold text-base md:text-lg leading-snug">Penyedia Layanan Fasilitas Olahraga & Kesehatan</p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-xl p-6 md:p-8 flex flex-col items-center space-y-4 border border-white/20 hover:bg-opacity-25 transition">
        <div class="w-14 h-14 bg-blue-700 rounded-full flex items-center justify-center text-white text-2xl font-bold">★</div>
        <p class="text-center font-semibold text-base md:text-lg leading-snug">Dipilih khusus berdasarkan lokasi Terdekat</p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-xl p-6 md:p-8 flex flex-col items-center space-y-4 border border-white/20 hover:bg-opacity-25 transition">
        <div class="w-14 h-14 bg-blue-700 rounded-full flex items-center justify-center text-white text-2xl font-bold">📲</div>
        <p class="text-center font-semibold text-base md:text-lg leading-snug">Booking sekarang jadi makin praktis</p>
      </div>

      <!-- Card 4 -->
      <div class="bg-white bg-opacity-15 backdrop-blur-sm rounded-xl p-6 md:p-8 flex flex-col items-center space-y-4 border border-white/20 hover:bg-opacity-25 transition">
        <div class="w-14 h-14 bg-blue-700 rounded-full flex items-center justify-center text-white text-2xl font-bold">🛡️</div>
        <p class="text-center font-semibold text-base md:text-lg leading-snug">Pelayanan terbaik dan terpercaya</p>
      </div>
    </div>
  </div>
</section>

<section class="container mx-auto px-6 py-12 md:py-20">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row rounded-xl overflow-hidden shadow-2xl">
    <div class="md:w-1/3 bg-[url('{{ asset('assets/blue-banner.png') }}')] bg-cover bg-center flex items-center justify-center p-10 md:p-12 min-h-64">
      <h2 class="text-white text-3xl md:text-4xl font-bold text-center">Apa Kata Mereka?</h2>
    </div>
    <div class="md:w-2/3 bg-white p-8 md:p-12 flex flex-col justify-between relative">
      <div id="testimonial-container" class="relative min-h-[250px] md:min-h-[200px]">
        {{-- Konten Testimonial 1 --}}
        <div class="testimonial-item absolute inset-0 transition-opacity duration-500 opacity-100">
          <div class="flex items-start space-x-6 mb-6">
            <img src="{{ asset('assets/Goes Natha bos .jpg') }}" alt="Ir. Bagus Nathaniel Mahendra" class="w-20 h-20 rounded-full object-cover shadow-md" />
            <div>
              <p class="font-bold text-xl text-gray-900">Ir. Bagus Nathaniel Mahendra, M.Eng.</p>
              <p class="text-base text-gray-500">Backbone Indonesia</p>
            </div>
            <div class="text-blue-700 text-5xl font-extrabold select-none ml-auto hidden sm:block">“</div>
          </div>
          <p class="text-gray-800 text-lg leading-relaxed italic">
            "Olga Sehat membawa revolusi di kalangan penggemar olahraga. Aplikasi ini memudahkan pencarian aktivitas olahraga, mengembangkan komunitas olahraga, dan memesan tempat olahraga. Ini adalah ekosistem olahraga yang menyeluruh."
          </p>
        </div>
        {{-- Konten Testimonial 2 (dan seterusnya) juga perlu disesuaikan teksnya agar seragam --}}
        <div class="testimonial-item absolute inset-0 transition-opacity duration-500 opacity-0 pointer-events-none">
          <div class="flex items-start space-x-6 mb-6">
            <img src="{{ asset('assets/ir_bagus.jpg') }}" alt="Testimonial User 2" class="w-20 h-20 rounded-full object-cover shadow-md" />
            <div>
              <p class="font-bold text-xl text-gray-900">Testimonial User 2</p>
              <p class="text-base text-gray-500">Company 2</p>
            </div>
            <div class="text-blue-700 text-5xl font-extrabold select-none ml-auto hidden sm:block">“</div>
          </div>
          <p class="text-gray-800 text-lg leading-relaxed italic">
            "Sewa lapangan jadi sangat mudah dan cepat! Saya tidak perlu repot lagi datang ke venue untuk sekedar booking. Sangat direkomendasikan untuk komunitas olahraga."
          </p>
        </div>
        <div class="testimonial-item absolute inset-0 transition-opacity duration-500 opacity-0 pointer-events-none">
          <div class="flex items-start space-x-6 mb-6">
            <img src="{{ asset('assets/ir_bagus.jpg') }}" alt="Testimonial User 3" class="w-20 h-20 rounded-full object-cover shadow-md" />
            <div>
              <p class="font-bold text-xl text-gray-900">Testimonial User 3</p>
              <p class="text-base text-gray-500">Company 3</p>
            </div>
            <div class="text-blue-700 text-5xl font-extrabold select-none ml-auto hidden sm:block">“</div>
          </div>
          <p class="text-gray-800 text-lg leading-relaxed italic">
            "Manajemen venue kami menjadi sangat efisien sejak menggunakan Olga Sehat. Proses booking, pembayaran, dan penjadwalan lapangan bisa kami lakukan dari satu platform."
          </p>
        </div>
      </div>
      <div class="flex items-center justify-start space-x-4 mt-6 md:mt-8 text-base font-semibold text-blue-700 select-none">
        <span id="testimonial-counter">01/03</span>
        <button id="prev-btn" aria-label="Previous" class="text-blue-700 hover:text-blue-900 w-8 h-8 flex items-center justify-center rounded-full border border-blue-700/50 hover:border-blue-900 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button id="next-btn" aria-label="Next" class="text-blue-700 hover:text-blue-900 w-8 h-8 flex items-center justify-center rounded-full border border-blue-700/50 hover:border-blue-900 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>

@endsection