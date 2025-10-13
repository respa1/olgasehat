@extends('user.layout.frontenduser')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<section class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white relative overflow-hidden h-[300px] flex items-center justify-center" style="background-size: 1910px 300px;">
    <div class="absolute inset-0 bg-blue-900 bg-opacity-30"></div>
    
    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-wide mt-10">
            ARTIKEL & TIPS SEPUTAR OLAHRAGA
        </h1>
        <div class="mt-6 max-w-xl mx-auto shadow-lg">
            <div class="relative">
                <input
                    type="text"
                    placeholder="Cari artikel..."
                    class="w-full rounded-lg py-3 px-4 text-gray-800 text-base focus:outline-none focus:ring-4 focus:ring-blue-400 transition"
                />
                <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>
    </div>
</section>

<section class="container mx-auto px-4 sm:px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10 max-w-7xl">
    
    <aside class="md:col-span-1 space-y-6">
        <h2 class="text-lg font-bold text-gray-900 uppercase border-b-2 border-blue-500 pb-2">
            🔥 Trending Post
        </h2>
        <ol class="space-y-4">
            <li class="border-b border-gray-200 pb-3 last:border-b-0 last:pb-0">
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Strategi Hidrasi: Tips Minum Air yang Tepat Sebelum dan Sesudah Latihan
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-green-600 font-medium">KESEHATAN</span> - April 14, 2024
                </p>
            </li>
            <li class="border-b border-gray-200 pb-3 last:border-b-0 last:pb-0">
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Teknik Dasar Dribbling Futsal yang Wajib Dikuasai Pemula
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-blue-600 font-medium">OLAHRAGA</span> - May 18, 2024
                </p>
            </li>
            <li class="border-b border-gray-200 pb-3 last:border-b-0 last:pb-0">
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Pentingnya Asuransi Cedera untuk Atlet Amatir: Apa yang Harus Anda Tahu
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-yellow-600 font-medium">EDUKASI</span> - March 28, 2025
                </p>
            </li>
            <li class="border-b border-gray-200 pb-3 last:border-b-0 last:pb-0">
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Perbedaan Kunci antara Lapangan Mini Soccer dan Lapangan Sepak Bola Standar
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-blue-600 font-medium">OLAHRAGA</span> - July 29, 2024
                </p>
            </li>
            <li>
                <a href="#" class="text-base font-semibold text-gray-800 hover:text-blue-700 transition block">
                    Mengapa Pemanasan Dinamis Lebih Baik dari Statis Sebelum Berolahraga?
                </a>
                <p class="text-xs text-gray-500 mt-1">
                    <span class="text-green-600 font-medium">KESEHATAN</span> - July 29, 2024
                </p>
            </li>
        </ol>
    </aside>

    <main class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <a href="/bloguser_detail" class="block">
            <article class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition duration-300 group">
                <div class="relative overflow-hidden">
                    <img
                        src="assets/tenis.jpg"
                        alt="Asuransi Kesehatan"
                        class="w-full h-48 object-cover group-hover:scale-110 transition duration-500"
                    />
                    <p class="absolute top-3 left-3 bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">EDUKASI</p>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-700 transition leading-snug line-clamp-2">
                        Pentingnya Asuransi Cedera untuk Atlet Amatir: Apa yang Harus Anda Tahu
                    </h3>
                    <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                        Pelajari bagaimana asuransi dapat melindungi Anda dari biaya tak terduga akibat cedera saat berolahraga.
                    </p>
                    <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="font-semibold text-gray-700">oleh Bima</span>
                        <time datetime="2025-03-28">28 March 2025</time>
                    </div>
                </div>
            </article>
        </a>

        <a href="#" class="block">
            <article class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition duration-300 group">
                <div class="relative overflow-hidden">
                    <img
                        src="assets/tenis.jpg"
                        alt="Botol Minum"
                        class="w-full h-48 object-cover group-hover:scale-110 transition duration-500"
                    />
                    <p class="absolute top-3 left-3 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">KESEHATAN</p>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-700 transition leading-snug line-clamp-2">
                        Strategi Hidrasi: Tips Minum Air yang Tepat Sebelum dan Sesudah Latihan
                    </h3>
                    <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                        Jaga performa dan hindari dehidrasi! Ketahui waktu dan jumlah air ideal saat berolahraga.
                    </p>
                    <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="font-semibold text-gray-700">oleh Rina</span>
                        <time datetime="2024-04-14">14 April 2024</time>
                    </div>
                </div>
            </article>
        </a>

        <a href="#" class="block">
            <article class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition duration-300 group">
                <div class="relative overflow-hidden">
                    <img
                        src="assets/tenis.jpg"
                        alt="Pemain Futsal"
                        class="w-full h-48 object-cover group-hover:scale-110 transition duration-500"
                    />
                    <p class="absolute top-3 left-3 bg-blue-700 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">OLAHRAGA</p>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-700 transition leading-snug line-clamp-2">
                        Teknik Dasar Dribbling Futsal yang Wajib Dikuasai Pemula
                    </h3>
                    <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                        Kuasai kontrol bola di ruang sempit! Panduan langkah demi langkah untuk meningkatkan kemampuan dribbling futsal Anda.
                    </p>
                    <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="font-semibold text-gray-700">oleh Dedi</span>
                        <time datetime="2024-05-18">18 May 2024</time>
                    </div>
                </div>
            </article>
        </a>

        <a href="#" class="block">
            <article class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition duration-300 group">
                <div class="relative overflow-hidden">
                    <img
                        src="assets/tenis.jpg"
                        alt="Peregangan"
                        class="w-full h-48 object-cover group-hover:scale-110 transition duration-500"
                    />
                    <p class="absolute top-3 left-3 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">KESEHATAN</p>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-700 transition leading-snug line-clamp-2">
                        Mengapa Pemanasan Dinamis Lebih Baik dari Statis Sebelum Berolahraga?
                    </h3>
                    <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                        Mempelajari perbedaan antara pemanasan dinamis dan statis, dan mana yang paling efektif mencegah cedera.
                    </p>
                    <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="font-semibold text-gray-700">oleh Lina</span>
                        <time datetime="2024-07-29">29 July 2024</time>
                    </div>
                </div>
            </article>
        </a>
        
        <a href="#" class="block">
            <article class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition duration-300 group">
                <div class="relative overflow-hidden">
                    <img
                        src="assets/tenis.jpg"
                        alt="Sertifikasi Pelatih"
                        class="w-full h-48 object-cover group-hover:scale-110 transition duration-500"
                    />
                    <p class="absolute top-3 left-3 bg-yellow-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">EDUKASI</p>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-700 transition leading-snug line-clamp-2">
                        Mengenal Berbagai Tingkat Sertifikasi Kepelatihan Olahraga Profesional
                    </h3>
                    <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                        Panduan lengkap bagi yang ingin berkarir sebagai pelatih olahraga profesional.
                    </p>
                    <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="font-semibold text-gray-700">oleh Bima</span>
                        <time datetime="2024-09-01">01 September 2024</time>
                    </div>
                </div>
            </article>
        </a>
        
        <a href="#" class="block">
            <article class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] hover:shadow-xl transition duration-300 group">
                <div class="relative overflow-hidden">
                    <img
                        src="assets/tenis.jpg"
                        alt="Lapangan Tennis"
                        class="w-full h-48 object-cover group-hover:scale-110 transition duration-500"
                    />
                    <p class="absolute top-3 left-3 bg-blue-700 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">OLAHRAGA</p>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-lg text-gray-900 mb-3 group-hover:text-blue-700 transition leading-snug line-clamp-2">
                        Perbedaan Kunci Antara Lapangan Mini Soccer dan Lapangan Sepak Bola Standar
                    </h3>
                    <p class="text-gray-600 text-sm mb-5 line-clamp-3">
                        Menganalisis perbedaan ukuran, material, dan aturan main antara mini soccer dan sepak bola lapangan besar.
                    </p>
                    <div class="flex items-center justify-between text-xs text-gray-500 border-t pt-3">
                        <span class="font-semibold text-gray-700">oleh Dedi</span>
                        <time datetime="2024-07-29">29 July 2024</time>
                    </div>
                </div>
            </article>
        </a>
        
    </main>
</section>

<section class="pb-10 md:pb-16">
    <nav aria-label="Pagination" class="flex justify-center space-x-2 px-4">
        <button aria-label="Previous page" class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed" disabled>
            <i class="fas fa-arrow-left"></i>
        </button>

        <button class="w-10 h-10 rounded-lg bg-blue-700 text-white font-semibold">1</button>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 hidden sm:flex items-center justify-center">2</button>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 hidden sm:flex items-center justify-center">3</button>
        
        <span class="inline-flex items-center px-2 text-gray-700 select-none">...</span>
        
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 hidden sm:flex items-center justify-center">62</button>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200">63</button>

        <button aria-label="Next page" class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 flex items-center justify-center">
            <i class="fas fa-arrow-right"></i>
        </button>
    </nav>
</section>

@endsection