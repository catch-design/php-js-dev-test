<?php
include($_SERVER['DOCUMENT_ROOT']."/model/database.php");
include($_SERVER['DOCUMENT_ROOT']."/model/customer/populateDB.php");

Global $db;
$populateDB = new populateDB;

function checkDatabase($db, $populateDB){
  $result = null;
  $result = $db->query("SELECT COUNT(*) FROM customers")->fetchColumn();
  if ($result == 0) {
    $populateDB->readCSV();
  }
}

checkDatabase($db, $populateDB);

?>
