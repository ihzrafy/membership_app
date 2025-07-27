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
  - 🔵 **Tipe B**: Akses 6 Artikel & 6 Video
  - 🟣 **Tipe C**: Akses 12 Artikel & 12 Video

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

## 🏆 Nilai Tambah (Bonus)
- ✅ CMS Integration (Expression Engine ready)
- ✅ Tailwind dark mode support  
- ✅ UI components reusable (x-button, x-card, etc)
- ✅ Pagination dan Alert Component

Untuk isi video dan artikel pakai data dummy saja dan diisi semua

## 🚀 Cara Menjalankan Aplikasi

### 1. Clone Repo

```bash
git clone https://github.com/ihzrafy/membership_app.git
cd membership_app
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Configuration

Edit file `.env` sesuai konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=membership_app
DB_USERNAME=root
DB_PASSWORD=root
```

### 5. OAuth Configuration

Edit file `.env` untuk konfigurasi OAuth:

```env
# Google OAuth
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback

# Facebook OAuth  
FACEBOOK_CLIENT_ID=your_facebook_client_id
FACEBOOK_CLIENT_SECRET=your_facebook_client_secret
FACEBOOK_REDIRECT_URI=http://127.0.0.1:8000/auth/facebook/callback
```

### 6. Database Migration & Seeding

```bash
php artisan migrate
php artisan db:seed
```

### 7. Build Assets

```bash
npm run build
# atau untuk development
npm run dev
```

### 8. Run Application

```bash
php artisan serve
```

Buka browser dan akses: `http://127.0.0.1:8000`

---

## 📋 Features Overview

### Authentication Features
- ✅ Manual registration with membership selection
- ✅ Google OAuth with stateless mode (no session issues)
- ✅ Facebook OAuth integration
- ✅ Seamless login/logout functionality
- ✅ Session management with database driver

### Membership System
- ✅ Three membership tiers (A, B, C)
- ✅ Content filtering based on membership level
- ✅ Upgrade/downgrade membership functionality
- ✅ Dashboard with membership statistics

### Content Management
- ✅ Article system with pagination
- ✅ Video system with pagination  
- ✅ Seeded dummy content (20 articles, 20 videos)
- ✅ Access control per membership type

### Technical Features
- ✅ Responsive design with Tailwind CSS
- ✅ Database sessions for scalability
- ✅ Comprehensive error handling
- ✅ Logging for debugging
- ✅ CSRF protection
- ✅ Modern Laravel best practices

---

## 🎯 Membership Access Levels

| Membership | Articles | Videos | Description |
|------------|----------|--------|-------------|
| **Type A** | 3        | 3      | Basic access |
| **Type B** | 6        | 6      | Standard access |
| **Type C** | 12       | 12     | Premium access |

---

## 🛠️ Development Notes

- OAuth Google menggunakan **stateless mode** untuk menghindari session validation issues
- Database sessions digunakan untuk better scalability
- Comprehensive error handling dengan user-friendly messages
- Logging tersedia untuk debugging OAuth dan aplikasi
- Test routes tersedia di environment local (`/test/config`, `/oauth-test/google`)

---

## 📞 Support

Jika ada pertanyaan atau issue, silakan buat issue di repository ini.

**Happy Coding! 🚀**
