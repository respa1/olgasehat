@extends('user.layout.user')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    .sidebar-card {
        background: #ffffff !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .blue-banner-card {
        background-image: url('{{ asset('assets/blue-banner.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .quick-action-item {
        transition: all 0.3s ease;
    }
    .quick-action-item:hover {
        transform: translateX(4px);
        background-color: #f9fafb;
    }
    .datepicker-input {
        @apply w-full md:w-48 rounded-lg border border-gray-300 px-4 py-2.5 mb-1 text-gray-800 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-150;
    }
    .filter-btn-active {
        @apply bg-blue-600 text-white shadow-md hover:bg-blue-700;
    }
    .filter-btn-inactive {
        @apply text-blue-600 border border-blue-500 bg-blue-50 hover:bg-blue-100;
    }
</style>
@endpush

@section('content')

<main class="pt-20 min-h-screen pb-8 px-4 md:px-8 lg:px-10 bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- Kolom Kiri (2/3) --}}
        <div class="lg:col-span-2 space-y-6">
            
            {{-- Header --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Riwayat Transaksi</h1>
                <p class="text-gray-600">Lihat semua riwayat pembayaran dan transaksi Anda</p>
            </div>

            {{-- Filter & Keterangan --}}
            <div class="bg-white p-6 rounded-2xl shadow-lg mb-8 border border-gray-100">
                <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-6">

                    {{-- Kiri: Tanggal Cut Off --}}
                    <div>
                        <label for="cutoff-date" class="block text-sm font-semibold text-gray-800 mb-2">
                            Pilih Tanggal Cut Off
                        </label>

                        <div class="relative max-w-xs">
                            <input 
                                id="cutoff-date" 
                                type="text" 
                                class="border border-gray-300 rounded-lg px-4 py-2 w-full text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-pointer"
                                placeholder="Pilih tanggal"
                            >
                            <i class="fas fa-calendar-alt absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>

                        <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                            *Menampilkan transaksi <span class="text-blue-600 font-semibold">6 bulan ke belakang</span> 
                            dari tanggal pilihan Anda.
                        </p>
                    </div>

                    {{-- Kanan: Tombol Filter --}}
                    <div class="flex flex-wrap gap-3">
                        <button 
                            id="btn-semua" 
                            type="button"
                            class="flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 transition active:scale-95">
                            <i class="fas fa-list-ul"></i> Semua Transaksi
                        </button>

                        <button 
                            id="btn-dp" 
                            type="button"
                            class="flex items-center gap-2 px-5 py-2.5 bg-white text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition active:scale-95">
                            <i class="fas fa-percent"></i> Down Payment (DP)
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
            </div>

        </div>

        {{-- Kolom Kanan (1/3) - Sidebar Unified --}}
        <div class="lg:col-span-1">
            <div class="sidebar-card bg-white rounded-2xl p-6 space-y-6 border border-gray-200">
                
                {{-- Greeting Section --}}
                <div class="flex items-start justify-between pb-4 border-b border-gray-200">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Hello. {{ Auth::user()->name ?? 'Rendra' }}!</h2>
                        <p class="text-sm text-gray-600 leading-relaxed">Siap bergerak aktif hari ini? Yuk, cek progresmu!</p>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        @if(Auth::user()->image ?? null)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                                 alt="Profile Picture"
                                 class="w-20 h-20 rounded-full object-cover shadow-lg border-2 border-gray-200">
                        @else
                            @php
                                $userName = Auth::user()->name ?? 'Rendra';
                                $initial = strtolower(substr($userName, 0, 1));
                            @endphp
                            <div class="w-20 h-20 rounded-full bg-blue-300 flex items-center justify-center text-blue-800 text-3xl font-bold shadow-lg">
                                {{ $initial }}
                            </div>
                        @endif
                    </div>
                </div>
                
                {{-- Action Buttons --}}
                <div class="flex gap-2 pb-4 border-b border-gray-200">
                    <a href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-2.5 px-4 rounded-lg font-semibold transition duration-200 text-sm shadow-md hover:shadow-lg">
                        <i class="fas fa-phone mr-1"></i>Hubungi Kami
                    </a>
                    <a href="/edit-profile-user" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-center py-2.5 px-4 rounded-lg font-semibold transition duration-200 text-sm shadow-md hover:shadow-lg">
                        <i class="fas fa-user-edit mr-1"></i>Edit Profile
                    </a>
                </div>

                {{-- Blue Banner Card: Nikmati Akses User --}}
                <a href="#" class="quick-action-item rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md block relative overflow-hidden">
                    <div class="absolute inset-0 blue-banner-card opacity-20"></div>
                    <div class="relative z-10 flex items-start space-x-3">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                            <i class="fas fa-star text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 mb-1">Nikmati Akses User</h3>
                            <p class="text-xs text-gray-500">Akses penuh ke semua fitur premium dan layanan eksklusif untuk pengalaman terbaik Anda</p>
                        </div>
                    </div>
                </a>

                {{-- Quick Actions Section --}}
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                        Aksi Cepat
                    </h2>
                    <div class="space-y-3">
                        <!-- Fasilitas Olahraga -->
                        <a href="/venueuser" class="quick-action-item bg-white rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md block">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-futbol text-blue-600 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 mb-1">Fasilitas Olahraga</h3>
                                    <p class="text-xs text-gray-500">Booking lapangan olahraga favorit Anda dengan mudah</p>
                                </div>
                            </div>
                        </a>

                        <!-- Layanan Kesehatan -->
                        <a href="/healthyuser" class="quick-action-item bg-white rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md block">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-heartbeat text-green-600 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 mb-1">Layanan Kesehatan</h3>
                                    <p class="text-xs text-gray-500">Cek kesehatan dan layanan medis terdekat</p>
                                </div>
                            </div>
                        </a>

                        <!-- Buat & Temukan Komunitas -->
                        <a href="/communityuser" class="quick-action-item bg-white rounded-xl p-4 border border-gray-200 shadow-sm hover:shadow-md block">
                            <div class="flex items-start space-x-3">
                                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-users text-orange-600 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 mb-1">Buat & Temukan Komunitas</h3>
                                    <p class="text-xs text-gray-500">Bergabung atau buat komunitas olahraga baru</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@push('scripts')
    {{-- Flatpickr (Datepicker Modern) --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script>
        // Inisialisasi datepicker
        flatpickr("#cutoff-date", {
            dateFormat: "d F Y",
            defaultDate: "today",
            locale: "id",
        });

        // Tombol toggle
        const btnSemua = document.getElementById('btn-semua');
        const btnDP = document.getElementById('btn-dp');

        btnSemua.addEventListener('click', () => {
            btnSemua.classList.add('bg-blue-600', 'text-white', 'border-transparent');
            btnSemua.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');
            
            btnDP.classList.remove('bg-blue-600', 'text-white');
            btnDP.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
        });

        btnDP.addEventListener('click', () => {
            btnDP.classList.add('bg-blue-600', 'text-white', 'border-transparent');
            btnDP.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');

            btnSemua.classList.remove('bg-blue-600', 'text-white');
            btnSemua.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
        });
    </script>
@endpush

@endsection
