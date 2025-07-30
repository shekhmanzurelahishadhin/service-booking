
# Laravel Service Booking System

This is a simple API-based service booking system built with Laravel. It allows customers to register, log in, view available services, and book services. Admins can manage services and view all bookings.

## Features

- User Registration and Login (Laravel Sanctum)
- API-based booking and service management
- Admin and Customer roles
- Unit tests using PHPUnit
- RESTful design
- Database seeding with factories

## Requirements

- PHP >= 8.2
- Composer
- Laravel >= 12.x
- MySQL

## Setup Instructions

1. Clone the repository and navigate to the project root:
    ```bash
    git clone https://github.com/shekhmanzurelahishadhin/service-booking.git
    cd service-booking
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Create a copy of `.env` file:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Set up your database credentials in the `.env` file.

6. Run migrations and seeders:
    ```bash
    php artisan migrate:fresh --seed
    ```

7. Serve the application:
    ```bash
    php artisan serve
    ```

8. Run tests:
    ```bash
    php artisan test
    ```

## API Endpoints

- `POST /api/register` - Register a user
- `POST /api/login` - Login
- `GET /api/services` - List all services (authenticated)
- `POST /api/bookings` - Create a booking (authenticated)
- `GET /api/bookings` - View bookings (admin or user)
- `GET /api/admin/bookings` - Admin view all bookings
- `POST /api/admin/services` - Create service (admin)
- `PUT /api/admin/services/{id}` - Update service (admin)
- `DELETE /api/admin/services/{id}` - Delete service (admin)

## Author

Developed for evaluation purposes by Shekh Manzur Elahi.
