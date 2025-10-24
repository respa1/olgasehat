@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper p-4">
    <style>
    .image-preview {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 300px;
        border: 2px dashed #ddd;
        border-radius: 8px;
        position: relative;
        overflow: hidden;
        background-color: #f8f8f8;
        padding: 10px;
        transition: border-color 0.3s ease;
    }

    .image-preview:hover {
        border-color: #4B49AC;
    }

    .image-preview img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
        display: none;
    }

    .preview-text {
        font-size: 16px;
        color: #aaa;
    }
</style>

<style>
    .step-number {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
</style>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Progress -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                   <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-primary text-white rounded-circle me-2"> 
                                        <i class="fas fa-handshake"></i>
                                    </span>
                                    <div>
                                        <strong>Selamat Datang</strong>
                                        <div class="small text-muted">Salam Pembuka</div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-primary text-white rounded-circle me-2">1</span>
                                    <div>
                                        <strong>Informasi Venue</strong>
                                        <div class="small text-muted">Isi Data Informasi Venue</div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-secondary text-white rounded-circle me-2">2</span>
                                    <div>
                                        <strong>Detail Venue</strong>
                                        <div class="small text-muted">Detail Fasilitas Venue</div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-secondary text-white rounded-circle me-2">3</span>
                                    <div>
                                        <strong>Syarat & Ketentuan</strong>
                                        <div class="small text-muted">Informasi Syarat & Ketentuan</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-secondary text-white rounded-circle me-2">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div>
                                        <strong>Selesai</strong>
                                        <div class="small text-muted">Onboarding Selesai</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-md-9">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form action="/insertinform" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Logo</label>
                                <input type="file" id="image" name="logo" class="form-control" accept="image/*">

                                <div class="image-preview" id="thumbnailInput">
                                    <img src="#" alt="Image Preview" id="previewImage">
                                    <span class="preview-text" id="previewText">No image selected</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="judulProgram" class="form-label">Nama Venue</label>
                                <input type="text" name="title" class="form-control" value="{{ old('namavenue') }}">
                            </div>

                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Pilih Provinsi</label>
                                <select class="form-control" id="provinsi" name="provinsi">
                                    <option value="">-- Pilih Provinsi --</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Jawa Timur">Jawa Timur</option>
                                    <option value="DKI Jakarta">DKI Jakarta</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Sumatera Utara">Sumatera Utara</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kabupaten" class="form-label">Pilih Kabupaten/Kota</label>
                                <select class="form-control" id="kabupaten" name="kota">
                                    <option value="">-- Pilih Kabupaten/Kota --</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category_venue" class="form-label">Cabang Olahraga</label>
                                <select class="form-control" name="category_venue" id="kategori">
                                    <option value="">-- Pilih Cabang Olahraga --</option>
                                    <option value="Sepak Bola" {{ old('kategori') == 'Sepak Bola' ? 'selected' : '' }}>Sepak Bola</option>
                                    <option value="Futsal" {{ old('kategori') == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                                    <option value="Bola Basket" {{ old('kategori') == 'Bola Basket' ? 'selected' : '' }}>Bola Basket</option>
                                    <option value="Bola Voli" {{ old('kategori') == 'Bola Voli' ? 'selected' : '' }}>Bola Voli</option>
                                    <option value="Bola Tangan" {{ old('kategori') == 'Bola Tangan' ? 'selected' : '' }}>Bola Tangan</option>
                                    <option value="Rugby" {{ old('kategori') == 'Rugby' ? 'selected' : '' }}>Rugby</option>
                                    <option value="Baseball" {{ old('kategori') == 'Baseball' ? 'selected' : '' }}>Baseball</option>
                                    <option value="Softball" {{ old('kategori') == 'Softball' ? 'selected' : '' }}>Softball</option>
                                </select>
                            </div>

                           <button type="submit" class="btn btn-primary">Selanjutnya →</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Image preview handling
          document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("image");
    const previewImage = document.getElementById("previewImage");
    const previewText = document.getElementById("previewText");

    imageInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
                previewText.style.display = "none";
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
            previewText.style.display = "block";
        }
    });
});
</script>

<!-- SCRIPT: pindahkan ke bawah agar tidak error -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dataWilayah = {
        "Bali": ["Denpasar", "Badung", "Gianyar", "Tabanan", "Bangli", "Klungkung", "Karangasem", "Buleleng", "Jembrana"],
        "Jawa Timur": ["Surabaya", "Malang", "Kediri", "Sidoarjo", "Banyuwangi", "Blitar"],
        "DKI Jakarta": ["Jakarta Selatan", "Jakarta Barat", "Jakarta Timur", "Jakarta Utara", "Jakarta Pusat"],
        "Jawa Barat": ["Bandung", "Bogor", "Bekasi", "Cirebon", "Sukabumi"],
        "Sumatera Utara": ["Medan", "Binjai", "Tebing Tinggi", "Pematangsiantar"]
    };

    const provinsiSelect = document.getElementById('provinsi');
    const kabupatenSelect = document.getElementById('kabupaten');

    provinsiSelect.addEventListener('change', function() {
        const provinsi = this.value;
        kabupatenSelect.innerHTML = '<option value="">-- Pilih Kabupaten/Kota --</option>';

        if (provinsi && dataWilayah[provinsi]) {
            dataWilayah[provinsi].forEach(kab => {
                const option = document.createElement('option');
                option.value = kab;
                option.textContent = kab;
                kabupatenSelect.appendChild(option);
            });
        }
    });
});
</script>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection


