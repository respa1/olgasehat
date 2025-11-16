@extends('BACKEND.Layout.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Venue</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Venue</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <!-- Statistik Cards -->
      <div class="row mb-3">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $countPending ?? 0 }}</h3>
              <p>Menunggu Verifikasi</p>
            </div>
            <div class="icon">
              <i class="fas fa-clock"></i>
            </div>
            <a href="{{ route('admin.venue.list', ['status' => 'pending']) }}" class="small-box-footer">
              Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $countApproved ?? 0 }}</h3>
              <p>Sudah Diverifikasi</p>
            </div>
            <div class="icon">
              <i class="fas fa-check-circle"></i>
            </div>
            <a href="{{ route('admin.venue.list', ['status' => 'approved']) }}" class="small-box-footer">
              Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $countAll ?? 0 }}</h3>
              <p>Total Venue</p>
            </div>
            <div class="icon">
              <i class="fas fa-list"></i>
            </div>
            <a href="{{ route('admin.venue.list', ['status' => 'all']) }}" class="small-box-footer">
              Lihat Semua <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Table -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              <h3 class="card-title">
                @if($status == 'pending')
                  Data Venue Menunggu Verifikasi
                @elseif($status == 'approved')
                  Data Venue Sudah Diverifikasi
                @else
                  Semua Data Venue
                @endif
              </h3>
            </div>
            <div class="col-md-6">
              <div class="row justify-content-end">
                <div class="col-auto">
                  <!-- Tab Filter Status -->
                  <div class="btn-group mb-2" role="group">
                    <a href="{{ route('admin.venue.list', ['status' => 'pending']) }}" 
                       class="btn btn-sm {{ $status == 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">
                      <i class="fas fa-clock"></i> Pending ({{ $countPending ?? 0 }})
                    </a>
                    <a href="{{ route('admin.venue.list', ['status' => 'approved']) }}" 
                       class="btn btn-sm {{ $status == 'approved' ? 'btn-success' : 'btn-outline-success' }}">
                      <i class="fas fa-check"></i> Approved ({{ $countApproved ?? 0 }})
                    </a>
                    <a href="{{ route('admin.venue.list', ['status' => 'all']) }}" 
                       class="btn btn-sm {{ $status == 'all' ? 'btn-info' : 'btn-outline-info' }}">
                      <i class="fas fa-list"></i> Semua
                    </a>
                  </div>
                </div>
                <div class="col-auto">
                  <form action="{{ route('admin.venue.list') }}" method="GET" class="form-inline">
                    <input type="hidden" name="status" value="{{ $status }}">
                    <div class="input-group">
                      <input type="search" name="search" class="form-control form-control-sm" placeholder="Cari venue..." value="{{ request('search') }}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Venue</th>
                <th>Pemilik</th>
                <th>Email</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kategori</th>
                <th>Tanggal Dibuat</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($venues as $index => $venue)
              <tr>
                <td>{{ ($venues->currentPage() - 1) * $venues->perPage() + $index + 1 }}</td>
                <td>
                  <strong>{{ $venue->namavenue }}</strong>
                  @if($venue->lapangans->count() > 0)
                    <br><small class="text-muted">{{ $venue->lapangans->count() }} lapangan</small>
                  @endif
                </td>
                <td>{{ $venue->user->name ?? '-' }}</td>
                <td>{{ $venue->user->email ?? '-' }}</td>
                <td>{{ $venue->provinsi }}</td>
                <td>{{ $venue->kota }}</td>
                <td>
                  @php
                    $kategoriList = is_array($venue->kategori) ? $venue->kategori : ($venue->kategori ? [$venue->kategori] : []);
                    $kategoriDisplay = !empty($kategoriList) ? implode(', ', array_slice($kategoriList, 0, 2)) : '-';
                    if (count($kategoriList) > 2) {
                      $kategoriDisplay .= ' +' . (count($kategoriList) - 2);
                    }
                  @endphp
                  <small>{{ $kategoriDisplay }}</small>
                </td>
                <td>{{ $venue->created_at->format('d M Y') }}</td>
                <td>
                  @if($venue->syarat_disetujui)
                    <span class="badge badge-success">Disetujui</span>
                  @else
                    <span class="badge badge-warning">Menunggu Verifikasi</span>
                  @endif
                </td>
                <td class="text-center">
                  <a href="{{ route('admin.venue.show', $venue->id) }}" class="btn btn-sm btn-info" title="Detail">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('admin.venue.edit', $venue->id) }}" class="btn btn-sm btn-warning" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  @if(!$venue->syarat_disetujui)
                    <form action="{{ route('admin.venue.verify', $venue->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menyetujui venue ini? Venue akan muncul di frontend setelah disetujui.');">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-sm btn-success" title="Setujui">
                        <i class="fas fa-check"></i>
                      </button>
                    </form>
                  @else
                    <form action="{{ route('admin.venue.reject', $venue->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menolak venue ini? Venue tidak akan muncul di frontend setelah ditolak.');">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-sm btn-danger" title="Tolak">
                        <i class="fas fa-times"></i>
                      </button>
                    </form>
                  @endif
                  <form action="{{ route('admin.venue.delete', $venue->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus venue ini? Semua data terkait (lapangan, jadwal, dll) akan ikut terhapus.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="10" class="text-center py-4">
                  @if($status == 'pending')
                    Tidak ada venue yang menunggu verifikasi.
                  @elseif($status == 'approved')
                    Tidak ada venue yang sudah diverifikasi.
                  @else
                    Tidak ada data venue.
                  @endif
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        @if($venues->hasPages())
        <div class="card-footer">
          <div class="d-flex justify-content-center">
            {{ $venues->appends(request()->query())->links() }}
          </div>
        </div>
        @endif
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

