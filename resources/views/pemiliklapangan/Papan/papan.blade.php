@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper schedule-page bg-light">
  <section class="content pt-4 pb-5">
    <div class="container-fluid">

      <div class="d-flex align-items-center mb-4">
        <a href="{{ route('fasilitas.detail', $venue->id) }}" class="btn btn-light border rounded-circle mr-3">
          <i class="fas fa-arrow-left"></i>
        </a>
        <div>
          <p class="text-muted mb-1 small">Kelola Fasilitas &nbsp; • &nbsp; {{ $venue->namavenue }}</p>
          <h3 class="mb-0 font-weight-bold text-dark">Detail Jadwal</h3>
        </div>
      </div>

      <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body d-flex flex-column flex-lg-row align-items-lg-center justify-content-between">
          <div class="d-flex align-items-center mb-3 mb-lg-0">
            <div class="lapangan-avatar mr-3">
              <i class="fas fa-futbol"></i>
            </div>
            <div>
              <span class="badge badge-pill badge-light text-primary font-weight-semibold px-3 py-2 mb-2">{{ $venue->kategori ?? 'Olahraga' }}</span>
              <h4 class="text-dark font-weight-bold mb-1">{{ $lapangan->nama }}</h4>
              <p class="text-muted mb-0 small">Bagikan jadwal dan kelola harga untuk lapangan ini.</p>
            </div>
          </div>
          <div class="w-100 w-lg-auto d-flex align-items-center justify-content-lg-end flex-wrap">
            <label class="text-muted small font-weight-semibold mr-2 mb-2 mb-lg-0" for="lapanganSelector">Pilih Lapangan</label>
            <select id="lapanganSelector" class="form-control custom-select shadow-sm w-auto" onchange="window.location.href = this.value;">
              @foreach($availableLapangans as $item)
                <option value="{{ route('fasilitas.lapangan.jadwal', [$venue->id, $item->id]) }}" {{ $item->id === $lapangan->id ? 'selected' : '' }}>
                  {{ $venue->namavenue }} - {{ $item->nama }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center">
          <i class="fas fa-check-circle text-success mr-2"></i>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
          <strong>Terjadi kesalahan.</strong> Silakan periksa kembali input jadwal.
        </div>
      @endif

      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
          <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between mb-4">
            <form action="{{ route('fasilitas.lapangan.jadwal', [$venue->id, $lapangan->id]) }}" method="GET" class="d-flex align-items-center flex-wrap">
              <label for="datePicker" class="text-muted small font-weight-semibold mr-3 mb-2 mb-lg-0">Tanggal</label>
              <div class="input-group date-picker shadow-sm border rounded">
                <input
                  type="date"
                  id="datePicker"
                  name="date"
                  value="{{ $date->format('Y-m-d') }}"
                  class="form-control border-0">
                <div class="input-group-append">
                  <span class="input-group-text bg-white border-0"><i class="far fa-calendar"></i></span>
                </div>
              </div>
            </form>
            <button type="button" id="toggleSlotForm" class="btn btn-primary font-weight-bold shadow-sm mt-3 mt-lg-0">
              <i class="fas fa-plus mr-2"></i>Tambah Slot
            </button>
          </div>

          <form action="{{ route('fasilitas.lapangan.jadwal.store', [$venue->id, $lapangan->id]) }}" method="POST" id="slotForm" class="card border-0 shadow-sm rounded-4 bg-light slot-form-wrapper mb-4 d-none">
            @csrf
            <input type="hidden" name="tanggal" value="{{ $date->format('Y-m-d') }}">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0 font-weight-bold text-dark">Tambah Jadwal Slot</h6>
                <span class="badge badge-pill badge-secondary">Optional</span>
              </div>
              <div class="alert alert-info border-0 rounded-lg mb-3 d-none" id="generateInfo">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Mode Generate Multiple Slots:</strong> Sistem akan otomatis membuat slot per 1 jam dari jam mulai sampai jam selesai dengan harga yang sama.
              </div>
              <div class="row">
                <div class="col-12 mb-3">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="generateMultiple" name="generate_multiple" value="1" {{ old('generate_multiple') ? 'checked' : '' }}>
                    <label class="custom-control-label font-weight-semibold text-dark" for="generateMultiple">
                      <i class="fas fa-magic mr-2 text-primary"></i>Generate Multiple Slots (per 1 jam)
                    </label>
                    <small class="form-text text-muted d-block mt-1">Aktifkan untuk membuat slot otomatis per 1 jam dari jam mulai sampai jam selesai</small>
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label class="small font-weight-semibold text-muted">Jam Mulai</label>
                  <input type="time" name="jam_mulai" id="jam_mulai" class="form-control rounded-lg @error('jam_mulai') is-invalid @enderror" value="{{ old('jam_mulai') }}" placeholder="08:00" required>
                  @error('jam_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-3 mb-3">
                  <label class="small font-weight-semibold text-muted">Jam Selesai</label>
                  <input type="time" name="jam_selesai" id="jam_selesai" class="form-control rounded-lg @error('jam_selesai') is-invalid @enderror" value="{{ old('jam_selesai') }}" placeholder="09:00" required>
                  @error('jam_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-3 mb-3">
                  <label class="small font-weight-semibold text-muted">Harga</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white border-right-0">Rp</span>
                    </div>
                    <input type="number" name="harga" id="harga" class="form-control border-left-0 rounded-right @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="0" min="0" required>
                    @error('harga')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label class="small font-weight-semibold text-muted">Status Ketersediaan</label>
                  <select name="status" class="form-control rounded-lg @error('status') is-invalid @enderror">
                    <option value="available" {{ old('status', 'available') === 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="booked" {{ old('status') === 'booked' ? 'selected' : '' }}>Sudah Dibooking</option>
                    <option value="blocked" {{ old('status') === 'blocked' ? 'selected' : '' }}>Blokir</option>
                  </select>
                  @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-3 mb-3">
                  <label class="small font-weight-semibold text-muted">Status Promo</label>
                  <select name="promo_status" class="form-control rounded-lg @error('promo_status') is-invalid @enderror">
                    <option value="none" {{ old('promo_status', 'none') === 'none' ? 'selected' : '' }}>Tidak Ada</option>
                    <option value="promo" {{ old('promo_status') === 'promo' ? 'selected' : '' }}>Promo</option>
                  </select>
                  @error('promo_status')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-9 mb-3">
                  <label class="small font-weight-semibold text-muted">Catatan (opsional)</label>
                  <input type="text" name="catatan" class="form-control rounded-lg @error('catatan') is-invalid @enderror" value="{{ old('catatan') }}" placeholder="Contoh: Diskon 20% untuk member komunitas">
                  @error('catatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="mb-3" id="previewSlots" style="display: none;">
                <label class="small font-weight-semibold text-muted mb-2 d-block">Preview Slot yang Akan Dibuat:</label>
                <div class="bg-white border rounded-lg p-3" id="previewContent">
                  <p class="text-muted small mb-0">Isi jam mulai, jam selesai, dan harga untuk melihat preview</p>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary mr-2" id="cancelSlotForm">Batal</button>
                <button type="submit" class="btn btn-primary font-weight-bold">Simpan Slot</button>
              </div>
            </div>
          </form>

          @if($timeslots->isEmpty())
            <div class="empty-state border-0 rounded-4 text-center py-5">
              <div class="empty-icon mx-auto mb-3">
                <i class="fas fa-calendar-plus"></i>
              </div>
              <h5 class="font-weight-bold text-dark mb-2">Jadwal lapangan belum tersedia</h5>
              <p class="text-muted small mb-0 px-4">
                Klik tombol <strong>Tambah Slot</strong> untuk membuat jadwal pertama Anda. Tentukan rentang waktu, harga, status ketersediaan, dan promo bila diperlukan.
              </p>
            </div>
          @else
            <div class="d-flex flex-wrap schedule-slot-grid">
              @foreach($timeslots as $slot)
                @php
                  $statusClass = [
                    'available' => 'slot-available',
                    'booked' => 'slot-booked',
                    'blocked' => 'slot-blocked',
                  ][$slot->status] ?? 'slot-available';
                @endphp
                <div class="schedule-slot {{ $statusClass }}">
                  <div class="slot-actions">
                    <button type="button" class="btn btn-sm btn-light edit-slot-btn" data-slot-id="{{ $slot->id }}" data-toggle="modal" data-target="#editSlotModal" title="Edit Slot">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-light delete-slot-btn" data-slot-id="{{ $slot->id }}" title="Hapus Slot">
                      <i class="fas fa-trash text-danger"></i>
                    </button>
                  </div>
                  @if($slot->is_promo)
                    <span class="slot-pill">Promo</span>
                  @endif
                  <h6 class="slot-time mb-1">{{ \Illuminate\Support\Carbon::parse($slot->jam_mulai)->format('H:i') }} - {{ \Illuminate\Support\Carbon::parse($slot->jam_selesai)->format('H:i') }}</h6>
                  @if($slot->status === 'booked')
                    <p class="slot-price text-muted text-decoration-line-through mb-1">Rp {{ number_format($slot->harga, 0, ',', '.') }}</p>
                    <span class="slot-status">Booked</span>
                  @elseif($slot->status === 'blocked')
                    <p class="slot-price text-muted mb-1">Rp {{ number_format($slot->harga, 0, ',', '.') }}</p>
                    <span class="slot-status text-danger font-weight-bold">Blokir</span>
                  @else
                    <p class="slot-price mb-1">Rp {{ number_format($slot->harga, 0, ',', '.') }}</p>
                    <span class="slot-status text-success font-weight-bold">Tersedia</span>
                  @endif
                  @if($slot->catatan)
                    <p class="slot-note text-muted small mt-2 mb-0">
                      <i class="fas fa-info-circle mr-1"></i>{{ $slot->catatan }}
                    </p>
                  @endif
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>

    </div>
  </section>
</div>

<!-- Modal Edit Slot -->
<div class="modal fade" id="editSlotModal" tabindex="-1" role="dialog" aria-labelledby="editSlotModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content rounded-4 border-0 shadow-lg">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title font-weight-bold" id="editSlotModalLabel">Edit Jadwal Slot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editSlotForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body pt-0">
          <input type="hidden" name="tanggal" value="{{ $date->format('Y-m-d') }}">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="small font-weight-semibold text-muted">Jam Mulai</label>
              <input type="time" name="jam_mulai" id="edit_jam_mulai" class="form-control rounded-lg" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="small font-weight-semibold text-muted">Jam Selesai</label>
              <input type="time" name="jam_selesai" id="edit_jam_selesai" class="form-control rounded-lg" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="small font-weight-semibold text-muted">Harga</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-white border-right-0">Rp</span>
                </div>
                <input type="number" name="harga" id="edit_harga" class="form-control border-left-0 rounded-right" min="0" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="small font-weight-semibold text-muted">Status Ketersediaan</label>
              <select name="status" id="edit_status" class="form-control rounded-lg">
                <option value="available">Tersedia</option>
                <option value="booked">Sudah Dibooking</option>
                <option value="blocked">Blokir</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label class="small font-weight-semibold text-muted">Status Promo</label>
              <select name="promo_status" id="edit_promo_status" class="form-control rounded-lg">
                <option value="none">Tidak Ada</option>
                <option value="promo">Promo</option>
              </select>
            </div>
            <div class="col-md-12 mb-3">
              <label class="small font-weight-semibold text-muted">Catatan (opsional)</label>
              <input type="text" name="catatan" id="edit_catatan" class="form-control rounded-lg" placeholder="Contoh: Diskon 20% untuk member komunitas">
            </div>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary font-weight-bold">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete Confirmation -->
<div class="modal fade" id="deleteSlotModal" tabindex="-1" role="dialog" aria-labelledby="deleteSlotModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content rounded-4 border-0 shadow-lg">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title font-weight-bold text-danger" id="deleteSlotModalLabel">Hapus Slot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="deleteSlotForm" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-body pt-0">
          <p class="mb-0">Apakah Anda yakin ingin menghapus slot jadwal ini? Tindakan ini tidak dapat dibatalkan.</p>
        </div>
        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger font-weight-bold">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  .schedule-page {
    min-height: 100vh;
  }
  .rounded-4 {
    border-radius: 20px;
  }
  .font-weight-semibold {
    font-weight: 600;
  }
  .lapangan-avatar {
    width: 64px;
    height: 64px;
    border-radius: 18px;
    background: rgba(1, 61, 157, 0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #013d9d;
    font-size: 26px;
  }
  .custom-select {
    min-width: 260px;
    border-radius: 12px;
  }
  .date-picker input {
    border-radius: 12px 0 0 12px;
    padding: 0.75rem 1rem;
  }
  .date-picker .input-group-text {
    border-radius: 0 12px 12px 0;
  }
  .schedule-slot-grid {
    gap: 16px;
  }
  .schedule-slot {
    width: 160px;
    border-radius: 16px;
    padding: 18px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    text-align: center;
    background: #f8faff;
    border: 1px solid transparent;
    box-shadow: 0 6px 14px rgba(1, 61, 157, 0.08);
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .schedule-slot:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(1, 61, 157, 0.12);
  }
  .slot-actions {
    position: absolute;
    top: 8px;
    right: 8px;
    display: flex;
    gap: 4px;
    opacity: 0;
    transition: opacity 0.2s;
  }
  .schedule-slot:hover .slot-actions {
    opacity: 1;
  }
  .slot-actions .btn {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    line-height: 1;
  }
  .slot-available {
    border-color: rgba(43, 138, 247, 0.18);
  }
  .slot-booked {
    background: #f5f5f5;
    border-color: #e0e0e0;
  }
  .slot-blocked {
    background: #fdf3f3;
    border-color: #f0c0c0;
  }
  .slot-pill {
    position: absolute;
    top: -10px;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 0.65rem;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    background: #12d18e;
    color: #fff;
    font-weight: 700;
  }
  .schedule-slot .slot-time {
    font-weight: 700;
    color: #1d2c5b;
  }
  .slot-price {
    font-weight: 700;
    color: #1d2c5b;
  }
  .slot-status {
    font-size: 0.8rem;
    font-weight: 600;
  }
  .slot-note {
    max-width: 180px;
  }
  .slot-form-wrapper {
    border: 1px dashed rgba(1, 61, 157, 0.2) !important;
  }
  .rounded-lg {
    border-radius: 12px !important;
  }
  .empty-state {
    background: #f8faff;
    border: 1px dashed rgba(1, 61, 157, 0.2);
  }
  .empty-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    background: rgba(43, 138, 247, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2b8af7;
    font-size: 26px;
  }
  @media (max-width: 575.98px) {
    .schedule-slot {
      width: calc(50% - 8px);
    }
  }
  @media (max-width: 420px) {
    .schedule-slot {
      width: 100%;
    }
    .custom-select {
      min-width: 100%;
    }
  }
  .custom-switch .custom-control-label {
    cursor: pointer;
  }
  #previewSlots .badge {
    font-size: 0.75rem;
    font-weight: 600;
  }
  .gap-2 {
    gap: 0.5rem;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var toggleButton = document.getElementById('toggleSlotForm');
    var cancelButton = document.getElementById('cancelSlotForm');
    var slotForm = document.getElementById('slotForm');
    var generateMultiple = document.getElementById('generateMultiple');
    var generateInfo = document.getElementById('generateInfo');
    var jamMulai = document.getElementById('jam_mulai');
    var jamSelesai = document.getElementById('jam_selesai');
    var harga = document.getElementById('harga');
    var previewSlots = document.getElementById('previewSlots');
    var previewContent = document.getElementById('previewContent');

    function toggleForm(show) {
      if (!slotForm) return;
      if (show) {
        slotForm.classList.remove('d-none');
        slotForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
      } else {
        slotForm.classList.add('d-none');
      }
    }

    function updatePreview() {
      if (!generateMultiple || !generateMultiple.checked) {
        previewSlots.style.display = 'none';
        return;
      }

      var startTime = jamMulai.value;
      var endTime = jamSelesai.value;
      var price = harga.value;

      if (!startTime || !endTime || !price) {
        previewSlots.style.display = 'none';
        return;
      }

      // Parse waktu
      var start = new Date('2000-01-01T' + startTime + ':00');
      var end = new Date('2000-01-01T' + endTime + ':00');

      if (start >= end) {
        previewContent.innerHTML = '<p class="text-danger small mb-0">Jam selesai harus lebih besar dari jam mulai</p>';
        previewSlots.style.display = 'block';
        return;
      }

      // Generate slots per 1 jam
      var slots = [];
      var current = new Date(start);
      
      while (current < end) {
        var slotStart = new Date(current);
        var slotEnd = new Date(current);
        slotEnd.setHours(slotEnd.getHours() + 1);

        if (slotEnd > end) {
          slotEnd = new Date(end);
        }

        var startStr = String(slotStart.getHours()).padStart(2, '0') + ':' + String(slotStart.getMinutes()).padStart(2, '0');
        var endStr = String(slotEnd.getHours()).padStart(2, '0') + ':' + String(slotEnd.getMinutes()).padStart(2, '0');

        slots.push({
          start: startStr,
          end: endStr
        });

        current.setHours(current.getHours() + 1);
      }

      if (slots.length === 0) {
        previewContent.innerHTML = '<p class="text-muted small mb-0">Tidak ada slot yang dapat dibuat</p>';
        previewSlots.style.display = 'block';
        return;
      }

      // Format harga
      var formattedPrice = new Intl.NumberFormat('id-ID').format(price);

      // Render preview
      var html = '<div class="d-flex flex-wrap gap-2">';
      slots.forEach(function(slot, index) {
        html += '<span class="badge badge-primary px-3 py-2 mb-2">' + slot.start + ' - ' + slot.end + '</span>';
      });
      html += '</div>';
      html += '<p class="text-muted small mt-2 mb-0"><strong>' + slots.length + ' slot</strong> akan dibuat dengan harga <strong>Rp ' + formattedPrice + '</strong> per slot</p>';

      previewContent.innerHTML = html;
      previewSlots.style.display = 'block';
    }

    // Toggle generate info
    if (generateMultiple && generateInfo) {
      generateMultiple.addEventListener('change', function() {
        if (this.checked) {
          generateInfo.classList.remove('d-none');
          updatePreview();
        } else {
          generateInfo.classList.add('d-none');
          previewSlots.style.display = 'none';
        }
      });

      // Initialize
      if (generateMultiple.checked) {
        generateInfo.classList.remove('d-none');
        updatePreview();
      }
    }

    // Update preview on input change
    if (jamMulai) {
      jamMulai.addEventListener('change', updatePreview);
      jamMulai.addEventListener('input', updatePreview);
    }
    if (jamSelesai) {
      jamSelesai.addEventListener('change', updatePreview);
      jamSelesai.addEventListener('input', updatePreview);
    }
    if (harga) {
      harga.addEventListener('change', updatePreview);
      harga.addEventListener('input', updatePreview);
    }

    if (toggleButton) {
      toggleButton.addEventListener('click', function () {
        var isHidden = slotForm.classList.contains('d-none');
        toggleForm(isHidden);
      });
    }

    if (cancelButton) {
      cancelButton.addEventListener('click', function () {
        toggleForm(false);
      });
    }

    @if($errors->any())
      toggleForm(true);
    @endif

    // Handle Edit Slot
    var editButtons = document.querySelectorAll('.edit-slot-btn');
    var editSlotForm = document.getElementById('editSlotForm');
    var editSlotModal = document.getElementById('editSlotModal');
    
    editButtons.forEach(function(btn) {
      btn.addEventListener('click', function() {
        var slotId = this.getAttribute('data-slot-id');
        
        // Fetch slot data via AJAX
        fetch(`{{ url('/pemiliklapangan/fasilitas/venue') }}/{{ $venue->id }}/lapangan/{{ $lapangan->id }}/jadwal/${slotId}/edit`, {
          method: 'GET',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            var slot = data.slot;
            document.getElementById('edit_jam_mulai').value = slot.jam_mulai;
            document.getElementById('edit_jam_selesai').value = slot.jam_selesai;
            document.getElementById('edit_harga').value = slot.harga;
            document.getElementById('edit_status').value = slot.status;
            document.getElementById('edit_promo_status').value = slot.is_promo ? 'promo' : 'none';
            document.getElementById('edit_catatan').value = slot.catatan || '';
            
            // Update form action
            editSlotForm.action = `{{ url('/pemiliklapangan/fasilitas/venue') }}/{{ $venue->id }}/lapangan/{{ $lapangan->id }}/jadwal/${slotId}`;
            
            // Show modal
            $(editSlotModal).modal('show');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat memuat data slot.');
        });
      });
    });

    // Handle Delete Slot
    var deleteButtons = document.querySelectorAll('.delete-slot-btn');
    var deleteSlotForm = document.getElementById('deleteSlotForm');
    var deleteSlotModal = document.getElementById('deleteSlotModal');
    
    deleteButtons.forEach(function(btn) {
      btn.addEventListener('click', function() {
        var slotId = this.getAttribute('data-slot-id');
        
        // Update form action
        deleteSlotForm.action = `{{ url('/pemiliklapangan/fasilitas/venue') }}/{{ $venue->id }}/lapangan/{{ $lapangan->id }}/jadwal/${slotId}`;
        
        // Show modal
        $(deleteSlotModal).modal('show');
      });
    });
  });
</script>
@endsection
