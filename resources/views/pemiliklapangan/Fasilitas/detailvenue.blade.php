@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper bg-light">
  <section class="content pt-4 pb-5">
    <div class="container-fluid">

      <div class="row mb-3">
        <div class="col-12 d-flex justify-content-between align-items-center">
          <div>
            <h5 class="text-uppercase text-muted mb-1 small">Detail Venue</h5>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb bg-transparent p-0 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('fasilitas') }}">Kelola Fasilitas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Venue</li>
              </ol>
            </nav>
          </div>
          <a href="{{ route('fasilitas') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
          </a>
        </div>
      </div>

      <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
          <div class="row align-items-start">
            <div class="col-lg-9 d-flex">
              <div class="venue-logo mr-4 flex-shrink-0">
                <img
                  src="{{ $venue->logo ? asset('storage/' . $venue->logo) : asset('assets/olgasehat-icon.png') }}"
                  alt="{{ $venue->namavenue }}"
                  class="img-fluid">
              </div>
              <div class="flex-grow-1">
                <div class="d-flex align-items-center mb-2">
                  <h3 class="font-weight-bold text-dark mb-0 mr-2">{{ $venue->namavenue }}</h3>
                  <button type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                </div>
                <p class="text-muted mb-3">
                  {{ $venue->lokasi ? $venue->lokasi : 'Lokasi belum diisi.' }}
                </p>
                <div class="row small text-muted mb-3">
                  <div class="col-md-4 mb-2">
                    <span class="text-uppercase text-secondary d-block font-weight-bold">Username</span>
                    <span class="text-primary font-weight-bold">{{ \Illuminate\Support\Str::slug($venue->namavenue, '_') }}</span>
                  </div>
                  <div class="col-md-4 mb-2">
                    <span class="text-uppercase text-secondary d-block font-weight-bold">Kontak</span>
                    <span class="font-weight-bold">
                      @if($venue->nomor_telepon)
                        +62{{ $venue->nomor_telepon }}
                      @else
                        +62XXXXXXXXXX
                      @endif
                    </span>
                  </div>
                  <div class="col-md-4 mb-2">
                    <span class="text-uppercase text-secondary d-block font-weight-bold">Lokasi</span>
                    <span class="font-weight-bold">{{ ucfirst($venue->kota) }}, {{ ucfirst($venue->provinsi) }}</span>
                  </div>
                </div>
                <div class="d-flex flex-wrap align-items-center icon-badges">
                  @if(isset($fasilitas) && count($fasilitas) > 0)
                    @php
                      $fasilitasIcons = [
                        'Area Parkir' => 'fa-parking',
                        'Toilet/Kamar Mandi' => 'fa-toilet',
                        'Ruang Ganti/Transit' => 'fa-tshirt',
                        'Tempat Ibadah (Musholla)' => 'fa-mosque',
                        'Kantin/Area Catering' => 'fa-utensils',
                        'AC/Pendingin Udara' => 'fa-snowflake',
                        'Sistem Tata Suara (Sound System)' => 'fa-volume-up',
                        'Proyektor & Layar/LED' => 'fa-tv',
                        'Akses Internet (Wi-Fi)' => 'fa-wifi',
                        'Akses Listrik Cadangan (Genset)' => 'fa-plug',
                        'Area Registrasi/Lobi' => 'fa-door-open',
                        'Keamanan (Security) & P3K' => 'fa-shield-alt'
                      ];
                      $fasilitasLabels = [
                        'Area Parkir' => 'Parkir',
                        'Toilet/Kamar Mandi' => 'Toilet',
                        'Ruang Ganti/Transit' => 'Ruang Ganti',
                        'Tempat Ibadah (Musholla)' => 'Musholla',
                        'Kantin/Area Catering' => 'Kantin',
                        'AC/Pendingin Udara' => 'AC',
                        'Sistem Tata Suara (Sound System)' => 'Sound System',
                        'Proyektor & Layar/LED' => 'Proyektor',
                        'Akses Internet (Wi-Fi)' => 'WiFi',
                        'Akses Listrik Cadangan (Genset)' => 'Genset',
                        'Area Registrasi/Lobi' => 'Lobi',
                        'Keamanan (Security) & P3K' => 'Security'
                      ];
                    @endphp
                    @foreach($fasilitas as $fas)
                      @if(isset($fasilitasIcons[$fas]))
                        <span class="badge badge-pill badge-light border mr-2 mb-2">
                          <i class="fas {{ $fasilitasIcons[$fas] }} mr-1 text-primary"></i> 
                          {{ $fasilitasLabels[$fas] ?? $fas }}
                        </span>
                      @endif
                    @endforeach
                  @else
                    <span class="text-muted small">Belum ada fasilitas yang ditambahkan.</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-lg-3 d-flex justify-content-lg-end mt-3 mt-lg-0">
              <div class="btn-group-vertical w-100">
                <button class="btn btn-primary font-weight-bold mb-2">QR Code</button>
                <button class="btn btn-outline-primary font-weight-bold mb-2">Preview Venue</button>
                <button class="btn btn-light border font-weight-bold">
                  <i class="fas fa-ellipsis-h mr-1"></i> Lainnya
                </button>
              </div>
            </div>
          </div>

          <div class="mt-4">
            <ul class="nav nav-tabs owner-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-lapangan" role="tab" aria-selected="true">Lapangan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-experience" role="tab" aria-selected="false">Experience</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-operasional" role="tab" aria-selected="false">Jam Operasional</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-deskripsi" role="tab" aria-selected="false">Deskripsi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-syarat" role="tab" aria-selected="false">Syarat dan Ketentuan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-galeri" role="tab" aria-selected="false">Galeri</a>
              </li>
            </ul>
          </div>

          <div class="tab-content pt-4">
            <div class="tab-pane fade show active" id="tab-lapangan" role="tabpanel">
              @if($venue->kategori)
                <div class="mb-4">
                  <h5 class="font-weight-bold mb-3">Informasi Lapangan</h5>
                  <div class="card border-0 shadow-sm">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-md-8">
                          <h6 class="font-weight-bold text-dark mb-2">
                            <i class="fas fa-futbol text-primary mr-2"></i>
                            Cabang Olahraga
                          </h6>
                          <p class="text-muted mb-0">{{ $venue->kategori }}</p>
                        </div>
                        <div class="col-md-4 text-right">
                          <span class="badge badge-primary badge-pill px-3 py-2">
                            {{ $venue->kategori }}
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
              
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="card h-100 border border-primary border-dashed text-center add-box">
                    <div class="card-body d-flex flex-column justify-content-center">
                      <div class="add-icon mx-auto mb-3">
                        <i class="fas fa-plus"></i>
                      </div>
                      <h5 class="font-weight-bold text-dark mb-2">Tambah Lapangan</h5>
                      <p class="text-muted small mb-3 px-2">
                        Anda dapat menambahkan lapangan di venue yang Anda miliki dengan menekan tombol tambah.
                      </p>
                      <a href="#" class="btn btn-primary font-weight-bold px-4">
                        Tambah
                      </a>
                    </div>
                  </div>
                </div>
                {{-- TODO: Loop data lapangan --}}
              </div>
            </div>

            <div class="tab-pane fade" id="tab-experience" role="tabpanel">
              @if($venue->video_review)
                <div class="mb-3">
                  <h5 class="font-weight-bold mb-3">Video Review</h5>
                  @php
                    // Extract YouTube video ID
                    $videoId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $venue->video_review, $matches)) {
                      $videoId = $matches[1];
                    }
                  @endphp
                  @if($videoId)
                    <div class="embed-responsive embed-responsive-16by9" style="max-width: 800px;">
                      <iframe class="embed-responsive-item" 
                              src="https://www.youtube.com/embed/{{ $videoId }}" 
                              allowfullscreen></iframe>
                    </div>
                    <p class="mt-2">
                      <a href="{{ $venue->video_review }}" target="_blank" class="text-primary">
                        <i class="fab fa-youtube mr-1"></i> Buka di YouTube
                      </a>
                    </p>
                  @else
                    <p class="text-muted">Link video tidak valid.</p>
                  @endif
                </div>
              @else
                <p class="text-muted mb-0">Belum ada video review yang ditambahkan.</p>
              @endif
            </div>
            <div class="tab-pane fade" id="tab-operasional" role="tabpanel">
              <p class="text-muted mb-0">Jam operasional belum diatur.</p>
            </div>
            <div class="tab-pane fade" id="tab-deskripsi" role="tabpanel">
              @if($venue->detail)
                <div class="venue-content">
                  {!! $venue->detail !!}
                </div>
              @else
                <p class="text-muted mb-0">Belum ada deskripsi venue.</p>
              @endif
            </div>
            <div class="tab-pane fade" id="tab-syarat" role="tabpanel">
              @if($venue->aturan)
                <div class="venue-content">
                  {!! $venue->aturan !!}
                </div>
              @else
                <p class="text-muted mb-0">Belum ada syarat dan ketentuan.</p>
              @endif
            </div>
            <div class="tab-pane fade" id="tab-galeri" role="tabpanel">
              @if($venue->galleries && $venue->galleries->count() > 0)
                <div class="row">
                  @foreach($venue->galleries as $gallery)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                      <div class="card border-0 shadow-sm h-100">
                        <div class="card-img-top position-relative" style="height: 200px; overflow: hidden;">
                          <img src="{{ asset('storage/' . $gallery->foto) }}" 
                               alt="Gallery {{ $loop->iteration }}" 
                               class="w-100 h-100" 
                               style="object-fit: cover;">
                        </div>
                        <div class="card-body p-2 text-center">
                          <small class="text-muted">Foto {{ $loop->iteration }}</small>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @else
                <div class="text-center py-5">
                  <i class="fas fa-images fa-3x text-muted mb-3"></i>
                  <p class="text-muted mb-0">Galeri belum tersedia.</p>
                  <p class="text-muted small">Tambahkan foto galeri melalui form Detail Venue.</p>
                </div>
              @endif
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
</div>

<style>
  .venue-logo {
    width: 112px;
    height: 112px;
    border-radius: 24px;
    background: rgba(1, 61, 157, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  .venue-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .owner-tabs .nav-link {
    font-weight: 600;
    color: #6c7a92;
    padding: 0.75rem 1.5rem;
    border: none;
    border-bottom: 2px solid transparent;
    transition: all .2s ease;
  }
  .owner-tabs .nav-link:hover {
    color: #013d9d;
  }
  .owner-tabs .nav-link.active {
    color: #013d9d;
    border-bottom-color: #2b8af7;
  }
  .border-dashed {
    border-style: dashed !important;
  }
  .add-box {
    background: #f5faff;
    border-radius: 16px;
    transition: transform .2s ease, box-shadow .2s ease;
  }
  .add-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 30px rgba(1, 61, 157, 0.15);
  }
  .add-box .add-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    background: rgba(43, 138, 247, 0.18);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: #2b8af7;
  }
  .venue-content {
    line-height: 1.8;
    color: #495057;
  }
  .venue-content p {
    margin-bottom: 1rem;
  }
  .venue-content ul, .venue-content ol {
    margin-bottom: 1rem;
    padding-left: 2rem;
  }
  .venue-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1rem 0;
  }
</style>
@endsection