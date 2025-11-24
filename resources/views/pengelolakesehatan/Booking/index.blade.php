@extends('pemilikkesehatan.Layout.pengelolakesehatan')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Booking</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Booking</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Filter -->
        <div class="card card-primary card-outline collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Filter</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('pengelola.bookings.index') }}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="no_show" {{ request('status') == 'no_show' ? 'selected' : '' }}>No Show</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Klinik</label>
                                <select name="clinic_id" class="form-control">
                                    <option value="">Semua Klinik</option>
                                    @foreach($clinics as $clinic)
                                        <option value="{{ $clinic->id }}" {{ request('clinic_id') == $clinic->id ? 'selected' : '' }}>
                                            {{ $clinic->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Search</label>
                                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Kode, Nama, Telepon">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Filter
                            </button>
                            <a href="{{ route('pengelola.bookings.index') }}" class="btn btn-default">
                                <i class="fas fa-redo"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Booking</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Klinik</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                <tr>
                                    <td><strong>{{ $booking->kode_booking }}</strong></td>
                                    <td>
                                        {{ $booking->nama_pasien }}
                                        <br><small class="text-muted">{{ $booking->nomor_telepon }}</small>
                                    </td>
                                    <td>{{ $booking->doctor->nama_lengkap ?? $booking->doctor->nama }}</td>
                                    <td>{{ $booking->clinic->nama }}</td>
                                    <td>
                                        {{ $booking->tanggal->format('d M Y') }}
                                        <br><small class="text-muted">{{ $booking->jam }}</small>
                                    </td>
                                    <td>
                                        @if($booking->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($booking->status == 'confirmed')
                                            <span class="badge badge-info">Confirmed</span>
                                        @elseif($booking->status == 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @elseif($booking->status == 'cancelled')
                                            <span class="badge badge-danger">Cancelled</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $booking->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pengelola.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada booking ditemukan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

