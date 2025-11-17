@extends('user.layout.frontenduser')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<main class="container mx-auto px-4 sm:px-6 pt-24 pb-32 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <section class="lg:col-span-8 space-y-8">
            <!-- Gallery/Image Section -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4 overflow-hidden rounded-xl shadow-lg">
                <div class="col-span-1 sm:col-span-2 rounded-tl-xl rounded-bl-xl bg-gradient-to-br from-blue-50 to-indigo-100 h-64 sm:h-96 flex items-center justify-center">
                    <i class="fas fa-heartbeat text-6xl sm:text-8xl text-blue-600 opacity-30"></i>
                </div>
                <div class="hidden sm:grid grid-rows-3 gap-3 md:gap-4 h-96">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-tr-xl flex items-center justify-center">
                        <i class="fas fa-stethoscope text-3xl text-green-600 opacity-40"></i>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-violet-100 flex items-center justify-center">
                        <i class="fas fa-user-md text-3xl text-purple-600 opacity-40"></i>
                    </div>
                    <div class="bg-gradient-to-br from-pink-50 to-rose-100 rounded-br-xl flex items-center justify-center">
                        <i class="fas fa-pills text-3xl text-pink-600 opacity-40"></i>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white p-6 md:p-8 rounded-xl shadow-xl space-y-6">
                
                <!-- Header Section -->
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-2 text-gray-900">Konsultasi Kesehatan Umum</h1>
                    <p class="text-lg text-gray-600 mb-3 flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-blue-600"></i>
                        <span>Klinik Olga Sehat, Jakarta</span>
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-block bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-1.5 rounded-full shadow-sm">
                            <i class="fas fa-user-md mr-2"></i> Konsultasi
                        </span>
                        <span class="inline-block bg-green-100 text-green-700 text-sm font-semibold px-4 py-1.5 rounded-full shadow-sm">
                            <i class="fas fa-clock mr-2"></i> 30 Menit
                        </span>
                        <span class="inline-block bg-purple-100 text-purple-700 text-sm font-semibold px-4 py-1.5 rounded-full shadow-sm">
                            <i class="fas fa-star mr-2"></i> 4.8 (120 Review)
                        </span>
                    </div>
                </div>

                <hr class="border-gray-200" />

                <!-- Deskripsi Layanan -->
                <div>
                    <h3 class="font-bold text-xl mb-3 text-gray-800 flex items-center">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>Tentang Layanan
                    </h3>
                    <div class="text-gray-700 leading-relaxed">
                        <p class="mb-4">
                            Konsultasi kesehatan umum adalah layanan pemeriksaan dan konsultasi medis yang dilakukan oleh dokter berpengalaman untuk menilai kondisi kesehatan Anda secara menyeluruh. Layanan ini mencakup pemeriksaan fisik, evaluasi gejala, diagnosis awal, dan pemberian rekomendasi pengobatan atau tindakan lanjutan yang diperlukan.
                        </p>
                        <p>
                            Konsultasi ini sangat cocok untuk Anda yang mengalami keluhan kesehatan, memerlukan second opinion, atau ingin melakukan medical check-up rutin untuk menjaga kesehatan optimal.
                        </p>
                    </div>
                </div>

                <hr class="border-gray-200" />

                <!-- Manfaat Layanan -->
                <div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800 flex items-center">
                        <i class="fas fa-check-circle text-green-600 mr-2"></i>Manfaat Layanan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-start space-x-3 p-4 bg-green-50 rounded-lg">
                            <i class="fas fa-check text-green-600 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Diagnosis Akurat</h4>
                                <p class="text-sm text-gray-600">Pemeriksaan menyeluruh untuk diagnosis yang tepat</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg">
                            <i class="fas fa-check text-blue-600 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Konsultasi Personal</h4>
                                <p class="text-sm text-gray-600">Konsultasi one-on-one dengan dokter berpengalaman</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-4 bg-purple-50 rounded-lg">
                            <i class="fas fa-check text-purple-600 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Rekomendasi Tindakan</h4>
                                <p class="text-sm text-gray-600">Rencana pengobatan dan tindakan lanjutan yang jelas</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-4 bg-pink-50 rounded-lg">
                            <i class="fas fa-check text-pink-600 mt-1"></i>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-1">Follow-up Care</h4>
                                <p class="text-sm text-gray-600">Pemantauan perkembangan kesehatan Anda</p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200" />

                <!-- Prosedur & Persiapan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-bold text-xl mb-3 text-gray-800 flex items-center">
                            <i class="fas fa-list-ol text-orange-600 mr-2"></i>Prosedur Layanan
                        </h3>
                        <ol class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">1</span>
                                <span>Registrasi dan pengisian data kesehatan awal</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">2</span>
                                <span>Pemeriksaan tanda vital (tekanan darah, suhu, nadi)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">3</span>
                                <span>Konsultasi dengan dokter mengenai keluhan dan riwayat kesehatan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">4</span>
                                <span>Pemeriksaan fisik sesuai indikasi</span>
                            </li>
                            <li class="flex items-start">
                                <span class="flex-shrink-0 w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">5</span>
                                <span>Diskusi hasil dan pemberian rekomendasi</span>
                            </li>
                        </ol>
                    </div>

                    <div>
                        <h3 class="font-bold text-xl mb-3 text-gray-800 flex items-center">
                            <i class="fas fa-clipboard-check text-indigo-600 mr-2"></i>Persiapan Sebelum Konsultasi
                        </h3>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Bawa identitas diri (KTP/SIM)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Bawa hasil pemeriksaan sebelumnya (jika ada)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Catat keluhan dan gejala yang dialami</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Bawa daftar obat yang sedang dikonsumsi</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-600 mr-3 mt-1"></i>
                                <span>Datang 15 menit sebelum jadwal konsultasi</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <hr class="border-gray-200" />

                <!-- Dokter & Spesialis -->
                <div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800 flex items-center">
                        <i class="fas fa-user-md text-blue-600 mr-2"></i>Dokter yang Menangani
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user-md text-blue-600 text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Dr. Ahmad Wijaya, Sp.PD</h4>
                                <p class="text-sm text-gray-600">Spesialis Penyakit Dalam</p>
                                <p class="text-xs text-gray-500">15 tahun pengalaman</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user-md text-green-600 text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Dr. Siti Nurhaliza, Sp.PD</h4>
                                <p class="text-sm text-gray-600">Spesialis Penyakit Dalam</p>
                                <p class="text-xs text-gray-500">12 tahun pengalaman</p>
                            </div>
                        </div>
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
                            Klinik Olga Sehat<br>
                            Jl. Kesehatan No. 123, Jakarta Pusat<br>
                            Jakarta, DKI Jakarta 10110
                        </p>
                        <div class="bg-white p-4 rounded-lg h-64 flex items-center justify-center border border-gray-200">
                            <div class="text-center text-gray-400">
                                <i class="fas fa-map-marked-alt text-4xl mb-2"></i>
                                <p class="text-sm">Peta Lokasi Klinik</p>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            <i class="fas fa-external-link-alt mr-2"></i>Buka Peta (Google Maps)
                        </a>
                    </div>
                </div>

            </div>

            <!-- Testimoni Section -->
            <div class="bg-white p-6 md:p-8 rounded-xl shadow-xl">
                <h3 class="font-bold text-xl mb-4 text-gray-800 flex items-center">
                    <i class="fas fa-star text-yellow-500 mr-2"></i>Testimoni Pasien
                </h3>
                <div class="space-y-4">
                    <div class="border-l-4 border-blue-500 pl-4 py-2">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="font-semibold text-gray-800">Budi Santoso</span>
                        </div>
                        <p class="text-gray-700">Pelayanan sangat baik, dokter sangat profesional dan ramah. Penjelasan yang diberikan sangat jelas dan mudah dipahami.</p>
                    </div>
                    <div class="border-l-4 border-green-500 pl-4 py-2">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="font-semibold text-gray-800">Sari Dewi</span>
                        </div>
                        <p class="text-gray-700">Kliniknya bersih dan nyaman. Proses konsultasi berjalan lancar, tidak perlu menunggu lama. Sangat recommended!</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-white p-6 md:p-8 rounded-xl shadow-xl">
                <h3 class="font-bold text-xl mb-4 text-gray-800 flex items-center">
                    <i class="fas fa-question-circle text-purple-600 mr-2"></i>Pertanyaan yang Sering Diajukan
                </h3>
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-2 flex items-center">
                            <i class="fas fa-question text-blue-600 mr-2"></i>Berapa lama durasi konsultasi?
                        </h4>
                        <p class="text-gray-600 text-sm">Rata-rata konsultasi berlangsung selama 30-45 menit, tergantung kompleksitas kondisi yang dikonsultasikan.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-2 flex items-center">
                            <i class="fas fa-question text-blue-600 mr-2"></i>Apakah bisa konsultasi online?
                        </h4>
                        <p class="text-gray-600 text-sm">Ya, kami menyediakan layanan konsultasi online melalui platform telemedicine. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-800 mb-2 flex items-center">
                            <i class="fas fa-question text-blue-600 mr-2"></i>Apakah bisa menggunakan BPJS?
                        </h4>
                        <p class="text-gray-600 text-sm">Ya, kami menerima pasien BPJS. Pastikan Anda membawa kartu BPJS yang masih aktif saat konsultasi.</p>
                    </div>
                </div>
            </div>

        </section>

        <!-- Sidebar -->
        <aside class="lg:col-span-4 space-y-6">
            <!-- Booking Card -->
            <div class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-6 rounded-xl shadow-xl sticky top-24">
                <h3 class="text-xl font-bold mb-5">Booking Konsultasi</h3>
                
                <div class="space-y-3 mb-5">
                    <div class="flex items-center justify-between pb-3 border-b border-blue-500/30">
                        <span class="text-blue-100 text-sm">Biaya Konsultasi</span>
                        <span class="text-2xl font-bold">Rp 150.000</span>
                    </div>
                    <div class="flex items-center justify-between text-sm pb-3 border-b border-blue-500/30">
                        <span class="text-blue-100">Durasi</span>
                        <span class="font-semibold">30 Menit</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-blue-100">Rating</span>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-300 mr-1"></i>
                            <span class="font-semibold">4.8 (120)</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 pt-2">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Tanggal</label>
                        <input type="date" class="w-full px-4 py-2.5 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white" />
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Waktu</label>
                        <select class="w-full px-4 py-2.5 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                            <option>08:00 - 08:30</option>
                            <option>09:00 - 09:30</option>
                            <option>10:00 - 10:30</option>
                            <option>14:00 - 14:30</option>
                            <option>15:00 - 15:30</option>
                        </select>
                    </div>

                    <button class="w-full bg-white text-blue-600 font-bold py-3 rounded-lg hover:bg-blue-50 transition duration-200 mt-2 shadow-md">
                        <i class="fas fa-calendar-check mr-2"></i>Booking Sekarang
                    </button>
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-white p-6 rounded-xl shadow-xl">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Informasi Penting</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start">
                        <i class="fas fa-clock text-blue-600 mr-2 mt-1"></i>
                        <div>
                            <p class="font-semibold text-gray-800">Jam Operasional</p>
                            <p class="text-gray-600">Senin - Jumat: 08:00 - 17:00<br>Sabtu: 08:00 - 13:00</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-phone text-green-600 mr-2 mt-1"></i>
                        <div>
                            <p class="font-semibold text-gray-800">Kontak</p>
                            <p class="text-gray-600">021-12345678<br>0812-3456-7890</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-shield-alt text-purple-600 mr-2 mt-1"></i>
                        <div>
                            <p class="font-semibold text-gray-800">Terdaftar</p>
                            <p class="text-gray-600">BPJS, Asuransi Swasta</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

    </div>
</main>

@endsection

