<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz-test/install/config.php');
class db extends config{

    public $isConnected = false;

    public function __construct() {
        parent::__construct();
        $this->connect();
    }

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

    public function create($tablename, $columns){
        $query = "create table if not exists $table ($columns);";
        $res = @mysql_query($query, $this->conn) or die(mysql_error());
        if($this->isTableExists($tableName)){
            return true;
        } else {
            return false;
        }
    }

}
?> 