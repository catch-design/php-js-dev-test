# PHP JavaScript Developer Test

A simple test for PHP / JavaScript Developers

## Install Instructions

Built with Laravel 5 and vuejs2+

---------

**Example** 
http://customers.aaron-m.co.nz

----------

**requires**
- php7.1+
- latest stable node & npm or yarn

**Install Dependencies**
```
composer install
npm install
```

**Compile javascript & scss**
```
npm run dev
```

**Setup Environment**
```
cp .env.example .env
php artisan key:generate
```

**Configure MySQL connection details in .env**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={database name}
DB_USERNAME={database user}
DB_PASSWORD={database password}
```

**Setup the database**
Log into mySql and create database
```
CREATE Database `{database name}`;
```

**Run migrations and seed with starting CSV Data**
```
php artisan migrate:refresh --seed
```

**Run build script if your making any changes to javascript or scss**
```
npm run watch
```

**Basic test**

To test if the Customers endpoint is returning 200, run **`vendor/bin/phpunit`** from project root.

## Use your favourite php7.1+ based server or VM.
