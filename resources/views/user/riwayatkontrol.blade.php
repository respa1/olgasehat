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
    .health-record-card {
        transition: all 0.3s ease;
        border-left: 4px solid;
    }
    .health-record-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    .health-record-card.completed {
        border-left-color: #10b981;
    }
    .health-record-card.pending {
        border-left-color: #f59e0b;
    }
    .health-record-card.cancelled {
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
    .result-item {
        background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
        border: 1px solid #e5e7eb;
        transition: all 0.2s ease;
    }
    .result-item:hover {
        background: linear-gradient(135deg, #f3f4f6 0%, #f9fafb 100%);
        border-color: #d1d5db;
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
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Riwayat Kontrol</h1>
                        <p class="text-gray-600">Lihat semua riwayat cek kesehatan dan pemeriksaan Anda</p>
                    </div>
                    <div class="hidden md:flex items-center space-x-2">
                        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg font-semibold">
                            <i class="fas fa-clipboard-check mr-2"></i>Total: 5 Kontrol
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filter Section --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-filter mr-2 text-gray-500"></i>Cari Riwayat
                        </label>
                        <input 
                            type="text" 
                            placeholder="Cari berdasarkan layanan, dokter, atau klinik..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                        >
                    </div>
                    <div class="md:w-48">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-calendar-alt mr-2 text-gray-500"></i>Tanggal
                        </label>
                        <input 
                            type="date" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                        >
                    </div>
                    <div class="md:w-48">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-tags mr-2 text-gray-500"></i>Kategori
                        </label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                            <option value="">Semua Kategori</option>
                            <option value="medical-checkup">Medical Check-Up</option>
                            <option value="fisioterapi">Fisioterapi & Cedera</option>
                            <option value="dokter-spesialis">Dokter Spesialis</option>
                            <option value="nutrisi">Nutrisi & Gizi</option>
                        </select>
                    </div>
                    <div class="md:w-48">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-info-circle mr-2 text-gray-500"></i>Status
                        </label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-gray-700 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                            <option value="">Semua Status</option>
                            <option value="completed">Selesai</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Riwayat Kontrol Cards --}}
            <div class="space-y-4">
                
                {{-- Card 1: Medical Check-Up (Completed) --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5 relative overflow-hidden">
                    <div class="flex items-start justify-between mb-4 pb-3 border-b border-gray-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0 relative">
                                <i class="fas fa-home text-white text-sm"></i>
                                <i class="fas fa-plus text-white text-xs absolute bottom-0 right-0 bg-green-700 rounded-full w-3 h-3 flex items-center justify-center"></i>
                            </div>
                            <h3 class="text-base font-bold text-gray-900">Klinik Sehat Jaya</h3>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1.5 text-sm border border-green-600 text-green-600 rounded-lg hover:bg-green-50 transition-colors">
                                Jadwalkan Ulang
                            </button>
                            <button class="px-3 py-1.5 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                Booking Ulang
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2.5 mb-4">
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Waktu Pemesanan</span>
                            <span class="text-sm text-gray-900 font-medium">Senin, 15 Oktober 2025</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Kode Booking</span>
                            <span class="text-sm text-gray-900 font-medium">251015001</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Nama Dokter</span>
                            <span class="text-sm text-gray-900 font-medium">Dr. Ahmad Wijaya, Sp.PD</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Pelayanan</span>
                            <span class="text-sm text-gray-900 font-medium">Pelayanan Dokter Umum</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Jadwal Booking</span>
                            <span class="text-sm text-gray-900 font-medium">Senin, 15 Oktober 2025 • 09:00</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Status</span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-1.5"></span>
                                Selesai
                            </span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-200">
                        <button class="text-sm text-green-600 font-medium hover:text-green-700 hover:underline flex items-center">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Detail Pemesanan
                        </button>
                    </div>
                    
                    <div class="absolute bottom-0 right-0 w-20 h-20 opacity-10">
                        <div class="absolute bottom-2 right-2 w-8 h-8 bg-blue-400 rounded-full"></div>
                        <div class="absolute bottom-4 right-6 w-6 h-6 bg-green-400 rounded-full"></div>
                        <div class="absolute bottom-6 right-2 w-4 h-4 bg-yellow-400 rounded-full"></div>
                    </div>
                </div>

                {{-- Card 2: Fisioterapi (Completed) --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5 relative overflow-hidden">
                    <div class="flex items-start justify-between mb-4 pb-3 border-b border-gray-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0 relative">
                                <i class="fas fa-home text-white text-sm"></i>
                                <i class="fas fa-plus text-white text-xs absolute bottom-0 right-0 bg-green-700 rounded-full w-3 h-3 flex items-center justify-center"></i>
                            </div>
                            <h3 class="text-base font-bold text-gray-900">PhysioCare Center</h3>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1.5 text-sm border border-green-600 text-green-600 rounded-lg hover:bg-green-50 transition-colors">
                                Jadwalkan Ulang
                            </button>
                            <button class="px-3 py-1.5 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                Booking Ulang
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2.5 mb-4">
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Waktu Pemesanan</span>
                            <span class="text-sm text-gray-900 font-medium">Sabtu, 12 Oktober 2025</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Kode Booking</span>
                            <span class="text-sm text-gray-900 font-medium">251012002</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Nama Dokter</span>
                            <span class="text-sm text-gray-900 font-medium">Fisioterapis Budi Santoso, S.Ft</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Pelayanan</span>
                            <span class="text-sm text-gray-900 font-medium">Fisioterapi & Cedera</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Jadwal Booking</span>
                            <span class="text-sm text-gray-900 font-medium">Sabtu, 12 Oktober 2025 • 14:00</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Status</span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-1.5"></span>
                                Selesai
                            </span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-200">
                        <button class="text-sm text-green-600 font-medium hover:text-green-700 hover:underline flex items-center">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Detail Pemesanan
                        </button>
                    </div>
                    
                    <div class="absolute bottom-0 right-0 w-20 h-20 opacity-10">
                        <div class="absolute bottom-2 right-2 w-8 h-8 bg-blue-400 rounded-full"></div>
                        <div class="absolute bottom-4 right-6 w-6 h-6 bg-green-400 rounded-full"></div>
                        <div class="absolute bottom-6 right-2 w-4 h-4 bg-yellow-400 rounded-full"></div>
                    </div>
                </div>

                {{-- Card 3: Konsultasi Nutrisi (Pending) --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5 relative overflow-hidden">
                    <div class="flex items-start justify-between mb-4 pb-3 border-b border-gray-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0 relative">
                                <i class="fas fa-home text-white text-sm"></i>
                                <i class="fas fa-plus text-white text-xs absolute bottom-0 right-0 bg-green-700 rounded-full w-3 h-3 flex items-center justify-center"></i>
                            </div>
                            <h3 class="text-base font-bold text-gray-900">NutriWell Clinic</h3>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1.5 text-sm border border-green-600 text-green-600 rounded-lg hover:bg-green-50 transition-colors">
                                Jadwalkan Ulang
                            </button>
                            <button class="px-3 py-1.5 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                Booking Ulang
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2.5 mb-4">
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Waktu Pemesanan</span>
                            <span class="text-sm text-gray-900 font-medium">Jumat, 18 Oktober 2025</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Kode Booking</span>
                            <span class="text-sm text-gray-900 font-medium">251018003</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Nama Dokter</span>
                            <span class="text-sm text-gray-900 font-medium">Ahli Gizi Sari Indah, S.Gz</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Pelayanan</span>
                            <span class="text-sm text-gray-900 font-medium">Nutrisi & Gizi</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Jadwal Booking</span>
                            <span class="text-sm text-gray-900 font-medium">Jumat, 18 Oktober 2025 • 10:00</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Status</span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                <span class="w-1.5 h-1.5 bg-yellow-600 rounded-full mr-1.5"></span>
                                Menunggu Hasil
                            </span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-200">
                        <button class="text-sm text-green-600 font-medium hover:text-green-700 hover:underline flex items-center">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Detail Pemesanan
                        </button>
                    </div>
                    
                    <div class="absolute bottom-0 right-0 w-20 h-20 opacity-10">
                        <div class="absolute bottom-2 right-2 w-8 h-8 bg-blue-400 rounded-full"></div>
                        <div class="absolute bottom-4 right-6 w-6 h-6 bg-green-400 rounded-full"></div>
                        <div class="absolute bottom-6 right-2 w-4 h-4 bg-yellow-400 rounded-full"></div>
                    </div>
                </div>

                {{-- Card 4: Dokter Spesialis (Completed) --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5 relative overflow-hidden">
                    <div class="flex items-start justify-between mb-4 pb-3 border-b border-gray-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0 relative">
                                <i class="fas fa-home text-white text-sm"></i>
                                <i class="fas fa-plus text-white text-xs absolute bottom-0 right-0 bg-green-700 rounded-full w-3 h-3 flex items-center justify-center"></i>
                            </div>
                            <h3 class="text-base font-bold text-gray-900">RS. Sehat Sentosa</h3>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1.5 text-sm border border-green-600 text-green-600 rounded-lg hover:bg-green-50 transition-colors">
                                Jadwalkan Ulang
                            </button>
                            <button class="px-3 py-1.5 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                Booking Ulang
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2.5 mb-4">
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Waktu Pemesanan</span>
                            <span class="text-sm text-gray-900 font-medium">Selasa, 08 Oktober 2025</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Kode Booking</span>
                            <span class="text-sm text-gray-900 font-medium">251008004</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Nama Dokter</span>
                            <span class="text-sm text-gray-900 font-medium">Dr. Rina Kartika, Sp.JP</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Pelayanan</span>
                            <span class="text-sm text-gray-900 font-medium">Dokter Spesialis</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Jadwal Booking</span>
                            <span class="text-sm text-gray-900 font-medium">Selasa, 08 Oktober 2025 • 11:00</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Status</span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-1.5"></span>
                                Selesai
                            </span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-200">
                        <button class="text-sm text-green-600 font-medium hover:text-green-700 hover:underline flex items-center">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Detail Pemesanan
                        </button>
                    </div>
                    
                    <div class="absolute bottom-0 right-0 w-20 h-20 opacity-10">
                        <div class="absolute bottom-2 right-2 w-8 h-8 bg-blue-400 rounded-full"></div>
                        <div class="absolute bottom-4 right-6 w-6 h-6 bg-green-400 rounded-full"></div>
                        <div class="absolute bottom-6 right-2 w-4 h-4 bg-yellow-400 rounded-full"></div>
                    </div>
                </div>

                {{-- Card 5: Contoh Dibatalkan --}}
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-5 relative overflow-hidden">
                    <div class="flex items-start justify-between mb-4 pb-3 border-b border-gray-200">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0 relative">
                                <i class="fas fa-home text-white text-sm"></i>
                                <i class="fas fa-plus text-white text-xs absolute bottom-0 right-0 bg-green-700 rounded-full w-3 h-3 flex items-center justify-center"></i>
                            </div>
                            <h3 class="text-base font-bold text-gray-900">Klinik Pratama Pelita Insani</h3>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-3 py-1.5 text-sm border border-green-600 text-green-600 rounded-lg hover:bg-green-50 transition-colors">
                                Jadwalkan Ulang
                            </button>
                            <button class="px-3 py-1.5 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                Booking Ulang
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2.5 mb-4">
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Waktu Pemesanan</span>
                            <span class="text-sm text-gray-900 font-medium">Senin, 24 November 2025</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Kode Booking</span>
                            <span class="text-sm text-gray-900 font-medium">251124001</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Nama Dokter</span>
                            <span class="text-sm text-gray-900 font-medium">dr. Kukuh Prasetyo</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Pelayanan</span>
                            <span class="text-sm text-gray-900 font-medium">Pelayanan Dokter Umum</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Jadwal Booking</span>
                            <span class="text-sm text-gray-900 font-medium">Senin, 24 November 2025 • 11:00</span>
                        </div>
                        <div class="flex items-start">
                            <span class="text-sm text-gray-500 w-36">Status</span>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700">
                                <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-1.5"></span>
                                Dibatalkan
                            </span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-gray-200">
                        <button class="text-sm text-green-600 font-medium hover:text-green-700 hover:underline flex items-center">
                            <i class="fas fa-eye mr-2"></i>
                            Lihat Detail Pemesanan
                        </button>
                    </div>
                    
                    <div class="absolute bottom-0 right-0 w-20 h-20 opacity-10">
                        <div class="absolute bottom-2 right-2 w-8 h-8 bg-blue-400 rounded-full"></div>
                        <div class="absolute bottom-4 right-6 w-6 h-6 bg-green-400 rounded-full"></div>
                        <div class="absolute bottom-6 right-2 w-4 h-4 bg-yellow-400 rounded-full"></div>
                    </div>
                </div>

                {{-- Empty State (Hidden by default, bisa ditampilkan jika tidak ada data) --}}
                {{-- 
                <div class="bg-white rounded-xl shadow-lg p-12 text-center border-2 border-dashed border-gray-300">
                    <i class="fas fa-clipboard-list text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Riwayat Kontrol</h3>
                    <p class="text-gray-500 max-w-lg mx-auto mb-6">
                        Anda belum memiliki riwayat kontrol kesehatan. Mulai dengan melakukan booking layanan kesehatan terlebih dahulu.
                    </p>
                    <a href="/healthyuser" class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition">
                        <i class="fas fa-plus mr-2"></i> Booking Layanan Kesehatan
                    </a>
                </div>
                --}}

            </div>

            {{-- Pagination (jika diperlukan) --}}
            <div class="flex justify-center mt-6">
                <nav class="flex space-x-2">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-semibold">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg font-semibold">1</button>
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

