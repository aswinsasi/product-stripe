<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

To purchase a product directly and make payment using stripe laravel casheir package

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9/installation#installation)


Clone the repository

   git clone  https://github.com/aswinsasi/product-stripe.git

Switch to the repo folder

    cd product-stripe

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate or add stripe test mode key in .env

    STRIPE_KEY=pk_test_51MI5ZvSI08QBz5l6PXnBYBzUnaebFjPiFNyzdzykgPHjuaLxviRn4hhf6WH7nlOupgASCXIi3srAFXj3QlcMw1OX00hzIuaVE8
    STRIPE_SECRET=sk_test_51MI5ZvSI08QBz5l66QiiKVvuHY65W02e59o2VKAc4wDMJEJjlizJm2BCGQez4UpttGTAGs0hBmtnwLlw2JuvWTcG00mJnzpETf

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
    php artisan db:seed

    //Or you can use following command to reset & recreate whole database
    php artisan migrate:refresh --seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


Test Card details

    Card Number: 4242 4242 4242 4242
    Card Expiry Date: Any future date
    Card CVV Number: Any 3 digits

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
