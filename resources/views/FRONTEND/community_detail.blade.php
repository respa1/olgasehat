@extends('FRONTEND.layout.frontend')

@section('content')

    <main class="container mx-auto px-6 py-24">
    <div class="flex flex-col md:flex-row md:space-x-12">
        
        <div class="md:flex-1">
            
            <img 
                src="assets/venue-image.jpg" 
                alt="Gambar Venue Komunitas" 
                class="w-full h-64 object-cover rounded-xl shadow-lg mb-8" 
            />
            
            <div class="flex items-start space-x-5 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Kumpulan Pemuda Futsal Coach Bagus</h1>
                    
                    <div class="flex flex-wrap items-center text-gray-600 text-sm mt-2"> 
                        <div class="flex items-center space-x-1 pr-4 border-r border-gray-300">
                            <i class="fas fa-trophy text-blue-600"></i>
                            <span>Futsal</span>
                        </div>
                        <div class="flex items-center space-x-1 px-4 border-r border-gray-300">
                            <i class="fas fa-city text-blue-600"></i>
                            <span>Kota Denpasar</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-3 border-b pb-1">Deskripsi Komunitas</h2>
                <p class="text-gray-700 leading-relaxed">
                    have fun : varian sparing 1. miring Rp. 150.000 / Rp. 95.000 2. Lapangan Rp. 245.000 3. Lapangan + Air Rp. 300.000
                </p>
            </div>
            
        </div>

        <div class="md:w-80 mt-8 md:mt-0">
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 shadow-lg">
                <p class="text-3xl font-extrabold text-blue-800 mb-1">Gratis</p>
                
                <button class="w-full bg-blue-700 text-white py-3 rounded-xl font-bold text-lg hover:bg-blue-600 transition mb-6 shadow-md">
                    JOIN SEKARANG
                </button>
                
            </div>
        </div>
    </div>

    <section class="mt-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Komunitas Terkait Lainnya</h2>
        </section>
</main>

   @endsection