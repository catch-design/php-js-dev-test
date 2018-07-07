<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/install/config.php');
// load constants, populate in html, then run ...
	/**
	 * db class extending from config class
	 */
class db extends config{

    public $isConnected = false;

    public function __construct() {
        parent::__construct();
        $this->connect();
    }

    // mysql connecting method
	/**
	 * connect to mysql db with the given parameters
	 */
    public function connect(){
        if(!$this->isConnected)
        {
            $this->conn = @mysql_connect($this->db_host,$this->db_username,$this->db_password);
            if($this->conn)
            {
                $selectdb = @mysql_select_db($this->db_name,$this->conn);
                if($selectdb)
                {
                    $this->isConnected = true; 
                    return true; 
                } else
                {
                    return false; 
                }
            } else
            {
                return false; 
            }
        } else
        {
            return true; 
        }
    }

    // table existance checking ...
	/**
	 * Lchecks if table exists in database 
	 * @param {?string} tableName - name of table to check
	 */
    public function isTableExists($tableName){
        $tablesInDb = @mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$tableName.'"');
        if($tablesInDb)
        {
            if(mysql_num_rows($tablesInDb) == 1)
            {
                return true; 
            }
            else
            { 
                return false; 
            }
        }
    }
}
?> 