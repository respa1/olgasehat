@extends('pemilikkesehatan.Layout.pengelolakesehatan')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Klinik</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.clinics') }}">Klinik</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Klinik</h3>
                    </div>
                    <form action="{{ route('pengelola.clinics.update', $clinic->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Klinik <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $clinic->nama) }}" required>
                                        @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipe <span class="text-danger">*</span></label>
                                        <select name="tipe" class="form-control" required>
                                            <option value="klinik" {{ old('tipe', $clinic->tipe) == 'klinik' ? 'selected' : '' }}>Klinik</option>
                                            <option value="layanan" {{ old('tipe', $clinic->tipe) == 'layanan' ? 'selected' : '' }}>Layanan Kesehatan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="clinic_category_id" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('clinic_category_id', $clinic->clinic_category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Motto</label>
                                <input type="text" name="motto" class="form-control" value="{{ old('motto', $clinic->motto) }}">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $clinic->deskripsi) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $clinic->alamat) }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input type="text" name="kota" class="form-control" value="{{ old('kota', $clinic->kota) }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" name="provinsi" class="form-control" value="{{ old('provinsi', $clinic->provinsi) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nomor Telepon</label>
                                        <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $clinic->nomor_telepon) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email', $clinic->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" value="{{ old('website', $clinic->website) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Hari Operasional</label>
                                <div class="row">
                                    @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $hari)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="hari_operasional[]" value="{{ $hari }}" 
                                                {{ in_array($hari, old('hari_operasional', $clinic->hari_operasional ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ ucfirst($hari) }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Buka</label>
                                        <input type="time" name="jam_buka" class="form-control" value="{{ old('jam_buka', $clinic->jam_buka) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Tutup</label>
                                        <input type="time" name="jam_tutup" class="form-control" value="{{ old('jam_tutup', $clinic->jam_tutup) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Logo Klinik</label>
                                        @if($clinic->logo)
                                        <div class="mb-2">
                                            <img src="{{ asset('fotoklinik/' . $clinic->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 100px;">
                                        </div>
                                        @endif
                                        <input type="file" name="logo" class="form-control-file" accept="image/*">
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Foto Utama</label>
                                        @if($clinic->foto_utama)
                                        <div class="mb-2">
                                            <img src="{{ asset('fotoklinik/' . $clinic->foto_utama) }}" alt="Foto Utama" class="img-thumbnail" style="max-height: 100px;">
                                        </div>
                                        @endif
                                        <input type="file" name="foto_utama" class="form-control-file" accept="image/*">
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="{{ route('pengelola.clinics') }}" class="btn btn-default">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

