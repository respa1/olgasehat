# TODO: Connect Blog/News to Frontend and User from Backoffice

## Information Gathered
- BeritaController exists for backend CRUD operations.
- Berita model has relationship with Category.
- Frontend views (blog-news.blade.php, blog&news_detail.blade.php) are static/hardcoded.
- User views (bloguser_news.blade.php, bloguser_detail.blade.php) are static/hardcoded.
- Routes currently use direct views, not controllers.
- Super admin creates news via backend, which should display on frontend/user.

## Plan
1. Add new methods in BeritaController: index() for listing news, show($id) for detail, and separate for user (indexUser, showUser) to handle different layouts.
2. Update routes in web.php to use controller methods instead of direct views.
3. Update frontend views to loop through $beritas from database.
4. Update user views similarly.
5. Update detail views to display specific $berita data.

## Dependent Files to Edit
- app/Http/Controllers/BeritaController.php: Add index, show, indexUser, showUser methods.
- routes/web.php: Update /blog-news, /blog-news-detail, /bloguser_news, /bloguser_detail routes.
- resources/views/FRONTEND/blog-news.blade.php: Replace static articles with dynamic loop.
- resources/views/FRONTEND/blog&news_detail.blade.php: Display dynamic $berita data.
- resources/views/user/bloguser_news.blade.php: Replace static articles with dynamic loop.
- resources/views/user/bloguser_detail.blade.php: Display dynamic $berita data.

## Followup Steps
- Test routes: Visit /blog-news, /blog-news-detail/1, /bloguser_news, /bloguser_detail/1.
- Ensure news data exists in database (create via backend if needed).
- Check if images load correctly from public/fotoberita/.
- Verify category display and links.
