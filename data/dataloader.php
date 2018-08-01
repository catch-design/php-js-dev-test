<?php
    // Small script to upload data to the database

    // Change these to suit
    $servername = isset($argv[1]) ? $argv[1] : "localhost" ;
    $username = isset($argv[2]) ? $argv[2] : "test";
    $password = isset($argv[3]) ? $argv[3] :  "password";

    echo "running script with servername: " . 
    $servername . " username: " . 
    $username . " password: " . 
    $password . "\n"; 
    
    // probably don't change these or you will have to change a few other things in the backend project
    $dbName = "Application";
    $tableName = "Customers";
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    echo "Connected successfully\n";

    $sql = "CREATE DATABASE IF NOT EXISTS " .  $dbName;
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully\n";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    $conn->close();

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
        
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    // Create Table
    $sql = "CREATE TABLE IF NOT EXISTS " . $tableName . "(\n"
    . " `id` int(11) NOT NULL, \n"
    . " `first_name` varchar(20) NOT NULL, \n"
    . " `last_name` varchar(20) NOT NULL, \n"
    . " `email` varchar(100) NOT NULL, \n"
    . " `gender` varchar(7) NOT NULL, \n"
    . " `ip_address` varchar(23) NOT NULL, \n"
    . " `company` varchar(100) NOT NULL, \n"
    . " `city` varchar(50) NOT NULL, \n"
    . " `title` varchar(100) NOT NULL, \n"
    . " `website` text NOT NULL \n"
    . ")";
    if (mysqli_query($conn, $sql)) {
        echo "Table created successfully\n";
    } else {
        echo "Error creating Table: " . mysqli_error($conn);
    }
    
    // Upload data
    $sql = "LOAD DATA LOCAL INFILE  
    '/Users/Kartik/workspace/catch-test/php-js-dev-test/data/customers.csv'
    INTO TABLE " . $tableName .
    " FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 ROWS
    ";
    if (mysqli_query($conn, $sql)) {
        echo "Data imported successfully\n";
    } else {
        echo "Error creating Table: " . mysqli_error($conn);
    }
?> 
