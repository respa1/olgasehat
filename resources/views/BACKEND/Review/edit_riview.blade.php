@extends('Backend.Layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="container mt-4">
        <h2>Edit Review</h2>

        {{-- Notifikasi error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali inputan anda!</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('review.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $review->nama) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ulasan</label>
                <textarea name="ulasan" class="form-control" rows="3" required>{{ old('ulasan', $review->ulasan) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Rating</label>
                <select name="rate" class="form-control" required>
                    <option value="">-- Pilih Rating --</option>
                    <option value="1" {{ $review->rate == 1 ? 'selected' : '' }}>1 ⭐</option>
                    <option value="2" {{ $review->rate == 2 ? 'selected' : '' }}>2 ⭐⭐</option>
                    <option value="3" {{ $review->rate == 3 ? 'selected' : '' }}>3 ⭐⭐⭐</option>
                    <option value="4" {{ $review->rate == 4 ? 'selected' : '' }}>4 ⭐⭐⭐⭐</option>
                    <option value="5" {{ $review->rate == 5 ? 'selected' : '' }}>5 ⭐⭐⭐⭐⭐</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('review.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
