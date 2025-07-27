# 🌐 Laravel Membership App

Aplikasi sederhana berbasis Laravel + MySQL + Tailwind CSS v3 untuk sistem login, register (manual & social media), dan membership dengan akses konten berbeda berdasarkan tipe user.

## ✨ Fitur Utama

### 🔐 Autentikasi
- [x] **Login & Register Manual (Email & Password)**
- [x] **Login dengan Google** *(OAuth 2.0)*
- [x] **Login dengan Facebook** *(OAuth 2.0)*

### 👥 Membership
- Tersedia 3 tipe membership:
  - 🟢 **Tipe A**: Akses 3 Artikel & 3 Video
  - 🔵 **Tipe B**: Akses 10 Artikel & 10 Video
  - 🟣 **Tipe C**: Akses semua Artikel & Video

### 📄 Konten
- Halaman dinamis untuk **Artikel** dan **Video**
- Filter konten berdasarkan membership user

---

## 🧱 Teknologi yang Digunakan

| Layer     | Tools / Framework         |
|-----------|---------------------------|
| Frontend  | Tailwind CSS v3           |
| Backend   | Laravel 10+ (PHP 8+)      |
| Database  | MySQL 5.7 / 8              |
| OAuth     | Laravel Socialite         |
| Auth      | Laravel Breeze            |

---

## 🖼️ Preview Tampilan

> Tampilan halaman dibuat **responsive** dan modern menggunakan Tailwind CSS.

- 💻 **Landing Page**
- 📲 **Login & Register (Manual & Sosial Media)**
- 🏷️ **Dashboard Berdasarkan Membership**
- 📺 **Halaman Artikel & Video dengan Limitasi Akses**

---

🏆 Nilai Tambah (Bonus)
 CMS Integration (Expression Engine ready)

 Tailwind dark mode support

 UI components reusable (x-button, x-card, etc)

 Pagination dan Alert Component


Untuk isi video dan artikel pakai data dummy saja dan diisi semua

## 🚀 Cara Menjalankan Aplikasi

### 1. Clone Repo

```bash
git clone https://github.com/username/membership-app.git
cd membership-app


APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:fxjDjb+jvvDvKt9aswB1MgtQNwJaKP2R+6kjBjn8uQA=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=membership_app
DB_USERNAME=root
DB_PASSWORD=root

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

# Google OAuth - Set to 'mock' for testing
GOOGLE_CLIENT_ID=809817874868-v0jepa3mma22f6v7ja83c7q3hl7dtflg.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=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
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback

# Facebook OAuth - Set to 'mock' for testing
FACEBOOK_CLIENT_ID=mock_facebook_client_id  
FACEBOOK_CLIENT_SECRET=mock_facebook_client_secret
FACEBOOK_REDIRECT_URI=http://127.0.0.1:8000/auth/facebook/callback
