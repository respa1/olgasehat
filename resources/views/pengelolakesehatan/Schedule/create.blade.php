@extends('pemilikkesehatan.Layout.pengelolakesehatan')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Jadwal Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.schedules.index') }}">Jadwal Dokter</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
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
                        <h3 class="card-title">Form Tambah Jadwal</h3>
                    </div>
                    <form action="{{ route('pengelola.schedules.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokter <span class="text-danger">*</span></label>
                                        <select name="doctor_id" class="form-control" required id="doctor_id">
                                            <option value="">Pilih Dokter</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                                    {{ $doctor->nama_lengkap }} - {{ $doctor->clinic->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('doctor_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Klinik <span class="text-danger">*</span></label>
                                        <select name="clinic_id" class="form-control" required id="clinic_id">
                                            <option value="">Pilih Klinik</option>
                                            @foreach($clinics as $clinic)
                                                <option value="{{ $clinic->id }}" {{ old('clinic_id') == $clinic->id ? 'selected' : '' }}>
                                                    {{ $clinic->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('clinic_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hari <span class="text-danger">*</span></label>
                                        <select name="hari" class="form-control" required>
                                            <option value="">Pilih Hari</option>
                                            <option value="senin" {{ old('hari') == 'senin' ? 'selected' : '' }}>Senin</option>
                                            <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : '' }}>Selasa</option>
                                            <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                            <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                            <option value="jumat" {{ old('hari') == 'jumat' ? 'selected' : '' }}>Jumat</option>
                                            <option value="sabtu" {{ old('hari') == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                                            <option value="minggu" {{ old('hari') == 'minggu' ? 'selected' : '' }}>Minggu</option>
                                        </select>
                                        @error('hari')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jam Mulai <span class="text-danger">*</span></label>
                                        <input type="time" name="jam_mulai" class="form-control" value="{{ old('jam_mulai') }}" required>
                                        @error('jam_mulai')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jam Selesai <span class="text-danger">*</span></label>
                                        <input type="time" name="jam_selesai" class="form-control" value="{{ old('jam_selesai') }}" required>
                                        @error('jam_selesai')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Durasi Konsultasi (menit)</label>
                                        <input type="number" name="durasi_konsultasi" class="form-control" value="{{ old('durasi_konsultasi', 30) }}" min="15" max="120">
                                        <small class="text-muted">Default: 30 menit</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kuota per Hari</label>
                                        <input type="number" name="kuota_per_hari" class="form-control" value="{{ old('kuota_per_hari', 20) }}" min="1" max="100">
                                        <small class="text-muted">Default: 20 pasien</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
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

<script>
// Auto select clinic when doctor is selected
document.getElementById('doctor_id').addEventListener('change', function() {
    const doctorId = this.value;
    if (doctorId) {
        // Get doctor's clinic from option text or make AJAX call
        const option = this.options[this.selectedIndex];
        const clinicName = option.text.split(' - ')[1];
        const clinicSelect = document.getElementById('clinic_id');
        for (let i = 0; i < clinicSelect.options.length; i++) {
            if (clinicSelect.options[i].text === clinicName) {
                clinicSelect.value = clinicSelect.options[i].value;
                break;
            }
        }
    }
});
</script>
@endsection

