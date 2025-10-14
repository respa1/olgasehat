@extends('user.layout.user')

@push('css')
{{-- Memastikan ikon Font Awesome tersedia untuk visual --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    /* Custom style untuk date picker agar terlihat lebih baik */
    .datepicker-input {
        @apply w-full md:w-48 rounded-lg border border-gray-300 px-4 py-2.5 mb-1 text-gray-800 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-150;
    }
    
    /* Style untuk tombol filter yang aktif */
    .filter-btn-active {
        @apply bg-blue-600 text-white shadow-md hover:bg-blue-700;
    }

    /* Style untuk tombol filter yang tidak aktif (secondary) */
    .filter-btn-inactive {
        @apply text-blue-600 border border-blue-500 bg-blue-50 hover:bg-blue-100;
    }
</style>
@endpush

@section('content')

<main class="bg-gray-50 min-h-[calc(100vh-64px)] p-4 md:p-8">
    <section class="max-w-4xl mx-auto">

        <h1 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Riwayat Transaksi</h1>

        {{-- Filter & Keterangan --}}
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
            <div class="md:flex md:justify-between md:items-end">
                <div class="mb-4 md:mb-0">
                    <label class="block mb-2 font-bold text-gray-700 text-sm" for="cutoff-date">
                        Pilih Tanggal Cut Off
                    </label>
                    <div class="relative">
                        <input class="datepicker-input" id="cutoff-date" readonly="" type="text" value="14 Oktober 2025"/>
                        {{-- Icon Calendar --}}
                        <i class="fas fa-calendar-alt absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">
                        *Menampilkan transaksi
                        <span class="text-blue-600 font-semibold">
                            6 bulan ke belakang
                        </span>
                        dari tanggal pilihan Anda.
                    </p>
                </div>

                <div class="flex space-x-3">
                    <button class="text-sm font-semibold px-4 py-2 rounded-lg transition duration-150 filter-btn-active" type="button">
                        <i class="fas fa-list-ul mr-1"></i> Semua Transaksi
                    </button>
                    <button class="text-sm font-semibold px-4 py-2 rounded-lg transition duration-150 filter-btn-inactive" type="button">
                        <i class="fas fa-percent mr-1"></i> Down Payment (DP)
                    </button>
                </div>
            </div>
        </div>
        
        {{-- List Riwayat Transaksi --}}
        <div class="space-y-4">
            
            {{-- Kasus 1: Transaksi Ditemukan --}}
            <h2 class="text-lg font-bold text-gray-700 mb-3">Transaksi Ditemukan (Oktober 2025)</h2>

            {{-- Item Transaksi Selesai --}}
            <div class="bg-white rounded-lg p-5 shadow-md flex justify-between items-center transition hover:shadow-lg border-l-4 border-green-500">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="text-xl font-bold text-green-600 md:w-24">Rp 150K</div>
                    <div class="md:ml-6 mt-2 md:mt-0">
                        <p class="font-bold text-gray-800">Booking Futsal (Lapangan A Tirtayasa)</p>
                        <p class="text-sm text-gray-500">
                            <i class="fas fa-calendar-check mr-1"></i> 14 Okt 2025 | ID: #OLG-1014-001
                        </p>
                    </div>
                </div>
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-green-100 text-green-700 hidden sm:inline-block">
                    Selesai
                </span>
            </div>
            
            {{-- Item Transaksi Pending (DP) --}}
            <div class="bg-white rounded-lg p-5 shadow-md flex justify-between items-center transition hover:shadow-lg border-l-4 border-yellow-500">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="text-xl font-bold text-yellow-600 md:w-24">Rp 50K</div>
                    <div class="md:ml-6 mt-2 md:mt-0">
                        <p class="font-bold text-gray-800">Down Payment (DP) GOR Bulu Tangkis Sentosa</p>
                        <p class="text-sm text-gray-500">
                            <i class="fas fa-calendar-day mr-1"></i> 15 Okt 2025 | ID: #OLG-1015-002
                        </p>
                    </div>
                </div>
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 hidden sm:inline-block">
                    DP
                </span>
            </div>

            {{-- Item Transaksi Sebelumnya --}}
            <div class="bg-white rounded-lg p-5 shadow-md flex justify-between items-center transition hover:shadow-lg border-l-4 border-gray-300">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="text-xl font-bold text-gray-600 md:w-24">Rp 120K</div>
                    <div class="md:ml-6 mt-2 md:mt-0">
                        <p class="font-bold text-gray-800">Booking Lapangan Voli (Komunitas)</p>
                        <p class="text-sm text-gray-500">
                            <i class="fas fa-calendar-check mr-1"></i> 05 Sep 2025 | ID: #OLG-0905-008
                        </p>
                    </div>
                </div>
                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-gray-100 text-gray-700 hidden sm:inline-block">
                    Selesai
                </span>
            </div>

            {{-- Kasus 2: Empty State (diaktifkan jika tidak ada data) --}}
            {{-- Saya letakkan di bawah sebagai contoh, dalam implementasi nyata, ini hanya ditampilkan jika data kosong --}}
            </div>

    </section>
</main>

@endsection