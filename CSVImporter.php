<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/db.php');
// helper class to export CSV into mysql ...
	/**
	 * CSV Importer class
	 */
class CSVImporter extends db{

    function __construct(){
        parent::__construct();
    }

    // imports the csv file into given table ...
	/**
	 * imports the given csv file into given table
	 * @param {?string} file - file path o CSV
     * @param {?string} tableName - name of table into which data to be imported
	 */
    public function importCSV($file, $tableName) {
        if($this->isTableExists($tableName)) {
            mysql_query( '
            LOAD DATA LOCAL INFILE "'.$file.'"
            INTO TABLE `' . $tableName . '`
            FIELDS TERMINATED by \',\'
            LINES TERMINATED BY \'\n\'
            IGNORE 1 LINES 
            ', $this->conn)or die(mysql_error());
        } else {
            die("Internal Error in imporing CSV...!!");
        }
    }
}
?>