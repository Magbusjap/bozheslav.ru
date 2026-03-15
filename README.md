# bozheslav.ru — Портфолио и блог

Личный сайт-портфолио веб-разработчика.
Живой сайт: [bozheslav.ru](https://bozheslav.ru)

## Стек

- **Backend:** Laravel, PHP 8.3, php-fpm
- **Frontend:** HTML, CSS (BEM), Vite
- **Сервер:** nginx, Let's Encrypt (Certbot), Timeweb Cloud VPS
- **ОС:** Ubuntu 24.04 LTS

## Что умеет сайт

- Портфолио с кейсами проектов
- Блог (без комментариев)
- Контактная форма

## Локальный запуск

```bash
cp .env.example .env
composer install
npm install && npm run dev
php artisan key:generate
php artisan serve
```

## Деплой на сервер

Сервер: `/var/www/bozheslav/app`
nginx конфиг: `docker/nginx/default.conf`

```bash
git pull
composer install --no-dev
npm run build
php artisan config:cache
php artisan route:cache
```

## Структура сервера

```
/var/www/bozheslav/
├── app/      ← Laravel проект
├── certs/    ← SSL сертификаты
└── nginx/    ← nginx конфиг
```
