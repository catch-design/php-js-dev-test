## Project Summary
The app consists of a restful service built with lumen micro-framework and a page which uses AngularJS to consume the service asynchronously. 

Code for the service can be found in app (routes are in app/hhtp), the view in resources, unit tests in tests/ServiceTest and front end code in public. 

## Project setup:
 - create a new database 
 - rename the .env.example file in the project root to .env 
 - enter database name, user & password into .env
 - composer install from project root
 - php artisan migrate from project root
 - import csv into database
 - configure your web server's web root to be the public directory

 ## Front end build process:
  - You don't need to do this to run the app, it would only be needed if you wanted to modify styles
  - navigate to public/themes directory
  - npm install to get dependencies 
  - grunt dev or grunt dist to run tasks

  ## Bower:
  - bower components are intentionally included as the per bower docs recommendation

