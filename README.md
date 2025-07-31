
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
8. Make Database:
     ```bash
      CREATE DATABASE service_booking;
      ```
9. Make Test Database for PHPUnit test:
     ```bash
     CREATE DATABASE service_booking_test;
     ```
10. Run tests:
    ```bash
    php artisan test
    ```
## API Documentation
- https://documenter.getpostman.com/view/40737506/2sB3B8stPF
- Base Url `https://softsmine.com/service-booking/public/api`
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

## Screenshots

### Authentication API (Postman)
![Registration API](https://i.ibb.co/9HTXQ6dW/register.png)

![Login API](https://i.ibb.co/4RsgHNh4/login.png)

![logout API](https://i.ibb.co/bcRwB83/logout.png)



### Services API Response
![Services List](https://i.ibb.co/NntgGncd/service-list.png)

![Services List](https://i.ibb.co/NntgGncd/service-list.png)

![Services Create](https://i.ibb.co/R4CKjY6r/create-service.png)

![Services Update](https://i.ibb.co/CKJdhBKM/update-service.png)

![Services Delete](https://i.ibb.co/nq72mzy3/delete-service.png)




### Booking API Response
![Booking List](https://i.ibb.co/sJRBNLG8/booking-list.png)

![Services Booking](https://i.ibb.co/yFPr81GM/service-booking.png)

![Customer Booking List](https://i.ibb.co/svVvNyXZ/customer-booking-list.png)


## Author

Developed for evaluation purposes by Shekh Manzur Elahi.
