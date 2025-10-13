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
                                    <span class="step-number bg-primary text-white rounded-circle me-2">2</span>
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

            <div class="col-md-9">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form action="/insertdata" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Video Riview</label>
                        <input type="file" id="image" name="foto" class="form-control">
                        <div class="image-preview" id="thumbnailInput">
                            <img src="#" alt="Image Preview" id="previewImage" style="display: none;">
                            <span class="preview-text" id="previewText">No Video selected</span>
                        </div>
                    </div>
 
                    <div class="mb-3">
                        <label for="judulProgram" class="form-label">Detail Venue</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="judulProgram" class="form-label">Aturan Venue</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="judulProgram" class="form-label">Lokasi Venue</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Fasilitas Venue</label>
                        <div class="row">
                            {{-- Array Fasilitas Venue --}}
                            @php
                                $fasilitas = [
                                    'Area Parkir', 
                                    'Toilet/Kamar Mandi', 
                                    'Ruang Ganti/Transit', 
                                    'Tempat Ibadah (Musholla)', 
                                    'Kantin/Area Catering',
                                    'AC/Pendingin Udara',
                                    'Sistem Tata Suara (Sound System)',
                                    'Proyektor & Layar/LED',
                                    'Akses Internet (Wi-Fi)',
                                    'Akses Listrik Cadangan (Genset)',
                                    'Area Registrasi/Lobi',
                                    'Keamanan (Security) & P3K'
                                ];
                            @endphp

                            @foreach ($fasilitas as $item)
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-check">
                                        {{-- Gunakan name="fasilitas_venue[]" agar bisa menyimpan banyak nilai (array) --}}
                                        <input class="form-check-input" type="checkbox" 
                                               name="fasilitas_venue[]" 
                                               value="{{ $item }}" 
                                               id="check-{{ Str::slug($item) }}"
                                               {{ (is_array(old('fasilitas_venue')) && in_array($item, old('fasilitas_venue'))) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="check-{{ Str::slug($item) }}">
                                            {{ $item }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        <small class="text-muted">Pilih semua fasilitas yang tersedia di venue Anda.</small>
                    </div>
                    <a href="/syarat" class="btn btn-primary">Selanjutnya →</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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