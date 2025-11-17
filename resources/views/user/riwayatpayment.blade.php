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
    .booking-card {
        transition: all 0.3s ease;
        border-left: 4px solid;
    }
    .booking-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .booking-card.completed {
        border-left-color: #10b981;
    }
    .booking-card.pending {
        border-left-color: #f59e0b;
    }
    .booking-card.cancelled {
        border-left-color: #ef4444;
    }
    .status-badge {
        padding: 0.375rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .status-completed {
        background-color: #d1fae5;
        color: #065f46;
    }
    .status-pending {
        background-color: #fef3c7;
        color: #92400e;
    }
    .status-cancelled {
        background-color: #fee2e2;
        color: #991b1b;
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
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Riwayat Pemesanan</h1>
                        <p class="text-gray-600">Lihat semua booking venue olahraga yang telah Anda lakukan</p>
                    </div>
                    <div class="hidden md:flex items-center space-x-2">
                        <div class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg font-semibold">
                            <i class="fas fa-calendar-check mr-2"></i>Total: 5 Booking
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filter Section --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-filter mr-2 text-gray-500"></i>Cari Booking
                        </label>
                        <input 
                            type="text" 
                            placeholder="Cari berdasarkan venue, lapangan, atau ID booking..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        >
                    </div>
                    <div class="md:w-48">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-calendar-alt mr-2 text-gray-500"></i>Tanggal
                        </label>
                        <input 
                            type="date" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                        >
                    </div>
                    <div class="md:w-48">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-info-circle mr-2 text-gray-500"></i>Status
                        </label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">Semua Status</option>
                            <option value="completed">Selesai</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Booking Cards --}}
            <div class="space-y-4">
                
                {{-- Card 1: Booking Selesai --}}
                <div class="booking-card completed bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                    <div class="flex flex-col md:flex-row">
                        {{-- Image Venue --}}
                        <div class="md:w-48 flex-shrink-0">
                            <img 
                                src="{{ asset('assets/MU Sport Center.jpeg') }}" 
                                alt="Futsal Tirtayasa Club"
                                class="w-full h-full object-cover"
                            >
                        </div>
                        
                        {{-- Content --}}
                        <div class="flex-1 p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="text-xs text-gray-500 font-medium">Venue | Futsal</span>
                                        <span class="status-badge status-completed">
                                            <i class="fas fa-check-circle mr-1"></i>Selesai
                                        </span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Futsal Tirtayasa Club</h3>
                                    <p class="text-sm text-gray-600 flex items-center mb-1">
                                        <i class="fas fa-map-marker-alt text-blue-500 text-xs mr-2"></i>
                                        Denpasar, Bali
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-green-600 mb-1">Rp 150.000</p>
                                    <p class="text-xs text-gray-500">Total Pembayaran</p>
                                </div>
                            </div>

                            {{-- Booking Details --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-futbol mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Lapangan</p>
                                        <p class="font-semibold">Lapangan A</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-calendar-alt mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Tanggal</p>
                                        <p class="font-semibold">14 Oktober 2025</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-clock mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Waktu</p>
                                        <p class="font-semibold">19:00 - 21:00 WITA</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-hashtag mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">ID Booking</p>
                                        <p class="font-semibold">#OLG-1014-001</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                <a href="/venueuser_detail" class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail Venue
                                </a>
                                <button class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-file-pdf mr-2"></i>Download Invoice
                                </button>
                                <button class="flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-redo mr-2"></i>Booking Lagi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Booking Pending (DP) --}}
                <div class="booking-card pending bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                    <div class="flex flex-col md:flex-row">
                        {{-- Image Venue --}}
                        <div class="md:w-48 flex-shrink-0">
                            <img 
                                src="{{ asset('assets/olgasehat-icon.png') }}" 
                                alt="GOR Bulu Tangkis Sentosa"
                                class="w-full h-full object-cover bg-gray-100"
                            >
                        </div>
                        
                        {{-- Content --}}
                        <div class="flex-1 p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="text-xs text-gray-500 font-medium">Venue | Bulu Tangkis</span>
                                        <span class="status-badge status-pending">
                                            <i class="fas fa-clock mr-1"></i>Pending (DP)
                                        </span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">GOR Bulu Tangkis Sentosa</h3>
                                    <p class="text-sm text-gray-600 flex items-center mb-1">
                                        <i class="fas fa-map-marker-alt text-blue-500 text-xs mr-2"></i>
                                        Denpasar, Bali
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-yellow-600 mb-1">Rp 50.000</p>
                                    <p class="text-xs text-gray-500">Down Payment</p>
                                </div>
                            </div>

                            {{-- Booking Details --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 p-4 bg-yellow-50 rounded-lg border border-yellow-100">
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-futbol mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Lapangan</p>
                                        <p class="font-semibold">Lapangan Utama</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-calendar-alt mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Tanggal</p>
                                        <p class="font-semibold">15 Oktober 2025</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-clock mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Waktu</p>
                                        <p class="font-semibold">18:00 - 20:00 WITA</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-hashtag mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">ID Booking</p>
                                        <p class="font-semibold">#OLG-1015-002</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Payment Info --}}
                            <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-4 mb-4">
                                <h4 class="font-semibold text-yellow-900 mb-2 flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Informasi Pembayaran
                                </h4>
                                <p class="text-sm text-yellow-800">
                                    Down Payment sebesar <span class="font-bold">Rp 50.000</span> telah dibayar. 
                                    Sisa pembayaran <span class="font-bold">Rp 100.000</span> dapat dilunasi sebelum tanggal booking.
                                </p>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                <button class="flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-credit-card mr-2"></i>Lunasi Pembayaran
                                </button>
                                <a href="/venueuser_detail" class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail
                                </a>
                                <button class="flex items-center px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-times mr-2"></i>Batalkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 3: Booking Selesai (Lama) --}}
                <div class="booking-card completed bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                    <div class="flex flex-col md:flex-row">
                        {{-- Image Venue --}}
                        <div class="md:w-48 flex-shrink-0">
                            <img 
                                src="{{ asset('assets/olgasehat-icon.png') }}" 
                                alt="Lapangan Voli Komunitas"
                                class="w-full h-full object-cover bg-gray-100"
                            >
                        </div>
                        
                        {{-- Content --}}
                        <div class="flex-1 p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="text-xs text-gray-500 font-medium">Venue | Voli</span>
                                        <span class="status-badge status-completed">
                                            <i class="fas fa-check-circle mr-1"></i>Selesai
                                        </span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Lapangan Voli Komunitas</h3>
                                    <p class="text-sm text-gray-600 flex items-center mb-1">
                                        <i class="fas fa-map-marker-alt text-blue-500 text-xs mr-2"></i>
                                        Denpasar, Bali
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-green-600 mb-1">Rp 120.000</p>
                                    <p class="text-xs text-gray-500">Total Pembayaran</p>
                                </div>
                            </div>

                            {{-- Booking Details --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-futbol mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Lapangan</p>
                                        <p class="font-semibold">Lapangan 1</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-calendar-alt mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Tanggal</p>
                                        <p class="font-semibold">05 September 2025</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-clock mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">Waktu</p>
                                        <p class="font-semibold">16:00 - 18:00 WITA</p>
                                    </div>
                                </div>
                                <div class="flex items-center text-sm text-gray-700">
                                    <i class="fas fa-hashtag mr-3 text-blue-600 w-5"></i>
                                    <div>
                                        <p class="text-xs text-gray-500">ID Booking</p>
                                        <p class="font-semibold">#OLG-0905-008</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                <a href="/venueuser_detail" class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail Venue
                                </a>
                                <button class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-file-pdf mr-2"></i>Download Invoice
                                </button>
                                <button class="flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-redo mr-2"></i>Booking Lagi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Empty State (Hidden by default, bisa ditampilkan jika tidak ada data) --}}
                {{-- 
                <div class="bg-white rounded-xl shadow-lg p-12 text-center border-2 border-dashed border-gray-300">
                    <i class="fas fa-calendar-times text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Booking</h3>
                    <p class="text-gray-500 max-w-lg mx-auto mb-6">
                        Anda belum melakukan booking venue apapun. Mulai dengan mencari venue olahraga favorit Anda sekarang!
                    </p>
                    <a href="/venueuser" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                        <i class="fas fa-search mr-2"></i> Cari Venue Sekarang
                    </a>
                </div>
                --}}

            </div>

            {{-- Pagination --}}
            <div class="flex justify-center mt-6">
                <nav class="flex space-x-2">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-semibold">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold">1</button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-semibold">2</button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-semibold">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
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

@endsection
