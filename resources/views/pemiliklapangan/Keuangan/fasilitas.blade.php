@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper p-4">
  <div class="container-fluid">
    <div class="mb-4">
      <h4 class="font-weight-bold mb-1">Riwayat Transaksi Fasilitas</h4>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mb-0">
          <li class="breadcrumb-item"><a href="#">Keuangan</a></li>
          <li class="breadcrumb-item">Riwayat Transaksi</li>
          <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
        </ol>
      </nav>
    </div>

    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body py-4">
        <div class="alert alert-info border-dashed border-primary text-primary bg-primary-50" role="alert">
          Data ringkasan diambil berdasarkan tanggal transaksi.
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="summary-card bg-blue-50 border-left border-primary shadow-xs h-100 p-3 rounded-lg">
              <p class="text-muted mb-1 small font-weight-semibold">Transaksi Bulan Ini</p>
              <h3 class="font-weight-bold mb-0">0</h3>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="summary-card bg-green-50 border-left border-success shadow-xs h-100 p-3 rounded-lg">
              <p class="text-muted mb-1 small font-weight-semibold">Pendapatan Bulan Ini</p>
              <h3 class="font-weight-bold mb-0">Rp 0</h3>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="summary-card bg-warning-50 border-left border-warning shadow-xs h-100 p-3 rounded-lg">
              <p class="text-muted mb-1 small font-weight-semibold">Transaksi Hari Ini</p>
              <h3 class="font-weight-bold mb-0">0</h3>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="summary-card bg-purple-50 border-left border-primary shadow-xs h-100 p-3 rounded-lg">
              <p class="text-muted mb-1 small font-weight-semibold">Pendapatan Hari Ini</p>
              <h3 class="font-weight-bold mb-0">Rp 0</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
          <div>
            <h5 class="font-weight-bold mb-1">Riwayat Transaksi Fasilitas</h5>
            <p class="text-muted small mb-0">List detail riwayat pembelian</p>
          </div>
          <a href="#" class="btn btn-outline-primary btn-sm">
            <i class="fas fa-file-export mr-1"></i> Export ke File
          </a>
        </div>

        <form class="filter-panel border rounded-lg p-3 mb-4 bg-light">
          <div class="form-row">
            <div class="form-group col-xl-3 col-md-6">
              <label class="font-weight-semibold small text-muted text-uppercase">Lapangan</label>
              <select class="custom-select">
                <option>Semua Lapangan</option>
              </select>
            </div>
            <div class="form-group col-xl-3 col-md-6">
              <label class="font-weight-semibold small text-muted text-uppercase">Status Pembayaran</label>
              <select class="custom-select">
                <option>Payment Completed</option>
                <option>Pending</option>
                <option>Cancelled</option>
              </select>
            </div>
            <div class="form-group col-xl-4 col-md-6">
              <label class="font-weight-semibold small text-muted text-uppercase">Tanggal Transaksi</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" value="{{ now()->startOfMonth()->format('d/m/Y') }} - {{ now()->endOfMonth()->format('d/m/Y') }}">
              </div>
            </div>
            <div class="form-group col-xl-2 col-md-6 d-flex align-items-end">
              <button type="button" class="btn btn-primary btn-block">Terapkan Filter</button>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="thead-light">
              <tr>
                <th>Tanggal Transaksi</th>
                <th>Order ID</th>
                <th>Kontak</th>
                <th>Customer Profile</th>
                <th>Tanggal &amp; Jam Main</th>
                <th>Lapangan</th>
                <th>Harga Bersih</th>
                <th>Add-on</th>
                <th>Voucher</th>
                <th>Gelora Point</th>
                <th>Status Pembayaran</th>
                <th>Keperluan Olahraga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="12" class="text-center text-muted py-5">
                  <i class="fas fa-receipt mb-2 d-block" style="font-size: 24px;"></i>
                  No data available in table
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@push('styles')
<style>
  .summary-card {
    border-radius: 16px;
  }
  .border-dashed {
    border-style: dashed !important;
  }
  .bg-primary-50 {
    background-color: rgba(1, 61, 157, 0.08);
  }
  .bg-blue-50 {
    background-color: rgba(37, 99, 235, 0.08);
  }
  .bg-green-50 {
    background-color: rgba(34, 197, 94, 0.08);
  }
  .bg-warning-50 {
    background-color: rgba(234, 179, 8, 0.12);
  }
  .bg-purple-50 {
    background-color: rgba(168, 85, 247, 0.1);
  }
  .shadow-xs {
    box-shadow: 0 8px 16px rgba(15, 23, 42, 0.08);
  }
</style>
@endpush
@endsection

