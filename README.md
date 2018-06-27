# PHP JavaScript Developer Test

## Undertaken by Thomas Whittington

I've got the website running as per the instructions (which I've left below). I'm happy to send evidence of it working if requested.

## Instructions

I hosted this website using WAMP 3.0.6, and running it assumes it's unpacked into the root folder (wamp64/wwww/ for me).

I've attached an SQL which should create the database and table as per how it was when I was finished with it, minus data.

Everything takes place on Index. CSV importing is automatic (if there is nothing in the database already) and pressing the button shows the customers in a table below.

## Dependencies and Comments

The only real dependency for this is PHPExcel. Bootstrap is used as a part of my personal framework, which this test website is based in.

I'm aware PHPExcel is depreciated, but not only do I know it more than PHPSpreadsheet, I've spent hours trying to get Composer to work on my laptop, only for it to fail.
On that topic, I'm sorry I've not shrunk the dependencies down or made a composer.json file for you, but I can't confirm if it would work. 

Feedback is greatly appreciated, please don't hesitate to contact me if you need anything. 

I thoroughly enjoyed my interview, and I look forward to hearing positively from you.


# A simple test for PHP / JavaScript Developers

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
