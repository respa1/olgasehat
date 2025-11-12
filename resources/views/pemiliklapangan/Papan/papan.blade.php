@extends('pemiliklapangan.layout.ownervenue')

@section('content')

<div class="content-wrapper papan-schedule">
    <div class="content-header border-0 pb-0">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center mb-3">
                        <a href="{{ route('fasilitas') }}" class="text-secondary mr-3 back-link">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                        <div>
                            <p class="breadcrumb-papan mb-1 text-muted">Kelola Fasilitas &nbsp; • &nbsp; Gelora Senayan Court</p>
                            <h1 class="page-title mb-0">Detail Lapangan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content pt-0">
        <div class="container-fluid">
            {{-- Header Card --}}
            <div class="card shadow-sm border-0 detail-card mb-4">
                <div class="card-body">
                    <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between">
                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                            <div class="facility-avatar mr-3">
                                <img src="{{ asset('logovenue/phpmyadmin.png') }}" alt="Gelora Senayan Court">
                            </div>
                            <div>
                                <p class="text-uppercase text-muted small mb-1">Gelora Senayan Court</p>
                                <h4 class="mb-3 font-weight-bold">Gelora Senayan Court</h4>
                                <div class="info-badges d-flex flex-wrap">
                                    <div class="badge-pill-info mr-2 mb-2">
                                        <span class="label">Jenis Lapangan</span>
                                        <span class="value">Wood</span>
                                    </div>
                                    <div class="badge-pill-info mr-2 mb-2">
                                        <span class="label">Ukuran Lapangan</span>
                                        <span class="value">100 x 50</span>
                                    </div>
                                    <div class="badge-pill-info mb-2">
                                        <span class="label">Olahraga</span>
                                        <span class="value">Sepak Bola</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-lg-right">
                            <a href="#" class="btn btn-outline-primary mr-2 btn-pill">Preview Lapangan</a>
                            <button class="btn btn-light btn-icon" type="button">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                    </div>
                    <p class="mt-4 text-muted small mb-0">Fasilitas premium di pusat kota Jakarta dengan akses mudah dan dukungan peralatan profesional.</p>
                </div>
                <div class="card-footer bg-white pt-3 pb-0">
                    <ul class="nav nav-tabs detail-tabs border-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Skema Harga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Informasi Penting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pengaturan Lapangan Multi-fungsi</a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Price Schedule --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header d-flex flex-wrap align-items-center justify-content-between bg-white border-0">
                    <div>
                        <h5 class="mb-1">Harga Lapangan</h5>
                        <span class="text-muted small">Pengaturan Harga Lapangan</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="dropdown mr-3">
                            <button class="btn btn-white border dropdown-toggle btn-pill" type="button" data-toggle="dropdown">
                                Default
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Default</a>
                                <a class="dropdown-item" href="#">Promo Akhir Pekan</a>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary mr-2 btn-pill" type="button" data-toggle="modal" data-target="#modalTambahPeriode">
                            <i class="fas fa-plus mr-1"></i> Tambah Periode Harga
                        </button>
                        <div class="switch-toggle">
                            <input type="checkbox" id="toggle-harga" checked>
                            <label for="toggle-harga"></label>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                        <ul class="nav nav-pills nav-schedule mb-3 mb-md-0">
                            <li class="nav-item"><a class="nav-link active" href="#">Senin</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Selasa</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Rabu</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Kamis</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Jumat</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Sabtu</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Minggu</a></li>
                        </ul>
                        <button class="btn btn-primary btn-pill" data-toggle="modal" data-target="#modalTambahHarga">
                            <i class="fas fa-plus mr-1"></i> Tambah Harga
                        </button>
                    </div>

                    <div class="table-responsive schedule-table">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Jam Awal</th>
                                    <th>Jam Akhir</th>
                                    <th>Harga Per-Slot</th>
                                    <th>Interval</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>08:00</td>
                                    <td>12:00</td>
                                    <td>Rp 250.000</td>
                                    <td>1 Jam</td>
                                    <td><span class="status-pill status-active">Aktif</span></td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-light btn-icon"><i class="fas fa-ellipsis-h"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12:00</td>
                                    <td>16:00</td>
                                    <td>Rp 300.000</td>
                                    <td>1 Jam</td>
                                    <td><span class="status-pill status-active">Aktif</span></td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-light btn-icon"><i class="fas fa-ellipsis-h"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>16:00</td>
                                    <td>22:00</td>
                                    <td>Rp 350.000</td>
                                    <td>1 Jam</td>
                                    <td><span class="status-pill status-inactive">Tidak Aktif</span></td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-light btn-icon"><i class="fas fa-ellipsis-h"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Special Price --}}
            <div class="card shadow-sm border-0 mb-5">
                <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between flex-wrap">
                    <div>
                        <h5 class="mb-1">Harga Khusus</h5>
                        <span class="text-muted small">Rujukan Harga Lapangan</span>
                    </div>
                    <button class="btn btn-outline-primary btn-pill" data-toggle="modal" data-target="#modalTambahHarga">
                        <i class="fas fa-plus mr-1"></i> Tambah Harga
                    </button>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive schedule-table">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Harga Baru</th>
                                    <th>Rujukan Harga Lapangan</th>
                                    <th>Keterangan</th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>18 Nov 2025</td>
                                    <td>Rp 450.000</td>
                                    <td>Paket Weekend</td>
                                    <td>Promo akhir pekan</td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-light btn-icon"><i class="fas fa-ellipsis-h"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>25 Nov 2025</td>
                                    <td>Rp 500.000</td>
                                    <td>Komunitas</td>
                                    <td>Turnamen internal</td>
                                    <td class="text-right">
                                        <button class="btn btn-sm btn-light btn-icon"><i class="fas fa-ellipsis-h"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Tambahkan harga khusus untuk menampilkan data di sini.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Harga --}}
<div class="modal fade" id="modalTambahHarga" tabindex="-1" role="dialog" aria-labelledby="modalTambahHargaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title font-weight-bold" id="modalTambahHargaLabel">Tambah Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hari</label>
                        <select class="form-control">
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                            <option>Sabtu</option>
                            <option>Minggu</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-flex align-items-center">Interval Slot <i class="fas fa-info-circle text-muted ml-2"></i></label>
                        <select class="form-control">
                            <option>1 Jam</option>
                            <option>1.5 Jam</option>
                            <option>2 Jam</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" value="08:00">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                        <input type="time" class="form-control" value="22:00">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Harga Per Slot <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label d-flex align-items-center">Aktifkan Jadwal <span class="text-danger ml-1">*</span> <i class="fas fa-info-circle text-muted ml-2"></i></label>
                        <div class="d-flex align-items-center">
                            <div class="switch-toggle mr-3">
                                <input type="checkbox" id="toggle-modal" checked>
                                <label for="toggle-modal"></label>
                            </div>
                            <span class="text-muted">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light btn-pill" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-primary btn-pill">Simpan</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Periode --}}
<div class="modal fade" id="modalTambahPeriode" tabindex="-1" role="dialog" aria-labelledby="modalTambahPeriodeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title font-weight-bold" id="modalTambahPeriodeLabel">Tambah Periode Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Periode</label>
                    <input type="text" class="form-control" placeholder="Contoh: Periode Akhir Tahun">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" rows="3" placeholder="Keterangan singkat periode harga"></textarea>
                </div>
                <div class="form-group">
                    <label>Rentang Tanggal</label>
                    <input type="text" class="form-control" placeholder="Pilih tanggal">
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light btn-pill" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-pill">Simpan</button>
            </div>
        </div>
    </div>
</div>

<style>
    .papan-schedule {
        background: #f4f7fc;
        min-height: 100vh;
    }
    .papan-schedule .content-wrapper {
        background: transparent;
    }
    .breadcrumb-papan {
        font-size: 0.85rem;
        letter-spacing: 0.02em;
    }
    .page-title {
        font-weight: 700;
        color: #1d2c5b;
    }
    .detail-card {
        border-radius: 20px;
    }
    .facility-avatar {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        overflow: hidden;
        background: #eff4ff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .facility-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .badge-pill-info {
        display: flex;
        flex-direction: column;
        padding: 10px 16px;
        border-radius: 999px;
        background: #f2f7ff;
    }
    .badge-pill-info .label {
        font-size: 0.75rem;
        color: #8a94a6;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .badge-pill-info .value {
        font-weight: 600;
        color: #1d2c5b;
    }
    .btn-pill {
        border-radius: 999px;
        font-weight: 600;
    }
    .btn-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .detail-tabs .nav-link {
        border: none;
        padding: 12px 18px;
        color: #6c7a99;
        font-weight: 600;
    }
    .detail-tabs .nav-link.active {
        color: #1d2c5b;
        border-bottom: 3px solid #0d99ff;
        background: transparent;
    }
    .card {
        border-radius: 16px;
    }
    .btn-white {
        background: #fff;
    }
    .nav-schedule .nav-link {
        border-radius: 999px;
        padding: 0.5rem 1.1rem;
        color: #6c7a99;
        font-weight: 600;
    }
    .nav-schedule .nav-link.active {
        background: linear-gradient(90deg, #0096ff 0%, #00c6ff 100%);
        color: #fff;
    }
    .schedule-table table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }
    .schedule-table thead th {
        border: none;
        color: #6c7a99;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        background: transparent;
    }
    .schedule-table tbody tr {
        background: #f7fbff;
        border-radius: 14px;
    }
    .schedule-table tbody tr td {
        border: none;
        padding: 18px 20px;
        font-weight: 600;
        color: #1d2c5b;
    }
    .schedule-table tbody tr td:first-child {
        border-top-left-radius: 14px;
        border-bottom-left-radius: 14px;
    }
    .schedule-table tbody tr td:last-child {
        border-top-right-radius: 14px;
        border-bottom-right-radius: 14px;
    }
    .status-pill {
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .status-active {
        background: rgba(35, 183, 143, 0.15);
        color: #23b78f;
    }
    .status-inactive {
        background: rgba(255, 144, 108, 0.15);
        color: #ef6e4e;
    }
    .switch-toggle {
        position: relative;
        width: 48px;
        height: 24px;
    }
    .switch-toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .switch-toggle label {
        position: absolute;
        cursor: pointer;
        inset: 0;
        background: #d0d8f1;
        border-radius: 999px;
        transition: all 0.3s ease;
    }
    .switch-toggle label::after {
        content: "";
        position: absolute;
        height: 20px;
        width: 20px;
        left: 2px;
        top: 2px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
    }
    .switch-toggle input:checked + label {
        background: linear-gradient(90deg, #0096ff 0%, #00c6ff 100%);
    }
    .switch-toggle input:checked + label::after {
        transform: translateX(24px);
    }
    @media (max-width: 767.98px) {
        .schedule-table table {
            border-spacing: 0;
        }
        .schedule-table tbody tr {
            border-radius: 0;
            background: transparent;
        }
        .schedule-table tbody tr td {
            padding: 12px 10px;
        }
    }
</style>
@endsection
