# Developer Portfolio — Laravel + Vue + MySQL

A rebuild of the "Developer Portfolio" Figma prototype using:

- **Backend:** Laravel 11 (REST API) + MySQL
- **Frontend:** Vue 3 + Vite + Tailwind CSS
- Sections: Hero, Skills, Experience, Projects (+ detail view), Education, Testimonials, About, Contact (saves to DB)

This zip contains only the **application-specific files** (models, migrations,
controllers, seeders, routes, Vue components). You'll generate the actual
Laravel/Vite skeletons with the official installers, then drop these files in
— this keeps the download small and guarantees you get a framework version
that matches your local PHP/Node.

## 1. Backend setup (Laravel)

```bash
# Create a fresh Laravel 11 app
composer create-project laravel/laravel backend "11.*"
cd backend

# Copy these files from this zip into your new Laravel app,
# overwriting where prompted:
#   app/Models/*.php          -> app/Models/
#   app/Http/Controllers/Api/ -> app/Http/Controllers/Api/
#   database/migrations/*.php -> database/migrations/
#   database/seeders/*.php    -> database/seeders/
#   routes/api.php            -> routes/ (overwrite)
#   config/cors.php           -> config/ (overwrite)

cp -r ../backend-source/app/Models/* app/Models/
mkdir -p app/Http/Controllers/Api
cp -r ../backend-source/app/Http/Controllers/Api/* app/Http/Controllers/Api/
cp ../backend-source/database/migrations/*.php database/migrations/
cp ../backend-source/database/seeders/*.php database/seeders/
cp ../backend-source/routes/api.php routes/api.php
cp ../backend-source/config/cors.php config/cors.php

# Configure your DB in .env (create database `portfolio` in MySQL first)
cp .env.example .env
php artisan key:generate
# Edit .env: DB_DATABASE=portfolio, DB_USERNAME=root, DB_PASSWORD=...

php artisan migrate
php artisan db:seed

php artisan serve   # http://localhost:8000
```

API will be live at `http://localhost:8000/api`:

- `GET /api/skills`
- `GET /api/experience`
- `GET /api/education`
- `GET /api/testimonials`
- `GET /api/projects`
- `GET /api/projects/{slug}`
- `POST /api/contact` — `{ name, email, message }`

## 1b. Admin panel (Filament)

The admin panel is built with [Filament](https://filamentphp.com) and gives you
full CRUD over every section of the portfolio, plus an inbox of contact-form
submissions — no need to touch the database directly.

```bash
# from inside backend/
composer require filament/filament:"^3.2"
php artisan filament:install --panels

# Copy the admin resources from this zip into your app:
cp -r ../backend-source/app/Filament app/
cp ../backend-source/app/Providers/Filament/AdminPanelProvider.php app/Providers/Filament/AdminPanelProvider.php

# Create your first admin user
php artisan make:filament-user
```

Then visit **http://localhost:8000/admin** and log in.

You'll see two navigation groups:

- **Portfolio Content** — Skills, Experience, Projects, Education, Testimonials.
  Each has a list view (drag-and-drop reorder via the `sort_order` column),
  create/edit forms, and delete. Project stats (e.g. `stars: 6.2K`) and tech
  tags are editable as repeatable key-value / tag inputs, matching how the
  frontend consumes them.
- **Inbox → Contact Messages** — read-only feed of everything submitted
  through the public Contact form, newest first, with a count badge in the nav.

Because the Vue frontend reads from the same `/api/...` endpoints, any change
you make in the admin panel appears on the live site immediately on refresh
— no redeploy needed.

## 2. Frontend setup (Vue)

The `frontend/` folder in this zip is a complete, ready-to-run Vite app.

```bash
cd frontend
npm install
cp .env.example .env
# VITE_API_URL=http://localhost:8000/api

npm run dev   # http://localhost:5173
```

For production:

```bash
npm run build
# outputs to frontend/dist — serve with any static host,
# or copy into Laravel's public/ and let Laravel serve it.
```

## Notes

- CORS in `config/cors.php` is pre-configured to allow `localhost:5173`.
- The contact form posts to `/api/contact` and stores submissions in the
  `contact_messages` table — wire up a Mail notification in
  `ContactController@store` if you want email alerts too.
- All content (skills, experience, projects, education, testimonials) is
  seeded from the original prototype data, but lives in MySQL — edit via
  `php artisan tinker`, a future admin panel, or directly in the DB.
- Swap the Unsplash placeholder images in the seeders for your own.
