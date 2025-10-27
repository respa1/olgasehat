@extends('user.layout.frontenduser')

@section('content')

<section class="bg-[url('assets/blue-banner.png')] bg-no-repeat text-white relative overflow-hidden h-[350px] flex items-center justify-center" style="background-size: 1910px 350px;">
    <div class="absolute inset-0 bg-blue-900 bg-opacity-30"></div>
    <div class="container mx-auto px-6 text-center w-full relative z-10">
        <h1 class="text-3xl md:text-5xl font-extrabold tracking-wide mt-10">
            Dukungan Kesehatan Optimal untuk Gaya Hidup Aktif.
        </h1>
        <p class="text-lg mt-3 opacity-90 max-w-3xl mx-auto">
            Temukan Layanan Kesehatan, Fisioterapi, dan Cek Medis Terdekat yang teruji dan terpercaya.
        </p>
    </div>
</section>

<section class="container mx-auto px-6 py-8">
    <form class="flex flex-wrap gap-4 justify-center md:justify-start items-stretch">

        <div class="relative flex-grow min-w-full sm:min-w-[300px]">
            <input
                type="text"
                id="unifiedSearch"
                placeholder="Cari layanan (e.g., Fisioterapi, Cek Kolesterol, Klinik Mata)"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 h-full text-gray-700 placeholder-gray-500 focus:outline-none focus:border-blue-500 transition duration-150"
            />
            <div id="suggestionsDropdown" class="absolute top-full left-0 w-full bg-white border border-gray-300 rounded-lg shadow-xl max-h-60 overflow-y-auto hidden z-10 mt-1">
            </div>
        </div>

        <select
            class="border border-gray-300 rounded-lg px-4 py-2.5 min-w-[180px] w-full sm:w-auto text-gray-700 focus:outline-none focus:border-blue-500 transition duration-150"
        >
            <option disabled selected class="text-gray-500">Kategori Layanan</option>
            <option>Fisioterapi & Cedera</option>
            <option>Medical Check-Up</option>
            <option>Dokter Spesialis</option>
            <option>Nutrisi & Gizi</option>
        </select>

        <input
            type="date"
            class="border border-gray-300 rounded-lg px-4 py-2.5 min-w-[160px] w-full sm:w-auto text-gray-700 focus:outline-none focus:border-blue-500 transition duration-150"
        />

         <button
            type="submit"
            class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition min-w-full sm:min-w-[150px]"
        >
            Cari Layanan
        </button>
    </form>
</section>

<body class="bg-gray-100 text-gray-800 p-6 min-h-screen">
  <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-5">

    <div id="kolesterol-card" class="bg-white p-5 rounded-xl shadow-lg border border-blue-100">

      <h2 class="text-xl font-bold mb-4 text-center text-blue-700">Kalkulator Kolesterol</h2>

      <div class="space-y-4">
        <div class="mb-4">
          <label for="ldl" class="block mb-1 text-sm font-medium text-gray-700">Masukan kadar LDL</label>
          <div class="flex items-center">
            <input id="ldl" type="number" placeholder="150" value="150" class="border w-full p-2 rounded-l focus:ring-blue-500 focus:border-blue-500">
            <span class="p-2 border border-l-0 rounded-r bg-gray-50 text-sm text-gray-600">mg/dl</span>
          </div>
        </div>

        <div class="mb-4">
          <label for="hdl" class="block mb-1 text-sm font-medium text-gray-700">Masukan kadar HDL</label>
          <div class="flex items-center">
            <input id="hdl" type="number" placeholder="45" value="45" class="border w-full p-2 rounded-l focus:ring-blue-500 focus:border-blue-500">
            <span class="p-2 border border-l-0 rounded-r bg-gray-50 text-sm text-gray-600">mg/dl</span>
          </div>
        </div>
      </div>

      <div class="flex space-x-2 mb-6 mt-6">
        <button onclick="hitungKolesterol()" class="bg-blue-600 hover:bg-blue-700 text-white flex-1 py-2 rounded-lg font-semibold transition duration-150 shadow-md">Hitung</button>
        <button onclick="resetKolesterol()" class="bg-gray-400 hover:bg-gray-500 text-white flex-1 py-2 rounded-lg font-semibold transition duration-150 shadow-md">Reset</button>
      </div>

      <div id="hasilKolesterol" class="mt-4 pt-4 border-t border-gray-200">
        <h3 class="text-md font-semibold mb-2 text-gray-700">Kolesterol Total</h3>
        <div class="flex justify-between items-center mb-4 p-2 bg-blue-50 rounded">
            <span class="text-lg font-bold text-blue-800">Total</span>
            <div class="flex items-center space-x-2">
                <span class="text-xl font-bold">200 <span class="text-sm">mg/dl</span></span>
                <span class="inline-block bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded-full">Normal</span>
            </div>
        </div>
        <h3 class="text-md font-semibold mb-2 text-gray-700">Detail Kadar</h3>
        <div class="space-y-2">
            <div class="flex justify-between items-center text-sm p-1">
                <p>LDL: 150 mg/dl</p>
                <span class="flex items-center space-x-1 text-yellow-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>Tinggi</span>
                </span>
            </div>
            <div class="flex justify-between items-center text-sm p-1">
                <p>HDL: 45 mg/dl</p>
                <span class="flex items-center space-x-1 text-red-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>Rendah</span>
                </span>
            </div>
        </div>
      </div>
    </div>

    <div id="gula-card" class="bg-white p-5 rounded-xl shadow-lg border border-green-100">
      <h2 class="text-xl font-bold mb-4 text-center text-green-700">Kalkulator Gula Darah</h2>

      <div class="mb-4">
        <label for="gula-input" class="block mb-1 text-sm font-medium text-gray-700">Total Gula Darah (mg/dl)</label>
        <div class="flex items-center">
            <input id="gula-input" type="number" placeholder="110" value="110" class="border w-full p-2 rounded-l focus:ring-green-500 focus:border-green-500">
            <span class="p-2 border border-l-0 rounded-r bg-gray-50 text-sm text-gray-600">mg/dl</span>
        </div>
      </div>

      <div class="mb-4">
        <label for="waktu-pengukuran" class="block mb-1 text-sm font-medium text-gray-700">Waktu Pengukuran</label>
        <select id="waktu-pengukuran" class="border w-full p-2 rounded focus:ring-green-500 focus:border-green-500 bg-white">
          <option value="puasa">Puasa (Fasting)</option>
          <option value="2jam">2 Jam Setelah Makan</option>
          <option value="acak">Sewaktu/Acak (Random)</option>
        </select>
      </div>

      <button onclick="hitungGula()" class="bg-green-600 hover:bg-green-700 text-white w-full py-2 rounded-lg font-semibold mb-6 transition duration-150 shadow-md">Hitung Gula Darah</button>

      <div id="hasilGula" class="p-4 rounded-xl bg-green-100 border border-green-300">
        <div class="text-center">
          <p class="text-5xl font-extrabold text-green-700">110 <span class="text-lg text-gray-600 font-normal">mg/dl</span></p>
          <span class="inline-block bg-green-600 text-white text-sm font-semibold px-3 py-1 mt-3 rounded-full shadow-md">Normal</span>

          <div class="w-full h-2 rounded mt-4 flex overflow-hidden">
            <div class="w-1/4 h-2 bg-blue-500"></div>
            <div class="w-1/4 h-2 bg-green-500"></div>
            <div class="w-1/4 h-2 bg-yellow-500"></div>
            <div class="w-1/4 h-2 bg-red-500"></div>
          </div>
          <div class="flex justify-between text-xs text-gray-500 mt-1 px-1">
            <span><70</span>
            <span class="text-green-600 font-bold">Normal</span>
            <span>>140</span>
          </div>

          <p class="text-sm mt-4 text-gray-700 font-medium">Status Gula Darah Anda Saat Ini Normal Dan Terkendali</p>
        </div>
      </div>
    </div>

    <div id="bmi-card" class="bg-white p-5 rounded-xl shadow-lg border border-red-100">
      <h2 class="text-xl font-bold mb-4 text-center text-red-700">Kalkulator BMI</h2>

      <div class="mb-4">
        <label for="berat" class="block mb-1 text-sm font-medium text-gray-700">Berat Badan (kg)</label>
        <div class="flex items-center">
            <input id="berat" type="number" placeholder="70" value="70" class="border w-full p-2 rounded-l focus:ring-red-500 focus:border-red-500">
            <span class="p-2 border border-l-0 rounded-r bg-gray-50 text-sm text-gray-600">kg</span>
        </div>
      </div>

      <div class="mb-4">
        <label for="tinggi" class="block mb-1 text-sm font-medium text-gray-700">Tinggi Badan (cm)</label>
        <div class="flex items-center">
            <input id="tinggi" type="number" placeholder="175" value="175" class="border w-full p-2 rounded-l focus:ring-red-500 focus:border-red-500">
            <span class="p-2 border border-l-0 rounded-r bg-gray-50 text-sm text-gray-600">cm</span>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
            <label for="age" class="block mb-1 text-sm font-medium text-gray-700">Usia</label>
            <input id="age" type="number" placeholder="30" class="border w-full p-2 rounded focus:ring-red-500 focus:border-red-500">
        </div>
        <div>
            <label for="gender" class="block mb-1 text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select id="gender" class="border w-full p-2 rounded focus:ring-red-500 focus:border-red-500 bg-white">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
        </div>
      </div>

      <button onclick="hitungBMI()" class="bg-red-600 hover:bg-red-700 text-white w-full py-2 rounded-lg font-semibold mb-6 transition duration-150 shadow-md">Hitung BMI</button>

      <div id="hasilBMI" class="p-4 rounded-xl bg-red-100 border border-red-300 shadow-inner">
        <div class="text-center">
          <p class="text-5xl font-extrabold text-red-700">22.8 <span class="text-lg text-gray-600 font-normal">kg/m²</span></p>
          <span class="inline-block bg-green-600 text-white text-sm font-semibold px-3 py-1 mt-2 rounded-full">Normal</span>

          <div class="w-full h-3 rounded mt-4 flex overflow-hidden">
            <div class="w-1/4 h-3 bg-blue-500"></div> <div class="w-1/4 h-3 bg-green-500"></div> <div class="w-1/4 h-3 bg-yellow-500"></div> <div class="w-1/4 h-3 bg-red-500"></div> </div>
          <div class="flex justify-between text-xs text-gray-500 mt-1">
            <span>Rendah</span>
            <span>Normal</span>
            <span>Obesitas</span>
          </div>

          <p class="text-sm mt-4 text-gray-700 font-medium">Pertahankan Gaya Hidup Sehat</p>
        </div>
      </div>
    </div>
  </div>

<script>
  // Helper function to get status badge HTML
  function getStatusBadge(status, colorClass) {
    // Badge disempurnakan
    return `<span class="inline-block ${colorClass} text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">${status}</span>`;
  }

  // Fungsi Kolesterol di-update agar menggunakan style baru
  function hitungKolesterol() {
    const ldl = parseFloat(document.getElementById("ldl").value);
    const hdl = parseFloat(document.getElementById("hdl").value);
    const hasilDiv = document.getElementById("hasilKolesterol");

    if (isNaN(ldl) || isNaN(hdl) || ldl < 0 || hdl < 0) {
      hasilDiv.innerHTML = "<p class='text-red-600 font-semibold text-center'>Masukkan angka LDL dan HDL yang valid!</p>";
      hasilDiv.classList.add("p-4", "border", "rounded");
      return;
    }

    const total = ldl + hdl;
    let totalStatus = "Normal", totalColor = "bg-blue-600";
    let totalBg = "bg-blue-50", totalText = "text-blue-800";

    // LDL Status
    let ldlStatus = "Optimal", ldlColor = "text-green-600", ldlIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
    if (ldl >= 190) { ldlStatus = "Sangat Tinggi"; ldlColor = "text-red-600"; ldlIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>`; }
    else if (ldl >= 160) { ldlStatus = "Tinggi"; ldlColor = "text-red-600"; ldlIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>`; }
    else if (ldl >= 130) { ldlStatus = "Batas Tinggi"; ldlColor = "text-yellow-600"; }

    // HDL Status
    let hdlStatus = "Normal", hdlColor = "text-green-600", hdlIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>`;
    if (hdl < 40) { hdlStatus = "Rendah"; hdlColor = "text-red-600"; hdlIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>`;}
    else if (hdl >= 60) { hdlStatus = "Protektif"; }

    // Total Cholesterol status based on standard guidelines (simplified)
    if (total >= 240) { totalStatus = "Tinggi"; totalColor = "bg-red-600"; totalBg = "bg-red-50"; totalText = "text-red-800"; }
    else if (total >= 200) { totalStatus = "Batas Tinggi"; totalColor = "bg-yellow-600"; totalBg = "bg-yellow-50"; totalText = "text-yellow-800"; }

    // Clear error class
    hasilDiv.classList.remove("p-4", "border", "rounded");

    hasilDiv.innerHTML = `
      <h3 class="text-md font-semibold mb-2 text-gray-700">Kolesterol Total</h3>
      <div class="flex justify-between items-center mb-4 p-2 ${totalBg} rounded">
          <span class="text-lg font-bold ${totalText}">Total</span>
          <div class="flex items-center space-x-2">
              <span class="text-xl font-bold">${total} <span class="text-sm">mg/dl</span></span>
              ${getStatusBadge(totalStatus, totalColor)}
          </div>
      </div>
      <h3 class="text-md font-semibold mb-2 text-gray-700">Detail Kadar</h3>
      <div class="space-y-2">
          <div class="flex justify-between items-center text-sm p-1">
              <p>LDL: ${ldl} mg/dl</p>
              <span class="flex items-center space-x-1 ${ldlColor} font-semibold">
                  ${ldlIcon}
                  <span>${ldlStatus}</span>
              </span>
          </div>
          <div class="flex justify-between items-center text-sm p-1">
              <p>HDL: ${hdl} mg/dl</p>
              <span class="flex items-center space-x-1 ${hdlColor} font-semibold">
                  ${hdlIcon}
                  <span>${hdlStatus}</span>
              </span>
          </div>
      </div>`;
  }

  function resetKolesterol() {
    document.getElementById("ldl").value = "";
    document.getElementById("hdl").value = "";
    // Reset to initial state
    const initialHtml = `
        <h3 class="text-md font-semibold mb-2 text-gray-700">Kolesterol Total</h3>
        <div class="flex justify-between items-center mb-4 p-2 bg-blue-50 rounded">
            <span class="text-lg font-bold text-blue-800">Total</span>
            <div class="flex items-center space-x-2">
                <span class="text-xl font-bold">200 <span class="text-sm">mg/dl</span></span>
                <span class="inline-block bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded-full">Normal</span>
            </div>
        </div>
        <h3 class="text-md font-semibold mb-2 text-gray-700">Detail Kadar</h3>
        <div class="space-y-2">
            <div class="flex justify-between items-center text-sm p-1">
                <p>LDL: 150 mg/dl</p>
                <span class="flex items-center space-x-1 text-yellow-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>Tinggi</span>
                </span>
            </div>
            <div class="flex justify-between items-center text-sm p-1">
                <p>HDL: 45 mg/dl</p>
                <span class="flex items-center space-x-1 text-red-600 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>Rendah</span>
                </span>
            </div>
        </div>`;
    document.getElementById("hasilKolesterol").innerHTML = initialHtml;
    document.getElementById("hasilKolesterol").classList.remove("p-4", "border", "rounded");
  }


  // === KALKULATOR GULA DARAH ===
  function hitungGula() {
    const gula = parseFloat(document.getElementById("gula-input").value);
    const hasilDiv = document.getElementById("hasilGula");
    const waktu = document.getElementById("waktu-pengukuran").value;

    if (isNaN(gula) || gula < 0) {
      hasilDiv.innerHTML = "<p class='text-red-600 font-semibold text-center'>Masukkan nilai gula darah yang valid!</p>";
      hasilDiv.classList.add("p-4", "rounded", "bg-red-100", "border-red-300");
      hasilDiv.classList.remove("bg-green-100", "border-green-300", "bg-blue-100", "border-blue-300");
      return;
    }

    let status = "Normal", statusText = "Terkendali";
    let colorClass = "bg-green-600", colorText = "text-green-700";
    let bgClass = "bg-green-100", borderColor = "border-green-300";

    // Menggunakan standar sederhana untuk demo
    if (gula < 70) {
      status = "Rendah"; statusText = "Terlalu Rendah, Perlu Pemeriksaan";
      colorClass = "bg-blue-600"; colorText = "text-blue-700";
      bgClass = "bg-blue-100"; borderColor = "border-blue-300";
    } else if (gula > 140) {
      status = "Tinggi"; statusText = "Tinggi, Segera Konsultasi";
      colorClass = "bg-red-600"; colorText = "text-red-700";
      bgClass = "bg-red-100"; borderColor = "border-red-300";
    }

    // Update container colors
    hasilDiv.classList.remove("bg-green-100", "border-green-300", "bg-blue-100", "border-blue-300", "bg-red-100", "border-red-300");
    hasilDiv.classList.add(bgClass, borderColor);


    hasilDiv.innerHTML = `
      <div class="text-center">
        <p class="text-5xl font-extrabold ${colorText}">${gula} <span class="text-lg text-gray-600 font-normal">mg/dl</span></p>
        ${getStatusBadge(status, colorClass)}

        <div class="w-full h-2 rounded mt-4 flex overflow-hidden">
            <div class="w-1/4 h-2 bg-blue-500"></div>
            <div class="w-1/4 h-2 bg-green-500"></div>
            <div class="w-1/4 h-2 bg-yellow-500"></div>
            <div class="w-1/4 h-2 bg-red-500"></div>
        </div>
        <div class="flex justify-between text-xs text-gray-500 mt-1">
            <span>Rendah</span>
            <span>Normal</span>
            <span>Tinggi</span>
        </div>

        <p class="text-sm mt-4 text-gray-700 font-medium">Status Gula Darah Anda Saat Ini ${status} (${waktu.toUpperCase()})</p>
      </div>`;
    hasilDiv.classList.remove("hidden");
  }

  // === KALKULATOR BMI ===
  function hitungBMI() {
    const berat = parseFloat(document.getElementById("berat").value);
    const tinggi = parseFloat(document.getElementById("tinggi").value) / 100;
    const hasilDiv = document.getElementById("hasilBMI");

    if (isNaN(berat) || isNaN(tinggi) || tinggi === 0 || berat < 0 || tinggi < 0.1) {
      hasilDiv.innerHTML = "<p class='text-red-600 font-semibold text-center'>Masukkan berat dan tinggi badan yang valid!</p>";
      hasilDiv.classList.add("p-4", "border", "rounded");
      return;
    }

    const bmi = berat / (tinggi * tinggi);
    const bmiFixed = bmi.toFixed(1);

    let status = "", colorClass = "bg-red-600", colorText = "text-red-700";
    let bgClass = "bg-red-100", borderColor = "border-red-300";
    let advice = "Pertahankan Gaya Hidup Sehat";

    if (bmi < 18.5) {
      status = "Kurus (Underweight)";
      colorClass = "bg-blue-600"; colorText = "text-blue-700";
      bgClass = "bg-blue-100"; borderColor = "border-blue-300";
      advice = "Perlu peningkatan berat badan yang sehat.";
    }
    else if (bmi < 25) {
      status = "Normal (Healthy Weight)";
      colorClass = "bg-green-600"; colorText = "text-green-700";
      bgClass = "bg-green-100"; borderColor = "border-green-300";
      advice = "Pertahankan Gaya Hidup Sehat";
    }
    else if (bmi < 30) {
      status = "Kelebihan Berat (Overweight)";
      colorClass = "bg-yellow-600"; colorText = "text-yellow-700";
      bgClass = "bg-yellow-100"; borderColor = "border-yellow-300";
      advice = "Disarankan untuk mengurangi berat badan secara bertahap.";
    }
    else {
      status = "Obesitas (Obese)";
      colorClass = "bg-red-600"; colorText = "text-red-700";
      bgClass = "bg-red-100"; borderColor = "border-red-300";
      advice = "Segera konsultasi untuk program penurunan berat badan.";
    }

    // Update container colors
    hasilDiv.classList.remove("bg-white", "border-gray-200", "bg-blue-100", "border-blue-300", "bg-green-100", "border-green-300", "bg-yellow-100", "border-yellow-300", "bg-red-100", "border-red-300");
    hasilDiv.classList.add(bgClass, borderColor);


    hasilDiv.innerHTML = `
      <div class="text-center">
        <p class="text-5xl font-extrabold ${colorText}">${bmiFixed} <span class="text-lg text-gray-600 font-normal">kg/m²</span></p>
        ${getStatusBadge(status, colorClass)}

        <div class="w-full h-3 rounded mt-4 flex overflow-hidden">
            <div class="w-1/4 h-3 bg-blue-500"></div>
            <div class="w-1/4 h-3 bg-green-500"></div>
            <div class="w-1/4 h-3 bg-yellow-500"></div>
            <div class="w-1/4 h-3 bg-red-500"></div>
        </div>
        <div class="flex justify-between text-xs text-gray-500 mt-1">
            <span>Rendah</span>
            <span>Normal</span>
            <span>Obesitas</span>
        </div>

        <p class="text-sm mt-4 text-gray-700 font-medium">${advice}</p>
      </div>`;
    hasilDiv.classList.remove("hidden");
  }
</script>

<section class="container mx-auto px-6 py-16">
    <h2 class="font-bold text-2xl mb-8 text-gray-800">
        Nikmati <span class="text-green-600 mb-20">6 Layanan Unggulan</span> Terdekat
    </h2>
    <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8"
        aria-label="Daftar layanan kesehatan"
    >

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/fisioterapi.jpg"
                    alt="Layanan Fisioterapi Olahraga"
                    class="w-full h-40 object-cover"
                />

                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Klinik | Fisioterapi</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Bali Sport Physio Center</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Kota Denpasar
                    </p>

                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp200,000</span> /Sesi
                    </p>

                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                    <div class="flex flex-wrap gap-2">
                        <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                        08.00
                        </button>
                        <button disabled class="bg-gray-200 text-gray-500 text-xs rounded-lg px-3 py-1 cursor-not-allowed">
                        18.00
                        </button>
                        <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                        20.00
                        </button>
                        <button disabled class="bg-gray-200 text-gray-500 text-xs rounded-lg px-3 py-1 cursor-not-allowed">
                        22.00
                        </button>
                    </div>
                    </div>
                </div>
            </article>
        </a>

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/checkup.jpg"
                    alt="Medical Check Up"
                    class="w-full h-40 object-cover"
                />

                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Lab | MCU</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Pro Lab Wellness</h3>
                    <p class="text-sm text-gray-600 mb
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Kota Denpasar
                    </p>

                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp450,000</span> /Paket
                    </p>

                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jad
                    <div class="flex flex-wrap gap-2">
                        <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                        08.00
                        </button>
                        <button disabled class="bg-gray-200 text-gray-500 text-xs rounded-lg px-3 py-1 cursor-not-allowed">
                        18.00
                        </button>
                        <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                        20.00
                        </button>
                        <button disabled class="bg-gray-200 text-gray-500 text-xs rounded-lg px-3 py-1 cursor-not-allowed">
                        22.00
                        </button>
                    </div>
                    </div>
                </div>
            </article>
        </a>

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/dokter.jpg"
                    alt="Konsultasi Dokter"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Klinik | Dokter Umum</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Klinik Sehat Denpasar</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Kota Denpasar
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp80,000</span> /Sesi
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                        <div class="flex flex-wrap gap-2">
                            <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                            10.00
                            </button>
                            <button class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium hover:bg-green-600 hover:text-white transition">
                            15.00
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        </a>
        
        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/fisioterapi2.jpg"
                    alt="Fisioterapi Recovery"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Klinik | Fisioterapi</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Recovery & Care Clinic</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Badung
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp220,000</span> /Sesi
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium">
                                11.00
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </a>

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/nutrisi.jpg"
                    alt="Konsultasi Ahli Gizi"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Konsultasi | Gizi</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Bali Diet Specialist</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Kota Denpasar
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp150,000</span> /Sesi
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Jadwal Cek Tersedia</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium">
                                08.00
                            </span>
                            <span class="bg-green-100 text-green-700 text-xs rounded-lg px-3 py-1 font-medium">
                                16.00
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </a>

        <a href="/service-detail" class="block group">
            <article
                class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform group-hover:scale-[1.02] group-hover:shadow-xl transition duration-300 h-full flex flex-col"
            >
                <img
                    src="assets/lab24.jpg"
                    alt="Layanan Lab 24 Jam"
                    class="w-full h-40 object-cover"
                />
                
                <div class="p-4 flex flex-col flex-grow">
                    <p class="text-xs text-gray-500 font-medium mb-1">Lab | 24 Jam</p>
                    <h3 class="font-bold text-lg text-gray-900 mb-1">Lab Cek Cepat Mandiri</h3>
                    <p class="text-sm text-gray-600 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-600 text-xs mr-1"></i> Seluruh Denpasar
                    </p>
                    
                    <p class="font-bold text-gray-900 mb-3 mt-auto">
                        Mulai <span class="text-xl text-green-700">Rp120,000</span> /Tes
                    </p>
                    
                    <div class="pt-2 border-t border-gray-100">
                        <p class="text-xs text-gray-500 font-medium mb-2">Ketersediaan</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-yellow-100 text-yellow-700 text-xs rounded-lg px-3 py-1 font-medium">
                                Tersedia 24 Jam
                            </span>
                        </div>
                    </div>
                </div>
            </article>
        </a>
        
    </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-16 bg-gray-50 rounded-xl shadow-inner mb-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-gray-900">Mengapa Memilih Layanan Kesehatan di OLGA SEHAT?</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        
        <div class="p-4">
            <i class="fas fa-user-md text-6xl text-green-600 mb-4"></i>
            <h3 class="font-semibold text-xl mb-2 text-gray-900">Spesialis Olahraga</h3>
            <p class="text-gray-600">Tim medis profesional yang berpengalaman dalam penanganan cedera dan kesehatan atlet.</p>
        </div>
        
        <div class="p-4">
            <i class="fas fa-hospital-alt text-6xl text-green-600 mb-4"></i>
            <h3 class="font-semibold text-xl mb-2 text-gray-900">Mitra Terpercaya</h3>
            <p class="text-gray-600">Bermitra dengan klinik, lab, dan rumah sakit yang teruji kualitas dan akreditasinya.</p>
        </div>
        
        <div class="p-4">
            <i class="fas fa-calendar-check text-6xl text-green-600 mb-4"></i>
            <h3 class="font-semibold text-xl mb-2 text-gray-900">Booking Fleksibel</h3>
            <p class="text-gray-600">Pesan jadwal cek kesehatan atau fisioterapi dengan mudah, kapan saja dan di mana saja.</p>
        </div>
    </div>
</section>

<section class="pb-24 md:pb-32">
    <nav aria-label="Pagination" class="flex justify-center space-x-2 px-4">
        <button aria-label="Previous page" class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 flex items-center justify-center disabled:opacity-50 disabled:cursor-not-allowed" disabled>
            <i class="fas fa-arrow-left"></i>
        </button>
        <button class="w-10 h-10 rounded-lg bg-green-600 text-white font-semibold">1</button>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 hidden sm:flex items-center justify-center">2</button>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 hidden sm:flex items-center justify-center">3</button>
        <span class="inline-flex items-center px-2 text-gray-700 select-none">...</span>
        <button class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200">63</button>
        <button aria-label="Next page" class="w-10 h-10 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-200 flex items-center justify-center">
            <i class="fas fa-arrow-right"></i>
        </button>
    </nav>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 mb-16">
    <h2 class="text-center font-bold text-3xl mb-10 text-gray-900">
        Pertanyaan Umum Seputar Layanan Kesehatan
    </h2>
    <div class="space-y-6 max-w-4xl mx-auto">
        
        <details class="border-b border-gray-200 pb-4 group bg-white shadow-sm rounded-lg p-4">
            <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-2 group-open:text-green-700">
                Apa perbedaan Layanan Kesehatan di Olga Sehat dengan klinik biasa?
                <i class="fas fa-plus text-gray-700 group-open:text-green-700 group-open:rotate-45 transition-transform"></i>
            </summary>
            <p class="text-base text-gray-600 mt-3 pl-4 border-l-4 border-green-200">
                Layanan di Olga Sehat memiliki fokus kuat pada <span class="font-medium">kedokteran olahraga, kebugaran, dan pemulihan cedera</span>. Kami bermitra dengan spesialis yang memahami kebutuhan unik gaya hidup aktif Anda.
            </p>
        </details>
        
        <details class="border-b border-gray-200 pb-4 group bg-white shadow-sm rounded-lg p-4">
            <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-2 group-open:text-green-700">
                Bisakah saya menggunakan asuransi untuk layanan medis di sini?
                <i class="fas fa-plus text-gray-700 group-open:text-green-700 group-open:rotate-45 transition-transform"></i>
            </summary>
            <p class="text-base text-gray-600 mt-3 pl-4 border-l-4 border-green-200">
                Beberapa mitra klinik kami menerima pembayaran asuransi. Detail penerimaan asuransi dan BPJS dapat Anda cek pada halaman detail masing-masing layanan.
            </p>
        </details>
        
        <details class="border-b border-gray-200 pb-4 group bg-white shadow-sm rounded-lg p-4">
            <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-2 group-open:text-green-700">
                Bagaimana cara booking sesi Fisioterapi atau Medical Check-Up?
                <i class="fas fa-plus text-gray-700 group-open:text-green-700 group-open:rotate-45 transition-transform"></i>
            </summary>
            <p class="text-base text-gray-600 mt-3 pl-4 border-l-4 border-green-200">
                Gunakan fitur pencarian di atas, pilih layanan dan lokasi yang Anda inginkan, lalu pilih jadwal yang tersedia. Anda akan menerima konfirmasi melalui email atau aplikasi kami.
            </p>
        </details>

        <details class="border-b border-gray-200 pb-4 group bg-white shadow-sm rounded-lg p-4">
            <summary class="cursor-pointer font-semibold text-lg flex justify-between items-center py-2 group-open:text-green-700">
                Apakah ada layanan Home Visit (Panggilan ke Rumah)?
                <i class="fas fa-plus text-gray-700 group-open:text-green-700 group-open:rotate-45 transition-transform"></i>
            </summary>
            <p class="text-base text-gray-600 mt-3 pl-4 border-l-4 border-green-200">
                Ya, beberapa mitra Fisioterapi dan Lab kami menawarkan layanan <span class="font-medium">Home Visit</span>. Anda dapat mencari dan memfilter layanan yang memiliki label "Home Visit" di daftar layanan.
            </p>
        </details>

    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-16">
    <div class="bg-gray-900 text-white rounded-xl p-8 md:p-12 mx-auto space-y-5 w-full"> 
        <p class="text-sm font-normal opacity-70">Khusus Klinik, Fisioterapi, & Lab</p>
        <h2 class="text-3xl md:text-4xl font-bold leading-tight">
            Tingkatkan Jangkauan Layanan Kesehatan Anda
        </h2>
        <p class="text-base font-normal max-w-xl leading-relaxed opacity-90">
            Bergabunglah dengan jaringan mitra kami. Kelola jadwal, ketersediaan, dan janji temu pasien secara digital dan efisien di platform Olga Sehat.
        </p>
        <a 
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold text-base px-8 py-3 rounded-lg mt-4 transition duration-300 shadow-lg" 
            href="/daftar-mitra-kesehatan"
        >
            Daftar Mitra Kesehatan Sekarang
        </a>
    </div>
</section>

 @endsection