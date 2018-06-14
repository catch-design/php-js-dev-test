#!/bin/bash
#data file data/customers.csv

# environment variables
DB="dev_test"
USER = "dev_test"
PASSWD="badPw0rd"


# create database
mysql -e "CREATE DATABASE $DB"
mysql -e "CREATE USER ${USER}@localhost IDENTIFIED BY '${PASSWD}';"
mysql -e "GRANT ALL PRIVILEGES ON ${DB}.* TO '${USER}'@'localhost';"
mysql -e "FLUSH PRIVILEGES;"

# create customer table
mysql -e "CREATE TABLE IF NOT EXISTS `contact_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;"

IFS=,
read; # skip header line
while read id first_name last_name email gender ip_address company city title website
      do
        echo "INSERT INTO contact_table (id,first_name,last_name,email,gender,ip_address,company,city,title,website) VALUES ('$id', '$first_name', '$last_name', '$email', '$gender', '$ip_address', '$company', '$city', '$title', '$website');"

done < data/customers.csv | mysql -u dev_test -p badPw0rd dev_test;