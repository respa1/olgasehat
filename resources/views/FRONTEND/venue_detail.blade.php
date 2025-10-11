@extends('FRONTEND.layout.frontend')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<main class="container mx-auto px-4 sm:px-6 pt-24 pb-32 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <section class="lg:col-span-8 space-y-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4 overflow-hidden rounded-xl shadow-lg">
                <img
                    src="{{ asset('assets/MU Sport Center.jpeg') }}"
                    alt="MU Sport Center Main"
                    class="col-span-1 sm:col-span-2 rounded-tl-xl rounded-bl-xl object-cover h-64 sm:h-96 w-full transition duration-300 hover:scale-105 cursor-pointer"
                />
                <div class="hidden sm:grid grid-rows-3 gap-3 md:gap-4 h-96">
                    <img
                        src="{{ asset('assets/DC Arena Bali.jpeg') }}"
                        alt="MU Sport Center 1"
                        class="rounded-tr-xl object-cover w-full h-full transition duration-300 hover:scale-105 cursor-pointer"
                    />
                    <img
                        src="{{ asset('assets/Imbo Sport Center.webp') }}"
                        alt="MU Sport Center 2"
                        class="object-cover w-full h-full transition duration-300 hover:scale-105 cursor-pointer"
                    />
                    <div
                        class="relative rounded-br-xl overflow-hidden cursor-pointer group"
                        aria-label="Lihat semua foto"
                    >
                        <img
                            src="{{ asset('assets/Arena Sport.jpg') }}"
                            alt="MU Sport Center 3"
                            class="object-cover w-full h-full brightness-50 transition duration-300 group-hover:brightness-75 group-hover:scale-105"
                        />
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center text-white font-bold text-lg"
                        >
                            <i class="fas fa-camera text-2xl mb-1"></i>
                            Lihat Semua
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-xl shadow-xl space-y-6">
                
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold mb-1 text-gray-900">MU Sport Center</h1>
                    <p class="text-lg text-gray-600 mb-3 flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-blue-600"></i>
                        <span>Kota Denpasar</span>
                    </p>
                    <span
                        class="inline-block bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-1.5 rounded-full shadow-sm"
                    >
                        <i class="fas fa-futbol mr-2"></i> Futsal
                    </span>
                </div>

                <hr class="border-gray-200" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="font-bold text-xl mb-3 text-gray-800">Detail Lapangan</h3>
                        <p class="text-gray-700 leading-relaxed">
                            MU Sport Center memiliki 1 Lapangan Futsal standar internasional dengan rumput sintetis terbaik. Cocok untuk pertandingan dan latihan tim.
                        </p>
                    </div>

                    <div>
                        <h3 class="font-bold text-xl mb-3 text-gray-800">Aturan Venue</h3>
                        <div id="rulesText" class="text-sm text-gray-700 max-h-24 overflow-hidden transition-all duration-500 ease-in-out">
                            <p class="font-semibold mb-2">Peraturan Lapangan MU Sport Center:</p>
                            <ol class="list-decimal list-inside space-y-1 pl-2">
                                <li>Pemain harus datang tepat waktu (tidak ada kompensasi waktu atas keterlambatan konsumen)</li>
                                <li>Apabila terjadi hal teknis yang terjadi di Centro Padel Bintaro yang menyebabkan lapangan tidak bisa digunakan, kompensasi akan diberikan sesuai kebijakan manajemen.</li>
                                <li>Dilarang membawa makanan dan minuman dari luar ke area lapangan.</li>
                                <li>Wajib menggunakan sepatu olahraga yang sesuai.</li>
                                <li>Jaga kebersihan dan ketertiban di lingkungan venue.</li>
                            </ol>
                        </div>
                        <button
                            id="toggleRulesBtn"
                            class="text-blue-700 text-sm font-semibold mt-3 hover:text-blue-900 transition flex items-center"
                        >
                            Baca Selengkapnya <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                    </div>
                </div>
                
                <hr class="border-gray-200" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div>
                        <h3 class="font-bold text-xl mb-3 text-gray-800">Lokasi Venue</h3>
                        <div class="bg-gray-50 p-4 rounded-lg flex flex-col space-y-3">
                            <p class="text-gray-600 leading-relaxed">
                                Jl. Taman Makam Bahagia Parigi Pd. Aren Tangerang Selatan
                            </p>
                            <a
                                href="#"
                                class="text-blue-700 font-semibold hover:text-blue-900 transition flex items-center space-x-2 text-base"
                                target="_blank"
                            >
                                <i class="fas fa-map-marked-alt"></i>
                                <span>Buka Peta (Google Maps)</span>
                            </a>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-bold text-xl mb-3 text-gray-800">Video Preview</h3>
                        <div class="relative bg-black rounded-lg overflow-hidden group shadow-md">
                            <img src="{{ asset('assets/Arena Sport.jpg') }}" alt="Video Preview" class="w-full h-32 object-cover opacity-70 group-hover:opacity-100 transition duration-300 cursor-pointer" />
                            <a href="https://www.youtube.com/watch?v=EXAMPLE" target="_blank" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 group-hover:bg-opacity-10 transition">
                                <i class="fab fa-youtube text-white text-5xl opacity-80 group-hover:opacity-100 transition duration-300"></i>
                            </a>
                            <p class="absolute bottom-2 left-3 text-white text-xs font-medium bg-black/50 px-2 py-0.5 rounded">Lihat Video Lapangan</p>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-200" />
                
                <div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Fasilitas Tersedia</h3>
                    <ul class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 text-gray-700">
                        <li class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <i class="fas fa-shopping-basket text-blue-600 text-xl"></i>
                            <span>Jual Minuman</span>
                        </li>
                        <li class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <i class="fas fa-mosque text-blue-600 text-xl"></i>
                            <span>Musholla</span>
                        </li>
                        <li class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <i class="fas fa-car text-blue-600 text-xl"></i>
                            <span>Parkir Mobil</span>
                        </li>
                        <li class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <i class="fas fa-motorcycle text-blue-600 text-xl"></i>
                            <span>Parkir Motor</span>
                        </li>
                        <li class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <i class="fas fa-couch text-blue-600 text-xl"></i>
                            <span>Ruang Ganti</span>
                        </li>
                        <li class="flex items-center space-x-3 bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <i class="fas fa-toilet text-blue-600 text-xl"></i>
                            <span>Toilet</span>
                        </li>
                    </ul>
                    <button
                        class="mt-6 px-5 py-2.5 bg-blue-50 border border-blue-200 rounded-lg text-blue-700 text-sm font-semibold hover:bg-blue-100 transition shadow-sm"
                    >
                        Lihat semua fasilitas (6)
                    </button>
                </div>
            </div>

            <div class="mt-8 bg-white p-6 md:p-8 rounded-xl shadow-xl">
                <h3 class="font-bold text-2xl mb-5 text-gray-900">Jadwal & Booking Lapangan</h3>
                
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0 sm:space-x-4">
                    <input
                        type="date"
                        class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-auto"
                        value="2025-07-24"
                    />
                    <select
                        class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-auto"
                    >
                        <option>MU Sport Center - Lapangan Futsal A</option>
                        <option>MU Sport Center - Lapangan Futsal B</option>
                        <option>Lapangan Basket B</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 md:gap-4 overflow-x-auto pb-4" id="timeSlotsContainer">
                    <button class="bg-gray-100 rounded-lg p-3 text-sm text-gray-500 cursor-not-allowed border border-gray-200 min-w-[110px] h-20 shadow-sm" disabled>
                        06:00 - 07:00<br /><span class="font-semibold line-through">Rp 125,000</span><br /><span class="text-red-600 font-bold">Booked</span>
                    </button>
                    
                    <button class="bg-white border-2 border-green-500 rounded-lg p-3 text-sm text-gray-700 hover:bg-blue-700 hover:text-white transition min-w-[110px] h-20 selectable relative overflow-hidden shadow-md" data-time="07:00 - 08:00" data-price="100000" data-promo="Promosi">
                        <span class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-2 rounded-bl-lg">PROMO</span>
                        07:00 - 08:00<br /><span class="text-lg font-bold">Rp 100,000</span>
                    </button>
                    
                    <button class="bg-blue-700 rounded-lg p-3 text-sm text-white min-w-[110px] h-20 hidden selectable-cancel relative shadow-xl" data-time="07:00 - 08:00" data-price="100000" data-promo="Batal">
                        <span class="absolute top-0 right-0 bg-blue-900 text-white text-xs font-bold px-2 rounded-bl-lg">PILIH</span>
                        07:00 - 08:00<br /><span class="text-lg font-bold">Batal Pilih</span>
                    </button>
                    
                    <button class="bg-white border border-gray-300 rounded-lg p-3 text-sm text-gray-700 hover:bg-blue-700 hover:text-white transition min-w-[110px] h-20 selectable shadow-sm" data-time="08:00 - 09:00" data-price="125000">
                        08:00 - 09:00<br /><span class="text-lg font-bold">Rp 125,000</span>
                    </button>
                    
                    <button class="bg-blue-700 rounded-lg p-3 text-sm text-white min-w-[110px] h-20 hidden selectable-cancel relative shadow-xl" data-time="08:00 - 09:00" data-price="125000">
                        <span class="absolute top-0 right-0 bg-blue-900 text-white text-xs font-bold px-2 rounded-bl-lg">PILIH</span>
                        08:00 - 09:00<br /><span class="text-lg font-bold">Batal Pilih</span>
                    </button>

                    <button class="bg-gray-100 rounded-lg p-3 text-sm text-gray-500 cursor-not-allowed border border-gray-200 min-w-[110px] h-20 shadow-sm" disabled>
                        09:00 - 10:00<br /><span class="font-semibold line-through">Rp 125,000</span><br /><span class="text-red-600 font-bold">Booked</span>
                    </button>
                </div>
            </div>
            
        </section>

        <aside class="lg:col-span-4 space-y-6 sticky top-24 self-start">
            <div class="bg-white p-6 rounded-xl shadow-xl space-y-4 border-t-4 border-blue-700">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Detail Pemesanan Anda</h3>
                
                <div id="cartContent" class="space-y-4 min-h-[50px]">
                    </div>

                <div id="initialPriceCard" class="text-center py-4">
                    <p class="text-sm text-gray-600">Mulai harga per jam</p>
                    <p class="text-3xl font-extrabold text-blue-700">Rp 100,000 <span class="text-base font-normal text-gray-500">/ jam</span></p>
                    <p class="text-sm text-gray-500 mt-2">Pilih jadwal di sebelah kiri untuk memulai.</p>
                </div>
                
                <div id="bookingSummary" class="hidden pt-4 border-t">
                    <div class="flex justify-between items-center text-gray-700 font-medium text-sm">
                        <span>Total Sesi:</span>
                        <span id="total-sessions" class="font-bold text-gray-900">0 Jam</span>
                    </div>
                    <div class="flex justify-between items-center text-lg font-bold mt-2">
                        <span>Total Pembayaran:</span>
                        <span id="total-price" class="text-blue-700">Rp 0</span>
                    </div>
                </div>

                <a href="/confirm" id="bookLink" class="block">
                    <button id="bookButton" class="w-full bg-blue-700 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition shadow-lg mt-4" disabled>
                        PILIH JADWAL DI ATAS
                    </button>
                </a>
            </div>
            
        </aside>
    </div>
</main>

<div id="bottomButton" class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 p-4 shadow-2xl hidden lg:hidden z-50">
    <div class="flex justify-between items-center mb-2">
        <p class="text-sm text-gray-600"><span id="mobile-session-count">0 Sesi</span></p>
        <p class="text-xl font-bold text-blue-700" id="mobile-total-price">Rp 0</p>
    </div>
    <a href="/confirm" class="block w-full">
      <button class="w-full bg-blue-700 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
        LANJUT PEMBAYARAN
      </button>
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // --- Global State & Element Selection ---
        let cart = [];
        const venueName = 'MU Sport Center';
        const fieldSelect = document.querySelector('select');
        const dateInput = document.querySelector('input[type="date"]');
        const timeSlotsContainer = document.getElementById('timeSlotsContainer');
        const cartContent = document.getElementById('cartContent'); // Kontainer utama cart
        const bookingSummary = document.getElementById('bookingSummary');
        const initialPriceCard = document.getElementById('initialPriceCard');
        const bookButton = document.getElementById('bookButton');
        const bottomButton = document.getElementById('bottomButton');
        const toggleBtn = document.getElementById('toggleRulesBtn');
        const rulesText = document.getElementById('rulesText');


        // --- Helper Functions ---

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }
        
        function calculateTotal() {
            let total = 0;
            let totalSessions = 0;
            cart.forEach(item => {
                // Harga disimpan sebagai integer di data-price, jadi bisa langsung diparse
                const price = parseInt(item.price); 
                total += price;
                totalSessions += 1;
            });
            return { total, totalSessions };
        }

        function addToCart(timeSlot, price) {
            const fieldName = fieldSelect.options[fieldSelect.selectedIndex].text;
            const currentDate = dateInput ? dateInput.value : '2025-09-04';
            
            const item = {
                venue: venueName,
                field: fieldName,
                date: currentDate,
                time: timeSlot,
                price: price 
            };
            cart.push(item);
            renderCart();
            updateSummary();
        }

        // Dihapus berdasarkan waktu (timeSlot)
        window.removeFromCart = function(timeSlot) {
            const initialLength = cart.length;
            cart = cart.filter(item => item.time !== timeSlot);
            
            // Mengembalikan styling tombol di Time Slots Container
            if (initialLength > cart.length) {
                const normalBtn = timeSlotsContainer.querySelector(`button.selectable[data-time="${timeSlot}"]`);
                const cancelBtn = timeSlotsContainer.querySelector(`button.selectable-cancel[data-time="${timeSlot}"]`);
                if (normalBtn && cancelBtn) {
                    cancelBtn.classList.add('hidden');
                    normalBtn.classList.remove('hidden');
                }
            }
            
            renderCart();
            updateSummary();
        }

        function renderCart() {
            const { totalSessions } = calculateTotal();

            if (totalSessions === 0) {
                cartContent.innerHTML = ''; // Kosongkan
                initialPriceCard.classList.remove('hidden');
                bookingSummary.classList.add('hidden');
                bookButton.disabled = true;
                bookButton.textContent = 'PILIH JADWAL DI ATAS';
                return;
            }

            // Tampilkan konten cart
            initialPriceCard.classList.add('hidden');
            bookingSummary.classList.remove('hidden');
            bookButton.disabled = false;
            bookButton.textContent = `BAYAR SEKARANG (${totalSessions} SESI)`;

            cartContent.innerHTML = cart.map(item => {
                const formattedPrice = formatRupiah(parseInt(item.price));
                return `
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 shadow-sm relative transition duration-300">
                        <button onclick="removeFromCart('${item.time}')" aria-label="Hapus item" class="absolute top-2 right-2 text-red-500 hover:text-red-700 focus:outline-none transition">
                            <i class="fas fa-times-circle text-lg"></i>
                        </button>
                        <h4 class="font-bold text-sm uppercase text-gray-800 mb-1">${item.field}</h4>
                        <p class="text-xs text-gray-600">${item.date} • <span class="font-semibold">${item.time}</span></p>
                        <p class="text-xl font-extrabold text-blue-700 mt-2">${formattedPrice}</p>
                    </div>
                `;
            }).join('');
        }

        function updateSummary() {
            const { total, totalSessions } = calculateTotal();
            
            // Sidebar summary update
            document.getElementById('total-sessions').textContent = `${totalSessions} Sesi`;
            document.getElementById('total-price').textContent = formatRupiah(total);
            
            // Mobile summary update
            document.getElementById('mobile-session-count').textContent = `${totalSessions} Sesi`;
            document.getElementById('mobile-total-price').textContent = formatRupiah(total);

            toggleBottomButton(totalSessions);
        }

        function toggleBottomButton(totalSessions) {
            if (totalSessions > 0 && window.innerWidth < 1024) { // Tampilkan hanya di mobile/tablet
                bottomButton.classList.remove('hidden');
            } else {
                bottomButton.classList.add('hidden');
            }
        }
        
        // --- Event Listeners and Initial Setup ---

        // Toggle rules "Read more" (Sudah diimplementasikan)
        if (toggleBtn && rulesText) {
            rulesText.style.maxHeight = '6rem'; 

            toggleBtn.addEventListener('click', () => {
                const icon = toggleBtn.querySelector('i');
                if (rulesText.classList.contains('overflow-hidden')) {
                    rulesText.classList.remove('overflow-hidden', 'max-h-24');
                    rulesText.style.maxHeight = rulesText.scrollHeight + 'px';
                    toggleBtn.innerHTML = 'Sembunyikan <i class="fas fa-chevron-up ml-2 text-xs"></i>';
                } else {
                    rulesText.style.maxHeight = '6rem';
                    rulesText.classList.add('overflow-hidden', 'max-h-24');
                    toggleBtn.innerHTML = 'Baca Selengkapnya <i class="fas fa-chevron-down ml-2 text-xs"></i>';
                }
            });
        }

        // Time slot selection
        if (timeSlotsContainer) {
            timeSlotsContainer.addEventListener('click', (e) => {
                const target = e.target.closest('button.selectable, button.selectable-cancel');
                if (!target || target.disabled) return;

                const time = target.dataset.time;
                // Pastikan data-price diambil sebagai integer string
                const price = target.dataset.price; 
                
                let normalBtn, cancelBtn;
                if (target.classList.contains('selectable')) {
                    normalBtn = target;
                    cancelBtn = target.nextElementSibling;
                } else if (target.classList.contains('selectable-cancel')) {
                    cancelBtn = target;
                    normalBtn = target.previousElementSibling;
                }

                if (!normalBtn || !cancelBtn) return;

                // Select slot
                if (target.classList.contains('selectable') && target.classList.contains('hidden') === false) {
                    addToCart(time, price);
                    cancelBtn.classList.remove('hidden');
                    normalBtn.classList.add('hidden');
                } 
                // Deselect slot
                else if (target.classList.contains('selectable-cancel') && target.classList.contains('hidden') === false) {
                    removeFromCart(time);
                    cancelBtn.classList.add('hidden');
                    normalBtn.classList.remove('hidden');
                }
            });
        }
        
        // Trigger mobile button check on resize
        window.addEventListener('resize', () => updateSummary());

        // Initial render
        renderCart();
        updateSummary();
    });
</script>
@endsection