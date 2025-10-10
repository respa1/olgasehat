# TODO: Implement Unified Frontend Layout Based on Home Structure

This TODO tracks progress on creating a shared Blade layout for all FRONTEND views, using the home.blade.php structure as the base for header, footer, and overall styling. Partials will centralize common elements, and views will extend the layout.

## Steps:

- [x] Create resources/views/FRONTEND/partials/header.blade.php (extract header HTML and related JS from home.blade.php)
- [x] Footer integrated directly into layout (combined approach per user feedback)
- [ ] Update resources/views/FRONTEND/layout/frontend.blade.php (add HTML structure, head with CDNs, include partials, @yield('content'), and shared scripts)
- [ ] Refactor resources/views/FRONTEND/home.blade.php (extend layout, move content to @section('content'), add custom title if needed)
- [ ] Refactor resources/views/FRONTEND/venue.blade.php (extend layout, preserve venue-specific content/JS)
- [ ] Refactor resources/views/FRONTEND/venue_detail.blade.php (extend layout, preserve detail content)
- [ ] Refactor resources/views/FRONTEND/club.blade.php (extend layout, preserve club listing)
- [ ] Refactor resources/views/FRONTEND/club_detail.blade.php (extend layout, preserve detail content)
- [ ] Refactor resources/views/FRONTEND/community.blade.php (extend layout, preserve community listing)
- [ ] Refactor resources/views/FRONTEND/community_detail.blade.php (extend layout, preserve detail content)
- [ ] Refactor resources/views/FRONTEND/blog-news.blade.php (extend layout, preserve blog listing)
- [ ] Refactor resources/views/FRONTEND/blog&news_detail.blade.php (extend layout, preserve detail content)
- [ ] Refactor resources/views/FRONTEND/payment.blade.php (extend layout, preserve payment form/JS)
- [ ] Refactor resources/views/FRONTEND/success.blade.php (extend layout, preserve success message)
- [ ] Refactor resources/views/FRONTEND/confirm.blade.php (extend layout, preserve confirmation content)
- [ ] Testing: Run `php artisan serve`, visit all frontend routes (e.g., /, /venue, /club), verify header/footer consistency, mobile responsiveness, JS interactions (cart, dropdowns, tabs), and no errors in console.

## Notes:
- Base layout on home.blade.php: Fixed white header with logo/nav/cart/login, Tailwind CDN, Font Awesome, shared JS for dropdowns/mobile menu/cart.
- Ensure cart sidebar and overlays are global via header partial.
- Page-specific JS (e.g., tabs in home, search in venue) stays in content section or @push('scripts').
- Update this file after each step completion.
