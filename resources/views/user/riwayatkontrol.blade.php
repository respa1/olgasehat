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
                <div class="health-record-card completed bg-white rounded-xl p-6 shadow-md border border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-stethoscope text-green-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-1">Medical Check-Up Lengkap</h3>
                                        <p class="text-sm text-gray-600 flex items-center">
                                            <i class="fas fa-hospital mr-2 text-green-600"></i>
                                            Klinik Sehat Jaya - Denpasar
                                        </p>
                                    </div>
                                </div>
                                <span class="status-badge status-completed">
                                    <i class="fas fa-check-circle mr-1"></i>Selesai
                                </span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-user-md mr-2 text-gray-400 w-5"></i>
                                    <span class="font-medium">Dr. Ahmad Wijaya, Sp.PD</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar-check mr-2 text-gray-400 w-5"></i>
                                    <span>15 Oktober 2025, 09:00 WITA</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-tag mr-2 text-gray-400 w-5"></i>
                                    <span>Medical Check-Up</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-money-bill-wave mr-2 text-gray-400 w-5"></i>
                                    <span class="font-semibold text-gray-900">Rp 750.000</span>
                                </div>
                            </div>

                            {{-- Hasil Pemeriksaan --}}
                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-clipboard-list mr-2 text-green-600"></i>
                                    Hasil Pemeriksaan
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="result-item rounded-lg p-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs text-gray-500">Tekanan Darah</span>
                                            <span class="text-xs font-semibold text-green-600">Normal</span>
                                        </div>
                                        <p class="text-sm font-bold text-gray-900">120/80 mmHg</p>
                                    </div>
                                    <div class="result-item rounded-lg p-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs text-gray-500">Kolesterol Total</span>
                                            <span class="text-xs font-semibold text-green-600">Normal</span>
                                        </div>
                                        <p class="text-sm font-bold text-gray-900">180 mg/dL</p>
                                    </div>
                                    <div class="result-item rounded-lg p-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs text-gray-500">Gula Darah Puasa</span>
                                            <span class="text-xs font-semibold text-yellow-600">Perhatian</span>
                                        </div>
                                        <p class="text-sm font-bold text-gray-900">110 mg/dL</p>
                                    </div>
                                    <div class="result-item rounded-lg p-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs text-gray-500">BMI</span>
                                            <span class="text-xs font-semibold text-green-600">Normal</span>
                                        </div>
                                        <p class="text-sm font-bold text-gray-900">22.5</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Rekomendasi Dokter --}}
                            <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4 mb-4">
                                <h4 class="font-semibold text-blue-900 mb-2 flex items-center">
                                    <i class="fas fa-comment-medical mr-2"></i>
                                    Rekomendasi Dokter
                                </h4>
                                <p class="text-sm text-blue-800">
                                    Gula darah puasa sedikit di atas normal. Disarankan untuk mengurangi konsumsi gula dan karbohidrat sederhana, serta melakukan kontrol ulang dalam 3 bulan.
                                </p>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                <button class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-file-pdf mr-2"></i>Download Hasil
                                </button>
                                <button class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-calendar-plus mr-2"></i>Kontrol Ulang
                                </button>
                                <button class="flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Fisioterapi (Completed) --}}
                <div class="health-record-card completed bg-white rounded-xl p-6 shadow-md border border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-hand-holding-medical text-blue-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-1">Fisioterapi Cedera Lutut</h3>
                                        <p class="text-sm text-gray-600 flex items-center">
                                            <i class="fas fa-hospital mr-2 text-blue-600"></i>
                                            PhysioCare Center - Denpasar
                                        </p>
                                    </div>
                                </div>
                                <span class="status-badge status-completed">
                                    <i class="fas fa-check-circle mr-1"></i>Selesai
                                </span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-user-md mr-2 text-gray-400 w-5"></i>
                                    <span class="font-medium">Fisioterapis Budi Santoso, S.Ft</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar-check mr-2 text-gray-400 w-5"></i>
                                    <span>12 Oktober 2025, 14:00 WITA</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-tag mr-2 text-gray-400 w-5"></i>
                                    <span>Fisioterapi & Cedera</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-money-bill-wave mr-2 text-gray-400 w-5"></i>
                                    <span class="font-semibold text-gray-900">Rp 300.000</span>
                                </div>
                            </div>

                            {{-- Hasil Pemeriksaan --}}
                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-clipboard-list mr-2 text-blue-600"></i>
                                    Hasil Terapi
                                </h4>
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600">Sesi Terapi</span>
                                        <span class="font-semibold text-gray-900">Sesi 3 dari 6</span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600">Kemajuan</span>
                                        <span class="font-semibold text-green-600">50% - Membaik</span>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-gray-600">Rentang Gerak</span>
                                        <span class="font-semibold text-gray-900">Meningkat 30%</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Rekomendasi Dokter --}}
                            <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4 mb-4">
                                <h4 class="font-semibold text-blue-900 mb-2 flex items-center">
                                    <i class="fas fa-comment-medical mr-2"></i>
                                    Catatan Terapis
                                </h4>
                                <p class="text-sm text-blue-800">
                                    Pasien menunjukkan kemajuan yang baik. Lanjutkan latihan peregangan di rumah 2x sehari. Sesi berikutnya: 19 Oktober 2025.
                                </p>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                <button class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-file-pdf mr-2"></i>Download Laporan
                                </button>
                                <button class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-calendar-plus mr-2"></i>Booking Sesi Berikutnya
                                </button>
                                <button class="flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 3: Konsultasi Nutrisi (Pending) --}}
                <div class="health-record-card pending bg-white rounded-xl p-6 shadow-md border border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-apple-alt text-orange-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-1">Konsultasi Nutrisi & Diet</h3>
                                        <p class="text-sm text-gray-600 flex items-center">
                                            <i class="fas fa-hospital mr-2 text-orange-600"></i>
                                            NutriWell Clinic - Denpasar
                                        </p>
                                    </div>
                                </div>
                                <span class="status-badge status-pending">
                                    <i class="fas fa-clock mr-1"></i>Menunggu Hasil
                                </span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-user-md mr-2 text-gray-400 w-5"></i>
                                    <span class="font-medium">Ahli Gizi Sari Indah, S.Gz</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar-check mr-2 text-gray-400 w-5"></i>
                                    <span>18 Oktober 2025, 10:00 WITA</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-tag mr-2 text-gray-400 w-5"></i>
                                    <span>Nutrisi & Gizi</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-money-bill-wave mr-2 text-gray-400 w-5"></i>
                                    <span class="font-semibold text-gray-900">Rp 250.000</span>
                                </div>
                            </div>

                            {{-- Info Pending --}}
                            <div class="bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-4 mb-4">
                                <h4 class="font-semibold text-yellow-900 mb-2 flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Status Pemeriksaan
                                </h4>
                                <p class="text-sm text-yellow-800">
                                    Konsultasi telah dilakukan. Hasil analisis nutrisi dan rencana diet sedang dipersiapkan oleh ahli gizi. Hasil akan tersedia dalam 2-3 hari kerja.
                                </p>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                <button class="flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-sync-alt mr-2"></i>Cek Status
                                </button>
                                <button class="flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 4: Dokter Spesialis (Completed) --}}
                <div class="health-record-card completed bg-white rounded-xl p-6 shadow-md border border-gray-200">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user-md text-purple-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-1">Konsultasi Dokter Spesialis Jantung</h3>
                                        <p class="text-sm text-gray-600 flex items-center">
                                            <i class="fas fa-hospital mr-2 text-purple-600"></i>
                                            RS. Sehat Sentosa - Denpasar
                                        </p>
                                    </div>
                                </div>
                                <span class="status-badge status-completed">
                                    <i class="fas fa-check-circle mr-1"></i>Selesai
                                </span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-user-md mr-2 text-gray-400 w-5"></i>
                                    <span class="font-medium">Dr. Rina Kartika, Sp.JP</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-calendar-check mr-2 text-gray-400 w-5"></i>
                                    <span>08 Oktober 2025, 11:00 WITA</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-tag mr-2 text-gray-400 w-5"></i>
                                    <span>Dokter Spesialis</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-money-bill-wave mr-2 text-gray-400 w-5"></i>
                                    <span class="font-semibold text-gray-900">Rp 500.000</span>
                                </div>
                            </div>

                            {{-- Hasil Pemeriksaan --}}
                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                    <i class="fas fa-clipboard-list mr-2 text-purple-600"></i>
                                    Diagnosis & Tindakan
                                </h4>
                                <div class="space-y-2">
                                    <div class="result-item rounded-lg p-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs text-gray-500">Diagnosis</span>
                                        </div>
                                        <p class="text-sm font-semibold text-gray-900">Jantung sehat, tidak ada kelainan signifikan</p>
                                    </div>
                                    <div class="result-item rounded-lg p-3">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-xs text-gray-500">EKG</span>
                                            <span class="text-xs font-semibold text-green-600">Normal</span>
                                        </div>
                                        <p class="text-sm font-bold text-gray-900">Sinus Rhythm, 72 bpm</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Rekomendasi Dokter --}}
                            <div class="bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4 mb-4">
                                <h4 class="font-semibold text-blue-900 mb-2 flex items-center">
                                    <i class="fas fa-comment-medical mr-2"></i>
                                    Rekomendasi Dokter
                                </h4>
                                <p class="text-sm text-blue-800">
                                    Kondisi jantung dalam keadaan baik. Disarankan untuk tetap menjaga pola hidup sehat, olahraga teratur, dan kontrol rutin setiap 6 bulan sekali.
                                </p>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                <button class="flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-file-pdf mr-2"></i>Download Hasil
                                </button>
                                <button class="flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-calendar-plus mr-2"></i>Kontrol Ulang
                                </button>
                                <button class="flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition text-sm">
                                    <i class="fas fa-eye mr-2"></i>Lihat Detail
                                </button>
                            </div>
                        </div>
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

