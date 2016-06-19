# Asset Management Project

This SysOp tool, built in Laravel 5.2, is an attempt to gather frequently needed information into a central dashboard, including servers (hosts), websites, domain names, registrars, applications, providers, data centers and user information. The intention is to make this a one-stop shop for complete management of the company assets.

##Requirements for use
Create database (e.g. mysql/mariadb)
Add database credentials to .env
Add constants found in .env.add-these-to-your-dot-env to your .env. These are used throughout the site. You should change the entries to suit your needs.
At this time (June 19, 2016), the migration files are not up to date so you should not use them to create your database. Instead, use the file assetManagement-bu.sql.gz found in the root directory. Just gunzip the file and do mysql -u dbusername -p dbname < assetManagement-bu.sql to create the empty tables. Migrations will be updated asap.

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
