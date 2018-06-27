<?php
include($_SERVER['DOCUMENT_ROOT']."/model/database.php");
require($_SERVER['DOCUMENT_ROOT']."/dependencies/PhpExcel.php");

class populateDB {

  function readCSV(){
    $reader       = PHPExcel_IOFactory::createReader('CSV');
    $csvFile      = $reader->load($_SERVER['DOCUMENT_ROOT']."/data/customers.csv");
    $spreadsheet  = $csvFile->getActiveSheet();
    $this->fillDB($spreadsheet);
  }

  function fillDB($spreadsheet){
    global $db;
    global $cKey;
    $count = 0;
    $query = $db->prepare("INSERT INTO customers (fName, lName, email, gender, ipAdd, company, city, title, website)
                          VALUES (AES_ENCRYPT(:fName, '". $cKey ."'),
                                  AES_ENCRYPT(:lName, '". $cKey ."'),
                                  AES_ENCRYPT(:email, '". $cKey ."'),
                                  :gender,
                                  :ipAdd,
                                  :company,
                                  AES_ENCRYPT(:city, '". $cKey ."'),
                                  :title,
                                  :website)");

    foreach ($spreadsheet->getRowIterator() as $row){
      if($count != 0){
        $column= 0;
        $cellIterator = $row->getCellIterator();
          foreach($cellIterator as $cell){
            if($column == 1){
              $fName    = $cell->getValue();
            } else if($column == 2){
              $lName    = $cell->getValue();
            } else if($column == 3){
              $email    = $cell->getValue();
            } else if($column == 4){

              if($cell->getValue() == "Female") {
                $gender = 0;
              } else {
                $gender = 1;
              }

            } else if($column == 5){
              $ipAdd    = $cell->getValue();
            } else if($column == 6){
              $company  = $cell->getValue();
            } else if($column == 7){
              $city     = $cell->getValue();
            } else if($column == 8){
              $title    = $cell->getValue();
            } else if($column == 9){
              $website  = $cell->getValue();
            }
            $column++;
          }
          $query->bindParam(":fName", $fName);
          $query->bindParam(":lName", $lName);
          $query->bindParam(":email", $email);
          $query->bindParam(":gender", $gender);
          $query->bindParam(":ipAdd", $ipAdd);
          $query->bindParam(":company", $company);
          $query->bindParam(":city", $city);
          $query->bindParam(":title",  $title);
          $query->bindParam(":website", $website);
          $query->execute();
        }
        $count++;
    }
  }
}
