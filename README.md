<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Development Steps

If you're a normal user or a developer who has just started with this Laravel project, 
here’s a step-by-step guide to understand what’s been done so far:

### 1. **Set Up Laravel Project**
   - The Laravel framework was installed and configured. 
   If you're setting up the project from scratch, make sure to run the following commands:
     ```bash
     composer install
     php artisan key:generate
     ```

### 2. **Database Configuration**
   - A connection to the database was set up in `.env` file, including configuration for database, cache, and session settings.

### 3. **Create Pages Model, Controller, and Migration**
   - We created a `Page` model, controller, and migration to handle the basic CRUD operations for pages.
   - The migration file defines the structure of the `pages` table with columns like `title`, `slug`, `content`, `parent_id`.

### 4. **Resource Route for Pages**
   - The route for managing pages was set up as a resource route:
     ```php
     Route::resource('pages', PageController::class);
     ```
     This enables full CRUD functionalities for pages.

### 5. **Page View for Adding and Editing Pages**
   - The page views were created for adding and editing page details using forms. Form validation and CSRF tokens are also included.
   - The `Back to Pages` button was styled and placed next to the `Update Page` button using Bootstrap's flexbox classes.

### 6. **Form Submission and Handling**
   - Upon form submission, the page data is sent via `POST` or `PUT` methods to create or update a page.
   - Data validation and handling of `parent_id` to establish relationships between pages (parent-child) are also implemented.

### 7. **Routing to Nested Pages**
   - Routes were defined to display nested pages using slugs:
     ```php
     Route::get('/{slug1}/{slug2?}/{slug3?}/{slug4?}', [PageController::class, 'show'])
         ->where(['slug1' => '.*', 'slug2' => '.*', 'slug3' => '.*', 'slug4' => '.*'])
         ->name('page.show');
     ```
   - This enables dynamic routing to show pages based on the URL slugs.

### 8. **Back Button Functionality**
   - The `Back to Pages` button on the page allows users to navigate back to the list of pages at `http://localhost:8000/pages`.

---

## Changelog

### 1.0.0 - Initial Release
- Set up Laravel project and basic configuration.
- Created `Page` model, migration, and controller.
- Established resource routes for CRUD operations on pages.
- Implemented parent-child page relationship functionality.
- Added page editing and creating forms with validation.
- Implemented navigation buttons with `Back to Pages` functionality.

---

### 9. **Further Enhancements**
   - This project can be enhanced by adding user authentication, role-based access, and more detailed logging or error handling.

---

Now, you can follow these steps in the order they were completed to see how the project evolved and what has been implemented.