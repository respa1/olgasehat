# TODO: Implementasi Upload Gambar Profil User

## Status: ✅ COMPLETED

### Tugas yang Telah Diselesaikan:
- [x] Membuat migration untuk menambahkan kolom `image` ke tabel `users`
- [x] Menjalankan migration untuk menambahkan kolom `image` ke database
- [x] Menambahkan kolom `image` ke dalam `$fillable` di model `User`
- [x] Mengupdate method `updateProfile` di `LoginController` untuk menangani upload gambar
- [x] Menambahkan validasi untuk file gambar (max 2MB, format JPG, PNG, GIF)
- [x] Mengimplementasikan logika penghapusan gambar lama saat upload gambar baru
- [x] Mengupdate form edit profile untuk menambahkan input file gambar
- [x] Menambahkan enctype="multipart/form-data" ke form
- [x] Mengupdate tampilan gambar profil di halaman edit profile
- [x] Mengupdate tampilan gambar profil di sidebar edit profile
- [x] Mengupdate avatar di header layout untuk menampilkan gambar profil user
- [x] Memastikan symbolic link storage sudah ada (sudah ada sebelumnya)

### Fitur yang Diimplementasikan:
1. **Upload Gambar Profil**: User dapat mengupload gambar profil melalui form edit profile
2. **Validasi File**: Gambar harus berformat JPG, PNG, atau GIF dengan ukuran maksimal 2MB
3. **Penghapusan Gambar Lama**: Sistem otomatis menghapus gambar lama saat user upload gambar baru
4. **Tampilan Dinamis**: Gambar profil ditampilkan di berbagai tempat (header, sidebar, dll.)
5. **Fallback**: Jika tidak ada gambar profil, akan menampilkan placeholder atau inisial nama user

### File yang Dimodifikasi:
- `database/migrations/2025_10_19_061238_add_image_to_users_table.php` (baru)
- `app/Models/User.php`
- `app/Http/Controllers/LoginController.php`
- `resources/views/user/editprofile_user.blade.php`
- `resources/views/user/layout/frontenduser.blade.php`
- `resources/views/user/dashboarduser.blade.php`
- `resources/views/user/riwayatkomunitas.blade.php`
- `resources/views/user/riwayatmembership.blade.php`
- `resources/views/user/layout/user.blade.php`

### Testing yang Dianjurkan:
1. Akses halaman edit profile (`/edit-profile-user`)
2. Upload gambar profil dengan format yang valid
3. Pastikan gambar ditampilkan di header dan sidebar
4. Upload gambar baru untuk memastikan gambar lama terhapus
5. Coba upload file yang tidak valid (ukuran >2MB atau format tidak didukung)

### Catatan:
- Storage link sudah ada, jadi tidak perlu dijalankan lagi
- Gambar disimpan di `storage/app/public/profile_images/`
- Path gambar disimpan di kolom `image` tabel `users`
