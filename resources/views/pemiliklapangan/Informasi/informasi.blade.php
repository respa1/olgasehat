@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper p-4">
    <style>
    .image-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        min-height: 150px;
        border: 2px dashed #ddd;
        border-radius: 8px;
        background-color: #f8f8f8;
        padding: 15px;
        justify-content: center;
        align-items: center;
        transition: border-color 0.3s ease;
    }
    .image-preview:hover {
        border-color: #4B49AC;
    }
    .image-preview .preview-item {
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #fff;
    }
    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .image-preview .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: rgba(255, 0, 0, 0.8);
        border: none;
        border-radius: 50%;
        color: white;
        width: 25px;
        height: 25px;
        font-size: 14px;
        cursor: pointer;
    }
    .preview-text {
        font-size: 16px;
        color: #aaa;
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
                        <form action="/insertdata" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Gambar (Maks. 5)</label>
                                <input type="file" id="image" name="foto[]" class="form-control" multiple accept="image/*">
                                <small class="text-muted">Anda dapat memilih hingga 5 gambar.</small>

                                <div class="image-preview mt-3" id="imagePreview">
                                    <span class="preview-text">Belum ada gambar dipilih</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="judulProgram" class="form-label">Nama Venue</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
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
                                <select class="form-control" id="kabupaten" name="kabupaten">
                                    <option value="">-- Pilih Kabupaten/Kota --</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category_venue" class="form-label">Cabang Olahraga</label>
                                <select class="form-control" name="category_venue" id="category_venue">
                                    <option value="">-- Pilih Cabang Olahraga --</option>
                                    <option value="Sepak Bola" {{ old('category_venue') == 'Sepak Bola' ? 'selected' : '' }}>Sepak Bola</option>
                                    <option value="Futsal" {{ old('category_venue') == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                                    <option value="Bola Basket" {{ old('category_venue') == 'Bola Basket' ? 'selected' : '' }}>Bola Basket</option>
                                    <option value="Bola Voli" {{ old('category_venue') == 'Bola Voli' ? 'selected' : '' }}>Bola Voli</option>
                                    <option value="Bola Tangan" {{ old('category_venue') == 'Bola Tangan' ? 'selected' : '' }}>Bola Tangan</option>
                                    <option value="Rugby" {{ old('category_venue') == 'Rugby' ? 'selected' : '' }}>Rugby</option>
                                    <option value="Baseball" {{ old('category_venue') == 'Baseball' ? 'selected' : '' }}>Baseball</option>
                                    <option value="Softball" {{ old('category_venue') == 'Softball' ? 'selected' : '' }}>Softball</option>
                                </select>
                            </div>

                           <a href="/detail" class="btn btn-primary">Selanjutnya →</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {
        const files = Array.from(this.files);
        imagePreview.innerHTML = ''; // kosongkan isi preview lama

        if (files.length > 5) {
            alert('Maksimal hanya 5 foto yang boleh diunggah!');
            imageInput.value = ''; // reset input file
            imagePreview.innerHTML = '<span class="preview-text">Belum ada gambar dipilih</span>';
            return;
        }

        if (files.length === 0) {
            imagePreview.innerHTML = '<span class="preview-text">Belum ada gambar dipilih</span>';
            return;
        }

        files.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function (e) {
                const div = document.createElement('div');
                div.classList.add('preview-item');

                const img = document.createElement('img');
                img.src = e.target.result;

                const removeBtn = document.createElement('button');
                removeBtn.classList.add('remove-btn');
                removeBtn.innerHTML = '×';
                removeBtn.addEventListener('click', () => {
                    div.remove();
                    if (imagePreview.children.length === 0) {
                        imagePreview.innerHTML = '<span class="preview-text">Belum ada gambar dipilih</span>';
                    }
                });

                div.appendChild(img);
                div.appendChild(removeBtn);
                imagePreview.appendChild(div);
            };

            reader.readAsDataURL(file);
        });
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
@endsection
