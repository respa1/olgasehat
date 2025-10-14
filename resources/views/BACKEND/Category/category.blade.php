@extends('Backend.Layout.admin')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
      crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- Tambahkan link untuk Font Awesome/Icon jika diperlukan, seperti yang ada di referensi AdminLTE --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* Mengganti gaya .content-wrapper agar mengikuti AdminLTE jika tidak memiliki CSS bawaan */
    .content-wrapper {
        padding: 0; /* Padding akan diatur di dalam content-header dan section content */
        min-height: calc(100vh - 56px); /* Contoh minimum tinggi */
    }
</style>
@endpush

@section('content')
<div class="content-wrapper">
    {{-- Content Header (Page header) --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Category</h1>
                </div>
                {{-- Breadcrumb bisa ditambahkan di sini jika perlu --}}
            </div>
        </div>
    </div>
    
    {{-- Main content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                        <div class="col-md-6 text-md-end">
                            {{-- Tombol Tambah Data --}}
                            <a href="{{ route('category.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{-- Notifikasi sukses menggunakan Toastr dari session --}}
                    @if (session('success'))
                        <script>
                            window.addEventListener('DOMContentLoaded', () => {
                                toastr.success("{{ session('success') }}");
                            });
                        </script>
                    @endif

                    {{-- Tabel kategori --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama Kategori</th>
                                    <th>Dibuat</th>
                                    <th>Update Terakhir</th>
                                    <th style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td> {{-- Menggunakan $index + 1 agar penomoran dimulai dari 1 --}}
                                    <td><strong class="text-primary">{{ $row->title }}</strong></td> {{-- Penekanan pada nama kategori --}}
                                    <td>{{ $row->created_at->translatedFormat('l, d M Y') }}</td> {{-- Format tanggal lebih lengkap --}}
                                    <td>{{ $row->updated_at->translatedFormat('l, d M Y') }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('category.edit', $row->id) }}" 
                                           class="btn btn-info btn-sm text-white me-1">Edit</a>

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
                        {{-- Jika menggunakan pagination, tambahkan di sini: --}}
                        {{-- <div class="mt-3">
                            {{ $categories->links() }}
                        </div> --}}
                    </div>
                </div> 
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>

<script>
    // Konfirmasi Hapus dengan SweetAlert2
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data kategori: " + e.target.closest('tr').querySelector('td:nth-child(2)').innerText + " akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Kirim form dengan method DELETE
                }
            });
        });
    });

    @if (Session::has('Success') || Session::has('update') || Session::has('delete'))
        // Jika Anda ingin mengkonversi nama session ke format yang digunakan di kode sebelumnya ('success')
        const sessionMessage = 
            "{{ Session::get('Success') ?? Session::get('update') ?? Session::get('delete') }}";
        if (sessionMessage) {
             toastr.success(sessionMessage);
        }
    @endif

    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif
</script>
@endpush