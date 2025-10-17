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
          <h3 class="card-title">Lihat semua komunitas, membership, dan event olahraga yang aktif di platform Olga Sehat</h3>
          <div class="card-tools">
            <a href="#" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Buat Aktivitas Baru
            </a>
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
