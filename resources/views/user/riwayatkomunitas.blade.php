@extends('user.layout.user')

@push('css')
{{-- Memastikan ikon Font Awesome tersedia untuk visual --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    /* Styling untuk tautan navigasi profil yang aktif */
    .profile-nav-link {
        @apply flex items-center p-3 rounded-lg font-semibold transition duration-150;
    }
    .profile-nav-link.active {
        @apply bg-orange-500 text-white shadow-md shadow-orange-200;
    }
    .profile-nav-link:not(.active) {
        @apply text-gray-700 hover:bg-gray-100 hover:text-orange-500;
    }
    /* Styling untuk ikon navigasi */
    .profile-nav-link i {
        @apply w-5 h-5 mr-3;
    }
    /* Styling untuk kartu komunitas */
    .community-card {
        @apply bg-white p-5 rounded-xl shadow-lg border border-gray-100 transition duration-300 hover:shadow-xl hover:-translate-y-1;
    }
</style>
@endpush

@section('content')

<main class="bg-gray-100 min-h-[calc(100vh-64px)] pt-20 pb-8 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">

        <section class="lg:col-span-3 space-y-6">
            
            {{-- Header Konten --}}
            <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-orange-500 flex justify-between items-center">
                <div>
                    <h2 class="font-extrabold text-2xl text-gray-900">Riwayat Aktivitas Saya</h2>
                    <p class="text-gray-500 mt-1">Aktivitas yang telah kamu buat dan kelola.</p>
                </div>
                {{-- Tombol Tambah Aktivitas di Header --}}
                <a href="/buat-aktivitas" class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-150 flex items-center text-sm md:text-base whitespace-nowrap">
                    <i class="fas fa-plus mr-2"></i> Tambah Aktivitas
                </a>
            </div>

            {{-- Notifikasi --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Filter dan Search --}}
            <div class="bg-white rounded-xl shadow-md p-4">
                <form method="GET" action="{{ route('user.riwayat-komunitas') }}" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" 
                               name="search" 
                               placeholder="Cari aktivitas..." 
                               value="{{ request('search') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <select name="status" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-search mr-2"></i> Cari
                    </button>
                </form>
            </div>
            
            {{-- Daftar Aktivitas yang Dibuat User --}}
            @if(isset($activities) && $activities->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($activities as $activity)
                <div class="community-card bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center flex-1">
                            {{-- Ikon berdasarkan jenis --}}
                            <div class="w-12 h-12 rounded-full flex items-center justify-center mr-4 flex-shrink-0
                                @if($activity->jenis == 'komunitas') bg-blue-100 text-blue-600
                                @elseif($activity->jenis == 'membership') bg-amber-100 text-amber-600
                                @else bg-red-100 text-red-600
                                @endif">
                                @if($activity->jenis == 'komunitas')
                                    <i class="fas fa-users text-xl"></i>
                                @elseif($activity->jenis == 'membership')
                                    <i class="fas fa-credit-card text-xl"></i>
                                @else
                                    <i class="fas fa-calendar-alt text-xl"></i>
                                @endif
                            </div>
                            {{-- Info Dasar --}}
                            <div class="flex-1">
                                <p class="text-xl font-bold text-gray-900">{{ $activity->nama }}</p>
                                <p class="text-sm text-gray-500">{{ $activity->kategori }} | {{ $activity->lokasi ?? '-' }}</p>
                            </div>
                        </div>
                        {{-- Status Badge --}}
                        <div class="ml-2">
                            @if($activity->status == 'approved')
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">
                                    <i class="fas fa-check-circle"></i> Approved
                                </span>
                            @elseif($activity->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded-full">
                                    <i class="fas fa-clock"></i> Pending
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">
                                    <i class="fas fa-times-circle"></i> Rejected
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Banner Preview --}}
                    @if($activity->banner)
                    <div class="mb-4">
                        <img src="{{ asset('fotoaktivitas/'.$activity->banner) }}" 
                             alt="{{ $activity->nama }}" 
                             class="w-full h-32 object-cover rounded-lg">
                    </div>
                    @endif
                    
                    {{-- Deskripsi --}}
                    <p class="text-sm text-gray-600 mt-4 pt-3 border-t border-gray-100 line-clamp-2">
                        {{ Str::limit($activity->deskripsi, 100) }}
                    </p>

                    {{-- Info Tambahan --}}
                    <div class="mt-3 pt-3 border-t border-gray-100">
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-2">
                            <span>
                                <i class="fas fa-money-bill-wave mr-1"></i>
                                {{ $activity->biaya_bergabung == 'gratis' ? 'Gratis' : 'Rp ' . number_format($activity->harga, 0, ',', '.') }}
                            </span>
                            <span>
                                <i class="fas fa-calendar mr-1"></i>
                                {{ $activity->created_at->format('d M Y') }}
                            </span>
                        </div>
                        @if($activity->status == 'rejected' && $activity->alasan_reject)
                        <div class="mt-2 p-2 bg-red-50 border border-red-200 rounded text-xs text-red-700">
                            <strong>Alasan ditolak:</strong> {{ $activity->alasan_reject }}
                        </div>
                        @endif
                    </div>
                    
                    {{-- Tombol Aksi --}}
                    <div class="flex justify-between items-center mt-4 pt-3 border-t border-gray-100">
                        <a href="{{ route('user.community.detail', $activity->id) }}" 
                           class="text-sm font-semibold text-orange-500 hover:text-orange-700 transition duration-150 ease-in-out">
                            Lihat Detail 
                            <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                        <a href="{{ route('user.aktivitas.edit', $activity->id) }}" 
                           class="bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $activities->links() }}
            </div>
            @else
            {{-- Empty State --}}
            <div class="bg-white rounded-xl shadow-xl p-10 flex flex-col items-center justify-center text-center border-2 border-dashed border-gray-300">
                <i class="fas fa-clipboard-list text-6xl text-gray-400 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Aktivitas</h3>
                <p class="text-gray-500 max-w-lg mb-6">
                    Kamu belum membuat aktivitas apapun. Yuk, buat aktivitas pertama kamu sekarang!
                </p>
                <a href="/buat-aktivitas" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-150">
                    <i class="fas fa-plus mr-2"></i> Buat Aktivitas Sekarang
                </a>
            </div>
            @endif
            
        </section>
        
        {{-- Kolom Kanan (Profil) --}}
<div class="lg:col-span-1 space-y-6">

    {{-- Card: Profil Utama --}}
    <div class="bg-white shadow-md rounded-2xl p-6 text-center border-t-4 border-blue-500">
        @if(Auth::user()->image)
            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                 alt="Foto Profil"
                 class="w-24 h-24 mx-auto rounded-full shadow-md mb-4 object-cover">
        @else
            <img src="https://via.placeholder.com/120/2563EB/FFFFFF?text={{ substr(Auth::user()->name ?? 'U', 0, 1) }}"
                 alt="Foto Profil"
                 class="w-24 h-24 mx-auto rounded-full shadow-md mb-4 object-cover">
        @endif
        <h2 class="text-xl font-bold text-gray-900">
            {{ Auth::user()->name ?? 'Rendra Pratama' }}
        </h2>
        <p class="text-sm text-gray-500 mb-2">Anggota Sejak 2024</p>

        <span class="inline-block bg-yellow-100 text-yellow-700 text-sm font-semibold px-3 py-1 rounded-full mb-3">
            Gold Member
        </span>

        <div class="flex justify-center">
            <a href="/edit-profile-user" 
               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold transition duration-200">
                <i class="fas fa-user-edit mr-2"></i> Edit Profil
            </a>
        </div>
    </div>

    {{-- Card: Statistik Akun --}}
    <div class="bg-white shadow-md rounded-2xl p-6 border-t-4 border-indigo-500">
        <h3 class="text-lg font-semibold text-gray-700 mb-3">Statistik Akun</h3>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex justify-between">
                <span>Total Pemesanan</span>
                <span class="font-semibold text-gray-800">12</span>
            </li>
            <li class="flex justify-between">
                <span>Komunitas Aktif</span>
                <span class="font-semibold text-gray-800">2</span>
            </li>
        </ul>
    </div>

    </div>
</main>

@endsection