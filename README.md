# PHP JavaScript Developer Test

A simple test for PHP / JavaScript Developers

## Instruction
1. The project files should be inside catchnz-test directory
2. Navigate to http://domain-name/catchnz_test/index.php after uploading to server
3. Enter database host, username, password and database name in the form when asked
4. Once the installation is finished, it will be redirected to the home page
5. click on "Import CSV Data" button to import data from CSV file to database
6. Click on "Show Customers" button to load imported data from database
7. I used MySQL DB

## Instructions

1. Fork or clone this repo
2. Write a script to Import the CSV file located in `data/customers.csv` into a database (MySQL or Mongo is preferred)
3. Create a basic PHP web service that serves the data from the database as JSON
4. Create a basic web page that asynchronously loads the JSON into a list or table when you click a button
5. If you are completing this test as part of a job application please include a zip file of your project (including git config/metadata) with your application otherwise create a pull request and we'll take a look :)

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
