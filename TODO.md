# TODO: Sesuaikan Backoffice Review dengan Home Page

## 1. Update Database dan Model
- [ ] Tambahkan kolom 'company' dan 'foto' ke migration reviews
- [ ] Update model Review untuk fillable kolom baru
- [ ] Jalankan migration

## 2. Update Backoffice Views
- [ ] Update tambah_riview.blade.php untuk input company dan foto
- [ ] Update edit_riview.blade.php untuk input company dan foto
- [ ] Update review.blade.php untuk tampilan kolom baru

## 3. Update Controller
- [ ] Update ReviewController untuk handle kolom company dan foto
- [ ] Tambahkan validasi dan file upload untuk foto

## 4. Buat Seeder untuk Review
- [ ] Buat ReviewSeeder dengan data Ir. Bagus Nathaniel Mahendra
- [ ] Update DatabaseSeeder untuk include ReviewSeeder

## 5. Update Frontend Home Pages
- [ ] Update home.blade.php untuk testimonial dinamis dari database
- [ ] Update homeuser.blade.php untuk testimonial dinamis dari database
- [ ] Tambahkan route API jika perlu untuk fetch reviews

## 6. Testing
- [ ] Test backoffice CRUD review dengan kolom baru
- [ ] Test frontend menampilkan testimonial dari database
- [ ] Verifikasi tampilan cocok dengan home page
