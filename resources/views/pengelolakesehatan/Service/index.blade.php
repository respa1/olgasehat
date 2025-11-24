@extends('pemilikkesehatan.Layout.pengelolakesehatan')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Layanan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Layanan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('pengelola.services.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Layanan
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Layanan</th>
                                    <th>Kategori</th>
                                    <th>Klinik</th>
                                    <th>Dokter</th>
                                    <th>Harga</th>
                                    <th>Durasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                <tr>
                                    <td><strong>{{ $service->nama }}</strong></td>
                                    <td><span class="badge badge-info">{{ $service->kategori }}</span></td>
                                    <td>{{ $service->clinic->nama }}</td>
                                    <td>{{ $service->doctor ? $service->doctor->nama_lengkap : '-' }}</td>
                                    <td>
                                        @if($service->tipe_harga == 'gratis')
                                            <span class="badge badge-success">Gratis</span>
                                        @else
                                            Rp {{ number_format($service->harga, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td>{{ $service->durasi }} menit</td>
                                    <td>
                                        @if($service->aktif)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pengelola.services.edit', $service->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pengelola.services.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Belum ada layanan yang terdaftar</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

