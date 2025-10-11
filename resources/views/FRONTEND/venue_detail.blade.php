@extends('FRONTEND.layout.frontend')

@section('content')

  <!-- Venue Detail Section -->
  <main class="container mx-auto px-6 pt-24 pb-24 max-w-7xl">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      <!-- Left Content: Images and Venue Info -->
      <section class="lg:col-span-8 space-y-6">
        <!-- Images -->
        <div class="grid grid-cols-3 gap-4">
          <img
            src="{{ asset('assets/MU Sport Center.jpeg') }}"
            alt="MU Sport Center Main"
            class="col-span-2 rounded-lg object-cover h-72 w-full"
          />
          <div class="grid grid-rows-3 gap-4">
            <img
              src="{{ asset('assets/DC Arena Bali.jpeg') }}"
              alt="MU Sport Center 1"
              class="rounded-lg object-cover h-24 w-full"
            />
            <img
              src="{{ asset('assets/Imbo Sport Center.webp') }}"
              alt="MU Sport Center 2"
              class="rounded-lg object-cover h-24 w-full"
            />
            <div
              class="relative rounded-lg overflow-hidden cursor-pointer"
              aria-label="Lihat semua foto"
            >
              <img
                src="{{ asset('assets/Arena Sport.jpg') }}"
                alt="MU Sport Center 3"
                class="object-cover h-24 w-full brightness-75"
              />
              <div
                class="absolute inset-0 flex items-center justify-center text-white font-semibold text-sm"
              >
                Lihat semua foto
              </div>
            </div>
          </div>
        </div>

        <!-- Venue Info -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow">
          <h2 class="text-2xl font-bold mb-1">MU Sport Center</h2>
          <p class="text-gray-600 mb-2">Kota Denpasar</p>
          <span
            class="inline-block bg-gray-200 text-gray-700 text-xs font-semibold px-3 py-1 rounded"
            >Futsal</span
          >

          <hr class="my-6" />

          <!-- Description -->
          <div>
            <h3 class="font-semibold text-lg mb-2">Deskripsi</h3>
            <p>1 Lapangan Futsal</p>
          </div>

          <!-- Venue Rules -->
          <div class="mt-6">
            <h3 class="font-semibold text-lg mb-2">Aturan Venue</h3>
            <div id="rulesText" class="text-sm text-gray-700 max-h-24 overflow-hidden">
              <p>Peraturan Lapangan MU Sport Center</p>
              <ol class="list-decimal list-inside space-y-1">
                <li>1. Pemain harus datang tepat waktu (tidak ada kompensasi waktu atas keterlambatan konsumen)</li>
                <li>2. Apabila terjadi hal teknis yang terjadi di Centro Padel Bintaro yang menyebabkan...</li>
              </ol>
            </div>
            <button
              id="toggleRulesBtn"
              class="text-blue-700 text-sm font-semibold mt-2 hover:underline"
            >
              Baca Selengkapnya
            </button>
          </div>

          <!-- Location -->
          <div class="mt-6 bg-gray-100 p-4 rounded-lg flex justify-between items-center">
            <div>
              <h4 class="font-semibold text-gray-700 mb-1">Lokasi Venue</h4>
              <p class="text-sm text-gray-600">
                Jl. Taman Makam Bahagia Parigi Pd. Aren Tangerang Selatan
              </p>
            </div>
            <a
              href="#"
              class="text-blue-700 font-semibold text-sm hover:underline flex items-center space-x-1"
              >Buka Peta <i class="fas fa-map-marker-alt"></i
            ></a>
          </div>
        </div>

        <!-- Facilities -->
        <div class="mt-8">
          <h3 class="font-semibold text-lg mb-4">Fasilitas</h3>
          <ul class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-gray-700">
            <li class="flex items-center space-x-3">
              <i class="fas fa-trash-alt text-xl"></i>
              <span>Jual Minuman</span>
            </li>
            <li class="flex items-center space-x-3">
              <i class="fas fa-mosque text-xl"></i>
              <span>Musholla</span>
            </li>
            <li class="flex items-center space-x-3">
              <i class="fas fa-car text-xl"></i>
              <span>Parkir Mobil</span>
            </li>
            <li class="flex items-center space-x-3">
              <i class="fas fa-motorcycle text-xl"></i>
              <span>Parkir Motor</span>
            </li>
            <li class="flex items-center space-x-3">
              <i class="fas fa-couch text-xl"></i>
              <span>Ruang Ganti</span>
            </li>
            <li class="flex items-center space-x-3">
              <i class="fas fa-toilet text-xl"></i>
              <span>Toilet</span>
            </li>
          </ul>
          <button
            class="mt-4 px-4 py-2 border border-gray-300 rounded-md text-gray-700 text-sm hover:bg-gray-100"
          >
            Lihat semua fasilitas
          </button>
        </div>

        <!-- Booking Calendar -->
        <div class="mt-10">
          <div class="flex flex-wrap justify-between items-center mb-4 space-x-4">
            <input
              type="date"
              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
              value="2025-07-24"
            />
            <select
              class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
            >
              <option>MU Sport Center</option>
              <option>Lapangan Futsal A</option>
              <option>Lapangan Basket B</option>
            </select>
          </div>


          <!-- Time Slots Grid -->
          <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 overflow-x-auto pb-24" id="timeSlotsContainer">
            <!-- Example time slot -->
            <button class="bg-gray-300 rounded-md p-4 text-sm text-gray-700 cursor-not-allowed opacity-50 min-w-[100px] sm:min-w-[120px] h-20" disabled>
              06:00 - 07:00<br />Rp 125,000<br /><span class="text-red-600 font-semibold">Booked</span>
            </button>
            <button class="bg-white border border-gray-300 rounded-md p-4 text-sm text-gray-700 hover:bg-blue-700 hover:text-white transition min-w-[100px] sm:min-w-[120px] h-20 selectable" data-time="06:00 - 07:00" data-price="Rp 100,000" data-promo="Promosi">
              06:00 - 07:00<br />Rp 100,000<br /><span class="text-green-600 font-semibold">Promosi</span>
            </button>
            <button class="bg-blue-700 rounded-md p-4 text-sm text-white min-w-[100px] sm:min-w-[120px] h-20 hidden selectable-cancel" data-time="06:00 - 07:00" data-price="Rp 100,000" data-promo="Batal">
              06:00 - 07:00<br /><span class="font-semibold">Batal</span>
            </button>
            <button class="bg-gray-300 rounded-md p-4 text-sm text-gray-700 cursor-not-allowed opacity-50 min-w-[100px] sm:min-w-[120px] h-20" disabled>
              06:00 - 07:00<br />Rp 125,000<br /><span class="text-red-600 font-semibold">Booked</span>
            </button>
            <button class="bg-white border border-gray-300 rounded-md p-4 text-sm text-gray-700 hover:bg-blue-700 hover:text-white transition min-w-[100px] sm:min-w-[120px] h-20 selectable" data-time="06:00 - 07:00" data-price="Rp 100,000" data-promo="Promosi">
              06:00 - 07:00<br />Rp 100,000<br /><span class="text-green-600 font-semibold">Promosi</span>
            </button>
            <button class="bg-blue-700 rounded-md p-4 text-sm text-white min-w-[100px] sm:min-w-[120px] h-20 hidden selectable-cancel" data-time="06:00 - 07:00" data-price="Rp 100,000" data-promo="Batal">
              06:00 - 07:00<br /><span class="font-semibold">Batal</span>
            </button>
            <button class="bg-gray-300 rounded-md p-4 text-sm text-gray-700 cursor-not-allowed opacity-50 min-w-[100px] sm:min-w-[120px] h-20" disabled>
              06:00 - 07:00<br />Rp 125,000<br /><span class="text-red-600 font-semibold">Booked</span>
            </button>
          </div>
        </div>
      </section>

      <!-- Right Content: Booking Panel -->
      <aside class="lg:col-span-4 space-y-6 sticky top-20 self-start">
        <div class="bg-white p-6 rounded-lg shadow space-y-4">
          <div>
            <p class="text-sm text-gray-600">Mulai dari</p>
            <p class="text-2xl font-bold text-blue-700">Rp250,000 <span class="text-base font-normal">Per Sesi</span></p>
          </div>
          <button class="w-full bg-blue-700 text-white py-3 rounded-md hover:bg-blue-800 transition">
            Cek Ketersediaan
          </button>
        </div>

      </aside>
    </div>
  </main>

  <!-- Fixed Bottom Button -->
  <div id="bottomButton" class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-300 p-4 shadow-lg hidden">
    <a href="/confirm" class="block w-full">
      <button class="w-full bg-blue-700 text-white py-3 rounded-md font-semibold hover:bg-green-600 transition">
        LANJUT PEMBAYARAN
      </button>
    </a>
  </div>

  <script>
    // Cart management
    let cart = [];
    const venueName = 'MU Sport Center';
    const fieldName = 'Lapangan Futsal A';
    const dateInput = document.querySelector('input[type="date"]');
    const currentDate = dateInput ? dateInput.value : '2025-09-04';

    // Helper functions
    function addToCart(timeSlot, price) {
      const item = {
        venue: venueName,
        field: fieldName,
        date: currentDate,
        time: timeSlot,
        price: price
      };
      cart.push(item);
      renderCart();
      updateCartCount();
      toggleBottomButton();
    }

    function removeFromCart(index) {
      cart.splice(index, 1);
      renderCart();
      updateCartCount();
      toggleBottomButton();
    }

    function renderCart() {
      const cartContent = document.querySelector('#cartSidebar .cart-content');
      if (cart.length === 0) {
        cartContent.innerHTML = '<div class="text-gray-600">Belum ada jadwal di keranjang.</div>';
        return;
      }
      cartContent.innerHTML = cart.map((item, index) => `
        <div class="bg-white border border-gray-300 rounded-lg p-4 shadow relative">
          <button onclick="removeFromCart(${index})" aria-label="Remove item" class="absolute top-3 right-3 text-gray-400 hover:text-red-600 focus:outline-none">
            <i class="fas fa-trash-alt"></i>
          </button>
          <h3 class="font-bold uppercase text-gray-800">${item.venue}</h3>
          <p class="text-gray-600 font-semibold">${item.field}</p>
          <p class="text-sm text-gray-700 mt-2">
            <span class="font-semibold">${item.date}</span> • ${item.time}
          </p>
          <p class="text-lg font-bold text-gray-900 mt-1">${item.price}</p>
        </div>
      `).join('');
    }

    function updateCartCount() {
      const cartCounts = document.querySelectorAll('.fa-shopping-cart span');
      cartCounts.forEach(count => {
        count.textContent = cart.length;
      });
    }

    function toggleSidebar(open = true) {
      const cartSidebar = document.getElementById('cartSidebar');
      const cartOverlay = document.getElementById('cartOverlay');
      if (open) {
        cartSidebar.classList.remove('translate-x-full');
        cartOverlay.classList.remove('hidden');
      } else {
        cartSidebar.classList.add('translate-x-full');
        cartOverlay.classList.add('hidden');
      }
    }

    function toggleBottomButton() {
      const bottomButton = document.getElementById('bottomButton');
      if (cart.length > 0) {
        bottomButton.classList.remove('hidden');
      } else {
        bottomButton.classList.add('hidden');
      }
    }

    // Event listeners for sidebar
    document.addEventListener('click', (e) => {
      if (e.target.id === 'closeCart' || e.target.closest('#closeCart')) {
        toggleSidebar(false);
      }
      if (e.target.id === 'cartOverlay') {
        toggleSidebar(false);
      }
    });

    // Toggle rules "Read more"
    const toggleBtn = document.getElementById('toggleRulesBtn');
    const rulesText = document.getElementById('rulesText');
    if (toggleBtn && rulesText) {
      toggleBtn.addEventListener('click', () => {
        if (rulesText.style.maxHeight === 'none') {
          rulesText.style.maxHeight = '6rem';
          toggleBtn.textContent = 'Baca Selengkapnya';
        } else {
          rulesText.style.maxHeight = 'none';
          toggleBtn.textContent = 'Sembunyikan';
        }
      });
    }

    // Time slot selection with cart integration
    const timeSlotsContainer = document.getElementById('timeSlotsContainer');
    let selectedSlots = new Set(); // Track selected slots to allow multiple

    if (timeSlotsContainer) {
      timeSlotsContainer.addEventListener('click', (e) => {
        const target = e.target.closest('button.selectable, button.selectable-cancel');
        if (!target) return;

        const time = target.dataset.time;
        const price = target.dataset.price;

        // If clicked on cancel button
        if (target.classList.contains('selectable-cancel')) {
          const normalBtn = target.previousElementSibling;
          if (normalBtn && normalBtn.classList.contains('selectable')) {
            target.classList.add('hidden');
            normalBtn.classList.remove('hidden');
            selectedSlots.delete(time);
            // Remove from cart if exists
            cart = cart.filter(item => item.time !== time);
            renderCart();
            updateCartCount();
            toggleBottomButton();
          }
          return;
        }

        // Select new slot
        const cancelBtn = target.nextElementSibling;
        if (cancelBtn && cancelBtn.classList.contains('selectable-cancel')) {
          if (!selectedSlots.has(time)) {
            selectedSlots.add(time);
            addToCart(time, price);
            cancelBtn.classList.remove('hidden');
            target.classList.add('hidden');
            toggleSidebar(true); // Open sidebar on selection
          }
        }
      });
    }

    // Initial render
    renderCart();
    updateCartCount();
    toggleBottomButton();
  </script>
  
@endsection