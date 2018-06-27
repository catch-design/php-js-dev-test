<?php
include("../database.php");

class displayCust {

  global $db;
  global $uKey;

  $query = $db->query("SELECT *
            FROM customers");
  //$query->setFetchMode(PDO::FETCH_ASSOC);
  $result = $query->fetch();
}
