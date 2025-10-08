# TODO: Connect All Assets in Frontend Views

## Overview
Ensure all frontend views in `resources/views/frontend/` include the necessary CSS and JS assets from `public/frontend/assets/`.

- CSS: `{{ asset('frontend/assets/style.css') }}`
- JS: `{{ asset('frontend/assets/olgasehat.js') }}`

Also, fix any incorrect asset paths to use `{{ asset() }}`.

## Views to Update
- [ ] home.blade.php
- [ ] venue_detail.blade.php
- [ ] venue.blade.php
- [ ] community.blade.php
- [ ] community_detail.blade.php
- [ ] club.blade.php
- [ ] club_detail.blade.php
- [ ] blog-news.blade.php
- [ ] blog&news_detail.blade.php
- [ ] confirm.blade.php
