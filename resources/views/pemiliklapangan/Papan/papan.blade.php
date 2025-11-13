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
          <h3 class="mb-0 font-weight-bold text-dark">Detail Lapangan</h3>
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
            <button class="btn btn-primary font-weight-bold shadow-sm mt-3 mt-lg-0">
              <i class="fas fa-plus mr-2"></i>Tambah Slot
            </button>
          </div>

          <div class="d-flex flex-wrap schedule-slot-grid">
            @foreach($timeslots as $slot)
              @php
                $statusClass = [
                  'available' => 'slot-available',
                  'booked' => 'slot-booked',
                  'blocked' => 'slot-blocked',
                ][$slot['status']] ?? 'slot-available';
              @endphp
              <div class="schedule-slot {{ $statusClass }}">
                @if($slot['label'])
                  <span class="slot-pill">{{ $slot['label'] }}</span>
                @endif
                <h6 class="slot-time mb-1">{{ $slot['start'] }} - {{ $slot['end'] }}</h6>
                @if($slot['status'] === 'booked')
                  <p class="slot-price text-muted text-decoration-line-through mb-1">Rp {{ number_format($slot['price'], 0, ',', '.') }}</p>
                  <span class="slot-status">Booked</span>
                @elseif($slot['status'] === 'blocked')
                  <p class="slot-price text-muted mb-1">Rp {{ number_format($slot['price'], 0, ',', '.') }}</p>
                  <span class="slot-status text-danger font-weight-bold">Blokir</span>
                @else
                  <p class="slot-price mb-1">Rp {{ number_format($slot['price'], 0, ',', '.') }}</p>
                  <span class="slot-status text-success font-weight-bold">Tersedia</span>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
  </section>
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
</style>
@endsection
