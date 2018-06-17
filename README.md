# PHP JavaScript Developer Test

After analysing the data and requirements. I have selected Laravel framework and Vue Js. I have created 4 tables Data, City, Company, and Title. My first priority was to aggregate the data and optimise the database. So the Data table has relationship with Title, City and Company. 
To import large or multiple CSV, I used batch process to speedup fetch and store functionality. The import functionality is looking for csv/s inside the  “data” folder.  It can also improvise by using laravel queues, and jobs to run process in background.After importing all data, page will hit the webservice which returns data in JSON format. To test web-service please use the endpoint “/api/users”.Vue. js will parse the JSON and render it to the webpage. The webpage will display the a table with pagination button next & previous. By click Next or Previous, it will fetch data asynchronously from the web-services.


### Requirement
1. LAMP Environment Preferred
2. PHP >= 7.1.3
3. OpenSSL PHP Extension
4. PDO PHP Extension
5. Mbstring PHP Extension
6. Tokenizer PHP Extension
7. XML PHP Extension
8. Ctype PHP Extension
9. JSON PHP Extension
10. PhpSpreadsheet: ^1.2
11. PHP extension php_zip enabled
12. PHP extension php_xml enabled
13. PHP extension php_gd2 enabled


### Installation

#### Installation from Git

1. Pull the code from repository.
2. Run command in terminal “Composer update”
3. Run command in terminal “NPM Install”
4. Create a MYSQL DB any name.
5. Update the .env file with your DB Host, Username, Password and Database name (Get .env from ZIP File)
6. Run command in terminal php artisan migrate
7. Now point a domain to /ROOT_FOLDER/GIT_FOLDER/public
8. Cheers!! all done. Now hit you domain name in th browser. 

#### Installation from Zip
1. Download Zip : https://www.dropbox.com/s/ps51tc1vdge3dt6/phpjstest.zip?dl=0
2. Extract zip in to root_directory
3. Create a MYSQL DB
4. Update the .env file with your DB Host, Username, Password and Database name.
5. Run command in terminal php artisan migrate
6. Now point a domain to /ROOT_FOLDER/GIT_FOLDER/public
7. Cheers!! all done. Now hit you domain name in th browser.
