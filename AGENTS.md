# AGENTS.md — InfoNgeampus

Laravel 13.8 campus info portal ("Portal Informasi Kampus").

## Commands

| Action | Command |
|---|---|
| Full setup | `composer run setup` |
| Dev servers (PHP + queue + Vite) | `composer run dev` |
| Run tests (clears config first) | `composer run test` |
| Pint (PHP CS fixer) | `./vendor/bin/pint` |
| Build assets | `npm run build` |
| Vite dev | `npm run dev` |
| Run seeder | `php artisan db:seed` |

`composer run setup` runs: `composer install`, copies `.env` from `.env.example`, `key:generate`, `migrate --force`, `npm install --ignore-scripts`, `npm run build`.

## Testing

- PHPUnit 12, suites: `tests/Unit`, `tests/Feature`
- DB is SQLite `:memory:` in test env (see `phpunit.xml`)
- Base test case: `Tests\TestCase`
- `composer run test` runs `php artisan config:clear` first (required before SQLite in-memory tests)

## Default login

Seeder (`database/seeders/DatabaseSeeder.php`) creates 3 admin accounts, 12 berita, 8 galeri:

| Nama | Email (username) | Password | Jabatan |
|---|---|---|---|
| Rizky Pratama | rizky@unjaya.ac.id | Rizky#789 | Administrator |
| Siti Nurhaliza | siti@unjaya.ac.id | Siti!456 | Administrator |
| Bambang Supriyadi | bambang@unjaya.ac.id | Bambang@123 | Kepala Humas |

The `email` field serves as username — form placeholder says "Username".

## .env quirks (dev)

Default `.env.example` sets `QUEUE_CONNECTION=database`, `SESSION_DRIVER=database`, `CACHE_STORE=database`. There are no migrations for `jobs`, `sessions`, or `cache` tables yet. Before running `composer run dev` (which starts `queue:listen`), run:

```
php artisan queue:table
php artisan session:table
php artisan cache:table
php artisan migrate
```

## Architecture

- **Auth**: uses `Admin` model (not `User`). The `Admin` model extends `Authenticatable`. See `config/auth.php` for provider config (`admins`).
- **Routes**: web routes (`routes/web.php`) and API routes (`routes/api.php`) both use the same controllers.
  Controllers dual-purpose via `$request->wantsJson()` — return JSON for API, view for web.
  Public: `/`, `/login` (GET+POST), `/logout` (POST), `/berita`, `/galeri`, `/about`, `/call`.
  Public API (no auth): `GET /api/berita`, `GET /api/galeri`.
  Admin (auth-protected): `/dashboard`, `/admin/beritaadmin`, `/admin/galeriadmin`, `/admin/profil`.
  Admin API (auth): `/api/admin/berita`, `/api/admin/galeri`.
- **Views**: plain PHP (not Blade) in `resources/views/`. CSS from `public/css/{name}.css`. JS via `Vite::asset('resources/js/app.js')`.
- **Tailwind 4** is configured but unused — all views use custom CSS only. Do not add Tailwind classes.
- **DB**: MySQL in dev (database name from `.env`), SQLite `:memory:` in test.
- **Models** (all `HasFactory`, use PHP 8 `#[Table]`/`#[Fillable]`/`#[Hidden]` attributes):
  - `Admin` — fillable: nama, email, password, jabatan, no_hp.
  - `Berita` — fillable: judul_berita, deskripsi, penulis, foto, jenis_berita, tanggal.
  - `Galeri` — fillable: judul_galeri, deskripsi, foto.
- **Controller methods use Indonesian names**: `tambah` (create), `ubah` (update), `hapus` (delete).
- **Image uploads**: stored under `public/uploads/berita/` and `public/uploads/galeri/`. Filename: `{timestamp}_{originalName}`. DB stores relative path like `/uploads/berita/...`.
- **Jenis berita** (validated enum): `pengumuman-akademik`, `beasiswa-karir`, `events`, `prestasi`, `aktivitas`, `lainnya`.
- **Form field mapping**: Indonesian column names throughout (`judul_berita`, `jenis_berita`, `foto`, `no_hp`).
- **Login**: email + password credentials; error messages in Indonesian.
- **Berita.foto** is nullable, Galeri.foto is required.

## Conventions

- PSR-4, PHP 8.3+ syntax, EditorConfig (4-space indent, LF).
