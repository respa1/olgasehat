@extends('pemilikkesehatan.Layout.pengelolakesehatan')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Jadwal Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Jadwal Dokter</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('pengelola.schedules.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Jadwal
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
                                    <th>Dokter</th>
                                    <th>Klinik</th>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Durasi</th>
                                    <th>Kuota</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($schedules as $schedule)
                                <tr>
                                    <td>
                                        <strong>{{ $schedule->doctor->nama_lengkap ?? $schedule->doctor->nama }}</strong>
                                        <br><small class="text-muted">{{ $schedule->doctor->spesialisasi }}</small>
                                    </td>
                                    <td>{{ $schedule->clinic->nama }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ $schedule->hari_indonesia }}</span>
                                    </td>
                                    <td>
                                        {{ $schedule->jam_mulai }} - {{ $schedule->jam_selesai }}
                                    </td>
                                    <td>{{ $schedule->durasi_konsultasi }} menit</td>
                                    <td>{{ $schedule->kuota_per_hari }} pasien/hari</td>
                                    <td>
                                        @if($schedule->aktif)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pengelola.schedules.edit', $schedule->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pengelola.schedules.destroy', $schedule->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
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
                                    <td colspan="8" class="text-center">Belum ada jadwal yang terdaftar</td>
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

