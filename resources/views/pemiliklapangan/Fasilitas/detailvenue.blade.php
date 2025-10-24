@extends('pemiliklapangan.layout.ownervenue')

@section('content')

<div class="content-wrapper">
    <div class="container py-4">

    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
    {{-- Header / Breadcrumbs --}}
    <div class="text-sm text-gray-500 mb-4">
        Detail Venue <span class="mx-1">/</span> Kelola Fasilitas <span class="mx-1">/</span> Detail Venue
    </div>

    <div class="bg-white shadow-xl rounded-lg overflow-hidden p-6">
        
        {{-- Venue Information Header --}}
        <div class="flex items-start justify-between border-b pb-6 mb-6">
            <div class="flex items-start">
                {{-- Logo Venue (Placeholder) --}}
                <div class="w-24 h-24 mr-6 bg-orange-500 rounded-full flex items-center justify-center p-2">
                    {{-- Ganti dengan logo Anda --}}
                    <svg class="w-full h-full text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17.93c-2.94-.48-5.36-2.61-6.52-5.46l2.12-.53c.96 2.05 2.87 3.52 5.16 3.73V13h-2V7h4v6h-2v4.93z"/></svg>
                </div>
                
                <div>
                    <h1 class="text-2xl font-bold text-gray-800"></h1>
                    <p class="text-sm text-gray-600 mb-4"></p>
                    
                    <div class="grid grid-cols-2 gap-x-8 text-sm">
                        <div>
                            <span class="font-semibold text-gray-700">Username:</span>
                            <span class="text-blue-600">Satria_Wintara</span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-700">Kontak:</span>
                            <span class="text-gray-700"></span>
                        </div>
                    </div>

                    {{-- Social Media Icons --}}
                    <div class="mt-4 flex space-x-3 text-xl text-gray-500">
                        <i class="fab fa-facebook-square hover:text-blue-700 cursor-pointer"></i>
                        <i class="fab fa-twitter-square hover:text-blue-400 cursor-pointer"></i>
                        <i class="fab fa-instagram hover:text-pink-600 cursor-pointer"></i>
                        <i class="fas fa-globe hover:text-green-600 cursor-pointer"></i>
                        <i class="fas fa-map-marker-alt hover:text-red-600 cursor-pointer"></i>
                        <i class="far fa-envelope hover:text-yellow-600 cursor-pointer"></i>
                        <i class="far fa-calendar-alt hover:text-purple-600 cursor-pointer"></i>
                        <span class="ml-2 text-gray-500 text-sm"></span>
                    </div>
                </div>
            </div>
            
            {{-- Action Buttons --}}
            <div class="flex space-x-3">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow">QR Code</button>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg shadow">Preview Venue</button>
                <button class="text-gray-500 hover:text-gray-700 text-lg">...</button>
            </div>
        </div>

        {{-- Navigation Tabs --}}
        <div class="border-b mb-6">
            <ul class="flex -mb-px text-sm font-medium text-center" role="tablist">
                {{-- Tab Aktif --}}
                <li class="mr-2">
                    <a class="inline-block p-4 border-b-2 border-blue-600 text-blue-600 font-bold" href="#">Lapangan</a>
                </li>
                {{-- Tab Lain --}}
                <li class="mr-2">
                    <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500" href="#">Experience</a>
                </li>
                <li class="mr-2">
                    <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500" href="#">Jam Operasional</a>
                </li>
                <li class="mr-2">
                    <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500" href="#">Deskripsi</a>
                </li>
                <li class="mr-2">
                    <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500" href="#">Syarat dan Ketentuan</a>
                </li>
                <li class="mr-2">
                    <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500" href="#">Galeri</a>
                </li>
            </ul>
        </div>

        {{-- Tab Content: Lapangan (Aktif) --}}
        <div id="lapangan-content">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                {{-- CARD: Tambah Lapangan --}}
                <div class="border-2 border-dashed border-blue-400 bg-blue-50 hover:bg-blue-100 transition-colors duration-200 rounded-lg p-6 text-center h-full flex flex-col justify-center items-center">
                    <i class="fas fa-plus text-blue-500 text-3xl mb-4"></i>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Tambah Lapangan</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Anda dapat menambahkan lapangan di venue yang anda miliki dengan menekan tombol tambah
                    </p>
                    {{-- Gunakan route name yang sudah Anda definisikan untuk proses create --}}
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg">
                        Tambah
                    </button>
                </div>

                {{-- LOOP: Lapangan yang Sudah Ada (jika $lapangans tidak kosong) --}}
                
                    {{-- Jika ada data Lapangan, tampilkan di sini. Misalnya: --}}
                    <div class="border border-gray-200 rounded-lg p-4 shadow">
                        <h4 class="font-bold text-lg"></h4>
                        <p class="text-sm text-gray-600"></p>
                    </div>
                
                    {{-- Jika Lapangan kosong, hanya card 'Tambah Lapangan' yang akan terlihat --}}
                

            </div>
        </div>
        
    </div>
</div>

</div>
</div>
@endsection