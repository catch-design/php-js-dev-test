CREATE DATABASE IF NOT EXISTS dev_test;

CREATE TABLE `dev_test`.`customers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `website` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
