# PHP JavaScript Developer Test

A simple test for PHP / JavaScript Developers

## Starting up the app

Make sure you have a mysql db and php 7.1+ on you machine

Run the database scripts

`php data/dataloader.php server username password`

if you get the error `Error creating Table: The used command is not allowed with this MySQL version` you may need to restart your mysql server with the `--local-infile` option

You are going to have to do a composer install in the backend directory to get ou dependencies

`cd backend && composer install`

Before running the app check the values in `backend/.env` are okay and run:

`php -S localhost:8000 -t backend/public`

 You should then be able to navigate to `localhost:8000/frontend` to view the app

 if you want to run the js project in dev mode run

 `cd frontend && npm install && npm run-script start`

## App structure

* php - lumen microservice framework

* js - Angular

* datauploader - vanilla  php and sql
