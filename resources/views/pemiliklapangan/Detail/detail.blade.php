@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper p-4">
    <style>
    .video-preview iframe {
        border-radius: 10px;
        max-width: 560px;
        width: 100%;
        height: 315px;
    }
    .step-number {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    /* Summernote custom style */
    .note-editor.note-frame {
        border: 1px solid #dee2e6;
        border-radius: 6px;
    }
    .note-toolbar {
        background-color: #f8f9fa !important;
        border-bottom: 1px solid #dee2e6 !important;
    }
    </style>

    {{-- Tambahkan CSS Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar kiri (langkah-langkah) --}}
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

            {{-- Bagian kanan (Form) --}}
            <div class="col-md-9">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form action="{{ route('insertdetail') }}" method="post" enctype="multipart/form-data" id="detailForm">
                            @csrf

                            {{-- Hidden Venue ID --}}
                            @if(isset($venue))
                                <input type="hidden" name="venue_id" value="{{ $venue->id }}">
                                <div class="alert alert-info">
                                    <strong>Info:</strong> Anda sedang mengedit venue: <strong>{{ $venue->namavenue }}</strong>
                                </div>
                            @elseif(session('venue_id'))
                                <input type="hidden" name="venue_id" value="{{ session('venue_id') }}">
                            @else
                                <div class="alert alert-warning">
                                    <strong>Peringatan!</strong> Data venue tidak ditemukan. 
                                    <a href="{{ route('informasi') }}" class="alert-link">Klik di sini untuk membuat venue baru</a>.
                                </div>
                            @endif

                            {{-- Video Review --}}
                            <div class="mb-3">
                                <label for="video_link" class="form-label">Video Review (Link YouTube)</label>
                                <input type="url" id="video_link" name="video_review" class="form-control @error('video_review') is-invalid @enderror"
                                    placeholder="https://www.youtube.com/watch?v=abc123"
                                    value="{{ old('video_review', isset($venue) ? $venue->video_review : '') }}">
                                @error('video_review')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Masukkan link YouTube (bukan upload video).</small>

                                <div class="video-preview mt-3 text-center" id="videoPreview" style="display:none;">
                                    <iframe width="100%" height="315" src="" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>

                            {{-- Detail Venue --}}
                            <div class="mb-3">
                                <label class="form-label">Detail Venue</label>
                                <textarea id="summernote-detail" name="detail" class="form-control">{{ old('detail', isset($venue) ? $venue->detail : '') }}</textarea>
                                @error('detail')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Aturan Venue --}}
                            <div class="mb-3">
                                <label class="form-label">Aturan Venue</label>
                                <textarea id="summernote-aturan" name="aturan" class="form-control">{{ old('aturan', isset($venue) ? $venue->aturan : '') }}</textarea>
                                @error('aturan')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Lokasi --}}
                            <div class="mb-3">
                                <label class="form-label">Lokasi Venue (Link Google Maps)</label>
                                <input type="url" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
                                    placeholder="https://www.google.com/maps/place/..."
                                    value="{{ old('lokasi', isset($venue) ? $venue->lokasi : '') }}">
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Fasilitas --}}
                            <div class="mb-3">
                                <label class="form-label d-block">Fasilitas Venue</label>
                                <div class="row">
                                    @php
                                        $fasilitas = [
                                            'Area Parkir', 'Toilet/Kamar Mandi', 'Ruang Ganti/Transit', 
                                            'Tempat Ibadah (Musholla)', 'Kantin/Area Catering', 'AC/Pendingin Udara',
                                            'Sistem Tata Suara (Sound System)', 'Proyektor & Layar/LED', 
                                            'Akses Internet (Wi-Fi)', 'Akses Listrik Cadangan (Genset)',
                                            'Area Registrasi/Lobi', 'Keamanan (Security) & P3K'
                                        ];
                                        $selectedFasilitas = [];
                                        if (old('fasilitas_venue')) {
                                            $selectedFasilitas = old('fasilitas_venue');
                                        } elseif (isset($venue) && $venue->fasilitas) {
                                            $selectedFasilitas = json_decode($venue->fasilitas, true);
                                        }
                                    @endphp

                                    @foreach ($fasilitas as $item)
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

                            <button type="submit" class="btn btn-primary" {{ !isset($venue) && !session('venue_id') ? 'disabled' : '' }}>
                                Selanjutnya →
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script Summernote --}}
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

    // Preview Video
    const videoInput = document.getElementById('video_link');
    const videoPreview = document.getElementById('videoPreview');
    const iframe = videoPreview.querySelector('iframe');

    if (videoInput.value) updateVideoPreview(videoInput.value);

    videoInput.addEventListener('input', function () {
        updateVideoPreview(this.value);
    });

    function updateVideoPreview(url) {
        const videoId = extractYouTubeId(url);
        if (videoId) {
            iframe.src = `https://www.youtube.com/embed/${videoId}`;
            videoPreview.style.display = 'block';
        } else {
            videoPreview.style.display = 'none';
            iframe.src = '';
        }
    }

    function extractYouTubeId(url) {
        const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w\-]+)/;
        const match = url.match(regex);
        return match && match[1] ? match[1] : null;
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
