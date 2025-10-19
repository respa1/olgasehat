@extends('pemiliklapangan.Layout.ownervenue')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Buat Komunitas Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/pemiliklapangan/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Buat Komunitas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Komunitas Baru</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Komunitas <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Kumpulan Pemuda Futsal" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori">Kategori Olahraga <span class="text-danger">*</span></label>
                                            <select class="form-control" id="kategori" name="kategori" required>
                                                <option value="">Pilih Kategori</option>
                                                <option>Futsal</option>
                                                <option>Basket</option>
                                                <option>Yoga</option>
                                                <option>Gym</option>
                                                <option>Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi Kegiatan</label>
                                            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Kota Denpasar, Bali">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Biaya Bergabung</label>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="gratis" name="biaya" value="gratis" checked>
                                                <label for="gratis">Gratis</label>
                                            </div>
                                            <div class="icheck-primary d-inline ml-3">
                                                <input type="radio" id="berbayar" name="biaya" value="berbayar">
                                                <label for="berbayar">Berbayar (misal: iuran)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Lengkap <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Tulis ringkasan komunitas, jadwal, dan manfaatnya" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link Grup / Kontak (WhatsApp / IG)</label>
                                    <input type="url" class="form-control" id="link" name="link" placeholder="https://wa.me/.. atau @akuninstagram">
                                </div>
                                <div class="form-group">
                                    <label for="banner">Upload Banner Komunitas (Max 2MB)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="banner" name="banner" accept="image/*">
                                            <label class="custom-file-label" for="banner">Pilih file</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Simpan Komunitas
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
