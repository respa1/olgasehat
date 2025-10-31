@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-4">
        <span class="font-bold">Kelola Fasilitas</span> <span class="mx-1">/</span> Detail Venue
    </div>

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Detail Venue</h1>
        <div class="flex items-center mt-2 text-gray-600">
            <span>Kelola Fasilitas - </span>
            <span class="font-bold ml-1">Detail Venue</span>
        </div>
    </div>

    <hr class="mb-6">

    <!-- Venue Information -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $venue->namavenue }}</h2>
        
        <div class="space-y-3">
            <!-- Alamat -->
            <div class="flex items-start">
                <svg class="w-5 h-5 text-gray-500 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="text-gray-700">{{ $venue->lokasi }}</span>
            </div>

            <!-- Username & Kontak Table -->
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="py-2 px-4 border-b text-left font-semibold text-gray-700">Username</th>
                            <th class="py-2 px-4 border-b text-left font-semibold text-gray-700">Kontak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b text-gray-600">username</td>
                            <td class="py-2 px-4 border-b text-gray-600">kontak</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Kota & Slug -->
            <div class="mt-4 space-y-2">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="text-gray-700">{{ $venue->kota }}</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                    </svg>
                    <span class="text-gray-700"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Lapangan</h3>
        
        <div class="flex flex-wrap gap-4">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                Experience
            </button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Jam Operasional
            </button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Deskripsi
            </button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Syarat dan Ketentuan
            </button>
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                Galeri
            </button>
        </div>
    </div>

    <!-- Tambah Lapangan Section -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Tambah Lapangan</h3>
        <p class="text-gray-600 mb-4">
            Anda dapat menambahkan lapangan di venue yang anda miliki dengan menekan tombol tambah
        </p>
        
        <a href="{{ route('pendaftarans', $venue->id) }}" 
           class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition inline-flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Lapangan
        </a>
    </div>
</div>
@endsection