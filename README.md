# PHP JavaScript Developer Test

A simple test for PHP / JavaScript Developers

## Instructions

1. Fork or clone this repo
2. Import the CSV file located in `data/customers.csv` into a database (MySQL or Mongo is preferred)
3. Create a basic PHP web service that serves the data from the database as JSON
4. Create a basic web page that asynchronously loads the JSON into a list or table when you click a button
5. Create a pull request or email us at dev@catch.co.nz

### Guidelines

1. Your repo needs to include at minimum anything required to get the app working.  Detailed instructions should be provided in the `README.md` file to setup and run the app.
2. If a structured schema migration tool is not used then a setup script must be supplied to create any data tables etc
3. Try not spend more than 2 hours on it

### Bonus Points

* Make it Pretty
* Make it as OO as possible
* Consume dependencies with tools like Composer, Bower and NPM
* Use patterns like MVC, ORM
* Compile any front end assets with a build tool like gulp
* Unit tests

### Set up and run app
1. Import users.sql to Database (I am using Mysql database for this, database named catchdesign, table named users)
2. Configure database setting in application/config/database.php, change to your database setting 
3. This website is based on CodeIgniter(MVC), I have restricted access to folder and file by .htaccess, only index.php, css, fonts, js are accessable