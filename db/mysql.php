<?php
/*
 * File: mysql.php
 * Description: This handles the database connection for the application
 */
class Database {

	private static $handle = null;	// connection handler

	private $host = 'localhost';
	private $dbname = getenv("DB");
	private $user = getenv("USER");
	private $password = getenv("PASSWD");

	// Contructor
	public function __construct() {

		if (is_null(self::$handle)) {

		    if (self::$handle = @mysql_connect($host, $user, $password)) {

		    	//set to utf8 encoding
           		mysql_set_charset('utf8',self::$handle);

			    if (@mysql_select_db($dbname, self::$handle)) {
				    return true;
			    } else {
				    die('Error:: Unable to select database '.$dbname.' <p><i>'.mysql_error().'</i></p>');
			    }
		    } else {
			    die('Error:: Unable to establish a connection<p><i>'.mysql_error().'</i></p>');
		    }
		}

	}

	public function query($query) {

		if ($result = mysql_query($query, self::$handle)) {
			return $result;
		} 

		// [Nice to have] Adding Error handling, connection exception, SQL injection etc.  

	}

}

?>