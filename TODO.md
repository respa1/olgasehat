# TODO: Fix Navigation and Assets in Frontend and User Views

## Frontend Views
- [x] resources/views/frontend/home.blade.php: Update navigation links to use Laravel routes, fix logo href, update register/login dropdowns, update footer links
- [x] resources/views/frontend/venue_detail.blade.php: Update navigation links, logo href, mobile menu, bottom button href
- [x] resources/views/frontend/venue.blade.php: Check and update links
- [ ] resources/views/frontend/community.blade.php: Check and update links
- [ ] resources/views/frontend/club.blade.php: Check and update links
- [x] resources/views/frontend/blog-news.blade.php: Check and update links
- [x] resources/views/frontend/blog&news_detail.blade.php: Check and update links
- [ ] Other frontend blade files (confirm.blade.php, payment.blade.php, success.blade.php): Check and update links

## User Views
- [x] Check if resources/views/user/ directory exists and has views
- [x] Update links in user views (loginuser.blade.php, daftaruser.blade.php) to use Laravel routes
- [x] Ensure assets are linked with asset() helper
- [ ] Update remaining user views (editprofile.blade.php, loginemail.blade.php, registeremail.blade.php, resetpassword.blade.php, riwayatclub.blade.php, riwayatkomunitas.blade.php, riwayatpayment.blade.php) similarly if needed

## Assets
- [ ] Verify all assets in public/assets/ are linked correctly using asset() helper
- [ ] Check for any missing assets or incorrect paths

## Testing
- [ ] Run the application and test navigation between pages
- [ ] Verify assets load correctly
