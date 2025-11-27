@extends('pemilikkesehatan.Layout.pengelolakesehatan')

@section('content')
<div class="content-wrapper" style="background: #f4f8ff; min-height: 100vh;">
    <div class="content-header border-0 pb-0">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="page-title mb-1" style="font-weight: 700; color: #1b2b5a;">Tambah Jadwal Dokter</h1>
                    <p class="text-muted mb-0">Tambah jadwal praktik dokter baru</p>
                </div>
                <ol class="breadcrumb float-md-right mt-2 mt-md-0">
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pengelola.schedules.index') }}">Jadwal Dokter</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                        <div class="card-header" style="background: white; border-radius: 20px 20px 0 0;">
                            <h3 class="card-title mb-0" style="font-weight: 700; color: #1b2b5a;">Form Tambah Jadwal</h3>
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

                            <div class="col-12">
                                <div class="p-4 rounded-2xl shadow-sm mt-2" style="background: linear-gradient(135deg, #3065ff 0%, #5de0b1 100%);">
                                    <div class="row">
                                        <div class="col-md-6 mb-4 mb-md-0">
                                            <label class="text-white font-weight-bold">Pilih Tanggal Pertemuan <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <input type="date" id="tanggalPertemuan" name="tanggal_pertemuan" class="form-control" style="border-radius: 12px;"
                                                    value="{{ old('tanggal_pertemuan') }}">
                                                <i class="fas fa-calendar-alt position-absolute" style="right: 16px; top: 50%; transform: translateY(-50%); color: #7ea8ff;"></i>
                                            </div>
                                            <small class="text-white d-block mt-2">
                                                Hari klinik akan mengikuti tanggal yang dipilih.
                                            </small>
                                            <div class="mt-3">
                                                <span class="badge badge-pill px-3 py-2" id="hariLabel" style="background: rgba(255,255,255,0.2); color: #fff;">
                                                    Belum memilih tanggal
                                                </span>
                                            </div>
                                            <input type="hidden" name="hari[]" id="hariValue" value="{{ old('hari.0') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-white font-weight-bold">Pilih Jam Pertemuan <span class="text-danger">*</span></label>
                                            <select id="slotSelect" class="form-control" style="border-radius: 12px;">
                                                <option value="">Pilih slot waktu</option>
                                                @foreach(['08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00'] as $slot)
                                                    <option value="{{ $slot }}">{{ $slot }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-white d-block mt-2">
                                                Slot disiapkan dalam interval 30 menit, sama seperti kartu layanan di halaman Healthy.
                                            </small>
                                            <input type="hidden" name="jam_mulai" id="jamMulaiValue" value="{{ old('jam_mulai') }}">
                                            <input type="hidden" name="jam_selesai" id="jamSelesaiValue" value="{{ old('jam_selesai') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="durasi_konsultasi" value="30">
                            <input type="hidden" name="kuota_per_hari" value="20">
                        </div>
                        <div class="card-footer" style="background: white; border-radius: 0 0 20px 20px;">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('pengelola.schedules.index') }}" class="btn btn-light mr-3" style="border-radius: 10px;">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary" style="background: #28a745; border-color: #28a745; border-radius: 10px;">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Auto select clinic based on doctor
    const doctorSelect = document.getElementById('doctor_id');
    const clinicSelect = document.getElementById('clinic_id');

    doctorSelect.addEventListener('change', function() {
        const doctorId = this.value;
        if (doctorId) {
            const option = this.options[this.selectedIndex];
            const clinicName = option.text.split(' - ')[1];
            for (let i = 0; i < clinicSelect.options.length; i++) {
                if (clinicSelect.options[i].text === clinicName) {
                    clinicSelect.value = clinicSelect.options[i].value;
                    break;
                }
            }
        }
    });

    // Mapping hari
    const dayMap = ['minggu','senin','selasa','rabu','kamis','jumat','sabtu'];
    const dayLabelMap = {
        minggu: 'Minggu',
        senin: 'Senin',
        selasa: 'Selasa',
        rabu: 'Rabu',
        kamis: 'Kamis',
        jumat: 'Jumat',
        sabtu: 'Sabtu'
    };

    const tanggalInput = document.getElementById('tanggalPertemuan');
    const hariValueInput = document.getElementById('hariValue');
    const hariLabel = document.getElementById('hariLabel');

    tanggalInput.addEventListener('change', function () {
        if (!this.value) {
            hariValueInput.value = '';
            hariLabel.textContent = 'Belum memilih tanggal';
            return;
        }
        const date = new Date(this.value + 'T00:00:00');
        const daySlug = dayMap[date.getDay()];
        hariValueInput.value = daySlug;
        hariLabel.textContent = dayLabelMap[daySlug] || daySlug;
    });
    if (hariValueInput.value) {
        const display = dayLabelMap[hariValueInput.value] || hariValueInput.value;
        hariLabel.textContent = display;
    } else if (tanggalInput.value) {
        tanggalInput.dispatchEvent(new Event('change'));
    }

    // Slot waktu
    const slotSelect = document.getElementById('slotSelect');
    const jamMulaiInput = document.getElementById('jamMulaiValue');
    const jamSelesaiInput = document.getElementById('jamSelesaiValue');

    const addMinutesToTime = (time, minutes = 30) => {
        const [hour, minute] = time.split(':').map(Number);
        const date = new Date();
        date.setHours(hour);
        date.setMinutes(minute + minutes);
        return date.toTimeString().slice(0, 5);
    };

    slotSelect.addEventListener('change', function () {
        if (!this.value) {
            jamMulaiInput.value = '';
            jamSelesaiInput.value = '';
            return;
        }
        jamMulaiInput.value = this.value;
        jamSelesaiInput.value = addMinutesToTime(this.value, 30);
    });
    if (jamMulaiInput.value) {
        slotSelect.value = jamMulaiInput.value;
        jamSelesaiInput.value = addMinutesToTime(jamMulaiInput.value, 30);
    }
});
</script>
@endsection

