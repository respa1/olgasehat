@extends('Backend.Layout.admin')

@push('css')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
      crossorigin="anonymous">

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
    /* Biar isi halaman geser ke kanan saat sidebar muncul */
    .content-wrapper {
        margin-left: 250px; /* samakan dengan lebar sidebar */
        padding: 20px;
        transition: all 0.3s;
    }
    /* Kalau sidebar di-collapse, isi geser */
    .sidebar-collapsed .content-wrapper {
        margin-left: 80px; 
    }

    /* Kolom Nama Kategori - bold & besar */
    .kategori-text {
        font-weight: bold !important;
        font-size: 1.3rem !important; /* perbesar teks */
        text-align: center !important;
    }
</style>
@endpush

@section('content')
<div class="content-wrapper">
    <div class="container-fluid mt-4">
        <div class="card shadow-sm border-0">
             <div class="card-header bg-white">
            <h3 class="card-title m-0 text-dark fw-bold">Data category</h3>
        </div>

        <div class="card-body">
            {{-- Tombol Tambah Data --}}
            <div class="mb-3">
                <a href="{{ route('category.create') }}" class="btn btn-success">
                    + Tambah Data
                </a>
            </div>


            <div class="card-body">
                {{-- Notifikasi sukses --}}
                @if (session('success'))
                    <script>
                        window.addEventListener('DOMContentLoaded', () => {
                            toastr.success("{{ session('success') }}");
                        });
                    </script>
                @endif

                {{-- Tabel kategori --}}
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-secondary">
                            <tr>
                                <th style="width: 50px">No</th>
                                <th class="text-center fw-bold fs-4">Nama Kategori</th>
                                <th>Dibuat</th>
                                <th>Update Terakhir</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($categories as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="kategori-text">{{ $row->title }}</td>
                                <td>{{ $row->created_at->translatedFormat('l') }}</td>
                                <td>{{ $row->updated_at->translatedFormat('l') }}</td>

                                <td>
    <a href="{{ route('category.edit', $row->id) }}" 
       class="btn btn-info btn-sm text-white">Edit</a>

    <form action="{{ route('category.destroy', $row->id) }}" 
          method="POST" 
          class="d-inline delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada kategori
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection

@push('scripts')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data ini tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // kirim form dengan method DELETE
                }
            });
        });
    });
</script>
@endpush