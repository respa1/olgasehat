# TODO: Mobile UI Adjustments for Olga Sehat Frontend

## Current Task: Adjust mobile view - remove logo dropdown, consistent blue buttons, fix home hero spacing

### Steps:
1. **[ ]** Edit `resources/views/FRONTEND/layout/frontend.blade.php`:
   - Remove the logo div in the mobile menu (`<div class="logo-menu ...">`) to eliminate double logo display.
   - Update the "Daftar" button in mobile menu: Change from `bg-red-600 text-white hover:bg-red-700` to `bg-blue-700 text-white hover:bg-blue-800` for consistent blue theme.

2. **[ ]** Read `resources/views/FRONTEND/home.blade.php` to analyze the hero section structure and identify spacing issues (e.g., extra margins/paddings).

3. **[ ]** Edit `resources/views/FRONTEND/home.blade.php` (or adjust layout's pt-16 if global):
   - Reduce or optimize top spacing in the hero section to make it closer to the header without overlap.

4. **[ ]** Test the changes:
   - Run `php artisan serve` and view the home page on mobile (or use browser dev tools).
   - Verify: No double logo in mobile menu, blue "Daftar" button, improved hero spacing.

### Notes:
- Changes are mobile-specific using Tailwind's responsive classes (md:hidden, etc.).
- After each edit, confirm success before proceeding.
- If issues arise, use browser_action for screenshots.
