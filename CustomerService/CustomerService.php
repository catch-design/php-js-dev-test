<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/CustomerService/CustomerServiceHandler.php');
$csHandler = new CustomerServiceHandler();
$csHandler->getCustomers();
?>