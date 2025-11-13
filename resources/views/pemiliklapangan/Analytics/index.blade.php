@extends('pemiliklapangan.layout.ownervenue')

@section('content')
@php
    $periodOptions = [
        '7_hari' => '7 Hari',
        '14_hari' => '14 Hari',
        '1_bulan' => '1 Bulan',
        '3_bulan' => '3 Bulan',
    ];
@endphp

<div class="content-wrapper owner-analytics">
    <div class="content-header border-0 pb-0">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="page-title mb-1">Analytics</h1>
                    <p class="text-muted mb-0">Lihat performa venue anda berdasarkan transaksi, revenue, dan okupansi.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <button class="btn btn-outline-primary btn-pill mr-2"><i class="fas fa-download mr-2"></i>Download Laporan</button>
                    <button class="btn btn-primary btn-pill"><i class="fas fa-envelope-open-text mr-2"></i>Kirim via Email</button>
                </div>
            </div>
        </div>
    </div>

    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card border-0 shadow-sm filter-card mb-4">
                <div class="card-body">
                    <form action="javascript:void(0)">
                        <div class="form-row">
                            <div class="form-group col-lg-3 col-md-6">
                                <label>Klasifikasi Tanggal <span class="text-danger">*</span></label>
                                <select class="form-control custom-select">
                                    <option>Tanggal Transaksi</option>
                                    <option>Tanggal Booking</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <label>Venue <span class="text-danger">*</span></label>
                                <select class="form-control custom-select">
                                    <option>Semua Venue</option>
                                    <option>Gelora Senayan</option>
                                    <option>Sport Center A</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <label>Lapangan <span class="text-danger">*</span></label>
                                <select class="form-control custom-select">
                                    <option>Semua Lapangan</option>
                                    <option>Lapangan 1</option>
                                    <option>Lapangan 2</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <label>Mulai dari <span class="text-danger">*</span></label>
                                <input type="month" class="form-control" value="{{ now()->format('Y-m') }}">
                            </div>
                        </div>
                        <div class="form-row align-items-end">
                            <div class="form-group col-lg-3 col-md-6">
                                <label>Rentang Waktu <span class="text-danger">*</span></label>
                                <select class="form-control custom-select">
                                    <option>1 Bulan</option>
                                    <option>3 Bulan</option>
                                    <option>6 Bulan</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-9 col-md-6 d-flex align-items-center justify-content-end flex-wrap">
                                <button class="btn btn-light btn-pill mr-2" type="button">Reset</button>
                                <button class="btn btn-primary btn-pill mr-3" type="button">Terapkan Filter</button>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sendMailSwitch" checked>
                                    <label class="custom-control-label" for="sendMailSwitch">Kirim via Email</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm chart-card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="mb-1">Revenue</h5>
                            <p class="text-muted small mb-0">Jumlah pendapatan fasilitas.</p>
                        </div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-primary active">
                                <input type="radio" name="revenue-range" checked> Mingguan
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="revenue-range"> Bulanan
                            </label>
                        </div>
                    </div>
                    <div class="dummy-chart">
                        <span>Tidak ada data revenue untuk periode ini.</span>
                    </div>
                    <div class="goal-line mt-4">
                        <h6 class="font-weight-bold mb-3">Goal Line</h6>
                        <div class="form-row align-items-center">
                            <div class="form-group col-md-4">
                                <label>Nominal Target (Rp)</label>
                                <input type="number" class="form-control" placeholder="cth. 25.000.000">
                            </div>
                            <div class="form-group col-md-8 text-right">
                                <button class="btn btn-outline-primary btn-pill mr-2" type="button">Tambah / Ubah</button>
                                <button class="btn btn-outline-danger btn-pill mr-2" type="button">Hapus</button>
                                <button class="btn btn-primary btn-pill" type="button">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100 chart-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h5 class="mb-1">Transaksi</h5>
                                    <p class="text-muted small mb-0">Jumlah transaksi fasilitas.</p>
                                </div>
                                <span class="legend-dot legend-blue"></span>
                            </div>
                            <div class="dummy-chart">
                                <span>Data transaksi belum tersedia.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100 chart-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h5 class="mb-1">User</h5>
                                    <p class="text-muted small mb-0">Jumlah pelanggan fasilitas.</p>
                                </div>
                                <span class="legend-dot legend-purple"></span>
                            </div>
                            <div class="dummy-chart">
                                <span>Belum ada data user baru selama periode ini.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100 chart-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h5 class="mb-1">Okupansi</h5>
                                    <p class="text-muted small mb-0">Tingkat okupansi fasilitas.</p>
                                </div>
                                <span class="legend-dot legend-cyan"></span>
                            </div>
                            <div class="dummy-chart">
                                <span>Data okupansi masih kosong.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100 chart-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h5 class="mb-1">Sebaran Okupansi</h5>
                                    <p class="text-muted small mb-0">Perbandingan okupansi tiap fasilitas.</p>
                                </div>
                                <div class="legend-dot-group">
                                    <span class="legend-dot legend-salmon"></span>
                                    <span class="legend-dot legend-pink"></span>
                                    <span class="legend-dot legend-orange"></span>
                                </div>
                            </div>
                            <div class="dummy-chart">
                                <span>Belum ada data sebaran okupansi.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm chart-card mb-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="mb-1">Status Promosi</h5>
                            <p class="text-muted small mb-0">Realisasi transaksi keuangan via tarif menggunakan promosi.</p>
                        </div>
                        <div class="legend-dot-group">
                            <span class="legend-dot legend-blue"></span>
                            <span class="legend-dot legend-pink"></span>
                            <span class="legend-dot legend-purple"></span>
                        </div>
                    </div>
                    <div class="dummy-chart tall">
                        <span>Belum ada aktivitas promosi yang tercatat.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .owner-analytics {
        background: linear-gradient(180deg, #f6f9ff 0%, #ffffff 100%);
        min-height: 100vh;
    }
    .owner-analytics .content-wrapper {
        background: transparent;
    }
    .page-title {
        font-weight: 700;
        color: #1b2b5a;
    }
    .btn-pill {
        border-radius: 999px;
        font-weight: 600;
    }
    .filter-card {
        border-radius: 24px;
    }
    .filter-card .form-group label {
        font-weight: 600;
        color: #1b2b5a;
        font-size: 0.85rem;
    }
    .filter-card .custom-select,
    .filter-card .form-control {
        border-radius: 14px;
        border-color: #dbe4ff;
        background: #f7f9ff;
        color: #1b2b5a;
        font-weight: 500;
    }
    .filter-card .custom-control-label {
        font-weight: 600;
        color: #1b2b5a;
    }
    .chart-card {
        border-radius: 22px;
    }
    .dummy-chart {
        border: 2px dashed #dce6ff;
        border-radius: 18px;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8a96c2;
        font-weight: 600;
        font-size: 0.9rem;
        background: linear-gradient(180deg, #fdfdff 0%, #f7f9ff 100%);
    }
    .dummy-chart.tall {
        height: 280px;
    }
    .legend-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        display: inline-block;
    }
    .legend-blue {
        background: #4f8bff;
    }
    .legend-purple {
        background: #a56bff;
    }
    .legend-cyan {
        background: #44d1c4;
    }
    .legend-salmon {
        background: #ffa287;
    }
    .legend-pink {
        background: #ff6ba3;
    }
    .legend-orange {
        background: #ffb662;
    }
    .legend-dot-group .legend-dot {
        margin-left: 6px;
    }
    .goal-line {
        border-top: 1px solid #eef2ff;
        padding-top: 20px;
    }
    .custom-switch .custom-control-label::before {
        background-color: #d5e4ff;
        border-radius: 999px;
    }
    .custom-switch .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #4798ff;
    }
    .custom-switch .custom-control-label::after {
        top: calc(0.25rem + 2px);
        left: calc(-2.25rem + 2px);
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: #fff;
    }
    .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
        transform: translateX(18px);
    }
    @media (max-width: 767.98px) {
        .filter-card .form-row {
            display: block;
        }
        .filter-card .form-group {
            width: 100%;
        }
    }
</style>
@endsection

