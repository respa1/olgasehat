@extends('user.layout.frontenduser')

@section('content')

<section class="relative bg-cover bg-center h-[500px] md:h-[600px]" style="background-image: url('{{ asset('assets/banten-indonesia-august-02-2022-600nw-2455954305.webp') }}');" data-aos="fade-in">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center px-6">

        <div class="container mx-auto text-white text-left" data-aos="fade-up-right" data-aos-delay="200">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Kini <span class="font-extrabold">Olga Sehat</span> Hadir<br />
                Untuk Gaya Hidup Sehat
            </h1>

            <p class="text-base md:text-xl mb-4 max-w-3xl">
                Selamat datang di OLGA SEHAT<br />
                Satu platform untuk booking lapangan, klinik, komunitas olahraga, dan cek kesehatan.
            </p>
            <p class="text-base md:text-xl font-semibold italic">#HidupLebihAktif kini lebih mudah!</p>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<section class="container mx-auto px-6 py-12 md:py-16 flex flex-col lg:flex-row items-center lg:items-center lg:space-x-10 max-w-6xl" data-aos="fade-up">

    <div class="lg:w-1/2 mb-8 lg:mb-0 order-2 lg:order-1" data-aos="fade-up-right" data-aos-delay="100">

        <div class="inline-flex space-x-2 mb-6 p-1 bg-gray-100 rounded-full shadow-inner" role="tablist" aria-label="Toggle Kelola Fasilitas">
            <button id="btnPemilikLapangan" role="tab" aria-selected="true" aria-controls="contentPemilikLapangan" tabindex="0"
                    class="bg-blue-700 text-white text-sm font-bold rounded-full px-4 py-1.5 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50">
                PEMILIK LAPANGAN
            </button>
            <button id="btnPenyewaLapangan" role="tab" aria-selected="false" aria-controls="contentPenyewaLapangan" tabindex="-1"
                    class="bg-transparent text-gray-700 text-sm font-semibold rounded-full px-4 py-1.5 transition-all duration-300 hover:bg-white hover:shadow-sm focus:outline-none focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50">
                PENYEWA
            </button>
        </div>

        <div id="contentPemilikLapangan" role="tabpanel" aria-labelledby="btnPemilikLapangan" tabindex="0" class="space-y-4">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-snug">Kelola fasilitas lebih <span class="text-blue-700">praktis dan menguntungkan</span>.</h2>
            <p class="text-gray-700 max-w-lg text-base leading-relaxed">
                Waktunya buat venue Anda lebih dari sekadar venue. Semuanya dimulai dengan pengelolaan yang simpel, fleksibel, dan profitable lewat OLGA SEHAT Venue Management.
            </p>
            <a href="#" class="inline-flex items-center text-blue-700 font-bold hover:text-blue-900 text-base transition-colors group">
                Lihat Selengkapnya
                <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>

        <div id="contentPenyewaLapangan" role="tabpanel" aria-labelledby="btnPenyewaLapangan" tabindex="0" class="hidden space-y-4">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-snug">Sewa lapangan dengan <span class="text-blue-700">mudah dan cepat</span>.</h2>
            <p class="text-gray-700 max-w-lg text-base leading-relaxed">
                Ada rencana berolahraga minggu ini tapi belum tahu mau main di mana? Atau tidak sempat jauh-jauh datang ke venue hanya untuk booking lapangan? Kami punya solusinya!
            </p>
            <a href="#" class="inline-flex items-center text-blue-700 font-bold hover:text-blue-900 text-base transition-colors group">
                Lihat Selengkapnya
                <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>
    </div>

    <div class="lg:w-1/2 grid grid-cols-2 gap-3 lg:gap-4 order-1 lg:order-2" id="imageContainerPemilikLapangan" data-aos="fade-up-left" data-aos-delay="200">
        <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="MU Sport Center"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Imbo Sport Center"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="DC Arena Bali"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Arena Sport"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
    </div>

    <div class="lg:w-1/2 grid grid-cols-2 gap-3 lg:gap-4 hidden order-1 lg:order-2" id="imageContainerPenyewaLapangan">
        <img src="{{ asset('assets/gambar-penyewa-1.jpg') }}" alt="Penyewa Lapangan 1"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/gambar-penyewa-2.jpg') }}" alt="Penyewa Lapangan 2"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/gambar-penyewa-3.jpg') }}" alt="Penyewa Lapangan 3"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/gambar-penyewa-4.jpg') }}" alt="Penyewa Lapangan 4"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
    </div>
</section>

<section class="container mx-auto px-6 py-12 md:py-16 flex flex-col lg:flex-row items-center lg:items-center lg:space-x-10 max-w-6xl" data-aos="fade-up">

    <div class="lg:w-1/2 grid grid-cols-2 gap-3 lg:gap-4 mb-8 lg:mb-0 order-1 lg:order-1" id="imageContainerPemilikKesehatan" data-aos="fade-up-left" data-aos-delay="100">
        <img src="{{ asset('assets/MU Sport Center.jpeg') }}" alt="Klinik 1"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/Imbo Sport Center.webp') }}" alt="Fisio 2"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/DC Arena Bali.jpeg') }}" alt="Gym 3"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Checkup 4"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
    </div>

    <div class="lg:w-1/2 order-2 lg:order-2" data-aos="fade-up-right" data-aos-delay="200">

        <div class="inline-flex space-x-2 mb-6 p-1 bg-gray-100 rounded-full shadow-inner" role="tablist" aria-label="Toggle Kelola Fasilitas Kesehatan">
            <button id="btnPemilikKesehatan" role="tab" aria-selected="true" aria-controls="contentPemilikKesehatan" tabindex="0"
                    class="bg-blue-700 text-white text-sm font-bold rounded-full px-4 py-1.5 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50">
                PEMILIK KESEHATAN
            </button>
            <button id="btnPenyewaKesehatan" role="tab" aria-selected="false" aria-controls="contentPenyewaKesehatan" tabindex="-1"
                    class="bg-transparent text-gray-700 text-sm font-semibold rounded-full px-4 py-1.5 transition-all duration-300 hover:bg-white hover:shadow-sm focus:outline-none focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50">
                PENYEWA
            </button>
        </div>

        <div id="contentPemilikKesehatan" role="tabpanel" aria-labelledby="btnPemilikKesehatan" tabindex="0" class="space-y-4">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-snug">Kelola layanan kesehatan lebih <span class="text-blue-700">mudah dan menguntungkan</span>.</h2>
            <p class="text-gray-700 max-w-lg text-base leading-relaxed">
                Waktunya buat tempat sehat Anda jadi lebih dari sekadar fasilitas. Semuanya dimulai dengan pengelolaan yang simpel, fleksibel, dan profitable lewat OLGA SEHAT Health Management.
            </p>
            <a href="#" class="inline-flex items-center text-blue-700 font-bold hover:text-blue-900 text-base transition-colors group">
                Lihat Selengkapnya
                <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>

        <div id="contentPenyewaKesehatan" role="tabpanel" aria-labelledby="btnPenyewaKesehatan" tabindex="0" class="hidden space-y-4">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 leading-snug">Booking cek kesehatan dan klinik <span class="text-blue-700">lebih mudah</span>.</h2>
            <p class="text-gray-700 max-w-lg text-base leading-relaxed">
                Cari fasilitas kesehatan terdekat, seperti klinik, fisioterapi, dan pusat kebugaran. Jadwalkan sesi Anda tanpa ribet. Kesehatan Anda kini di ujung jari.
            </p>
            <a href="#" class="inline-flex items-center text-blue-700 font-bold hover:text-blue-900 text-base transition-colors group">
                Lihat Selengkapnya
                <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
            </a>
        </div>
    </div>

    <div class="lg:w-1/2 grid grid-cols-2 gap-3 lg:gap-4 hidden order-1 lg:order-1" id="imageContainerPenyewaKesehatan">
        <img src="{{ asset('assets/gambar-kesehatan-penyewa-1.jpg') }}" alt="Penyewa Kesehatan 1"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/gambar-kesehatan-penyewa-2.jpg') }}" alt="Penyewa Kesehatan 2"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/gambar-kesehatan-penyewa-3.jpg') }}" alt="Penyewa Kesehatan 3"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
        <img src="{{ asset('assets/gambar-kesehatan-penyewa-4.jpg') }}" alt="Penyewa Kesehatan 4"
             class="rounded-xl shadow-xl object-cover h-36 md:h-48 w-full transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl" />
    </div>
</section>

<section class="bg-gray-50 py-16 md:py-20" data-aos="fade-up">
    <div class="container mx-auto px-6 text-center max-w-6xl">

        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900 leading-tight" data-aos="fade-up" data-aos-delay="100">
            Temukan <span class="text-blue-700">Komunitas & Aktivitas</span> Favoritmu!
        </h2>
        <p class="text-gray-600 mb-10 max-w-3xl mx-auto text-lg leading-relaxed" data-aos="fade-up" data-aos-delay="200">
            Buat kegiatan seru bersama Olga Sehat! Komunitas, Membership, atau Event Seru dari berbagai kegiatan olahraga di sekitarmu. Saatnya jalin silaturahmi dan tambah semangat di lapangan!
        </p>

        <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 mb-14" data-aos="fade-up" data-aos-delay="300">

            <a href="/buat-aktivitas" class="block w-full sm:w-auto">
            <button class="bg-blue-700 text-white text-sm font-bold rounded-full px-6 py-3 shadow-lg hover:bg-blue-800 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-400 focus:ring-opacity-50">
                <i class="fas fa-plus-circle mr-2"></i> BUAT AKTIVITAS BARU
            </button>
            </a>

            <a href="/communityuser" class="block w-full sm:w-auto">
            <button class="w-full bg-white text-gray-800 text-sm font-bold rounded-full px-6 py-3 border border-gray-300 shadow-md hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">
                <i class="fas fa-users mr-2"></i> GABUNG AKTIVITAS
            </button>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="300">

            <div class="relative group overflow-hidden rounded-xl shadow-xl transform transition duration-500 hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="400">
                <img src="{{ asset('assets/komunitas.png') }}" alt="Komunitas Futsal Jakarta"
                            class="object-cover h-56 md:h-64 w-full transition duration-500 group-hover:opacity-85" />
                <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-start justify-end p-4">
                <span class="inline-block bg-green-600 text-white text-xs font-bold px-2 py-0.5 rounded-full mb-2">KOMUNITAS</span>
                    <h3 class="text-white text-lg font-bold">Kumpulan Pemuda Futsal</h3>
                </div>
            </div>

            <div class="relative group overflow-hidden rounded-xl shadow-xl transform transition duration-500 hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="500">
                <img src="{{ asset('assets/komunitas1.png') }}" alt="Komunitas Basket Surabaya"
                            class="object-cover h-56 md:h-64 w-full transition duration-500 group-hover:opacity-85" />
                <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-start justify-end p-4">
                <span class="inline-block bg-yellow-600 text-white text-xs font-bold px-2 py-0.5 rounded-full mb-2">MEMBERSHIP</span>
                    <h3 class="text-white text-lg font-bold">The SportMan Club Denpasar</h3>
                </div>
            </div>

            <div class="relative group overflow-hidden rounded-xl shadow-xl transform transition duration-500 hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="600">
                <img src="{{ asset('assets/komunitas2.png') }}" alt="Komunitas Badminton Bandung"
                            class="object-cover h-56 md:h-64 w-full transition duration-500 group-hover:opacity-85" />
                <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col items-start justify-end p-4">
                <span class="inline-block bg-blue-600 text-white text-xs font-bold px-2 py-0.5 rounded-full mb-2">
                    EVENT OLAHRAGA
                </span>
                <h3 class="text-white text-lg font-bold leading-snug">
                    Badminton Warriors BDG Championship
                </h3>
                </div>
            </div>

        </div>

        <a href="/community" class="inline-flex items-center text-blue-700 font-bold mt-12 hover:text-blue-900 text-lg transition-colors group">
            Lihat Semua Aktivitas
            <i class="fas fa-arrow-right ml-3 transition-transform group-hover:translate-x-1"></i>
        </a>
    </div>
</section>

<section class="relative h-auto py-16 md:py-24 overflow-hidden"
    style="background-image: url('{{ asset('assets/banten-indonesia-august-02-2022-600nw-2455954305.webp') }}'); background-attachment: fixed; background-size: cover; background-position: center;" data-aos="fade-up">

    <div class="absolute inset-0 bg-black bg-opacity-80 backdrop-blur-sm"></div>

    <div class="relative container mx-auto px-6 flex flex-col justify-center items-center text-white max-w-6xl">

        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-12 text-center max-w-4xl leading-snug" data-aos="fade-up" data-aos-delay="100">
            Mengapa <span class="text-blue-400">Olga Sehat</span> Adalah Pilihan Terbaik?
        </h2>

        <div class="flex overflow-x-auto w-full pb-4 snap-x snap-mandatory lg:grid lg:grid-cols-4 lg:gap-5 max-w-full lg:max-w-none" data-aos="fade-up" data-aos-delay="200">

            <div class="flex-shrink-0 w-72 md:min-w-72 lg:w-auto snap-center mr-4 lg:mr-0
                        bg-white/10 backdrop-blur-sm rounded-xl p-5 md:p-6 flex flex-col items-center space-y-4 border border-white/30 shadow-xl
                        transform transition-all duration-300 hover:bg-white/20 hover:scale-[1.03] hover:border-blue-400" data-aos="fade-up" data-aos-delay="300">
                <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                    <i class="fas fa-handshake"></i>
                </div>
                <p class="text-center font-bold text-base md:text-lg leading-snug">Layanan Fasilitas Olahraga & Kesehatan Terintegrasi</p>
                <p class="text-xs text-white/80">Temukan lapangan, studio, hingga layanan fisioterapi dalam satu platform.</p>
            </div>

            <div class="flex-shrink-0 w-72 md:min-w-72 lg:w-auto snap-center mr-4 lg:mr-0
                        bg-white/10 backdrop-blur-sm rounded-xl p-5 md:p-6 flex flex-col items-center space-y-4 border border-white/30 shadow-xl
                        transform transition-all duration-300 hover:bg-white/20 hover:scale-[1.03] hover:border-blue-400" data-aos="fade-up" data-aos-delay="400">
                <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <p class="text-center font-bold text-base md:text-lg leading-snug">Dipilih Khusus Berdasarkan Lokasi Terdekat</p>
                <p class="text-xs text-white/80">Cari venue favorit di sekitar Anda dengan akurasi tinggi dan rekomendasi terbaik.</p>
            </div>

            <div class="flex-shrink-0 w-72 md:min-w-72 lg:w-auto snap-center mr-4 lg:mr-0
                        bg-white/10 backdrop-blur-sm rounded-xl p-5 md:p-6 flex flex-col items-center space-y-4 border border-white/30 shadow-xl
                        transform transition-all duration-300 hover:bg-white/20 hover:scale-[1.03] hover:border-blue-400" data-aos="fade-up" data-aos-delay="500">
                <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <p class="text-center font-bold text-base md:text-lg leading-snug">Booking dan Pembayaran Jadi Praktis</p>
                <p class="text-xs text-white/80">Jadwalkan dan bayar sesi Anda secara online, kapan saja, 24/7 tanpa ribet.</p>
            </div>

            <div class="flex-shrink-0 w-72 md:min-w-72 lg:w-auto snap-center
                        bg-white/10 backdrop-blur-sm rounded-xl p-5 md:p-6 flex flex-col items-center space-y-4 border border-white/30 shadow-xl
                        transform transition-all duration-300 hover:bg-white/20 hover:scale-[1.03] hover:border-blue-400" data-aos="fade-up" data-aos-delay="600">
                <div class="w-14 h-14 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <p class="text-center font-bold text-base md:text-lg leading-snug">Pelayanan Terbaik dan Vendor Terverifikasi</p>
                <p class="text-xs text-white/80">Kami hanya bekerjasama dengan mitra yang terverifikasi untuk pengalaman terbaik Anda.</p>
            </div>

        </div>
        </div>
</section>

<section class="container mx-auto px-6 py-16 md:py-20" data-aos="fade-up">
    <div class="max-w-6xl mx-auto flex flex-col lg:flex-row rounded-2xl overflow-hidden shadow-2xl bg-white">

        <div class="lg:w-1/3 bg-blue-700 bg-cover bg-center flex items-center justify-center p-8 md:p-10 min-h-56 lg:min-h-full"
             style="background-image: url('{{ asset('assets/blue-banner.png') }}'); background-blend-mode: multiply; background-color: rgba(29, 78, 216, 0.85);" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-white text-3xl md:text-4xl font-extrabold text-center relative z-10">
                Apa Kata Mereka?
            </h2>
        </div>

        <div class="lg:w-2/3 bg-white p-6 md:p-10 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200">
            <div id="testimonial-container" class="relative min-h-[250px] md:min-h-[180px]">

                <div class="testimonial-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100">
                    <div class="flex items-start space-x-4 mb-4">
                        <img src="{{ asset('assets/Goes Natha bos .jpg') }}" alt="Ir. Bagus Nathaniel Mahendra" class="w-14 h-14 rounded-full object-cover border-3 border-gray-100" />
                        <div>
                            <p class="font-bold text-lg sm:text-xl text-gray-900 leading-snug">Ir. Bagus Nathaniel Mahendra, M.Eng.</p>
                            <p class="text-sm text-blue-700 font-semibold mt-0.5">Backbone Indonesia</p>
                        </div>
                        <div class="text-blue-200 text-5xl font-extrabold select-none ml-auto hidden md:block">“</div>
                    </div>
                    <p class="text-gray-800 text-base md:text-lg leading-relaxed italic border-l-4 border-blue-500 pl-4 py-1">
                        "Olga Sehat membawa revolusi di kalangan penggemar olahraga. Aplikasi ini memudahkan pencarian aktivitas olahraga, mengembangkan komunitas olahraga, dan memesan tempat olahraga. Ini adalah ekosistem olahraga yang menyeluruh."
                    </p>
                </div>

                <div class="testimonial-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none">
                    <div class="flex items-start space-x-4 mb-4">
                        <img src="{{ asset('assets/ir_bagus.jpg') }}" alt="Testimonial User 2" class="w-14 h-14 rounded-full object-cover border-3 border-gray-100" />
                        <div>
                            <p class="font-extrabold text-lg sm:text-xl text-gray-900 leading-snug">Testimonial User 2</p>
                            <p class="text-sm text-blue-700 font-semibold mt-0.5">Company 2</p>
                        </div>
                        <div class="text-blue-200 text-5xl font-extrabold select-none ml-auto hidden md:block">“</div>
                    </div>
                    <p class="text-gray-800 text-base md:text-lg leading-relaxed italic border-l-4 border-blue-500 pl-4 py-1">
                        "Sewa lapangan jadi sangat mudah dan cepat! Saya tidak perlu repot lagi datang ke venue untuk sekedar booking. Sangat direkomendasikan untuk komunitas olahraga."
                    </p>
                </div>

                <div class="testimonial-item absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none">
                    <div class="flex items-start space-x-4 mb-4">
                        <img src="{{ asset('assets/ir_bagus.jpg') }}" alt="Testimonial User 3" class="w-14 h-14 rounded-full object-cover border-3 border-gray-100" />
                        <div>
                            <p class="font-extrabold text-lg sm:text-xl text-gray-900 leading-snug">Testimonial User 3</p>
                            <p class="text-sm text-blue-700 font-semibold mt-0.5">Company 3</p>
                        </div>
                        <div class="text-blue-200 text-5xl font-extrabold select-none ml-auto hidden md:block">“</div>
                    </div>
                    <p class="text-gray-800 text-base md:text-lg leading-relaxed italic border-l-4 border-blue-500 pl-4 py-1">
                        "Manajemen venue kami menjadi sangat efisien sejak menggunakan Olga Sehat. Proses booking, pembayaran, dan penjadwalan lapangan bisa kami lakukan dari satu platform."
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6 pt-3 border-t border-gray-100">
                <span id="testimonial-counter" class="text-sm font-bold text-blue-700 tracking-wider">01/03</span>

                <div class="flex space-x-3">
                    <button id="prev-btn" aria-label="Previous"
                            class="text-blue-700 hover:text-white w-8 h-8 flex items-center justify-center rounded-full bg-white border border-blue-700/50
                                   hover:bg-blue-700 transition-all duration-200 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="next-btn" aria-label="Next"
                            class="text-blue-700 hover:text-white w-8 h-8 flex items-center justify-center rounded-full bg-white border border-blue-700/50
                                   hover:bg-blue-700 transition-all duration-200 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true,
  });
</script>
