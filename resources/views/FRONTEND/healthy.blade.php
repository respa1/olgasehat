@extends('FRONTEND.layout.frontend')

@section('content')

<section class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white relative overflow-hidden h-[350px] flex items-center justify-center" style="background-size: 1910px 350px;">
    <div class="absolute inset-0 bg-blue-900 bg-opacity-30"></div>
    <div class="container mx-auto px-6 text-center w-full relative z-10">
        <h1 class="text-3xl md:text-5xl font-extrabold tracking-wide mt-10">
            Dukungan Kesehatan Optimal untuk Gaya Hidup Aktif.
        </h1>
        <p class="text-lg mt-3 opacity-90 max-w-3xl mx-auto">
            Temukan Layanan Kesehatan, Fisioterapi, dan Cek Medis Terdekat yang teruji dan terpercaya.
        </p>
    </div>
</section>

<section class="container mx-auto px-6 py-8">
    <form class="flex flex-wrap gap-4 justify-center md:justify-start items-stretch">
        
        <div class="relative flex-grow min-w-full sm:min-w-[300px]">
            <input
                type="text"
                id="unifiedSearch"
                placeholder="Cari layanan (e.g., Fisioterapi, Cek Kolesterol, Klinik Mata)"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 h-full text-gray-700 placeholder-gray-500 focus:outline-none focus:border-blue-500 transition duration-150"
            />
            <div id="suggestionsDropdown" class="absolute top-full left-0 w-full bg-white border border-gray-300 rounded-lg shadow-xl max-h-60 overflow-y-auto hidden z-10 mt-1">
            </div>
        </div>
        
        <select
            class="border border-gray-300 rounded-lg px-4 py-2.5 min-w-[180px] w-full sm:w-auto text-gray-700 focus:outline-none focus:border-blue-500 transition duration-150"
        >
            <option disabled selected class="text-gray-500">Kategori Layanan</option>
            <option>Fisioterapi & Cedera</option>
            <option>Medical Check-Up</option>
            <option>Dokter Spesialis</option>
            <option>Nutrisi & Gizi</option>
        </select>
        
        <input
            type="date"
            class="border border-gray-300 rounded-lg px-4 py-2.5 min-w-[160px] w-full sm:w-auto text-gray-700 focus:outline-none focus:border-blue-500 transition duration-150"
        />
        
         <button
            type="submit"
            class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition min-w-full sm:min-w-[150px]"
        >
            Cari Layanan
        </button>
    </form>
</section>

<section class="container mx-auto px-6 pb-12">
    <h2 class="font-bold text-2xl mb-8 text-gray-800">
        Nikmati <span class="text-green-600">6 Layanan Unggulan</span> Terdekat
    </h2>
    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8"
        aria-label="Daftar layanan kesehatan"
    >
        
        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/fisioterapi.jpg" 
                    alt="Layanan Fisioterapi Olahraga"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Klinik | Fisioterapi</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Bali Sport Physio Center</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Kota Denpasar
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp200,000</span> /Sesi
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                    <div class="flex flex-wrap gap-2">
                        <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                        08.00
                        </button>
                        <button disabled class="bg-gray-200 text-gray-500 text-xs rounded-lg px-3 py-1 cursor-not-allowed">
                        18.00
                        </button>
                        <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                        20.00
                        </button>
                        <button disabled class="bg-gray-200 text-gray-500 text-xs rounded-lg px-3 py-1 cursor-not-allowed">
                        22.00
                        </button>
                    </div>
                    </div>
                </div>
            </article>
        </a>

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/checkup.jpg"
                    alt="Medical Check Up"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Lab | MCU</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Pro Lab Wellness</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Kota Denpasar
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp450,000</span> /Paket
                    </p>

                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                    <div class="flex flex-wrap gap-2">
                        <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                        08.00
                        </button>
                        <button disabled class="bg-gray-200 text-gray-500 text-xs rounded-lg px-3 py-1 cursor-not-allowed">
                        18.00
                        </button>
                        <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                        20.00
                        </button>
                        <button disabled class="bg-gray-200 text-gray-500 text-xs rounded-lg px-3 py-1 cursor-not-allowed">
                        22.00
                        </button>
                    </div>
                    </div>
                </div>
            </article>
        </a>

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/dokter.jpg"
                    alt="Konsultasi Dokter"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Klinik | Dokter Umum</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Klinik Sehat Denpasar</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Kota Denpasar
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp80,000</span> /Sesi
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                        <div class="flex flex-wrap gap-2">
                            <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                            10.00
                            </button>
                            <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                            15.00
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        </a>
        
        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/fisioterapi2.jpg"
                    alt="Fisioterapi Recovery"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Klinik | Fisioterapi</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Recovery & Care Clinic</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Badung
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp220,000</span> /Sesi
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium">
                                11.00
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </a>

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/nutrisi.jpg"
                    alt="Konsultasi Ahli Gizi"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Konsultasi | Gizi</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Bali Diet Specialist</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Kota Denpasar
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp150,000</span> /Sesi
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium">
                                08.00
                            </span>
                            <span class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium">
                                16.00
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </a>

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/lab24.jpg"
                    alt="Layanan Lab 24 Jam"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Lab | 24 Jam</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Lab Cek Cepat Mandiri</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Seluruh Denpasar
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp120,000</span> /Tes
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Ketersediaan</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-yellow-100 text-yellow-700 text-xs rounded-lg px-3 py-1 font-medium">
                                Tersedia 24 Jam
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </a>
        
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-16 bg-gray-50 rounded-xl shadow-inner mb-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-900">Mengapa Memilih Layanan Kesehatan di OLGA SEHAT?</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        
        <div class="p-4">
            <i class="fas fa-user-md text-6xl text-green-600 mb-4"></i>
            <h3 class="font-semibold text-xl mb-2 text-gray-900">Spesialis Olahraga</h3>
            <p class="text-gray-600">Tim medis profesional yang berpengalaman dalam penanganan cedera dan kesehatan atlet.</p>
        </div>
        
        <div class="p-4">
            <i class="fas fa-hospital-alt text-6xl text-green-600 mb-4"></i>
            <h3 class="font-semibold text-xl mb-2 text-gray-900">Mitra Terpercaya</h3>
            <p class="text-gray-600">Bermitra dengan klinik, lab, dan rumah sakit yang teruji kualitas dan akreditasinya.</p>
        </div>
        
        <div class="p-4">
            <i class="fas fa-calendar-check text-6xl text-green-600 mb-4"></i>
            <h3 class="font-semibold text-xl mb-2 text-gray-900">Booking Fleksibel</h3>
            <p class="text-gray-600">Pesan jadwal cek kesehatan atau fisioterapi dengan mudah, kapan saja dan di mana saja.</p>
        </div>
    </div>
</section>

<section class="pb-24 md:pb-32">
    <nav aria-label="Pagination" class="flex justify-center space-x-2 px-4">
        <button aria-label="Previous page" class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed" disabled>
            <i class="fas fa-arrow-left"></i>
        </button>
        <button class="w-10 h-10 rounded-lg bg-green-600 text-white font-semibold">1</button>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 hidden sm:flex items-center justify-center">2</button>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 hidden sm:flex items-center justify-center">3</button>
        <span class="inline-flex items-center px-2 text-gray-700 select-none">...</span>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200">63</button>
        <button aria-label="Next page" class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 flex items-center justify-center">
            <i class="fas fa-arrow-right"></i>
        </button>
    </nav>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 mb-16">
    <h2 class="text-center font-bold text-3xl mb-10 text-gray-900">
        Pertanyaan Umum Seputar Layanan Kesehatan
    </h2>
    <div class="space-y-6 max-w-4xl mx-auto">
        
        <details class="border-b border-gray-200 pb-4 group bg-white shadow-sm rounded-lg p-4">
            <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-2 group-open:text-green-700">
                Apa perbedaan Layanan Kesehatan di Olga Sehat dengan klinik biasa?
                <i class="fas fa-plus text-gray-700 group-open:text-green-700 group-open:rotate-45 transition-transform"></i>
            </summary>
            <p class="text-base text-gray-600 mt-3 pl-4 border-l-4 border-green-200">
                Layanan di Olga Sehat memiliki fokus kuat pada <span class="font-medium">kedokteran olahraga, kebugaran, dan pemulihan cedera</span>. Kami bermitra dengan spesialis yang memahami kebutuhan unik gaya hidup aktif Anda.
            </p>
        </details>
        
        <details class="border-b border-gray-200 pb-4 group bg-white shadow-sm rounded-lg p-4">
            <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-2 group-open:text-green-700">
                Bisakah saya menggunakan asuransi untuk layanan medis di sini?
                <i class="fas fa-plus text-gray-700 group-open:text-green-700 group-open:rotate-45 transition-transform"></i>
            </summary>
            <p class="text-base text-gray-600 mt-3 pl-4 border-l-4 border-green-200">
                Beberapa mitra klinik kami menerima pembayaran asuransi. Detail penerimaan asuransi dan BPJS dapat Anda cek pada halaman detail masing-masing layanan.
            </p>
        </details>
        
        <details class="border-b border-gray-200 pb-4 group bg-white shadow-sm rounded-lg p-4">
            <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-2 group-open:text-green-700">
                Bagaimana cara booking sesi Fisioterapi atau Medical Check-Up?
                <i class="fas fa-plus text-gray-700 group-open:text-green-700 group-open:rotate-45 transition-transform"></i>
            </summary>
            <p class="text-base text-gray-600 mt-3 pl-4 border-l-4 border-green-200">
                Gunakan fitur pencarian di atas, pilih layanan dan lokasi yang Anda inginkan, lalu pilih jadwal yang tersedia. Anda akan menerima konfirmasi melalui email atau aplikasi kami.
            </p>
        </details>

        <details class="border-b border-gray-200 pb-4 group bg-white shadow-sm rounded-lg p-4">
            <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-2 group-open:text-green-700">
                Apakah ada layanan Home Visit (Panggilan ke Rumah)?
                <i class="fas fa-plus text-gray-700 group-open:text-green-700 group-open:rotate-45 transition-transform"></i>
            </summary>
            <p class="text-base text-gray-600 mt-3 pl-4 border-l-4 border-green-200">
                Ya, beberapa mitra Fisioterapi dan Lab kami menawarkan layanan <span class="font-medium">Home Visit</span>. Anda dapat mencari dan memfilter layanan yang memiliki label "Home Visit" di daftar layanan.
            </p>
        </details>

    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-16">
    <div class="bg-gray-900 text-white rounded-xl p-8 md:p-12 mx-auto space-y-5 w-full"> 
        <p class="text-sm font-normal opacity-70">Khusus Klinik, Fisioterapi, & Lab</p>
        <h2 class="text-3xl md:text-4xl font-bold leading-tight">
            Tingkatkan Jangkauan Layanan Kesehatan Anda
        </h2>
        <p class="text-base font-normal max-w-xl leading-relaxed opacity-90">
            Bergabunglah dengan jaringan mitra kami. Kelola jadwal, ketersediaan, dan janji temu pasien secara digital dan efisien di platform Olga Sehat.
        </p>
        <a 
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold text-base px-8 py-3 rounded-lg mt-4 transition duration-300 shadow-lg" 
            href="/daftar-mitra-kesehatan"
        >
            Daftar Mitra Kesehatan Sekarang
        </a>
    </div>
</section>

 @endsection