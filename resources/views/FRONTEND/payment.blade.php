@extends('FRONTEND.layout.frontend')

@section('content')

  <!-- Progress Bar -->
  <section class="container mx-auto px-6 py-8 max-w-4xl">
    <div class="flex items-center justify-between mb-6">
      <div class="flex items-center space-x-2">
        <div class="w-5 h-5 rounded-full bg-blue-700"></div>
        <span class="font-semibold text-gray-800">Validasi Item</span>
      </div>
      <div class="flex items-center space-x-2">
        <div class="w-5 h-5 rounded-full bg-blue-700"></div>
        <span class="font-semibold text-blue-800">Data dan Pembayaran</span>
      </div>
    </div>
    <div class="h-1 bg-blue-700 rounded-full relative">
      <div class="h-1 bg-blue-700 rounded-full absolute top-0 left-0 w-1/2"></div>
    </div>
  </section>

  <!-- Main Content -->
  <main class="container mx-auto px-6 max-w-6xl pb-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
      <!-- Left Column: Customer Detail -->
      <section class="lg:col-span-6 bg-white rounded-lg shadow p-6 space-y-6">
        <h2 class="text-lg font-semibold text-blue-700 mb-4">Customer Detail</h2>
        <form class="space-y-4">
          <div>
            <label for="customerName" class="block text-sm font-medium text-gray-700">Customer Name <span class="text-gray-400" title="Required">*</span></label>
            <input type="text" id="customerName" name="customerName" placeholder="Nama Lengkap" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-700 focus:ring focus:ring-blue-200" />
          </div>
          <div>
            <label for="customerPhone" class="block text-sm font-medium text-gray-700">Customer Phone Number <span class="text-gray-400" title="Required">*</span></label>
            <div class="flex space-x-2 mt-1">
              <select id="countryCode" name="countryCode" class="rounded-md border border-gray-300 px-3 py-2 focus:border-blue-700 focus:ring focus:ring-blue-200">
                <option value="+62" selected>🇮🇩 +62</option>
                <option value="+1">🇺🇸 +1</option>
                <option value="+44">🇬🇧 +44</option>
                <!-- Add more country codes as needed -->
              </select>
              <input type="tel" id="customerPhone" name="customerPhone" placeholder="0812345678" class="flex-1 rounded-md border border-gray-300 px-3 py-2 focus:border-blue-700 focus:ring focus:ring-blue-200" />
            </div>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-gray-400" title="Required">*</span></label>
            <input type="email" id="email" name="email" placeholder="test@gmail.com" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-700 focus:ring focus:ring-blue-200" />
          </div>
          <div>
            <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
            <textarea id="notes" name="notes" rows="3" placeholder="Catatan tambahan" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-700 focus:ring focus:ring-blue-200"></textarea>
          </div>
        </form>
      </section>

      <!-- Right Column: Payment Method -->
      <section class="lg:col-span-6 bg-white rounded-lg shadow p-6 space-y-6">
        <h2 class="text-lg font-semibold text-blue-700 mb-4">Pilih Jenis Pembayaran</h2>
        <p class="text-sm text-gray-600 mb-4">Semua transaksi yang dilakukan aman dan terenkripsi.</p>

        <!-- Payment Options -->
        <form class="space-y-4">
          <!-- Transfer Virtual Account -->
          <div>
            <label class="flex items-center cursor-pointer bg-blue-700 text-white rounded-md px-4 py-2">
              <input type="radio" name="paymentMethod" value="virtualAccount" class="mr-3" checked />
              Transfer Virtual Account
            </label>
            <div class="mt-3 grid grid-cols-4 gap-4">
              <img src="assets/bca-logo.png" alt="BCA" class="h-10 object-contain" />
              <img src="assets/bni-logo.png" alt="BNI" class="h-10 object-contain" />
              <img src="assets/mandiri-logo.png" alt="Mandiri" class="h-10 object-contain" />
              <img src="assets/permatabank-logo.png" alt="Permata Bank" class="h-10 object-contain" />
              <img src="assets/bri-logo.png" alt="BRI" class="h-10 object-contain" />
              <img src="assets/bankbjb-logo.png" alt="Bank BJB" class="h-10 object-contain" />
              <img src="assets/bsi-logo.png" alt="BSI" class="h-10 object-contain" />
            </div>
          </div>

          <!-- e-Wallets -->
          <div>
            <label class="flex items-center cursor-pointer bg-blue-700 text-white rounded-md px-4 py-2">
              <input type="radio" name="paymentMethod" value="eWallets" class="mr-3" />
              e-Wallets
            </label>
            <div class="mt-3 grid grid-cols-4 gap-4">
              <img src="assets/ovo-logo.png" alt="OVO" class="h-10 object-contain" />
              <img src="assets/dana-logo.png" alt="Dana" class="h-10 object-contain" />
              <img src="assets/gopay-logo.png" alt="GoPay" class="h-10 object-contain" />
              <img src="assets/linkaja-logo.png" alt="LinkAja" class="h-10 object-contain" />
            </div>
          </div>
        </form>
      </section>
    </div>

    <!-- Booking Summary -->
    <section class="bg-white rounded-lg shadow p-6 mt-8 max-w-6xl mx-auto">
      <h3 class="text-lg font-semibold mb-4">Booking Summary</h3>
      <div class="grid grid-cols-2 gap-4 text-gray-700">
        <div>Harga Lapangan:</div>
        <div class="text-right">Rp 100,000</div>

        <div>Platform Fee:</div>
        <div class="text-right">Rp 6,000</div>

        <div class="font-semibold text-gray-700">Total Bayar</div>
        <div class="text-right font-bold text-blue-700">Rp 106,000</div>
      </div>
      <div class="mt-2 text-sm text-blue-700 font-semibold">Bayar Penuh</div>
    </section>

    <!-- Venue Terms and Conditions -->
    <section class="bg-white rounded-lg shadow p-6 mt-8 max-w-6xl mx-auto max-h-64 overflow-y-auto">
      <h3 class="text-lg font-semibold mb-4">Venue Terms and Condition</h3>
      <ol class="list-decimal list-inside space-y-2 text-sm text-gray-700">
        <li>Non Refund & Jika ada Refund hanya berlaku apabila ada pemakaian yang dilakukan oleh Pihak PLN BEC Bandung</li>
        <li>Reschedule bisa dilakukan jika jadwal main masih H-3 dari Tanggal Pemesanan yang sudah dilakukan</li>
        <li>Penggunaan Lapangan dan waktu :
          <ul class="list-disc list-inside ml-5">
            <li>Gunakan Lapangan sesuai dengan jadwal yang telah dipesan</li>
            <li>Datanglah 10 menit sebelum jadwal</li>
            <li>Jika ingin memperpanjang waktu bermain silakan konfirmasi terlebih dahulu dengan pengelola</li>
          </ul>
        </li>
        <li>Kebersihan :
          <ul class="list-disc list-inside ml-5">
            <li>Jaga kebersihan lapangan dengan selalu membuang sampah pada tempatnya</li>
          </ul>
        </li>
        <li>Keamanan :
          <ul class="list-disc list-inside ml-5">
            <li>Selalau waspada terhadap barang bawaan anda, kehilangan barang diluar tanggung jawab pihak BEC</li>
            <li>Ketika tidak sedang bermain, jaga jarak aman dari area aktif untuk menghindari resiko cedera</li>
          </ul>
        </li>
        <li>Keterangan dan Etika bermain :</li>
      </ol>
    </section>

    <!-- Confirm Payment Button -->
    <section class="max-w-6xl mx-auto mt-8">
      <button class="w-full bg-blue-700 text-white py-3 rounded-md font-semibold hover:bg-green-600 transition">
        KONFIRMASI PEMBAYARAN
      </button>
    </section>
  </main>
  
  @endsection
