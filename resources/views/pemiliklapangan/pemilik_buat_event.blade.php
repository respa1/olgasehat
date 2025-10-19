@extends('pemiliklapangan.Layout.ownervenue')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Buat Event Olahraga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/pemiliklapangan/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Buat Event</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Detail Event Olahraga</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Event <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Turnamen Futsal Bali 2025" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jenis">Jenis Olahraga <span class="text-danger">*</span></label>
                                            <select class="form-control" id="jenis" name="jenis" required>
                                                <option value="">Pilih Jenis Olahraga</option>
                                                <option>Futsal</option>
                                                <option>Basket</option>
                                                <option>Run / Fun Run</option>
                                                <option>Gym Challenge</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu">Tanggal & Waktu <span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" id="waktu" name="waktu" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi Event <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lapangan GOR Ngurah Rai" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kapasitas">Kapasitas Peserta</label>
                                            <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="100">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="biaya">Biaya Pendaftaran (Rp)</label>
                                            <input type="number" class="form-control" id="biaya" name="biaya" placeholder="0 untuk gratis">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi & Aturan Lengkap <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Detail event, hadiah, aturan pendaftaran" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="poster">Upload Poster Event (Max 2MB)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="poster" name="poster" accept="image/*">
                                            <label class="custom-file-label" for="poster">Pilih file</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-save"></i> Simpan Event
                                </button>
                                <a href="/pemiliklapangan/dashboard" class="btn btn-secondary ml-2">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
