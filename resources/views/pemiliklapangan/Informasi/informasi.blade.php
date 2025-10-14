@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper p-4">
            <style>
    .custom-file-upload:hover {
        border-color: #007bff;
        background-color: #eaf2ff;
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload .icon {
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 10px;
    }

    .custom-file-upload .text {
        font-size: 1rem;
        color: #666;
    }

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
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" id="image" name="foto" class="form-control">
                    <div class="image-preview" id="thumbnailInput">
                        <img src="#" alt="Image Preview" id="previewImage" style="display: none;">
                        <span class="preview-text" id="previewText">No image selected</span>
                    </div>
                </div>
  
                <div class="mb-3">
                    <label for="judulProgram" class="form-label">Nama Venue</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>

               <div class="mb-3">
                    <label for="kota" class="form-label">Pilih Kota</label>
                    <select class="form-control" name="kota" id="kota">
                        <option value="">-- Pilih Kota --</option>
                        <option value="Denpasar" {{ old('kota') == 'Denpasar' ? 'selected' : '' }}>Denpasar</option>
                        <option value="Badung" {{ old('kota') == 'Badung' ? 'selected' : '' }}>Badung</option>
                        <option value="Gianyar" {{ old('kota') == 'Gianyar' ? 'selected' : '' }}>Gianyar</option>
                        <option value="Tabanan" {{ old('kota') == 'Tabanan' ? 'selected' : '' }}>Tabanan</option>
                        <option value="Buleleng" {{ old('kota') == 'Buleleng' ? 'selected' : '' }}>Buleleng</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="category_venue" class="form-label">Category Venue</label>
                    <select class="form-control" name="category_venue" id="category_venue">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Lapangan Olahraga" {{ old('category_venue') == 'Lapangan Olahraga' ? 'selected' : '' }}>Lapangan Olahraga</option>
                        <option value="Gor" {{ old('category_venue') == 'Gor' ? 'selected' : '' }}>GOR</option>
                        <option value="Studio" {{ old('category_venue') == 'Studio' ? 'selected' : '' }}>Studio</option>
                        <option value="Arena Musik" {{ old('category_venue') == 'Arena Musik' ? 'selected' : '' }}>Arena Musik</option>
                        <option value="Gedung Serbaguna" {{ old('category_venue') == 'Gedung Serbaguna' ? 'selected' : '' }}>Gedung Serbaguna</option>
                    </select>
                </div>

                </div>
                </form>
                        <a href="/detail" class="btn btn-primary">Selanjutnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
