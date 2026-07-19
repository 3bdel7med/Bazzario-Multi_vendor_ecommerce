# Multi-vendor E-commerce (Laravel)

A Laravel 12 multi-vendor ecommerce platform with vendor/customer dashboards, products, cart/checkout, wishlist, blog/posts, and real-time chat (Laravel Reverb).

---

## Features

- **Customer area**
  - Dashboard, profile
  - Cart, checkout, orders
  - Wishlist
  - Real-time 1-to-1 chat
- **Vendor area**
  - Vendor dashboard (routes protected by `role:vendor`)
- **Admin hooks (broadcast channels)**
  - `admin-notifications` broadcast channel
- **Real-time / chat**
  - Uses Laravel broadcasting channels:
    - `chat.{chatId}`
    - `presence-chat.{chatId}`

---

## Tech Stack

- **Backend:** Laravel 12 (PHP 8.2)
- **Realtime:** `laravel/reverb`
- **Payments:** `stripe/stripe-php`
- **Queue/Realtime driver:** Predis/Redis compatible (`predis/predis`)
- **Dockerized:** PHP-FPM + Nginx + MySQL

---

## Requirements

- Docker + Docker Compose
- Ports:
  - App via Nginx: **http://localhost:8000**
  - MySQL: **localhost:3306**

---

## Local Development (Docker)

1) Copy env file

```bash
copy .env.example .env
```

2) Start containers

```bash
docker-compose up -d --build
```

3) Install dependencies + build assets (inside the `app` container)

```bash
docker-compose exec app composer install
docker-compose exec app npm install
docker-compose exec app npm run build
```

4) Generate app key and run migrations

```bash
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --force
```

5) Access the application

- Visit: **http://localhost:8000**

---

## Common Artisan Commands

- Run migrations:
  - `php artisan migrate`
- Seed demo data (if seeders exist in your setup):
  - `php artisan db:seed`
- Start dev server (non-docker):
  - `php artisan serve`

---

## Routes Overview

- Main pages: `routes/web.php`
- Customer area: `routes/customer.php` (protected by `auth` middleware)
- Vendor area: `routes/vendor.php` (protected by `auth` + `role:vendor`)
- Chat broadcast channels: `routes/channels.php`

---

## Real-time Chat Notes

Broadcast channels are defined in:

- `chat.{chatId}`
- `presence-chat.{chatId}`

These channels control authorization for sending/receiving messages between users.

---

## Project Structure (high level)

- `app/Http/Controllers/` - web controllers (frontend/customer/vendor/chat)
- `app/Services/` - services (e.g., chat/settings)
- `resources/views/` - Blade views (layouts, frontend pages, chat, vendor/customer dashboards)
- `database/migrations/` - schema (users, shops/vendors, products, cart/orders, chat/messages, etc.)

---

## License

MIT

