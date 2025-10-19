@extends('BACKEND.Layout.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Aktivitas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Aktivitas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Table -->
       <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                          <a href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Buat Aktivitas Baru
                          </a>               
                        </div>
                        <div class="col-md-6">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <form action="{{ route('activity-types.index') }}" method="GET" class="form-inline">
                                        <div class="input-group">
                                            <input type="search" name="search" class="form-control" placeholder="Cari tipe aktivitas..." value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
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
                <th>Judul Aktivitas</th>
                <th>Jenis</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($activities as $activity)
              <tr>
                <td>{{ $activity['id'] }}</td>
                <td>{{ $activity['title'] }}</td>
                <td>
                  @if($activity['type'] == 'Komunitas')
                    <span class="badge badge-success">{{ $activity['type'] }}</span>
                  @elseif($activity['type'] == 'Membership')
                    <span class="badge badge-warning">{{ $activity['type'] }}</span>
                  @elseif($activity['type'] == 'Event Olahraga')
                    <span class="badge badge-primary">{{ $activity['type'] }}</span>
                  @endif
                </td>
                <td>{{ $activity['location'] }}</td>
                <td>{{ $activity['date'] }}</td>
                <td class="text-center">
                  <button class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
