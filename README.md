# bozheslav.ru — Personal Portfolio & Blog

> Live: [bozheslav.ru](https://bozheslav.ru) · Author: [Mikhail Ankudinov](https://bozheslav.ru)

Personal portfolio site built from scratch and deployed on a VPS.  
Laravel backend + custom Filament CMS + pure HTML/CSS/JS frontend.

---

## Stack

| Layer | Tech |
|-------|------|
| Frontend | HTML5, CSS3 (BEM), JavaScript ES6+ (ES modules) |
| Backend | PHP 8.3, Laravel 12 |
| Admin panel | Filament PHP v3 |
| Database | PostgreSQL 16 |
| Web server | nginx 1.24 |
| OS | Ubuntu 24.04 LTS |
| SSL | Let's Encrypt (Certbot) |

---

## Features

**Frontend**
- Semantic HTML, BEM methodology, no CSS frameworks
- Dark/light theme toggle
- Adaptive layout (Mobile First)
- PageSpeed: 94/100 Desktop, 78/100 Mobile

**CMS (Filament Admin Panel)**
- Blog with Builder blocks (heading, text, code, image, quote, before/after)
- Portfolio with demo-project ZIP deployment (auto-extract to `/public/portfolio/`)
- Static pages, media library (Curator), SEO fields
- Trash system — deleted records stored 60 days with restore option
- Site options: social links, hero buttons, resume PDF upload

**Infrastructure & Security**
- Deployed on Timeweb VPS, configured from scratch
- SSH key-only authentication, fail2ban brute-force protection
- Server monitoring in admin panel: RAM, disk, banned IPs, failed login attempts
- Automated cache cleanup via Laravel Scheduler + cron
- Adminer for PostgreSQL management

---

## Project Structure
```
bozheslav.ru/          ← HTML/CSS/JS source (frontend)
app/
├── app/
│   ├── Filament/      ← Admin panel pages, resources, widgets
│   ├── Http/          ← Controllers
│   ├── Models/        ← Eloquent models
│   └── Traits/        ← HasTrashAction trait
├── resources/views/   ← Blade templates
├── routes/            ← web.php, console.php
└── database/          ← Migrations
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