<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/model/Model.php');

class CustomerModel extends Model{

    private $table = 'customer';
    
    function __construct() {
        parent::__construct();
        //$db = new db();
        //$this->db = $db;
    }

    public function createTable(){
        $query = "CREATE TABLE IF NOT EXISTS `" . $this->table . "` (\n"
    . " `id` int(11) NOT NULL,\n"
    . " `first_name` varchar(20) NOT NULL,\n"
    . " `last_name` varchar(20) NOT NULL,\n"
    . " `email` varchar(100) NOT NULL,\n"
    . " `gender` varchar(7) NOT NULL,\n"
    . " `ip_address` varchar(23) NOT NULL,\n"
    . " `company` varchar(100) NOT NULL,\n"
    . " `city` varchar(50) NOT NULL,\n"
    . " `title` varchar(100) NOT NULL,\n"
    . " `website` text NOT NULL\n"
    . ")";

    $res = @mysql_query($query, $this->conn) or die(mysql_error());
    if($this->isTableExists($this->table)){
        return true;
    } else {
        return false;
    }
}
}
?>