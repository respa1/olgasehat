@extends('layouts.app')

@section('content')

@php
    $clinic = $clinic ?? $service->clinic;
    $primaryImage = $clinic->logo
        ? asset('fotoklinik/' . $clinic->logo)
        : asset('assets/klnk.png');
    $galleryImages = ($clinic->galleries ?? collect())->map(function ($item) {
        return strpos($item->foto ?? '', 'clinic_galleries') !== false
            ? asset('storage/' . $item->foto)
            : asset('fotoklinik/' . $item->foto);
    });
    $priceLabel = $service->tipe_harga === 'gratis'
        ? 'Gratis'
        : 'Rp ' . number_format($service->harga ?? 0, 0, ',', '.');
    $fasilitas = collect($clinic->fasilitas ?? []);
    $address = collect([$clinic->alamat, $clinic->kota, $clinic->provinsi, $clinic->kode_pos])
        ->filter()
        ->implode(', ');
    $doctors = ($clinic->doctors ?? collect())->filter(fn ($doc) => $doc->aktif);
    $timeSlotOptions = collect($timeSlots ?? [])->flatMap(function ($items, $day) {
        return $items->map(function ($item) use ($day) {
            return [
                'label' => ucfirst($day) . ' ' . $item['label'],
                'value' => $item['label'],
            ];
        });
    });
@endphp

<section class="relative overflow-hidden">
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-blue-700">
        <div class="container mx-auto px-6 py-16 text-white">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.4em] text-blue-200 mb-3">{{ ucfirst($service->kategori) }}</p>
                    <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-4">{{ $service->nama }}</h1>
                    <p class="text-blue-100 flex items-center text-lg mb-3">
                        <i class="fas fa-map-marker-alt mr-2 text-blue-200"></i>
                        {{ $address ?: 'Alamat belum tersedia' }}
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <span class="inline-flex items-center bg-white/10 border border-white/20 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fas fa-money-bill-wave mr-2"></i>{{ $priceLabel }}
                        </span>
                        @if($clinic->nomor_telepon)
                        <span class="inline-flex items-center bg-white/10 border border-white/20 px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="fas fa-phone mr-2"></i>{{ $clinic->nomor_telepon }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="hidden lg:block relative">
                    <img src="{{ $primaryImage }}" alt="{{ $clinic->nama }}" class="rounded-2xl shadow-2xl w-full h-72 object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<main class="container mx-auto px-4 sm:px-6 pt-12 pb-24 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <section class="lg:col-span-8 space-y-8">
            <div class="bg-white p-6 md:p-8 rounded-xl shadow-custom space-y-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Tentang {{ $clinic->nama }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $clinic->deskripsi ?? 'Deskripsi klinik belum ditambahkan oleh pengelola.' }}
                    </p>
                </div>

                <div class="border-t border-gray-100 pt-6">
                    <h3 class="font-bold text-xl text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-star text-green-500 mr-2"></i> Fasilitas
                    </h3>
                    @if($fasilitas->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach($fasilitas as $item)
                                <div class="flex items-center bg-green-50 border border-green-100 rounded-lg px-4 py-3 text-gray-700 text-sm">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    {{ $item }}
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">Pengelola belum menambahkan daftar fasilitas.</p>
                    @endif
                </div>

                <div class="border-t border-gray-100 pt-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-bold text-xl text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-calendar-alt text-blue-500 mr-2"></i> Jadwal Operasional
                        </h3>
                        @if($clinic->hari_operasional)
                            <ul class="space-y-2 text-gray-700">
                                @foreach($clinic->hari_operasional as $day)
                                    <li class="flex justify-between border-b border-gray-100 pb-2">
                                        <span class="font-medium">{{ ucfirst($day) }}</span>
                                        <span>{{ $clinic->jam_buka ? date('H:i', strtotime($clinic->jam_buka)) : '00:00' }} - {{ $clinic->jam_tutup ? date('H:i', strtotime($clinic->jam_tutup)) : '24:00' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500 italic">Jadwal operasional belum ditambahkan.</p>
                        @endif
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-clock text-blue-500 mr-2"></i> Jadwal Pertemuan
                        </h3>
                        @if(($timeSlots ?? collect())->isNotEmpty())
                            <div class="space-y-3">
                                @foreach(($timeSlots ?? collect()) as $day => $slots)
                                    <div>
                                        <p class="text-sm font-semibold text-gray-600 mb-2">{{ ucfirst($day) }}</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($slots as $slot)
                                                <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">{{ $slot['label'] }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 italic">Penjadwalan dokter belum tersedia.</p>
                        @endif
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-6">
                    <h3 class="font-bold text-xl text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-briefcase-medical text-purple-500 mr-2"></i> Layanan Lainnya
                    </h3>
                    @if(($relatedServices ?? collect())->isNotEmpty())
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($relatedServices as $otherService)
                                <a href="{{ route('frontend.service.detail', $otherService->id) }}" class="block border border-gray-100 rounded-xl p-4 hover:border-blue-300 transition shadow-sm">
                                    <p class="text-sm text-blue-500 font-semibold mb-1">{{ ucfirst($otherService->kategori) }}</p>
                                    <h4 class="font-bold text-gray-900 leading-tight">{{ $otherService->nama }}</h4>
                                    <p class="text-sm text-gray-600 mt-2">
                                        {{ $otherService->tipe_harga === 'gratis' ? 'Gratis' : 'Mulai ' . 'Rp ' . number_format($otherService->harga ?? 0, 0, ',', '.') }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">Belum ada layanan lain yang ditawarkan.</p>
                    @endif
                </div>

                @if($galleryImages->isNotEmpty())
                <div class="border-t border-gray-100 pt-6">
                    <h3 class="font-bold text-xl text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-images text-pink-500 mr-2"></i> Galeri Klinik
                    </h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($galleryImages as $image)
                            <img src="{{ $image }}" alt="{{ $clinic->nama }}" class="rounded-xl object-cover w-full h-36">
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </section>

        <aside class="lg:col-span-4 space-y-6">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-6 rounded-2xl shadow-custom sticky top-24">
                <h3 class="text-xl font-bold mb-5">Buat Janji Konsultasi</h3>
                <p class="text-sm text-blue-100 mb-4">Isi form di bawah, tim kami akan menghubungi melalui WhatsApp.</p>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Dokter</label>
                        <select class="w-full px-4 py-2.5 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                            @forelse($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->nama_lengkap ?? $doctor->nama }}</option>
                            @empty
                                <option>Tidak ada dokter aktif</option>
                            @endforelse
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Tanggal</label>
                        <input type="date" class="w-full px-4 py-2.5 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Jam Pertemuan</label>
                        <select class="w-full px-4 py-2.5 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                            @forelse($timeSlotOptions as $option)
                                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                            @empty
                                <option>Jadwal belum tersedia</option>
                            @endforelse
                        </select>
                    </div>
                    <button type="button" class="w-full bg-white text-blue-700 font-bold py-3 rounded-lg hover:bg-blue-50 transition">
                        <i class="fas fa-calendar-check mr-2"></i> Ajukan Penjadwalan
                    </button>
                </form>
                <p class="text-xs text-blue-100 mt-4 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    Admin akan menghubungi Anda untuk konfirmasi via WhatsApp.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-custom">
                <h3 class="font-bold text-lg mb-4 text-gray-900">Kontak Darurat</h3>
                <div class="space-y-3">
                    @if($clinic->nomor_telepon)
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-phone text-green-600 mr-3"></i>
                            <span class="font-semibold text-gray-800">Informasi</span>
                        </div>
                        <span class="text-green-600 font-bold">{{ $clinic->nomor_telepon }}</span>
                    </div>
                    @endif
                    @if($clinic->email)
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-blue-600 mr-3"></i>
                            <span class="font-semibold text-gray-800">Email</span>
                        </div>
                        <span class="text-blue-600 font-bold">{{ $clinic->email }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-custom">
                <h3 class="font-bold text-lg mb-4 text-gray-900">Lokasi Klinik</h3>
                <p class="text-gray-700">{{ $address ?: 'Alamat belum tersedia' }}</p>
                <div class="bg-gray-50 border border-gray-100 rounded-xl h-52 mt-4 flex items-center justify-center text-gray-400">
                    <i class="fas fa-map-marked-alt text-4xl mb-2"></i>
                </div>
            </div>
        </aside>
    </div>
</main>

@endsection
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<main class="container mx-auto px-4 sm:px-6 pt-24 pb-32 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <section class="lg:col-span-8 space-y-8">
            <!-- Gallery/Image Section -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4 overflow-hidden rounded-xl shadow-lg">
                <div class="col-span-1 sm:col-span-2 rounded-tl-xl rounded-bl-xl bg-gradient-to-br from-blue-50 to-indigo-100 h-64 sm:h-96 flex items-center justify-center">
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Klinik Sarana Medika Baru" 
                         class="w-full h-full object-cover">
                </div>
                <div class="hidden sm:grid grid-rows-3 gap-3 md:gap-4 h-96">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-tr-xl flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Fasilitas Klinik" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-violet-100 flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1551076805-e1869033e561?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Ruangan Klinik" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="bg-gradient-to-br from-pink-50 to-rose-100 rounded-br-xl flex items-center justify-center">
                        <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             alt="Dokter Klinik" 
                             class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white p-6 md:p-8 rounded-xl shadow-xl space-y-6">
                
                <!-- Header Section -->
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-2 text-gray-900">Klinik Sarana Medika Baru</h1>
                    <p class="text-lg text-gray-600 mb-3 flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-blue-600"></i>
                        <span>Kabupaten Tangerang, Banten</span>
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-block bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-1.5 rounded-full shadow-sm">
                            <i class="fas fa-hospital mr-2"></i> Klinik Umum
                        </span>
                        <span class="inline-block bg-green-100 text-green-700 text-sm font-semibold px-4 py-1.5 rounded-full shadow-sm">
                            <i class="fas fa-phone mr-2"></i> 08129941262
                        </span>
                    </div>
                </div>

                <hr class="border-gray-200" />

                <!-- Informasi Klinik -->
                <div>
                    <h3 class="font-bold text-xl mb-3 text-gray-800 flex items-center">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>Tentang Klinik
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p class="mb-4">
                            Klinik Sarana Medika Baru merupakan fasilitas kesehatan terpadu yang menyediakan layanan medis komprehensif dengan standar pelayanan terbaik. Klinik ini dilengkapi dengan peralatan medis modern dan didukung oleh tenaga kesehatan profesional yang berpengalaman.
                        </p>
                        <p>
                            Kami berkomitmen untuk memberikan pelayanan kesehatan yang berkualitas dengan pendekatan holistik, mulai dari pencegahan, diagnosis, pengobatan, hingga rehabilitasi untuk seluruh anggota keluarga.
                        </p>
                    </div>
                </div>

                <hr class="border-gray-200" />

                <hr class="border-gray-200" />

                <!-- Jadwal Operasional -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-bold text-xl mb-3 text-gray-800 flex items-center">
                            <i class="fas fa-calendar-alt text-orange-600 mr-2"></i>Jadwal Operasional
                        </h3>
                        <div class="space-y-3 text-gray-700">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="font-medium">Senin - Jumat</span>
                                <span class="text-green-600 font-semibold">07:00 - 21:00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="font-medium">Sabtu</span>
                                <span class="text-green-600 font-semibold">07:00 - 18:00</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="font-medium">Minggu</span>
                                <span class="text-green-600 font-semibold">08:00 - 16:00</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="font-medium">IGD</span>
                                <span class="text-blue-600 font-semibold">24 Jam</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-bold text-xl mb-3 text-gray-800 flex items-center">
                            <i class="fas fa-clipboard-check text-indigo-600 mr-2"></i>Fasilitas
                        </h3>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Ruang Tunggu Nyaman</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Parkir Luas</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>AC di Semua Ruangan</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Toilet Bersih</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Menerima BPJS & Asuransi</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="border-gray-200" />

                <!-- Lokasi Klinik -->
                <div>
                    <h3 class="font-bold text-xl mb-3 text-gray-800 flex items-center">
                        <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>Lokasi Klinik
                    </h3>
                    <div class="bg-gray-50 p-4 rounded-lg space-y-3">
                        <p class="text-gray-700 font-medium">
                            JL Raya Kutabumi No. 50, RT. 006/RW. 004<br>
                            Kp. Teriti, Karet, Kabupaten Tangerang<br>
                            Banten 15810
                        </p>
                        <div class="bg-white p-4 rounded-lg h-64 flex items-center justify-center border border-gray-200">
                            <div class="text-center text-gray-400">
                                <i class="fas fa-map-marked-alt text-4xl mb-2"></i>
                                <p class="text-sm">Peta Lokasi Klinik</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                <i class="fas fa-external-link-alt mr-2"></i>Buka Peta (Google Maps)
                            </a>
                            <span class="text-gray-600 text-sm">
                                <i class="fas fa-phone mr-1"></i>08129941262
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!-- Sidebar -->
        <aside class="lg:col-span-4 space-y-6">
            <!-- Booking Card -->
            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-6 rounded-xl shadow-xl sticky top-24">
                <h3 class="text-xl font-bold mb-5">Buat Janji Konsultasi</h3>
                
                <div class="space-y-3 mb-5">
                    <div class="flex items-center justify-between pb-3 border-b border-blue-500/30">
                        <span class="text-blue-100 text-sm">Biaya Konsultasi Umum</span>
                        <span class="text-2xl font-bold">Rp 50.000</span>
                    </div>
                    <p class="text-sm text-blue-100 leading-relaxed">
                        Pilih jadwal pertemuan dokter yang sesuai, kemudian konfirmasi melalui WhatsApp.
                    </p>
                </div>

                <div class="space-y-4 pt-2">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Dokter</label>
                        <select class="w-full px-4 py-2.5 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                            <option>dr. Swisniawati Hidayat, MARS</option>
                            <option>Kartika Elkim</option>
                            <option>Christine</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Tanggal</label>
                        <div class="relative">
                            <input type="date" class="w-full px-4 py-2.5 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white appearance-none" />
                            <i class="fas fa-calendar-alt absolute right-4 top-1/2 -translate-y-1/2 text-blue-200 pointer-events-none"></i>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Jam Pertemuan</label>
                        <select class="w-full px-4 py-2.5 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white bg-white">
                            <option selected disabled>Pilih slot</option>
                            <option>08:00</option>
                            <option>09:00</option>
                            <option>10:00</option>
                            <option>11:00</option>
                            <option>14:00</option>
                            <option>15:00</option>
                            <option>16:00</option>
                        </select>
                    </div>

                    <button class="w-full bg-white text-blue-600 font-bold py-3 rounded-lg hover:bg-blue-50 transition duration-200 mt-2 shadow-md">
                        <i class="fas fa-calendar-check mr-2"></i>Buat Janji Sekarang
                    </button>
                </div>

                <div class="mt-4 pt-4 border-t border-blue-500/30">
                    <div class="flex items-center text-blue-100 text-sm">
                        <i class="fas fa-info-circle mr-2"></i>
                        <span>Konfirmasi akan dikirim via WhatsApp</span>
                    </div>
                </div>
            </div>

            <!-- Contact Info Card -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Kontak Darurat</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-phone text-green-600 mr-3"></i>
                            <span class="font-semibold text-gray-800">Informasi</span>
                        </div>
                        <span class="text-green-600 font-bold">08129941262</span>
                    </div>
                </div>
            </div>
        </aside>

    </div>
</main>

@endsection

