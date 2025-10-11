@extends('FRONTEND.layout.frontend')

@section('content')

  <main class="container mx-auto px-6 pt-16 pb-8">
    <div class="flex flex-col md:flex-row md:space-x-12">
        <div class="md:flex-1">
            <div class="flex items-center space-x-4 mb-6">
                <img src="assets/foerda-icon.png" alt="Umbu Fc Logo" class="w-20 h-20 rounded-full object-cover" />
                <div>
                    <h1 class="text-2xl font-bold">FOERDA 61</h1>
                    
                    <div class="flex flex-wrap items-center text-gray-600 text-sm mt-1"> 
                        <div class="flex items-center space-x-1 pr-4 border-r border-gray-300">
                            <i class="fas fa-trophy"></i>
                            <span>Mini Soccer</span>
                        </div>
                        <div class="flex items-center space-x-1 px-4 border-r border-gray-300">
                            <i class="fas fa-city"></i>
                            <span>Kota Denpasar Utara</span>
                        </div>
                        <div class="flex items-center space-x-1 pl-4">
                            <i class="fas fa-shield-alt"></i>
                            <span>Level Putih I</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <h2 class="font-semibold mb-2">Deskripsi Sparring</h2>
                <p class="text-gray-700 text-sm leading-relaxed">
                    have fun : varian sparing 1. miring Rp. 150.000 / Rp. 95.000 2. Lapangan Rp. 245.000 3. Lapangan + Air Rp. 300.000
                </p>
            </div>
            
            <div class="mb-12"> 
                <h2 class="font-semibold mb-2">Lokasi Venue</h2>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Jl. Nuansa Indah Selatan Utara I No.1, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80118
                </p>
            </div>
        </div>
        
        <div class="md:w-72 mt-8 md:mt-0">
            <div class="border border-gray-200 rounded-lg p-6 shadow-sm">
                <p class="text-2xl font-bold mb-1">Rp. 245,000</p>
                <p class="text-xs text-gray-500 mb-4">Wajib DP · Rp. 150,000</p>
                <button class="w-full bg-blue-700 text-white py-2 rounded-md font-semibold hover:bg-blue-800 transition mb-6">JOIN</button>
                <div class="space-y-4 text-gray-700 text-sm">
                    <div class="flex items-center space-x-2">
                        <i class="far fa-calendar-alt"></i>
                        <span>Thursday, 28 Aug 2025 · 21:00 - 22:00</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Nuansa Indah Selatan Utara I No.1, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80118</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-12">
        <h2 class="text-xl font-bold mb-6">main.Sparring Lainnya</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
                <div class="flex items-center space-x-4 mb-3">
                    <img src="assets/YOUNG_BOYS.png" alt="Young Boys Logo" class="w-12 h-12 rounded-full object-cover" />
                    <div>
                        <p class="text-xs text-gray-500">Futsal</p>
                        <h3 class="font-semibold text-lg">Young Boys</h3>
                        <p class="text-xs text-gray-600 flex items-center space-x-1">
                            <i class="fas fa-shield-alt text-gray-400"></i>
                            <span>Level Putih I</span>
                        </p>
                    </div>
                </div>
                <div class="text-xs text-gray-500 space-y-1">
                    <p class="flex items-center space-x-2">
                        <i class="far fa-calendar-alt"></i>
                        <span>29 August 2025 · 21:00</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Nirwana Futsal, Nirwana Futsal, Kota Jakarta Barat</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-wallet"></i>
                        <span>Biaya · 120,000</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-hand-holding-dollar"></i>
                        <span>Dp · 0</span>
                    </p>
                </div>
            </article>

            <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
                <div class="flex items-center space-x-4 mb-3">
                    <img src="assets/ABC_FUTSAL_CLUB.png" alt="ABC Futsal Club Logo" class="w-12 h-12 rounded-full object-cover" />
                    <div>
                        <p class="text-xs text-gray-500">Futsal</p>
                        <h3 class="font-semibold text-lg">ABC FUTSAL CLUB</h3>
                        <p class="text-xs text-gray-600 flex items-center space-x-1">
                            <i class="fas fa-shield-alt text-gray-400"></i>
                            <span>Level Putih I</span>
                        </p>
                    </div>
                </div>
                <div class="text-xs text-gray-500 space-y-1">
                    <p class="flex items-center space-x-2">
                        <i class="far fa-calendar-alt"></i>
                        <span>07 September 2025 · 20:00</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>W A 0 8 1 2 1 3 0 5 9 3 3 8, Tifosi Sport Center, Kota Jakarta Barat</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-wallet"></i>
                        <span>Biaya · 150,000</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-hand-holding-dollar"></i>
                        <span>Dp · 0</span>
                    </p>
                </div>
            </article>

            <article class="border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition">
                <div class="flex items-center space-x-4 mb-3">
                    <img src="assets/ABC_FUTSAL_CLUB.png" alt="ABC Futsal Club Logo" class="w-12 h-12 rounded-full object-cover" />
                    <div>
                        <p class="text-xs text-gray-500">Futsal</p>
                        <h3 class="font-semibold text-lg">ABC FUTSAL CLUB</h3>
                        <p class="text-xs text-gray-600 flex items-center space-x-1">
                            <i class="fas fa-shield-alt text-gray-400"></i>
                            <span>Level Putih I</span>
                        </p>
                    </div>
                </div>
                <div class="text-xs text-gray-500 space-y-1">
                    <p class="flex items-center space-x-2">
                        <i class="far fa-calendar-alt"></i>
                        <span>31 August 2025 · 20:00</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>W A 0 8 1 2 1 3 0 5 9 3 3 8, Tifosi Sport Center, Kota Jakarta Barat</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-wallet"></i>
                        <span>Biaya · 150,000</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <i class="fas fa-hand-holding-dollar"></i>
                        <span>Dp · 0</span>
                    </p>
                </div>
            </article>
        </div>
        <div class="text-center mt-6">
            <a href="#" class="text-red-700 font-semibold inline-flex items-center space-x-1 hover:underline">
                <span>Tampilkan Lebih Banyak</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>
</main>

@endsection
