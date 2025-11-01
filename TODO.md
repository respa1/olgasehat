# TODO: Update Category Colors in Blog Views

## Overview
Update dynamic category color classes in blog views to map specific categories to colors: 'olahraga' -> blue, 'kesehatan' -> green, 'edukasi' -> yellow. Apply to trending posts, article badges, latest articles, and category badges in detail pages.

## Steps
- [x] Add color mapping array to resources/views/user/bloguser_news.blade.php
- [x] Update trending posts text color in resources/views/user/bloguser_news.blade.php
- [x] Update article badges bg color in resources/views/user/bloguser_news.blade.php
- [x] Add color mapping array to resources/views/user/bloguser_detail.blade.php
- [x] Update latest articles text color in resources/views/user/bloguser_detail.blade.php
- [x] Update category badge colors in resources/views/user/bloguser_detail.blade.php
- [x] Add color mapping array to resources/views/FRONTEND/blog-news.blade.php
- [x] Update trending posts text color in resources/views/FRONTEND/blog-news.blade.php
- [x] Update article badges bg color in resources/views/FRONTEND/blog-news.blade.php
- [x] Add color mapping array to resources/views/FRONTEND/blog&news_detail.blade.php
- [x] Update latest articles text color in resources/views/FRONTEND/blog&news_detail.blade.php
- [x] Update category badge colors in resources/views/FRONTEND/blog&news_detail.blade.php

# TODO: Add Detail and Delete Actions to Verifikasi Mitra Pemilik Lapangan

## Overview
Add actions to view detailed data and delete mitra in the Verifikasi Mitra Pemilik Lapangan page.

## Steps
- [x] Add show method to MitraController for viewing detail
- [x] Add destroy method to MitraController for deleting mitra
- [x] Add routes for show and destroy in web.php
- [x] Create detail view for mitra
- [x] Update datapemiliklapangan.blade.php to add Detail and Delete buttons
