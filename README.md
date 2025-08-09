<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# MultiSupplier Hotel Search API

## About

This Laravel API allows searching hotels from 4 different mock suppliers with filters like location, dates, guests, price range, and sorting. It merges duplicate hotel entries (based on name and location) and returns the best price among suppliers.

---

## Setup Instructions

1. Clone the repo
2. Run `composer install`
3. Setup your `.env` database config
4. Run migrations and seed data:

```bash
php artisan migrate --seed


API Endpoint
GET /api/hotels/search

Query Parameters:
location (string, required)

check_in (date, required, must be after today)

check_out (date, required, must be after check_in and today)

guests (integer, optional)

min_price (decimal, optional)

max_price (decimal, optional)

sort_by (string, optional) — price_per_night or rating


http://127.0.0.1:8000/api/hotels/search?location=Cairo&check_in=2025-08-10&check_out=2025-08-15&guests=2&min_price=50&max_pric*e=200&sort_by=price_per_night

Example JSON Response
{
  "data": [
    {
      "name": "Grand Plaza Hotel",
      "location": "Cairo, Egypt",
      "price_per_night": 84.19,
      "available_rooms": 3,
      "rating": 4.5,
      "source": "supplier_a"
    }
  ]
}

Testing
http://127.0.0.1:8000/api/hotels/search?location=Cairo&check_in=2025-08-10&check_out=2025-08-15&guests=2&min_price=50&max_price=200&sort_by=price_per_night

{
    "data": [
        {
        "name": "Grand Plaza Hotel",
        "location": "Cairo, Egypt",
        "price_per_night": 84.19,
        "available_rooms": 3,
        "rating": 4.5,
        "source": "supplier_a"
        }
    ]
}

Feel free to reach out if you need assistance running or extending this API.

© Laravel Framework - Ezz-Eldin
