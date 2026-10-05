# Omisewa Temple Website

A simple, friendly website and admin panel for a traditional spiritual
consultation practice, built with Laravel 12, Blade templates, plain CSS, and
SQLite for local development (MySQL for production).

## What is included

- Public pages: Home, About, Consultants, Contact. Gallery images are shown in
  a strip on the homepage.
- A contact form that saves messages to the database and emails both temple
  addresses.
- Click-to-call and WhatsApp buttons (numbers editable in the admin).
- Opening hours and contact details in the footer of every page.
- A simple admin area with one login:
  - View contact messages.
  - Add, edit, replace, and remove consultant photos and short biographies.
  - Upload, replace, and delete gallery images with captions.
  - Edit opening hours, phone numbers, emails, address, map, and main page text.
- Automatic image resizing and compression (JPG, PNG, WebP, max 5MB).
- Seeded content: the four consultants, opening hours, and both email addresses.

## Requirements

- PHP 8.2 or newer, with the `gd` extension enabled (the `exif` extension is
  recommended so phone photos are rotated correctly).
- Composer.
- MySQL 5.7+ (or MariaDB).
- A web server (Apache or Nginx) or Laravel's built-in server for local use.

## Setup (local development)

The quickest way is to double-click the two helper scripts in the project
folder: `setup.bat` (first time only) then `serve.bat` (each time you want to
run the site). They perform the steps below.

The site uses **SQLite** by default for local development, so no database
server is needed. To use MySQL instead, see the note below.

1. Install the PHP dependencies:

   ```bash
   composer install
   ```

2. Create the environment file (a ready-to-use `.env` is already provided;
   copy `.env.example` if you ever need a fresh one) and set the app key:

   ```bash
   php artisan key:generate
   ```

3. Create the tables and seed the content:

   ```bash
   php artisan migrate --seed
   ```

4. Start the development server:

   ```bash
   php artisan serve --no-reload
   ```

   The `--no-reload` flag is required on Windows/Herd; without it Laravel
   restarts the server with a filtered environment that can fail to bind.

5. Visit `http://localhost:8000` for the public site and
   `http://localhost:8000/admin/login` for the admin.

The default admin login is `admin@omisewatemple.com` with the password you set
in `ADMIN_PASSWORD` (or `ChangeMeNow123!` if you left it unchanged). Change this
password after your first login.

### Using MySQL instead of SQLite

To use MySQL (recommended for production), install a MySQL server, create a
database, then in `.env` set:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=omisewa_temple
DB_USERNAME=root
DB_PASSWORD=your-password
```

Then run `php artisan migrate --seed` again.

## Sending email

By default `MAIL_MAILER=log`, which writes messages to
`storage/logs/laravel.log` instead of sending them. To send real email, set
your mail provider in `.env` (for example, SMTP):

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.yourprovider.com
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@omisewatemple.com
MAIL_FROM_NAME="Omisewa Temple"
```

The contact form saves every message to the database even when email is not
configured, so nothing is lost.

## Deployment

1. Upload the project to your server (excluding the `vendor` folder).
2. On the server, run `composer install --no-dev`.
3. Copy `.env.example` to `.env`, set `APP_ENV=production`, `APP_DEBUG=false`,
   your database details, and run `php artisan key:generate`.
4. Run `php artisan migrate --seed --force`.
5. Point your web server's document root at the `public` folder.
6. Make sure the web server can write to `storage` and `public/uploads`.
7. Optionally run `php artisan config:cache` and `php artisan route:cache`.

The admin login page is at `/admin/login`.

## Image uploads

Uploaded images are stored in `public/uploads/consultants` and
`public/uploads/gallery`. Only JPG, PNG, and WebP files up to 5MB are accepted.
Every upload is resized (maximum width 1600px) and compressed automatically, and
stored under a random, safe file name.

## Security notes

- All forms use CSRF protection.
- Input is validated on the server.
- The contact form includes a honeypot and a timing check to reduce spam, plus
  rate limiting.
- Image uploads are checked for type, size, and extension before processing.
- Admin login is rate limited (5 attempts per minute).
- Secrets live in `.env`, which is excluded from version control.

## Placeholders to confirm before launch

The following are placeholders that the client must confirm and fill in. They
can be edited in the admin under **Settings**, except where noted.

1. **Phone number (click-to-call)** — currently empty; fill it in under
   Settings, "Phone (click-to-call)". The button stays hidden until it is set.
2. **WhatsApp number** — currently empty; fill it in under Settings,
   "WhatsApp number". The button stays hidden until it is set.
3. **Address** — currently empty; fill it in under Settings, "Address". It is
   hidden on the site until it is set.
4. **Map embed code** — currently empty (Settings, "Map embed code"). Paste a
   Google Maps iframe, or leave empty to hide the map.
5. **Consultant biographies** — each consultant is seeded with a name only. Add
   a short bio for each in the admin under **Consultants** (and upload photos).
6. **Admin email and password** — set in `.env` before going live.
7. **Logo** — the file `public/images/logo.jpg` is used as the site logo.
   Replace it with the final approved logo, keeping the same filename.

All website copy is written in a calm, respectful tone and avoids promising
results, cures, wealth, or any guaranteed outcome.
