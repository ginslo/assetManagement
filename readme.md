# Asset Management Project

This SysOp tool, built on [Laravel 5.2](http://laravel.com/) (see also on [GitHub](https://github.com/laravel/laravel) ), is an attempt to gather frequently needed information into a central dashboard, including servers (hosts), websites, domain names, registrars, applications, providers, data centers and user information. The intention is to make this a one-stop shop for complete management of the company assets.

##Requirements for use
Clone the repo

Run composer update

Create a new empty database

Add database credentials to .env

Add constants found in .env.add-these-to-your-dot-env to your .env. These are used throughout the site. You should change the entries to suit your needs.

At this time (June 19, 2016), the migration files are not up to date so you should not use them to create your database. Instead, use the file assetManagement-bu.sql.gz found in the root directory of this repo.

Just do the following:

gunzip assetManagement-bu.sql.gz

mysql -u dbusername -p dbname < assetManagement-bu.sql

The result should populate your new database with the required empty tables.

DB migrations will be updated asap.

##UPDATE - 7/6/16
Migrations have been updated using the xethron/migrations-generator:dev-l5 tool. You can now just do a php artisan migrate to create all tables.  
