<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/controller/CustomerController.php');

$customerCntrl = new CustomerController();
$customerCntrl->importCSV();
echo 'success';
