@extends('user.layout.user')

{{-- Pastikan @push('css') di file layout Anda dipertahankan, karena itu berisi styling untuk 'profile-nav-link' dan 'community-card' --}}

@section('content')

<main class="bg-gray-100 min-h-[calc(100vh-64px)] pt-20 pb-8 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">

        {{-- Kolom Kiri: Form Edit Profil (3/4 kolom) --}}
        <section class="lg:col-span-3 space-y-6">

            {{-- Header Konten --}}
            <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-orange-500">
                <h2 class="font-extrabold text-2xl text-gray-900">Edit Profil Kamu</h2>
                <p class="text-gray-500 mt-1">Perbarui informasi akun dan detail kontakmu.</p>
            </div>

            {{-- Form Edit Profil Utama --}}
            <div class="bg-white rounded-xl shadow-xl p-8">
                <form action="{{ route('user.updateprofile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">

                        {{-- Field: Profile Image --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-2">
                            <label for="image" class="text-gray-700 font-semibold md:col-span-1">Profile Image</label>
                            <div class="md:col-span-3">
                                <input type="file" id="image" name="image"
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                       accept="image/*">
                                <p class="text-sm text-gray-500 mt-1">Upload gambar profil (max 2MB, format: JPG, PNG, GIF)</p>
                                @if(Auth::user()->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Current Profile Image" class="w-20 h-20 rounded-full object-cover">
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Field: Name --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-2">
                            <label for="name" class="text-gray-700 font-semibold md:col-span-1">Name</label>
                            <div class="md:col-span-3">
                                <input type="text" id="name" name="name"
                                       value="{{ Auth::user()->name ?? 'Rendra' }}"
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                       placeholder="Edit Nama Anda">
                            </div>
                        </div>

                        {{-- Field: Email --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-2">
                            <label for="email" class="text-gray-700 font-semibold md:col-span-1">Email</label>
                            <div class="md:col-span-3">
                                <input type="email" id="email" name="email"
                                       value="{{ Auth::user()->email ?? '' }}"
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                       placeholder="Edit Email Anda">
                            </div>
                        </div>

                        {{-- Field: Passwprd --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-2">
                            <label for="address" class="text-gray-700 font-semibold md:col-span-1">New Password</label>
                            <div class="md:col-span-3">
                                <input type="text" id="address" name="address" 
                                       value="" 
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150" 
                                       placeholder="Masukkan Password baru">
                            </div>
                        </div>

                        {{-- Field: Confirm Passwprd --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center gap-2">
                            <label for="address" class="text-gray-700 font-semibold md:col-span-1">Confirm New Password</label>
                            <div class="md:col-span-3">
                                <input type="text" id="address" name="address" 
                                       value="" 
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150" 
                                       placeholder="Masukkan Password baru">
                            </div>
                        </div>

                        {{-- Tombol Simpan Perubahan --}}
                        <div class="flex justify-start pt-4 md:col-span-4 md:col-start-2">
                            <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-150">
                                Save Changes
                            </button>
                        </div>
                        
                    </div>
                </form>
            </div>
            
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