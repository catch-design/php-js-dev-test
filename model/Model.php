<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/catchnz_test/db.php');
class Model extends db{

    function __construct(){
        parent::__construct();
    }
    
    public function select($table, $rows = '*', $where = null, $order = null)
    {
        $this->result = null;
        $q = 'SELECT '.$rows.' FROM '.$table;
        if($where != null)
            $q .= ' WHERE '.$where;
        if($order != null)
            $q .= ' ORDER BY '.$order;
        if($this->isTableExists($table))
        {
            $query = @mysql_query($q);
            if($query)
            {
                $this->numResults = mysql_num_rows($query);
                for($i = 0; $i < $this->numResults; $i++)
                {
                    $r = mysql_fetch_array($query);
                    $key = array_keys($r); 
                    for($x = 0; $x < count($key); $x++)
                    {
                        if(!is_int($key[$x]))
                        {
                            if(mysql_num_rows($query) > 1)
                                $this->result[$i][$key[$x]] = $r[$key[$x]];
                            else if(mysql_num_rows($query) < 1)
                                $this->result = null;
                            else
                                $this->result[$key[$x]] = $r[$key[$x]]; 
                        }
                    }
                }            
                return true; 
            }
            else
            {
                return false; 
            }
        }
    else
        return false; 
    }
}
?>