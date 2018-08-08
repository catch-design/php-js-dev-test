# PHP JavaScript Developer Test

A simple test for PHP / JavaScript Developers

## Installation

Install Docker if it is not already \
Open up a tab in the terminal, cd into the project root and run \
`silverstripe-docker/develop.sh build` \
then \
`silverstripe-docker/develop.sh up`

Which will get all the docker containers running

### IN A NEW TAB

In a new terminal window run the following commands from the project root.

run \
`silverstripe-docker/develop.sh composer install` \
To Install all php dependencies

run \
`silverstripe-docker/develop.sh npm install` \
to install all front end dependencies

run \
`silverstripe-docker/develop.sh npm run production` \
to bundle the front end assets

run \
`silverstripe-docker/develop.sh devbuild` \
to build the database

Then run \
`silverstripe-docker/develop.sh sake importCSV` \
to run the import CSV script which pulls the customer data into the database

Then the page with the button should be available on

http://localhost:8888/

if something on the page is not loading, try running

http://localhost:8888/?flush=all

When Finished go back to the terminal tab running the Docker containers
and run ctrl-c then `silverstripe-docker/develop.sh down`
