@extends('FRONTEND.layout.frontend')

@section('content')

  <section 
    class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white relative overflow-hidden flex items-center justify-center 
           min-h-[350px] sm:h-[300px] mt-16" 
    style="background-size: 1910px 400px;"
>
    <div class="container mx-auto px-6 text-center w-full flex flex-col items-center justify-center py-8">
        
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-3">
            Komunitas & Aktivitas Olga Sehat
        </h1>
        
        <p class="text-base sm:text-lg mb-6 max-w-2xl mx-auto opacity-90">
            Temukan klub olahraga, kelas terbuka (Open Class), atau lawan sparring. Mulai perjalanan #HidupLebihAktif Anda hari ini—semua GRATIS diakses!
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-4 w-full sm:w-auto">
            <a href="#daftar-komunitas" class="bg-white text-blue-700 py-3 px-8 rounded-full font-semibold text-lg shadow-lg hover:bg-gray-100 transition">
                Eksplor Aktivitas
            </a>
            <a href="#" class="bg-transparent border-2 border-white text-white py-3 px-8 rounded-full font-semibold text-lg shadow-lg hover:bg-white hover:text-blue-700 transition">
                Buat Aktivitas Baru
            </a>
        </div>
    </div>
</section>

  <main>
    <section class="bg-gray-50 py-10" id="filter-cepat">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Cari Berdasarkan Tipe Aktivitas</h2>
            
            <div class="flex flex-wrap justify-center gap-4">
                <a href="/komunitas?type=open-class" class="flex flex-col items-center p-4 w-32 rounded-lg bg-white shadow-md hover:shadow-lg transition">
                    <i class="fas fa-chalkboard-teacher text-3xl text-blue-600 mb-2"></i>
                    <span class="text-sm font-medium text-center">Komunitas</span>
                </a>

                <a href="/komunitas?type=klub" class="flex flex-col items-center p-4 w-32 rounded-lg bg-white shadow-md hover:shadow-lg transition">
                    <i class="fas fa-users text-3xl text-blue-600 mb-2"></i>
                    <span class="text-sm font-medium text-center">Membership</span>
                </a>
                
                <a href="/komunitas?type=event" class="flex flex-col items-center p-4 w-32 rounded-lg bg-white shadow-md hover:shadow-lg transition">
                    <i class="fas fa-calendar-alt text-3xl text-blue-600 mb-2"></i>
                    <span class="text-sm font-medium text-center">Event Olahraga</span>
                </a>
            </div>
            
            <div class="max-w-xl mx-auto mt-8 flex space-x-2">
                <input 
                    type="text" 
                    placeholder="Cari Kota atau Olahraga..." 
                    class="flex-grow p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                />
                <button class="bg-blue-700 text-white p-3 rounded-md font-semibold hover:bg-blue-800 transition">
                    Cari
                </button>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-6 py-12" id="daftar-komunitas">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            Nikmati Komunitas <span class="text-green-600">(Akses Gratis)</span>
        </h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            
            <a href="/community-detail" class="block group">
                <article class="bg-white rounded-lg shadow-lg overflow-hidden border-2 hover:shadow-xl transition relative">
                    <img src="assets/komunitas.png" alt="Open Class" class="w-full h-40 object-cover group-hover:scale-105 transition-transform" />
                    <div class="p-4">
                        <span class="inline-block bg-green-500 text-white text-xs font-bold px-2 py-0.5 rounded-full mb-2">KOMUNITAS</span>
                        <h3 class="font-bold text-md mb-1 text-gray-900">Kumpulan Pemuda Futsal</h3>
                        <p class="text-xs text-gray-500 mb-2">Coach Bagus </p>
                        <p class="text-xs text-gray-700 font-semibold flex items-center">
                            <i class="fas fa-wallet mr-2"></i> Bergabung Gratis
                        </p>
                    </div>
                </article>
            </a>
            
            <a href="/community-detail/2" class="block group">
                <article class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition relative">
                    <img src="assets/Arena Sport.jpg" alt="Sparring" class="w-full h-40 object-cover group-hover:scale-105 transition-transform" />
                    <div class="p-4">
                        <span class="inline-block bg-green-500 text-white text-xs font-bold px-2 py-0.5 rounded-full mb-2">KOMUNITAS</span>
                        <h3 class="font-bold text-md mb-1 text-gray-900">Info Cewe Area Denpasar</h3>
                        <p class="text-xs text-gray-500 mb-2">Budi Bawa</p>
                        <p class="text-xs text-gray-700 font-semibold flex items-center">
                            <i class="fas fa-wallet mr-2"></i> Bergabung Gratis
                        </p>
                    </div>
                </article>
            </a>
            
            <a href="/membership-detail" class="block group">
                <article class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition relative">
                    <img src="assets/DC Arena Bali.jpeg" alt="Klub" class="w-full h-40 object-cover group-hover:scale-105 transition-transform" />
                    <div class="p-4">
                        <span class="inline-block bg-yellow-600 text-white text-xs font-bold px-2 py-0.5 rounded-full mb-2">MEMBERSHIP</span>
                        <h3 class="font-bold text-md mb-1 text-gray-900">The SportMan Club Denpasar</h3>
                        <p class="text-xs text-gray-500 mb-2">MU Sport Center</p>
                        <p class="text-xs text-gray-700 font-semibold flex items-center">
                            <i class="fas fa-wallet mr-2"></i> Mulai Rp150.000 /bulan
                        </p>
                    </div>
                </article>
            </a>
            
            <a href="/community-detail/4" class="block group">
                <article class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition relative">
                    <img src="assets/MU Sport Center.webp" alt="Open Class" class="w-full h-40 object-cover group-hover:scale-105 transition-transform" />
                    <div class="p-4">
                        <span class="inline-block bg-yellow-600 text-white text-xs font-bold px-2 py-0.5 rounded-full mb-2">MEMBERSHIP</span>
                        <h3 class="font-bold text-md mb-1 text-gray-900">Bayu Gym Kuta</h3>
                        <p class="text-xs text-gray-500 mb-2">Instruktur Bli Ode</p>
                        <p class="text-xs text-gray-700 font-semibold flex items-center">
                            <i class="fas fa-wallet mr-2"></i> Mulai Rp750.000 /bulan
                        </p>
                    </div>
                </article>
            </a>

        </div>

        <div class="text-center mt-10">
            <a href="/semua-komunitas" class="text-blue-700 font-semibold inline-flex items-center space-x-2 border border-blue-700 py-2 px-6 rounded-full hover:bg-blue-50 transition">
                <span>Lihat Semua Aktivitas</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>
</main>

  @endsection