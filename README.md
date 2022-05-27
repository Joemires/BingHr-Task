<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation
- Run `git clone https://github.com/Joemires/BingHr-Task`
- Copy .env.example to .env
- Edit your database configuration to your choice or set to sqlite
- Run `composer update` inside the project directory
- Run `php artisan app:init` to initialize the application
- Run `php artisan serve` and open the url in your browser

On running `php artisan app:init`, the system will do all migration and create a superadmin user with email - `super@app.com` and password - `secret`

## Implementation
- Admin can add user
- Used LaraTrust to handle my roles & permission
- Stored all team position in UserPosition with the help of BenSampo Enum package
- Managed my navigation with EasyNav package
- Manage Phone number validation Propaganistas package
<!-- - Only users with Read permission can read user
- Only users with Delete permission can delete user
- Only User with Update permission can update user 
- Only User with Delete permission can delete user -->

>This is a rush project as I was currently handling something before bumping into the mail. <br> Thank you for understanding

## Contact
| Contacts   |            |
|----------|:-------------|
| Name |    Joseph Bassey   |
| Email |  Joemires20@yahoo.com |
| LinkedIn | https://linkedin.com/in/joemires |
| Phone   |      +2348135247490      |
