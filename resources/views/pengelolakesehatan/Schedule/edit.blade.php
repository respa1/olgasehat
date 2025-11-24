@extends('pemilikkesehatan.Layout.pengelolakesehatan')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Jadwal Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.schedules.index') }}">Jadwal Dokter</a></li>
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
                        <h3 class="card-title">Form Edit Jadwal</h3>
                    </div>
                    <form action="{{ route('pengelola.schedules.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokter <span class="text-danger">*</span></label>
                                        <select name="doctor_id" class="form-control" required>
                                            <option value="">Pilih Dokter</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" {{ old('doctor_id', $schedule->doctor_id) == $doctor->id ? 'selected' : '' }}>
                                                    {{ $doctor->nama_lengkap }} - {{ $doctor->clinic->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Klinik <span class="text-danger">*</span></label>
                                        <select name="clinic_id" class="form-control" required>
                                            <option value="">Pilih Klinik</option>
                                            @foreach($clinics as $clinic)
                                                <option value="{{ $clinic->id }}" {{ old('clinic_id', $schedule->clinic_id) == $clinic->id ? 'selected' : '' }}>
                                                    {{ $clinic->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hari <span class="text-danger">*</span></label>
                                        <select name="hari" class="form-control" required>
                                            <option value="senin" {{ old('hari', $schedule->hari) == 'senin' ? 'selected' : '' }}>Senin</option>
                                            <option value="selasa" {{ old('hari', $schedule->hari) == 'selasa' ? 'selected' : '' }}>Selasa</option>
                                            <option value="rabu" {{ old('hari', $schedule->hari) == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                            <option value="kamis" {{ old('hari', $schedule->hari) == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                            <option value="jumat" {{ old('hari', $schedule->hari) == 'jumat' ? 'selected' : '' }}>Jumat</option>
                                            <option value="sabtu" {{ old('hari', $schedule->hari) == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                                            <option value="minggu" {{ old('hari', $schedule->hari) == 'minggu' ? 'selected' : '' }}>Minggu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jam Mulai <span class="text-danger">*</span></label>
                                        <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai', $schedule->jam_mulai) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jam Selesai <span class="text-danger">*</span></label>
                                        <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai', $schedule->jam_selesai) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Durasi Konsultasi (menit)</label>
                                        <input type="number" name="durasi_konsultasi" class="form-control" value="{{ old('durasi_konsultasi', $schedule->durasi_konsultasi) }}" min="15" max="120">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kuota per Hari</label>
                                        <input type="number" name="kuota_per_hari" class="form-control" value="{{ old('kuota_per_hari', $schedule->kuota_per_hari) }}" min="1" max="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="{{ route('pengelola.schedules.index') }}" class="btn btn-default">
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

