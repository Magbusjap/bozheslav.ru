# bozheslav.ru — Personal Portfolio & Blog

> 🌐 Live: [bozheslav.ru](https://bozheslav.ru) · Author: Mikhail Ankudinov

Personal portfolio site built from scratch and deployed on a self-configured VPS.  
Laravel backend · Filament CMS · pure HTML/CSS/JS frontend · no templates used.

![PHP](https://img.shields.io/badge/PHP_8.3-777BB4?style=flat-square&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel_12-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL_16-4169E1?style=flat-square&logo=postgresql&logoColor=white)
![Nginx](https://img.shields.io/badge/Nginx_1.24-009639?style=flat-square&logo=nginx&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=flat-square&logo=docker&logoColor=white)
![Ubuntu](https://img.shields.io/badge/Ubuntu_24.04-E95420?style=flat-square&logo=ubuntu&logoColor=white)

---

## Stack

| Layer | Tech |
|---|---|
| Frontend | HTML5, CSS3 (BEM), JavaScript ES6+ (ES modules) |
| Backend | PHP 8.3, Laravel 12 |
| Admin panel | Filament PHP v3 |
| Database | PostgreSQL 16 |
| Web server | Nginx 1.24 |
| OS | Ubuntu 24.04 LTS |
| SSL | Let's Encrypt (Certbot) |

---

## Features

### 🖥 Frontend
- Semantic HTML, BEM methodology — no CSS frameworks
- Dark / Light theme toggle
- Adaptive layout (Mobile First)
- PageSpeed: **94/100** Desktop · **78/100** Mobile

### ⚙️ CMS (Filament Admin Panel)
- Blog with Builder blocks: heading, text, code, image, quote, before/after
- Portfolio with demo-project ZIP deployment (auto-extract to `/public/portfolio/`)
- Static pages, media library (Curator), SEO fields
- Trash system — deleted records stored 60 days with restore option
- Site options: social links, hero buttons, resume PDF upload
- Visit tracking with GeoIP2/MaxMind — analytics page with period filters
- Server monitoring: RAM, disk, banned IPs, failed login attempts
- **Email templates** — MJML editor with preview and test send via SMTP
- **Email media library** — separate storage with folder management and bulk upload

### 🔒 Infrastructure & Security
- Deployed on Timeweb VPS, configured from scratch
- SSH key-only authentication, fail2ban brute-force protection
- Automated cache cleanup via Laravel Scheduler + cron
- Adminer for PostgreSQL management

---

## Project Structure

```
bozheslav.ru/           ← HTML/CSS/JS source (frontend)
app/
├── app/
│   ├── Filament/       ← Admin panel pages, resources, widgets
│   ├── Http/           ← Controllers
│   ├── Models/         ← Eloquent models
│   └── Traits/         ← HasTrashAction trait
├── resources/views/    ← Blade templates
├── routes/             ← web.php, console.php
└── database/           ← Migrations
docker/
└── nginx/              ← Nginx config
```

---

## Local Setup

```bash
git clone https://github.com/Magbusjap/bozheslav.ru.git
cd bozheslav.ru/app
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve
```

---

## Deploy

Deployment uses a `deploy.sh` script:
- Pulls latest changes via `git pull`
- Copies HTML source files into Blade templates
- Header/footer load via JavaScript `fetch()` — no Blade syntax in those files

---

## License

Personal project. Not for commercial reuse.

---

<img src="https://bozheslav.ru/storage/media/mikgail-bozheslav-favicon-16x16.png" width="16" height="16" alt="bozheslav.ru favicon"> [bozheslav.ru](https://bozheslav.ru)