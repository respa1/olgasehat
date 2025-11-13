@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper bg-light">
  <section class="content pt-4 pb-5">
    <div class="container-fluid">

      <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
          <div>
            <h5 class="text-uppercase text-muted mb-1 small">Edit Venue</h5>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-transparent p-0 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('fasilitas') }}">Kelola Fasilitas</a></li>
                <li class="breadcrumb-item"><a href="{{ route('fasilitas.detail', $venue->id) }}">Detail Venue</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Venue</li>
              </ol>
            </nav>
          </div>
          <a href="{{ route('fasilitas.detail', $venue->id) }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
          </a>
        </div>
      </div>

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <form action="{{ route('fasilitas.update', $venue->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card border-0 shadow-sm rounded-3 mb-4">
          <div class="card-header bg-white border-0 pb-0">
            <h5 class="font-weight-bold mb-0">Informasi Venue</h5>
            <p class="text-muted small mb-0">Edit informasi dasar venue</p>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Gambar Banner <span class="text-danger">*</span></label>
                <input type="file" name="logo" class="form-control" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                @if($venue->logo)
                  <div class="mt-2">
                    <img src="{{ asset('storage/' . $venue->logo) }}" alt="Current Logo" class="img-thumbnail" style="max-height: 150px;">
                    <p class="text-muted small mb-0 mt-1">Gambar saat ini</p>
                  </div>
                @endif
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Nama Venue <span class="text-danger">*</span></label>
                <input type="text" name="namavenue" class="form-control" value="{{ old('namavenue', $venue->namavenue) }}" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                <select class="form-control" id="provinsi" name="provinsi" required>
                  <option value="">-- Pilih Provinsi --</option>
                  <option value="Bali" {{ old('provinsi', $venue->provinsi) == 'Bali' ? 'selected' : '' }}>Bali</option>
                  <option value="Jawa Timur" {{ old('provinsi', $venue->provinsi) == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                  <option value="DKI Jakarta" {{ old('provinsi', $venue->provinsi) == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                  <option value="Jawa Barat" {{ old('provinsi', $venue->provinsi) == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                  <option value="Sumatera Utara" {{ old('provinsi', $venue->provinsi) == 'Sumatera Utara' ? 'selected' : '' }}>Sumatera Utara</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Kota <span class="text-danger">*</span></label>
                <select class="form-control" id="kota" name="kota" required>
                  <option value="">-- Pilih Kota --</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Cabang Olahraga <span class="text-danger">*</span></label>
                <select class="form-control" name="kategori" required>
                  <option value="">-- Pilih Cabang Olahraga --</option>
                  <option value="Sepak Bola" {{ old('kategori', $venue->kategori) == 'Sepak Bola' ? 'selected' : '' }}>Sepak Bola</option>
                  <option value="Futsal" {{ old('kategori', $venue->kategori) == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                  <option value="Bola Basket" {{ old('kategori', $venue->kategori) == 'Bola Basket' ? 'selected' : '' }}>Bola Basket</option>
                  <option value="Bola Voli" {{ old('kategori', $venue->kategori) == 'Bola Voli' ? 'selected' : '' }}>Bola Voli</option>
                  <option value="Bola Tangan" {{ old('kategori', $venue->kategori) == 'Bola Tangan' ? 'selected' : '' }}>Bola Tangan</option>
                  <option value="Rugby" {{ old('kategori', $venue->kategori) == 'Rugby' ? 'selected' : '' }}>Rugby</option>
                  <option value="Baseball" {{ old('kategori', $venue->kategori) == 'Baseball' ? 'selected' : '' }}>Baseball</option>
                  <option value="Softball" {{ old('kategori', $venue->kategori) == 'Softball' ? 'selected' : '' }}>Softball</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">+62</span>
                  </div>
                  <input type="text" name="nomor_telepon" class="form-control" 
                         value="{{ old('nomor_telepon', $venue->nomor_telepon) }}" 
                         placeholder="81234567890" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Email Venue <span class="text-danger">*</span></label>
                <input type="email" name="email_venue" class="form-control" 
                       value="{{ old('email_venue', $venue->email_venue) }}" 
                       placeholder="venue@example.com" required>
              </div>
            </div>
          </div>
        </div>

        <div class="card border-0 shadow-sm rounded-3 mb-4">
          <div class="card-header bg-white border-0 pb-0">
            <h5 class="font-weight-bold mb-0">Detail Venue</h5>
            <p class="text-muted small mb-0">Edit detail dan informasi tambahan venue</p>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Video Review (Link YouTube)</label>
              <input type="url" name="video_review" class="form-control" 
                     value="{{ old('video_review', $venue->video_review) }}" 
                     placeholder="https://www.youtube.com/watch?v=abc123">
              <small class="text-muted">Masukkan link YouTube</small>
              @if($venue->video_review)
                @php
                  $videoId = null;
                  if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $venue->video_review, $matches)) {
                    $videoId = $matches[1];
                  }
                @endphp
                @if($videoId)
                  <div class="mt-2">
                    <div class="embed-responsive embed-responsive-16by9" style="max-width: 400px;">
                      <iframe class="embed-responsive-item" 
                              src="https://www.youtube.com/embed/{{ $videoId }}" 
                              allowfullscreen></iframe>
                    </div>
                  </div>
                @endif
              @endif
            </div>

            <div class="mb-3">
              <label class="form-label">Detail Venue</label>
              <textarea id="summernote-detail" name="detail" class="form-control">{{ old('detail', $venue->detail) }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Aturan Venue</label>
              <textarea id="summernote-aturan" name="aturan" class="form-control">{{ old('aturan', $venue->aturan) }}</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Lokasi (Link Google Maps)</label>
              <input type="url" name="lokasi" class="form-control" 
                     value="{{ old('lokasi', $venue->lokasi) }}" 
                     placeholder="https://www.google.com/maps/place/...">
            </div>

            <div class="mb-3">
              <label class="form-label d-block">Fasilitas Venue</label>
              <div class="row">
                @php
                  $allFasilitas = [
                    'Area Parkir', 'Toilet/Kamar Mandi', 'Ruang Ganti/Transit', 
                    'Tempat Ibadah (Musholla)', 'Kantin/Area Catering', 'AC/Pendingin Udara',
                    'Sistem Tata Suara (Sound System)', 'Proyektor & Layar/LED', 
                    'Akses Internet (Wi-Fi)', 'Akses Listrik Cadangan (Genset)',
                    'Area Registrasi/Lobi', 'Keamanan (Security) & P3K'
                  ];
                  $selectedFasilitas = $fasilitas ?? [];
                @endphp
                @foreach ($allFasilitas as $item)
                  <div class="col-md-4 col-sm-6 mb-2">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" 
                             name="fasilitas_venue[]" 
                             value="{{ $item }}" 
                             id="check-{{ Str::slug($item) }}"
                             {{ in_array($item, $selectedFasilitas) ? 'checked' : '' }}>
                      <label class="form-check-label" for="check-{{ Str::slug($item) }}">
                        {{ $item }}
                      </label>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label d-block">Galeri Foto Venue</label>
              <input type="file" name="galeri_foto[]" id="galeri_foto" class="form-control" 
                     accept="image/*" multiple>
              <small class="text-muted">Pilih multiple gambar untuk menambah galeri (maksimal 10 gambar, format: JPG, PNG, maksimal 2MB per gambar)</small>
              
              @if($venue->galleries && $venue->galleries->count() > 0)
                <div class="mt-3">
                  <p class="small text-muted mb-2">Galeri yang sudah ada:</p>
                  <div class="row">
                    @foreach($venue->galleries as $gallery)
                      <div class="col-md-3 col-sm-4 mb-2">
                        <div class="position-relative">
                          <img src="{{ asset('storage/' . $gallery->foto) }}" 
                               alt="Gallery {{ $loop->iteration }}" 
                               class="img-thumbnail" style="width: 100%; height: 120px; object-fit: cover;">
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif

              <div id="galeriPreview" class="mt-3 row"></div>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('fasilitas.detail', $venue->id) }}" class="btn btn-light">
            <i class="fas fa-times mr-1"></i> Batal
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save mr-1"></i> Simpan Perubahan
          </button>
        </div>
      </form>

    </div>
  </section>
</div>

{{-- Script Summernote --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Summernote
    $('#summernote-detail').summernote({
        placeholder: 'Deskripsikan detail venue Anda...',
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
            ['view', ['codeview']]
        ]
    });

    $('#summernote-aturan').summernote({
        placeholder: 'Tuliskan aturan-aturan yang berlaku di venue...',
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['codeview']]
        ]
    });

    // Script untuk dropdown wilayah
    const dataWilayah = {
        "Bali": ["Denpasar", "Badung", "Gianyar", "Tabanan", "Bangli", "Klungkung", "Karangasem", "Buleleng", "Jembrana"],
        "Jawa Timur": ["Surabaya", "Malang", "Kediri", "Sidoarjo", "Banyuwangi", "Blitar"],
        "DKI Jakarta": ["Jakarta Selatan", "Jakarta Barat", "Jakarta Timur", "Jakarta Utara", "Jakarta Pusat"],
        "Jawa Barat": ["Bandung", "Bogor", "Bekasi", "Cirebon", "Sukabumi"],
        "Sumatera Utara": ["Medan", "Binjai", "Tebing Tinggi", "Pematangsiantar"]
    };

    const provinsiSelect = document.getElementById('provinsi');
    const kotaSelect = document.getElementById('kota');
    const currentProvinsi = "{{ old('provinsi', $venue->provinsi) }}";
    const currentKota = "{{ old('kota', $venue->kota) }}";

    // Fungsi untuk populate kota
    function populateKota(provinsi, selectedKota = null) {
        kotaSelect.innerHTML = '<option value="">-- Pilih Kota --</option>';
        if (provinsi && dataWilayah[provinsi]) {
            dataWilayah[provinsi].forEach(kab => {
                const option = document.createElement('option');
                option.value = kab;
                option.textContent = kab;
                if (selectedKota && kab === selectedKota) {
                    option.selected = true;
                }
                kotaSelect.appendChild(option);
            });
        }
    }

    // Set nilai awal saat halaman dimuat
    if (currentProvinsi) {
        provinsiSelect.value = currentProvinsi;
        populateKota(currentProvinsi, currentKota);
    }

    provinsiSelect.addEventListener('change', function() {
        const provinsi = this.value;
        populateKota(provinsi);
    });

    // Preview galeri foto multiple
    const galeriInput = document.getElementById('galeri_foto');
    const galeriPreview = document.getElementById('galeriPreview');
    
    if (galeriInput) {
        galeriInput.addEventListener('change', function(e) {
            galeriPreview.innerHTML = '';
            const files = e.target.files;
            
            if (files.length > 10) {
                alert('Maksimal 10 gambar yang dapat diupload');
                e.target.value = '';
                return;
            }
            
            Array.from(files).forEach((file, index) => {
                if (file.size > 2048 * 1024) {
                    alert(`File ${file.name} terlalu besar (maksimal 2MB)`);
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 col-sm-4 mb-2';
                    col.innerHTML = `
                        <div class="position-relative">
                            <img src="${e.target.result}" 
                                 alt="Preview ${index + 1}" 
                                 class="img-thumbnail" 
                                 style="width: 100%; height: 120px; object-fit: cover;">
                            <small class="d-block text-center text-muted mt-1">${file.name}</small>
                        </div>
                    `;
                    galeriPreview.appendChild(col);
                };
                reader.readAsDataURL(file);
            });
        });
    }
});
</script>

<style>
  .note-editor.note-frame {
    border: 1px solid #dee2e6;
    border-radius: 6px;
  }
  .note-toolbar {
    background-color: #f8f9fa !important;
    border-bottom: 1px solid #dee2e6 !important;
  }
</style>
@endsection

