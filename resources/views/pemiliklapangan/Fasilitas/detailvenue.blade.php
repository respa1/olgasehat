@extends('pemiliklapangan.layout.ownervenue')

@section('content')

<div class="content-wrapper">
    <div class="container py-4">

        <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
            {{-- Header / Breadcrumbs --}}
            <div class="text-sm text-gray-500 mb-4">
                Detail Venue <span class="mx-1">/</span> Kelola Fasilitas <span class="mx-1">/</span> Detail Venue
            </div>
            
            {{-- Card Utama Venue --}}
            <div class="bg-white shadow-xl rounded-lg overflow-hidden p-6">

                {{-- Venue Information Header (Top Section) --}}
                <div class="flex items-start justify-between pb-6 mb-6">
                    <div class="flex items-start w-full">
                        
                        {{-- Logo Venue --}}
                        <div class="w-24 h-24 mr-6 flex-shrink-0">
                            {{-- Ganti dengan gambar logo yang diupload (misalnya dari $venue->logo_url) --}}
                            <img src="https://via.placeholder.com/100x100/f87171/ffffff?text=LOGO" alt="Logo Venue" class="w-full h-full rounded-full border p-1 object-cover">
                        </div>

                        {{-- Nama, Alamat, Kontak --}}
                        <div class="w-full">
                            <div class="flex items-center mb-1">
                                <h1 class="text-2xl font-bold text-gray-800 mr-3">Andika Sport</h1>
                                {{-- Tombol Edit Kecil --}}
                                <button class="text-gray-400 hover:text-blue-500 transition-colors" title="Edit Detail Venue">
                                    <i class="fas fa-pencil-alt text-sm"></i>
                                </button>
                            </div>
                            
                            {{-- Alamat --}}
                            <p class="text-sm text-gray-600 mb-4">
                                {{ $venue->alamat ?? 'Jl. Gelora Senayan No.10, Gelora, Tanah Abang, Jakarta Selatan' }}
                            </p>
                            
                            {{-- Detail Ringkas (Username & Kontak) --}}
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-2 text-sm">
                                <div class="col-span-1">
                                    <span class="text-gray-500 font-semibold block">Username</span>
                                    <span class="text-blue-600"></span>
                                </div>
                                <div class="col-span-1">
                                    <span class="text-gray-500 font-semibold block">Kontak <i class="fas fa-info-circle text-xs text-gray-400 ml-1 cursor-pointer" title="Nomor Kontak Venue"></i></span>
                                    <span class="text-gray-700 font-medium"></span>
                                </div>
                                
                                {{-- Ikon Lokasi dan Instagram/Sosial Media Lain --}}
                                <div class="col-span-2 flex items-center space-x-4 mt-2">
                                    <span class="text-gray-500 flex items-center">
                                        <i class="fas fa-map-marker-alt mr-1 text-red-500"></i>
                                        }
                                    </span>
                                    <span class="text-gray-500 flex items-center">
                                        <i class="fab fa-instagram mr-1 text-pink-500"></i>
                                        
                                    </span>
                                </div>
                            </div>
                            
                            {{-- Social Media Icons (Diletakkan terpisah agar mirip gambar) --}}
                            <div class="mt-4 flex space-x-3 text-lg text-gray-500">
                                <i class="fab fa-facebook-square hover:text-blue-700 cursor-pointer"></i>
                                <i class="fab fa-twitter-square hover:text-blue-400 cursor-pointer"></i>
                                <i class="far fa-envelope hover:text-yellow-600 cursor-pointer"></i>
                                <i class="fas fa-globe hover:text-green-600 cursor-pointer"></i>
                                <i class="far fa-calendar-alt hover:text-purple-600 cursor-pointer"></i>
                                {{-- Icons tambahan dari gambar --}}
                                <i class="fas fa-wifi hover:text-blue-400 cursor-pointer"></i>
                                <i class="fas fa-utensils hover:text-orange-500 cursor-pointer"></i>
                                <i class="fas fa-parking hover:text-gray-600 cursor-pointer"></i>
                            </div>

                        </div>
                    </div>
                    
                    {{-- Action Buttons --}}
                    <div class="flex space-x-3 flex-shrink-0">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow transition-colors text-sm">QR Code</button>
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg shadow transition-colors text-sm">Preview Venue</button>
                        <button class="text-gray-500 hover:text-gray-700 text-lg p-2 rounded-lg hover:bg-gray-100 transition-colors" title="Opsi Lain">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>
                
                {{-- --- --}}

                {{-- Navigation Tabs --}}
                <div class="border-b mb-6 overflow-x-auto">
                    <ul class="flex -mb-px text-sm font-medium text-center whitespace-nowrap" role="tablist">
                        {{-- Tab Aktif --}}
                        <li class="mr-2">
                            <a class="inline-block p-4 border-b-2 border-blue-600 text-blue-600 font-bold" href="#">Lapangan</a>
                        </li>
                        {{-- Tab Lain --}}
                        <li class="mr-2">
                            <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500 transition-colors" href="#">Experience</a>
                        </li>
                        <li class="mr-2">
                            <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500 transition-colors" href="#">Jam Operasional</a>
                        </li>
                        <li class="mr-2">
                            <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500 transition-colors" href="#">Deskripsi</a>
                        </li>
                        <li class="mr-2">
                            <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500 transition-colors" href="#">Syarat dan Ketentuan</a>
                        </li>
                        <li class="mr-2">
                            <a class="inline-block p-4 border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 text-gray-500 transition-colors" href="#">Galeri</a>
                        </li>
                    </ul>
                </div>

                {{-- Tab Content: Lapangan (Aktif) --}}
                <div id="lapangan-content">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                        {{-- CARD: Tambah Lapangan (Sesuai Gambar) --}}
                        {{-- Sesuaikan tautan dengan route create Lapangan Anda --}}
                        <a href="" class="border-2 border-dashed border-blue-400 bg-white hover:bg-blue-50 transition-colors duration-200 rounded-lg p-6 text-center w-full max-w-xs flex flex-col justify-between shadow-sm hover:shadow-md h-64 mx-auto">
                            <div>
                                <i class="fas fa-plus text-blue-500 text-3xl mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Tambah Lapangan</h3>
                                <p class="text-xs text-gray-600">
                                    Anda dapat menambahkan lapangan di venue yang anda miliki dengan menekan tombol tambah
                                </p>
                            </div>
                            {{-- Tombol --}}
                            <span class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition-colors inline-block mt-4">
                                Tambah
                            </span>
                        </a>

                        {{-- LOOP: Lapangan yang Sudah Ada (jika $lapangans tidak kosong) --}}
                        {{-- Tempatkan loop data lapangan di sini, di sebelah card 'Tambah Lapangan' --}}
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
{{-- Pastikan Anda memiliki Font Awesome (fas, fab) terhubung di layout utama Anda --}}
@endpush