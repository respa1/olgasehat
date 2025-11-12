@extends('pemiliklapangan.layout.ownervenue')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Lapangan</h1>
                </div>
            </div>
        </div>
    </div>    


    <div class="container py-5">
    <div class="row g-4 justify-content-center">

        {{-- Card Venue 1 --}}
        <div class="col-md-4 col-sm-6">
            <div class="venue-card">
                <div class="text-start mb-2">
                    <h6 class="venue-title mb-0">Lapangan Bali United Arena</h6>
                    <small class="venue-subtitle">Jl. Gatot Subroto, Denpasar</small>
                </div>
                <img src="{{ asset('logovenue/phpmyadmin.png') }}" class="venue-image" alt="Lapangan Bali United Arena">
                <a href="/detaillapangan" class="btn btn-blue w-100 mt-2">Lihat Lapangan</a>
            </div>
        </div>

        {{-- Card Tambah Venue --}}
        <div class="col-md-4 col-sm-6">
            <div class="add-card" style="height: 100%;">
                <div class="add-icon">+</div>
                <h6 class="fw-bold">Tambah Venue</h6>
                <p class="text-muted" style="font-size: 0.9rem; max-width: 230px;">
                    Anda dapat menambahkan venue yang anda miliki dengan menekan tombol tambah
                </p>
                <a href="#" class="btn btn-blue px-4">Tambah</a>
            </div>
        </div>

    </div>
</div>
</div>

{{-- CSS Inline --}}
<style>
    body {
        background-color: #f8fafc;
    }
    .venue-card, .add-card {
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        padding: 15px;
        text-align: center;
        transition: all 0.2s ease;
        height: 100%;
    }
    .venue-card:hover, .add-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }
    .venue-image {
        width: 100%;
        border-radius: 8px;
        height: 180px;
        object-fit: cover;
        margin-bottom: 10px;
    }
    .venue-title {
        font-weight: 600;
        font-size: 1.05rem;
    }
    .venue-subtitle {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }
    .btn-blue {
        background-color: #0096ff;
        color: white;
        border: none;
    }
    .btn-blue:hover {
        background-color: #007ad9;
    }
    .add-card {
        border: 2px dashed #bcdcff;
        color: #007ad9;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .add-icon {
        font-size: 2rem;
        color: #0096ff;
        margin-bottom: 5px;
    }
</style>
@endsection
