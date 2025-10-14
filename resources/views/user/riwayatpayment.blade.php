@extends('user.layout.user')

@section('content')

  <main class="bg-gray-100 min-h-[calc(100vh-64px)]">
   <section class="max-w-4xl mx-auto px-4 py-8">
    <label class="block mb-2 font-semibold text-black text-sm" for="cutoff-date">
     Pilih Tanggal Cut Off
    </label>
    <input class="w-48 rounded border border-gray-300 px-3 py-2 mb-1 text-black text-sm" id="cutoff-date" readonly="" type="text" value="4-Aug-2025"/>
    <p class="text-xs text-gray-500 mb-3">
     *Menampilkan transaksi
     <span class="text-orange-500 font-semibold">
      6 bulan ke belakang
     </span>
     dari tanggal pilihan mu
    </p>
    <div class="flex space-x-2 mb-8">
     <button class="bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded" type="button">
      Semua Transaksi
     </button>
     <button class="text-blue-600 border border-blue-500 text-xs font-semibold px-3 py-1 rounded" type="button">
      Down Payment
     </button>
    </div>
    <div class="bg-white rounded-md p-6 flex flex-col items-center">
     <img alt="Illustration of a park with orange trees and benches in front of gray houses with birds flying" class="mb-4" height="150" src="assets/ai.png" width="400"/>
     <p class="text-gray-500 text-sm text-center">
      Tidak ditemukan Transaksi pada rentang waktu tanggal pilihan
     </p>
    </div>
   </section>
  </main>

  @endsection