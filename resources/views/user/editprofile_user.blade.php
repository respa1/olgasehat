@extends('user.layout.user')

{{-- Pastikan @push('css') di file layout Anda dipertahankan, karena itu berisi styling untuk 'profile-nav-link' dan 'community-card' --}}

@section('content')

<main class="bg-gray-100 min-h-[calc(100vh-64px)] pt-20 pb-8 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8">

        {{-- Kolom Kiri: Form Edit Profil (Menggunakan 3 dari 4 kolom di layar besar) --}}
        <section class="lg:col-span-3 space-y-6">

            {{-- Header Konten --}}
            <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-orange-500">
                <h2 class="font-extrabold text-2xl text-gray-900">Edit Profil Kamu</h2>
                <p class="text-gray-500 mt-1">Perbarui informasi akun dan detail kontakmu.</p>
            </div>

            {{-- Form Edit Profil --}}
            <div class="bg-white rounded-xl shadow-xl p-8">
                <form action="{{') }}" method="POST">
                    {{-- Ganti dengan route update profil yang sesuai di web.php --}}
                    @csrf
            
                    {{-- Gunakan metode PUT untuk update data sesuai standar REST --}}

                    <div class="space-y-6">
                        
                        {{-- Field: Full Name --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center">
                            <label for="full_name" class="text-gray-700 font-semibold md:col-span-1">Full Name</label>
                            <div class="md:col-span-3">
                                <input type="text" id="full_name" name="full_name" 
                                       value="John Doe" 
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150" 
                                       placeholder="Masukkan Nama Lengkap">
                            </div>
                        </div>

                        {{-- Field: Email --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center">
                            <label for="email" class="text-gray-700 font-semibold md:col-span-1">Email</label>
                            <div class="md:col-span-3">
                                <input type="email" id="email" name="email" 
                                       value="john@example.com" 
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150" 
                                       placeholder="Masukkan Alamat Email">
                            </div>
                        </div>

                        {{-- Field: Phone (Nomor Telepon Rumah/Kantor) --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center">
                            <label for="phone" class="text-gray-700 font-semibold md:col-span-1">Phone</label>
                            <div class="md:col-span-3">
                                <input type="tel" id="phone" name="phone" 
                                       value="(239) 816-9029" 
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150" 
                                       placeholder="(XXX) XXX-XXXX">
                            </div>
                        </div>

                        {{-- Field: Mobile (Nomor Ponsel) --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center">
                            <label for="mobile" class="text-gray-700 font-semibold md:col-span-1">Mobile</label>
                            <div class="md:col-span-3">
                                <input type="tel" id="mobile" name="mobile" 
                                       value="(320) 380-4539" 
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150" 
                                       placeholder="(XXX) XXX-XXXX">
                            </div>
                        </div>

                        {{-- Field: Address --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 items-center">
                            <label for="address" class="text-gray-700 font-semibold md:col-span-1">Address</label>
                            <div class="md:col-span-3">
                                <input type="text" id="address" name="address" 
                                       value="Bay Area, San Francisco, CA" 
                                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150" 
                                       placeholder="Masukkan Alamat Lengkap">
                            </div>
                        </div>

                        {{-- Tombol Simpan Perubahan --}}
                        <div class="flex justify-end pt-4">
                            <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 transition duration-150">
                                Save Changes
                            </button>
                        </div>

                    </div>
                </form>
            </div>
            
        </section>
        
        {{-- Kolom Kanan: Navigasi Profil (Menggunakan 1 dari 4 kolom di layar besar) --}}
        <div class="lg:col-span-1 space-y-6">

            {{-- Card: Navigasi Profil --}}
            <div class="bg-white shadow-md rounded-2xl p-4">
                <h3 class="text-lg font-bold text-gray-800 mb-3 px-2">Menu Profil</h3>
                <nav class="space-y-1">
                    <a href="" class="profile-nav-link">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="" class="profile-nav-link">
                        <i class="fas fa-users"></i> Komunitas Saya
                    </a>
                    <a href="" class="profile-nav-link active">
                        <i class="fas fa-user-edit"></i> Edit Profil
                    </a>
                    <a href="" class="profile-nav-link">
                        <i class="fas fa-cog"></i> Pengaturan Akun
                    </a>
                </nav>
            </div>
            
        </div>
    </div>
</main>

@endsection