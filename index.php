<?php
include($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/controller/CustomerController.php');  

//checking if database installed and redirecting
$config = new config();
if(!$config->isInstalled){
    header('Location: ./install/index.php');
}
  
$controller = new CustomerController();  
$controller->render();
