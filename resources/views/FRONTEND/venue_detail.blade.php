<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Olga Sehat - Detail Venue</title>
  <link rel="icon" href="{{ asset('assets/olgasehat-icon.png') }}" type="image/png" />
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            blue: {
              700: '#013D9D',
              800: '#002D7A',
              900: '#001F5C',
            }
          }
        }
      }
    }
  </script>
  <!-- Font Awesome CDN for icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  />
</head>
<body class="bg-white text-gray-800 font-sans">

  <!-- Header -->
  <header class="fixed top-0 left-0 right-0 z-50 shadow-md bg-white">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
      <a href="#" class="flex items-center space-x-2">
        <img src="{{ asset('assets/olgasehat-icon.png') }}" alt="Olga Sehat Logo" class="w-100 h-10" />
      </a>
      <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
        <a href="venue.html" class="hover:text-blue-700">Sewa Lapangan</a>
        <a href="tempat_sehat.html" class="hover:text-blue-700">Tempat Sehat</a>
        <a href="community.html" class="hover:text-blue-700">Komunitas</a>
        <a href="club.html" class="hover:text-blue-700">Klub</a>
        <a href="blog&news.html" class="hover:text-blue-700">Blog & News</a>
      </nav>
      <div class="hidden md:flex items-center space-x-4">
        <button aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
          <i class="fas fa-shopping-cart fa-lg"></i>
          <span
            class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5"
            >0</span
          >
        </button>
        <a href="#" class="text-gray-700 hover:text-blue-700">Masuk</a>
        <a
          href="#"
          class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-800 transition"
          >Daftar</a
        >
      </div>
      <div class="flex md:hidden items-center space-x-4">
        <button aria-label="Cart" class="text-gray-700 hover:text-blue-700 relative">
          <i class="fas fa-shopping-cart fa-lg"></i>
          <span
            class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-1.5"
            >0</span
          >
        </button>
        <!-- Mobile menu button -->
        <button
          id="mobileMenuBtn"
          class="text-gray-700 hover:text-blue-700 focus:outline-none"
          aria-label="Open menu"
        >
          <i class="fas fa-bars fa-lg"></i>
        </button>
      </div>
    </div>
    <!-- Mobile menu -->
    <nav
      id="mobileMenu"
      class="hidden md:hidden bg-white border-t border-gray-200 shadow-md"
    >
      <a
        href="venue.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Sewa Lapangan</a
      >
      <a
        href="tempat_sehat.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Tempat Sehat</a
      >
      <a
        href="community.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Komunitas</a
      >
      <a
        href="club.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Klub</a
      >
      <a
        href="blog&news.html"
        class="block px-6 py-3 border-b border-gray-200 hover:bg-blue-50 hover:text-blue-700"
        >Blog & News</a
      >
      <a
        href="#"
        class="block w-full text-center px-6 py-3 mb-2 border border-gray-300 rounded-md bg-white text-gray-700 font-semibold hover:bg-gray-100"
        >Masuk</a
      >
      <a
        href="#"
        class="block w-full text-center px-6 py-3 rounded-md bg-blue-700 text-white font-semibold hover:bg-red-900"
        >Daftar</a
      >
    </nav>
  </header>

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
            <button class="bg-green-500 rounded-md p-4 text-sm text-white min-w-[100px] sm:min-w-[120px] h-20 hidden selectable-cancel" data-time="06:00 - 07:00" data-price="Rp 125,000" data-promo="Batal">
              06:00 - 07:00<br /><span class="font-semibold">Batal</span>
            </button>
            <button class="bg-gray-300 rounded-md p-4 text-sm text-gray-700 cursor-not-allowed opacity-50 min-w-[100px] sm:min-w-[120px] h-20" disabled>
              06:00 - 07:00<br />Rp 125,000<br /><span class="text-red-600 font-semibold">Booked</span>
            </button>
            <button class="bg-white border border-gray-300 rounded-md p-4 text-sm text-gray-700 hover:bg-blue-700 hover:text-white transition min-w-[100px] sm:min-w-[120px] h-20 selectable" data-time="06:00 - 07:00" data-price="Rp 100,000" data-promo="Promosi">
              06:00 - 07:00<br />Rp 100,000<br /><span class="text-green-600 font-semibold">Promosi</span>
            </button>
            <button class="bg-green-500 rounded-md p-4 text-sm text-white min-w-[100px] sm:min-w-[120px] h-20 hidden selectable-cancel" data-time="06:00 - 07:00" data-price="Rp 125,000" data-promo="Batal">
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
    <!-- Cart Sidebar -->
  <aside id="cartSidebar" class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 flex flex-col">
    <div class="flex justify-between items-center p-4 border-b border-gray-200 flex-shrink-0">
      <h2 class="font-bold text-lg">JADWAL DIPILIH</h2>
      <button id="closeCartSidebar" aria-label="Close sidebar" class="text-gray-700 hover:text-gray-900 focus:outline-none">
        <i class="fas fa-times fa-lg"></i>
      </button>
    </div>
    <div class="flex-grow overflow-y-auto p-4 space-y-4">
      <div class="bg-white border border-gray-300 rounded-lg p-4 shadow relative">
        <button aria-label="Remove item" class="absolute top-3 right-3 text-gray-400 hover:text-red-600 focus:outline-none">
          <i class="fas fa-trash-alt"></i>
        </button>
        <h3 class="font-bold uppercase text-gray-800">MU Sport Center</h3>
        <p class="text-gray-600 font-semibold">Lapangan Futsal A</p>
        <p class="text-sm text-gray-700 mt-2">
          <span class="font-semibold">04-Sep-2025</span> &bull; 06:00 - 07:00
        </p>
        <p class="text-lg font-bold text-gray-900 mt-1">Rp <span class="font-extrabold">100,000</span></p>
      </div>
    </div>
    <div class="p-4 border-t border-gray-200 flex-shrink-0">
      <a href="confirm.html" class="block w-full bg-blue-700 text-white py-3 rounded-md font-semibold text-center hover:bg-green-600 transition">
        LANJUT PEMBAYARAN
      </a>
    </div>
  </aside>
  </main>

  <!-- Fixed Bottom Button -->
   <a href="confirm.html">
    <div class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-300 p-4 shadow-lg">
    <button class="w-full bg-blue-700 text-white py-3 rounded-md font-semibold hover:bg-green-600 transition">
      LANJUT PEMBAYARAN
    </button>
  </div>
   </a>

   <script src="{{ asset('assets/olgasehat.js') }}"></script>
  <script>
    // Toggle rules "Read more"
    const toggleBtn = document.getElementById('toggleRulesBtn');
    const rulesText = document.getElementById('rulesText');
    toggleBtn.addEventListener('click', () => {
      if (rulesText.style.maxHeight === 'none') {
        rulesText.style.maxHeight = '6rem';
        toggleBtn.textContent = 'Baca Selengkapnya';
      } else {
        rulesText.style.maxHeight = 'none';
        toggleBtn.textContent = 'Sembunyikan';
      }
    });

    // Time slot selection
    const timeSlotsContainer = document.getElementById('timeSlotsContainer');
    let selectedSlot = null;
    timeSlotsContainer.addEventListener('click', (e) => {
      const target = e.target.closest('button.selectable, button.selectable-cancel');
      if (!target) return;

      // If clicked on cancel button, revert to normal button
      if (target.classList.contains('selectable-cancel')) {
        const normalBtn = target.previousElementSibling;
        if (normalBtn && normalBtn.classList.contains('selectable')) {
          target.classList.add('hidden');
          normalBtn.classList.remove('hidden');
          selectedSlot = null;
        }
        return;
      }

      // If clicked slot is already selected, do nothing (or toggle off)
      if (selectedSlot === target) {
        return;
      }

      // Deselect previously selected slot if any
      if (selectedSlot) {
        const prevCancelBtn = selectedSlot.nextElementSibling;
        if (prevCancelBtn && prevCancelBtn.classList.contains('selectable-cancel')) {
          prevCancelBtn.classList.add('hidden');
          selectedSlot.classList.remove('hidden');
        }
      }

      // Select new slot: hide normal button, show cancel button
      const cancelBtn = target.nextElementSibling;
      if (cancelBtn && cancelBtn.classList.contains('selectable-cancel')) {
        cancelBtn.classList.remove('hidden');
        target.classList.add('hidden');
      }
      selectedSlot = cancelBtn;
    });
  </script>
  
</body>
</html>
