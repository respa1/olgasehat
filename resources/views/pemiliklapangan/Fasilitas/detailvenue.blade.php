@extends('pemiliklapangan.layout.ownervenue')

@section('content')

<div class="content-wrapper">
    <div class="container py-4">

    {{-- Breadcrumb --}}
    <div class="mb-3 text-sm text-gray-600">
        <a href="#">Kelola Fasilitas</a> - <span class="font-semibold">Detail Venue</span>
    </div>

    {{-- Card Utama --}}
    <div class="bg-white shadow rounded-2xl p-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between">

            {{-- Kiri: Logo & Info Venue --}}
            <div class="flex flex-col md:flex-row md:items-center gap-4">
                {{-- Logo --}}
                <div class="relative">
                    <img src="" alt="Logo" class="w-24 h-24 object-cover rounded-lg shadow">
                    <button class="absolute top-0 right-0 bg-white rounded-full p-1 shadow">
                        <i class="fas fa-pen text-gray-600"></i>
                    </button>
                </div>

                {{-- Info Venue --}}
                <div>
                    <h3 class="text-xl font-bold"></h3>
                    <p class="text-gray-500 text-sm"></p>

                    <div class="flex flex-wrap gap-4 mt-2">
                        <div>
                            <label class="text-xs text-gray-400">Username</label>
                            <p class="font-semibold"></p>
                        </div>

                        <div>
                            <label class="text-xs text-gray-400">Kontak</label>
                            <p class="font-semibold"></p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mt-2 text-gray-500 text-sm">
                        <i class="fas fa-map-marker-alt"></i> 
                        <span class="ml-2"><i class="fab fa-instagram"></i></span>
                    </div>
                </div>
            </div>

            {{-- Kanan: Tombol Aksi --}}
            <div class="flex gap-2 mt-3 md:mt-0">
                <a href="" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">QR Code</a>
                <a href="" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md">Preview Venue</a>
            </div>
        </div>

        {{-- Tabs --}}
        <div class="border-b border-gray-200 mt-4">
            <ul class="flex gap-6 text-sm font-medium text-gray-600">
                <li><a href="#" class="text-blue-600 border-b-2 border-blue-600 pb-2">Lapangan</a></li>
                <li><a href="#">Experience</a></li>
                <li><a href="#">Jam Operasional</a></li>
                <li><a href="#">Deskripsi</a></li>
                <li><a href="#">Syarat dan Ketentuan</a></li>
                <li><a href="#">Galeri</a></li>
            </ul>
        </div>

        {{-- Konten Tab Lapangan --}}
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                {{-- Card Tambah Lapangan --}}
                <div class="border-2 border-dashed border-blue-400 rounded-xl p-6 text-center hover:bg-blue-50 transition">
                    <div class="text-blue-500 text-4xl mb-2">+</div>
                    <h4 class="font-semibold mb-1">Tambah Lapangan</h4>
                    <p class="text-gray-500 text-sm mb-3">Anda dapat menambahkan lapangan di venue yang anda miliki dengan menekan tombol tambah</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah</button>
                </div>

                {{-- Contoh lapangan yang sudah ada --}}
                
                <div class="border rounded-xl p-4 shadow-sm">
                    <img src="" alt="" class="w-full h-32 object-cover rounded-md mb-2">
                    <h5 class="font-semibold"></h5>
                    <p class="text-gray-500 text-sm"></p>
                </div>
                

            </div>
        </div>
    </div>

</div>
</div>
@endsection