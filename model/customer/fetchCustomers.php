<?php
include($_SERVER['DOCUMENT_ROOT']."/model/database.php");

function fetchCust() {
  global $db;
  global $cKey;
  $response = null;

  $query = $db->query("SELECT id,
                              AES_DECRYPT(fName, '". $cKey. "') as fName,
                              AES_DECRYPT(lName, '". $cKey. "') as lName,
                              AES_DECRYPT(email, '". $cKey. "') as email,
                              gender,
                              ipAdd,
                              company,
                              AES_DECRYPT(city, '". $cKey. "') as city,
                              title,
                              website
            FROM customers");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $result = $query->fetchAll();

  foreach($result as $row){
    if($row['gender'] == 0){ $gender = 'Female'; } else { $gender = 'Male';}
    $response .= "<tr>"
                  . "<td>" . $row['fName'] . "</td>"
                  . "<td>" . $row['lName'] . "</td>"
                  . "<td>" . $row['email'] . "</td>"
                  . "<td>" . $gender       . "</td>"
                  . "<td>" . $row['ipAdd'] . "</td>"
                  . "<td>" . $row['company']."</td>"
                  . "<td>" . $row['city']  . "</td>"
                  . "<td>" . $row['title'] . "</td>"
                  . "<td>" . $row['website']."</td>"
                ."</tr>";
  }

  echo json_encode($response);
}

fetchCust();
