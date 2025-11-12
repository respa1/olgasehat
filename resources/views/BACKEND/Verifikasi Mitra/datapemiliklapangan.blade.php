@extends('backend.layout.admin')

@push('css')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Verifikasi Mitra Pemilik Lapangan</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Notifikasi -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Daftar Aplikasi Mitra</h5>
                </div>

                <div class="card-body">
                    @if($mitras->isEmpty())
                        <div class="text-center py-5 text-muted">
                            <i class="fas fa-info-circle fa-2x mb-3"></i>
                            <p>Belum ada aplikasi mitra yang diajukan.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Bisnis</th>
                                        <th>Email</th>
                                        <th>Tipe Venue</th>
                                        <th>Status</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mitras as $index => $mitra)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $mitra->nama_bisnis }}</td>
                                        <td>{{ $mitra->email_bisnis }}</td>
                                        <td>{{ $mitra->tipe_venue }}</td>
                                        <td>
                                            @if($mitra->status === 'pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @else
                                                <span class="badge bg-success">Terverifikasi</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('mitra.show', $mitra->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            @if($mitra->status === 'pending')
                                            <form action="{{ route('mitra.verify', $mitra->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin verifikasi mitra ini?');">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i> Verifikasi
                                                </button>
                                            </form>
                                            @endif
                                            <form action="{{ route('mitra.destroy', $mitra->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus mitra ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Toastr Alerts -->
<script>
  @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
  @endif

  @if (Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
  @endif
</script>
@endpush
