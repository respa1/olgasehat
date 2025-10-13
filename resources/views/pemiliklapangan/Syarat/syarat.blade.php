@extends('pemiliklapangan.layout.ownervenue')

@section('content')
<div class="content-wrapper p-4">
            <style>
    .custom-file-upload:hover {
        border-color: #007bff;
        background-color: #eaf2ff;
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload .icon {
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 10px;
    }

    .custom-file-upload .text {
        font-size: 1rem;
        color: #666;
    }

    .image-preview {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 300px;
        border: 2px dashed #ddd;
        border-radius: 8px;
        position: relative;
        overflow: hidden;
        background-color: #f8f8f8;
        padding: 10px;
        transition: border-color 0.3s ease;
    }

    .image-preview:hover {
        border-color: #4B49AC;
    }

    .image-preview img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
        display: none;
    }

    .preview-text {
        font-size: 16px;
        color: #aaa;
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Progress -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-primary text-white rounded-circle me-2"> 
                                        <i class="fas fa-handshake"></i>
                                    </span>
                                    <div>
                                        <strong>Selamat Datang</strong>
                                        <div class="small text-muted">Salam Pembuka</div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-primary text-white rounded-circle me-2">1</span>
                                    <div>
                                        <strong>Informasi Venue</strong>
                                        <div class="small text-muted">Isi Data Informasi Venue</div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-primary text-white rounded-circle me-2">2</span>
                                    <div>
                                        <strong>Detail Venue</strong>
                                        <div class="small text-muted">Detail Fasilitas Venue</div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-primary text-white rounded-circle me-2">3</span>
                                    <div>
                                        <strong>Syarat & Ketentuan</strong>
                                        <div class="small text-muted">Informasi Syarat & Ketentuan</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <span class="step-number bg-secondary text-white rounded-circle me-2">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div>
                                        <strong>Selesai</strong>
                                        <div class="small text-muted">Onboarding Selesai</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-md-9">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form action="/insertdata" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="container mt-4 mb-5">
                    <h2 class="mb-3 text-center">Syarat dan Ketentuan Penggunaan Platform</h2>
                    <p>
                        Dengan mengakses dan menggunakan platform ini, Anda menyetujui untuk terikat oleh syarat dan ketentuan berikut.
                        Harap baca dengan seksama sebelum menggunakan layanan kami.
                    </p>

                    <h5 class="mt-4">1. Definisi</h5>
                    <p>
                        a. “Platform” berarti situs web, aplikasi, atau sistem digital yang dikelola oleh pihak penyelenggara.<br>
                        b. “Pengguna” berarti individu atau entitas yang mengakses atau menggunakan layanan platform ini.<br>
                        c. “Layanan” berarti seluruh fitur, konten, dan fasilitas yang tersedia di platform ini.
                    </p>

                    <h5 class="mt-4">2. Persetujuan Penggunaan</h5>
                    <p>
                        Dengan menggunakan platform ini, pengguna menyatakan telah membaca, memahami, dan menyetujui seluruh
                        syarat dan ketentuan yang berlaku. Jika pengguna tidak menyetujui sebagian atau seluruh isi ketentuan ini,
                        pengguna disarankan untuk tidak menggunakan platform.
                    </p>

                    <h5 class="mt-4">3. Hak dan Kewajiban Pengguna</h5>
                    <p>
                        - Pengguna wajib memberikan informasi yang benar, akurat, dan terkini.<br>
                        - Pengguna bertanggung jawab penuh atas akun dan aktivitas yang dilakukan di dalam platform.<br>
                        - Pengguna dilarang menggunakan platform untuk tujuan ilegal, penipuan, atau pelanggaran hak pihak ketiga.
                    </p>

                    <h5 class="mt-4">4. Hak dan Kewajiban Penyelenggara Platform</h5>
                    <p>
                        - Penyelenggara berhak memperbarui, menangguhkan, atau menghentikan sebagian/seluruh layanan tanpa pemberitahuan sebelumnya.<br>
                        - Penyelenggara tidak bertanggung jawab atas kerugian yang timbul akibat kesalahan pengguna dalam penggunaan platform.<br>
                        - Penyelenggara berhak memblokir akun pengguna yang melanggar ketentuan atau menimbulkan kerugian bagi pihak lain.
                    </p>

                    <h5 class="mt-4">5. Privasi dan Keamanan Data</h5>
                    <p>
                        Penyelenggara akan menjaga kerahasiaan data pengguna sesuai dengan kebijakan privasi yang berlaku.
                        Namun, pengguna memahami bahwa tidak ada sistem yang sepenuhnya aman dari risiko kebocoran data.
                    </p>

                    <h5 class="mt-4">6. Perubahan Syarat dan Ketentuan</h5>
                    <p>
                        Syarat dan ketentuan ini dapat diperbarui sewaktu-waktu tanpa pemberitahuan terlebih dahulu.
                        Versi terbaru akan dipublikasikan di halaman ini, dan pengguna disarankan untuk meninjau secara berkala.
                    </p>

                    <h5 class="mt-4">7. Hukum yang Berlaku</h5>
                    <p>
                        Syarat dan ketentuan ini diatur berdasarkan hukum yang berlaku di Republik Indonesia.
                        Setiap perselisihan yang timbul akan diselesaikan melalui mekanisme hukum yang berlaku.
                    </p>

                    <p class="mt-4">
                        Dengan melanjutkan penggunaan platform ini, Anda dianggap telah menyetujui seluruh ketentuan di atas.
                    </p>
                </div>

                </div>
                </form>
                        <a href="/end" class="btn btn-primary">Selanjutnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<style>
    .step-number {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
</style>
@endsection
