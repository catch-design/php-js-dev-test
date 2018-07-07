<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/install/config.php');
$config = new config();
$config->isInstalled = false;//$_POST['isInstalled'];
$config->db_host = $_POST['db_host'];
$config->db_username = $_POST['db_username'];
$config->db_password = $_POST['db_password'];
$config->db_name = $_POST['db_name'];

$config->saveConfig();

if(!$config->isInstalled){
        $conn = mysqli_connect($config->db_host, $config->db_username, $config->db_password);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "CREATE DATABASE " . $config->db_name;
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            echo 'success';
        } else {
            die "Error creating database: " . mysqli_error($conn);
        }
    }